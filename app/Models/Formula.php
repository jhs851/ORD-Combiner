<?php

namespace App\Models;

use App\Core\Versionable;

class Formula extends UnitRelated
{
    use Versionable;

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

        static::created(function($formula) {
            Unit::find($formula->unit_id)->uppers()->create([
                'version_id' => $formula->version_id,
                'unit_id'    => $formula->target_id,
            ]);
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
        'version_id',
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
