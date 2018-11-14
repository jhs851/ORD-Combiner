<?php

namespace App\Models;

use App\Core\{Cacheable, Orderable, Orderablent};
use Illuminate\Database\Eloquent\{Builder, Model, Relations\HasMany};

class Rate extends Model implements Orderablent
{
    use Cacheable, Orderable;

    const LOWEST_NAME = '흔함';

    const ETC_NAME = '기타';

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

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
        return $this->hasMany(Unit::class)->with(['rate', 'formulas', 'uppers'])->orderBy('order', 'asc');
    }

    /**
     * @return string
     */
    public function getCriteriaId() : string
    {
        return 'column_id';
    }

    /**
     * @param Builder $builder
     * @return Builder
     */
    public function scopeLowest(Builder $builder) : Builder
    {
        return $builder->where('name', static::LOWEST_NAME);
    }

    /**
     * @param Builder $builder
     * @return Builder
     */
    public function scopeEtc(Builder $builder) : Builder
    {
        return $builder->where('name', static::ETC_NAME);
    }
}
