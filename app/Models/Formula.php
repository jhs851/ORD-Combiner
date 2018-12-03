<?php

namespace App\Models;

use App\Core\Versionable;
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
        return $this->belongsTo(Unit::class)->with('rate');
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
}
