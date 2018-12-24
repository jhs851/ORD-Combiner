<?php

namespace App\Models;

use App\Core\Versionable;
use App\Scopes\VersionScope;
use Illuminate\Database\Eloquent\{Model, Relations\BelongsTo, Relations\HasOne};

class Formula extends Model
{
    use Versionable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'version_id',
        'target_id',
        'unit_id',
        'count',
    ];

    /**
     * The model's attributes.
     *
     * @var array
     */
    protected $attributes = [
        'count' => 1,
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * @return BelongsTo
     */
    public function unit() : BelongsTo
    {
        return $this->belongsTo(Unit::class)->with('rate')->withoutGlobalScope(VersionScope::class);
    }

    /**
     * @return BelongsTo
     */
    public function target() : BelongsTo
    {
        return $this->belongsTo(Unit::class, 'target_id', 'id')->withoutGlobalScope(VersionScope::class);
    }

    /**
     * @return HasOne
     */
    public function upper() : HasOne
    {
        return $this->hasOne(Upper::class);
    }

    /**
     * @param int|null $unitId
     */
    public function setUnitIdAttribute(int $unitId = null) : void
    {
        $this->attributes['unit_id'] = $unitId ?: $this->unit_id;
    }

    /**
     * 버전을 새로 생성할 때 조합식을 시딩한다.
     * 조합식은 이전 버전의 조합식에서 버전만 다르게 한 뒤
     * 등급과 이름을 기준으로 현재 버전의 유닛과 타겟을 찾고 시딩한다.
     */
    public function seed() : void
    {
        static::create([
            'target_id' => Unit::differentVersions($this->target)->firstOrFail()->id,
            'unit_id'   => Unit::differentVersions($this->unit)->firstOrFail()->id,
            'count'     => $this->count,
        ]);
    }
}
