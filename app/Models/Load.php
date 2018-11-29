<?php

namespace App\Models;

use Illuminate\Database\Eloquent\{Model, Relations\BelongsTo};

class Load extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code',
        'clear',
    ];

    /**
     * @return BelongsTo
     */
    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
