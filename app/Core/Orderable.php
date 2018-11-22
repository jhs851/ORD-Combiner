<?php

namespace App\Core;

use Illuminate\Database\Eloquent\{Builder, Model};

abstract class Orderable extends Model
{
    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        static::created(function($model) {
            $model->setOrder();
        });
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
        if ($data['order'] == $this->order && $data[$this->getCriteriaId()] == $this->{$this->getCriteriaId()}) return;

        if ($this->{$this->getCriteriaId()} === $data[$this->getCriteriaId()]) {
            if ($belowOrders = static::belowOrders($data, $this->order)->get()) $belowOrders->each->decrement('order');

            if ($underOrders = static::underOrders($data, $this->order)->get()) $underOrders->each->increment('order');
        } else {
            if ($beforeOrders = static::beforeOrders($this->{$this->getCriteriaId()}, $this->order)->get()) $beforeOrders->each->decrement('order');

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
        return $builder->where($this->getCriteriaId(), $data[$this->getCriteriaId()])
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
        return $builder->where($this->getCriteriaId(), $data[$this->getCriteriaId()])
            ->whereBetween('order', [$data['order'], $oldOrder]);
    }

    /**
     * @param Builder $builder
     * @param int     $oldCriteriaId
     * @param int     $oldOrder
     * @return Builder
     */
    public function scopeBeforeOrders(Builder $builder, int $oldCriteriaId, int $oldOrder) : Builder
    {
        return $builder->where([
            [$this->getCriteriaId(), $oldCriteriaId],
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
            [$this->getCriteriaId(), $data[$this->getCriteriaId()]],
            ['order', '>=', $data['order']],
        ]);
    }

    public function setOrder() : void
    {
        $this->order = ($lastOrderRate = static::lastOrder($this->{$this->getCriteriaId()})->first()) ? $lastOrderRate->order + 1 : 0;
        $this->save();
    }

    /**
     * @param Builder $builder
     * @param int     $criteriaId
     * @return Builder
     */
    public function scopeLastOrder(Builder $builder, int $criteriaId) : Builder
    {
        return $builder->where($this->getCriteriaId(), $criteriaId)
            ->whereNotNull('order')
            ->orderBy('order', 'desc');
    }

    /**
     * @return string
     */
    public function getCriteriaId() : string
    {
        return $this->criteriaId;
    }
}
