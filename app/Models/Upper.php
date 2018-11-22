<?php

namespace App\Models;

use App\Core\Versionable;
use Illuminate\Database\Eloquent\Builder;

class Upper extends UnitRelated
{
    use Versionable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'version_id',
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
