<?php

namespace App;

use Illuminate\Database\Eloquent\{
    Model, Relations\HasMany
};

class Column extends Model
{
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    public function rates() : HasMany
    {
        return $this->hasMany(Rate::class)->with('units');
    }
}
