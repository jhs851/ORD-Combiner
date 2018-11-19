<?php

namespace App\Models;

class Formula extends UnitRelated
{
    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        foreach (Rate::methodsToFlush() as $method) {
            static::$method(function() {
                Rate::flush();
            });
        }
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
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
}
