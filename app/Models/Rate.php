<?php

namespace App\Models;

use App\Core\{Cacheable, Orderable, Orderablent};
use Illuminate\Database\Eloquent\{Builder, Model, Relations\HasMany};

class Rate extends Model implements Orderablent
{
    use Cacheable, Orderable;

    const LOWEST_NAME = '흔함';

    const ETC_NAME = '기타';

    const FORMULA_EXCLUSION_RATES = ['초월함', '불멸의', '영원함', '제한됨'];

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

    /**
     * @param Builder $builder
     * @return Builder
     */
    public function scopeGeneral(Builder $builder) : Builder
    {
        return $builder->whereNotIn('name', [static::LOWEST_NAME, static::ETC_NAME]);
    }

    /**
     * 해당 유닛보다 작은 등급을 가져온다.
     * 초월함, 불멸, 영원함, 제한됨 등급은 제외시킨다.
     *
     * @param Builder $builder
     * @param Unit    $target
     * @return Builder
     */
    public function scopeLowerGrade(Builder $builder, Unit $target) : Builder
    {
        return $builder->whereNotIn('name', static::FORMULA_EXCLUSION_RATES)
                ->where(function($query) use ($target) {
                    $query->where('id', '<', $target->rate->id)
                          ->orWhere('name', static::ETC_NAME);
                });
    }
}
