<?php

namespace App\Models;

use App\Core\Cacheable;
use Illuminate\Database\Eloquent\Model;

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
        'regexp',
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
}
