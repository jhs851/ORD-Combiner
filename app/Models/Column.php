<?php

namespace App\Models;

use App\Core\Cacheable;
use Illuminate\Database\Eloquent\{Model, Relations\HasMany};

class Column extends Model
{
    use Cacheable;

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
