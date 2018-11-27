<?php

namespace App\Models;

use App\Core\{Cacheable, Orderable, Versionable};
use Illuminate\Database\Eloquent\{Builder, Relations\BelongsTo, Relations\HasMany};
use Illuminate\Support\Facades\Storage;

class Unit extends Orderable
{
    use Cacheable, Versionable;

    const WISP_NAME = '위습';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'version_id',
        'rate_id',
        'name',
        'description',
        'order',
        'etc',
        'lowest',
        'count',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'imageUrl',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'etc'    => 'boolean',
        'lowest' => 'boolean',
    ];

    protected $criteriaId = 'rate_id';

    /**
     * @return BelongsTo
     */
    public function rate() : BelongsTo
    {
        return $this->belongsTo(Rate::class)->without('units');
    }

    /**
     * @return HasMany
     */
    public function formulas() : HasMany
    {
        return $this->hasMany(Formula::class, 'target_id')->with('unit');
    }

    /**
     * @return HasMany
     */
    public function uppers() : HasMany
    {
        return $this->hasMany(Upper::class, 'target_id');
    }

    /**
     * @return BelongsTo
     */
    public function version() : BelongsTo
    {
        return $this->belongsTo(Version::class);
    }

    /**
     * @return string
     */
    public function getImageUrlAttribute() : string
    {
        return Storage::url('units/' . ($this->image ?: 'default.jpg'));
    }

    /**
     * 해당 유닛의 조합 유닛으로 가능한 모든 유닛을 반환한다.
     * 선위와 해당 유닛의 이미 존재하는 조합 유닛들도 제외시킨다.
     *
     * @param Builder $builder
     * @param int     $targetId
     * @return Builder
     */
    public function scopePossibleFormulas(Builder $builder, int $targetId) : Builder
    {
        $target = static::findOrFail($targetId);

        return $builder->where('id', '<>', static::wisp()->value('id'))
                       ->whereIn('rate_id', Rate::cache(function($rate) use ($target) { return $rate->lowerGrade($target)->pluck('id'); }, ".{$targetId}"))
                       ->whereNotIn('id', $target->formulas()->pluck('unit_id'))
                       ->orderBy('rate_id', 'asc')
                       ->orderBy('order', 'asc')
                       ->with('rate');
    }

    /**
     * @param Builder $builder
     * @return Builder
     */
    public static function scopeWisp(Builder $builder) : Builder
    {
        return $builder->where('name', static::WISP_NAME);
    }
}
