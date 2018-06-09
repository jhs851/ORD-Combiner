<?php

namespace App;

use Illuminate\Database\Eloquent\{
    Model, Relations\BelongsTo
};

class UnitRelated extends Model
{
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
        return $this->belongsTo(Unit::class);
    }
}
