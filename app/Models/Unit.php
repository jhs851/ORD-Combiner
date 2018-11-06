<?php

namespace App\Models;

use App\Core\Cacheable;
use Illuminate\Database\Eloquent\{Model, Relations\BelongsTo, Relations\HasMany};

class Unit extends Model
{
    use Cacheable;

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        static::deleting(function($unit) {
            $unit->formulas->each->delete();
            $unit->uppers->each->delete();
        });
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'image',
        'warn',
        'etc',
        'lowest',
        'count',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'warn' => 'boolean',
        'etc' => 'boolean',
        'lowest' => 'boolean',
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
        return $this->belongsTo(Rate::class)->without('units');
    }

    /**
     * @return HasMany
     */
    public function formulas() : HasMany
    {
        return $this->hasMany(Formula::class, 'target_id');
    }

    /**
     * @return HasMany
     */
    public function uppers() : HasMany
    {
        return $this->hasMany(Upper::class, 'target_id');
    }
}
