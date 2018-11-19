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

        static::updated(function($formula) {
            Unit::find($formula->unit_id)->uppers()->create(['unit_id' => $formula->target_id]);
        });

        static::deleted(function($formula) {
            Upper::where([
                ['target_id', $formula->unit_id],
                ['unit_id', $formula->target_id],
            ])->delete();
        });
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
