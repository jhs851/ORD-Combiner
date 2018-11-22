<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;

class Upper extends UnitRelated
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'unit_id',
    ];

    /**
     * @param Builder $builder
     * @param Formula $formula
     * @return Builder
     */
    public function scopeCurrentUpperWithFormula(Builder $builder, Formula $formula)
    {
        return $builder->where([['target_id', $formula->unit_id], ['unit_id', $formula->target_id]]);
    }
}
