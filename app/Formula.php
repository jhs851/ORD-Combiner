<?php

namespace App;

use Illuminate\Database\Eloquent\{
    Model, Relations\BelongsTo
};

class Formula extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'unit_id',
        'rate_id',
        'name',
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
    public function rate() : BelongsTo
    {
        return $this->belongsTo(Rate::class);
    }
}
