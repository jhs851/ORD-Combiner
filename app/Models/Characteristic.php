<?php

namespace App\Models;

use App\Core\Cacheable;
use Illuminate\Database\Eloquent\{Model, Relations\BelongsToMany};
use Illuminate\Support\Collection;

class Characteristic extends Model
{
    use Cacheable;

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

    /**
     * @return BelongsToMany
     */
    public function units() : BelongsToMany
    {
        return $this->belongsToMany(Unit::class);
    }

    /**
     * @return Collection
     * @throws \Exception
     */
    public function getIncludedAttribute() : Collection
    {
        return $this->cache(function($characteristic) {
            return $characteristic->units->pluck('id');
        }, ".{$this->id}");
    }
}
