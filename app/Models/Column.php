<?php

namespace App\Models;

use Illuminate\Database\Eloquent\{Model, Relations\HasMany};

class Column extends Model
{
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * @return HasMany
     */
    public function rates() : HasMany
    {
        return $this->hasMany(Rate::class)->orderBy('order', 'asc')->with('units');
    }
}
