<?php

namespace App\Models;

use App\Core\Cacheable;
use Illuminate\Database\Eloquent\{Builder, Model, Relations\HasMany};

class Rate extends Model
{
    use Cacheable;

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        static::created(function($rate) {
            $rate->setOrder();
        });

        static::deleting(function($rate) {
            $rate->units->each->delete();
        });
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'column_id',
        'name',
        'color',
        'order',
    ];

    /**
     * The relations to eager load on every query.
     *
     * @var array
     */
    protected $with = [
        'units',
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * @return HasMany
     */
    public function units() : HasMany
    {
        return $this->hasMany(Unit::class)->with(['rate', 'formulas', 'uppers']);
    }

    /**
     * 컬럼안에서 1이 0으로 가면 0은 1로 증가,
     * 컬럼안에서 2가 0으로 가면 0과 1은 1과 2로
     * 컬럼안에서 0이 2로 가면 1과 2는 0과 1로
     * 컬럼안에서 0이 다른 컬럼으로 이동하면 1과 2는 0과 1로
     *
     * @param array $data
     */
    public function updateOrder(array $data) : void
    {
        if ($data['order'] == $this->order && $data['column_id'] == $this->column_id) return;

        if ($this->column_id === $data['column_id']) {
            if ($belowOrders = static::belowOrders($data, $this->order)->get()) $belowOrders->each->decrement('order');

            if ($underOrders = static::underOrders($data, $this->order)->get()) $underOrders->each->increment('order');
        } else {
            if ($beforeOrders = static::beforeOrders($this->column_id, $this->order)->get()) $beforeOrders->each->decrement('order');

            if ($afterOrders = static::afterOrders($data)->get()) $afterOrders->each->increment('order');
        }

        $this->update($data);
    }

    /**
     * @param Builder $builder
     * @param array   $data
     * @param int     $oldOrder
     * @return Builder
     */
    public function scopeBelowOrders(Builder $builder, array $data, int $oldOrder) : Builder
    {
        return $builder->where('column_id', $data['column_id'])
            ->whereBetween('order', [$oldOrder + 1, $data['order']]);
    }

    /**
     * @param Builder $builder
     * @param array   $data
     * @param int     $oldOrder
     * @return Builder
     */
    public function scopeUnderOrders(Builder $builder, array $data, int $oldOrder) : Builder
    {
        return $builder->where('column_id', $data['column_id'])
            ->whereBetween('order', [$data['order'], $oldOrder]);
    }

    /**
     * @param Builder $builder
     * @param int     $oldColumnId
     * @param int     $oldOrder
     * @return Builder
     */
    public function scopeBeforeOrders(Builder $builder, int $oldColumnId, int $oldOrder) : Builder
    {
        return $builder->where([
            ['column_id', $oldColumnId],
            ['order', '>', $oldOrder],
        ]);
    }

    /**
     * @param Builder $builder
     * @param array   $data
     * @return Builder
     */
    public function scopeAfterOrders(Builder $builder, array $data) : Builder
    {
        return $builder->where([
            ['column_id', $data['column_id']],
            ['order', '>=', $data['order']],
        ]);
    }

    public function setOrder() : void
    {
        $this->order = ($lastOrderRate = static::lastOrder($this->column_id)->first()) ? $lastOrderRate->order + 1 : 0;
        $this->save();
    }

    /**
     * @param Builder $builder
     * @param int     $columnId
     * @return Builder
     */
    public function scopeLastOrder(Builder $builder, int $columnId) : Builder
    {
        return $builder->where('column_id', $columnId)
            ->whereNotNull('order')
            ->orderBy('order', 'desc');
    }
}
