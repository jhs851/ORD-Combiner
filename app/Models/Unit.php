<?php

namespace App\Models;

use App\Core\{Cacheable, Orderable, Orderablent};
use Illuminate\Database\Eloquent\{Model, Relations\BelongsTo, Relations\HasMany};
use Illuminate\Support\Facades\Storage;

class Unit extends Model implements Orderablent
{
    use Cacheable, Orderable;

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function($unit) {
            if (request()->hasFile('image') && request()->file('image')->isValid()) {
                request()->file('image')->store('units');

                $unit->image = request()->file('image')->hashName();
            }
        });

        static::updating(function($unit) {
            if (request()->hasFile('image') && request()->file('image')->isValid()) {
                Storage::delete("units/{$unit->image}");

                request()->file('image')->store('units');

                $unit->image = request()->file('image')->hashName();
            }
        });

        static::deleting(function($unit) {
            Storage::delete("units/{$unit->image}");

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
        'rate_id',
        'name',
        'description',
        'order',
        'warn',
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
        'warn'   => 'boolean',
        'etc'    => 'boolean',
        'lowest' => 'boolean',
    ];

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

    /**
     * @return string
     */
    public function getImageUrlAttribute() : string
    {
        return Storage::url('units/' . ($this->image ?: 'default.jpg'));
    }

    /**
     * @return string
     */
    public function getCriteriaId() : string
    {
        return 'rate_id';
    }
}
