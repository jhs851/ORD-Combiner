<?php

namespace App\Models;

use App\Core\Versionable;
use Illuminate\Database\Eloquent\{Model, Relations\BelongsTo};

class Upper extends Model
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
     * @return BelongsTo
     */
    public function formula() : BelongsTo
    {
        return $this->belongsTo(Formula::class);
    }
}
