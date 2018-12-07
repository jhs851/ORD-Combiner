<?php

namespace App\Models;

use App\Core\Cacheable;
use Illuminate\Database\Eloquent\{Builder, Model, Relations\HasMany};
use Illuminate\Support\Facades\Storage;

class Avatar extends Model
{
    use Cacheable;

    /**
     * @var string
     */
    const WISP_NAME = '위습';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'image',
        'limit',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'imageUrl',
    ];

    /**
     * @return HasMany
     */
    public function users() : HasMany
    {
        return $this->hasMany(User::class);
    }

    /**
     * @return string
     */
    public function getImageUrlAttribute() : string
    {
        return Storage::url("avatars/{$this->image}") ?: '';
    }

    /**
     * @param Builder $builder
     * @return Builder
     */
    public function scopeWisp(Builder $builder) : Builder
    {
        return $builder->where('name', static::WISP_NAME);
    }

    /**
     * @param Builder $builder
     * @param User    $user
     * @return Builder
     */
    public function scopePossibleAvatars(Builder $builder, User $user) : Builder
    {
        return $builder->where('limit', '<=', $user->maxLoad->clear);
    }
}
