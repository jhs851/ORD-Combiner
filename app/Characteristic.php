<?php

namespace App;

use Illuminate\Database\Eloquent\{
    Model, Relations\BelongsToMany
};

class Characteristic extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'color',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'included',
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    public function units() : BelongsToMany
    {
        return $this->belongsToMany(Unit::class);
    }

    public function getIncludedAttribute()
    {
        return $this->units->pluck('id');
    }
}
