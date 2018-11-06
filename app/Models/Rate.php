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
            $rate->setOrder(request()->only('column_id'));
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
     * @param Builder $builder
     * @param array   $data
     * @return Builder
     */
    public function scopeOverlapping(Builder $builder, array $data) : Builder
    {
        return $builder->where([
            ['column_id', $data['column_id']],
            ['order', $data['order']],
        ]);
    }

    /**
     * @return int
     */
    public function getLastOrder() : int
    {
        return static::where('column_id', request()->get('column_id'))->orderBy('order', 'desc')->value('order');
    }

    /**
     * @param array $data
     */
    public function setOrder(array $data) : void
    {
        if (! array_key_exists('order', $data)) $data['order'] = $this->getLastOrder() + 1;

        if ($exist = static::overlapping($data)->first()) {
            $exist->order = $data['order'] + 1;
            $exist->save();
        }

        $this->update($data);
    }
}
