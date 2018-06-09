<?php

namespace App;

class Formula extends UnitRelated
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'unit_id',
        'count',
    ];
}
