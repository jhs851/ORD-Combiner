<?php

namespace App\Models;

use App\Core\Cacheable;
use App\Exceptions\NotFoundVersionException;
use Illuminate\Database\Eloquent\{Builder, Model};

class Version extends Model
{
    use Cacheable;

    /**
     * The current Version.
     *
     * @var string
     */
    public static $version;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'version',
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * @param string $version
     * @throws NotFoundVersionException
     */
    public static function setVersion(string $version)
    {
        if (! static::where('version', $version)->exists()) throw new NotFoundVersionException($version, request()->path());

        static::$version = $version;
    }

    /**
     * @return Version
     */
    public static function getVersion() : Version
    {
        if (app()->environment() === 'testing') return new static;

        return static::cache(function() {
            return static::currentVersion()->first();
        }, '.' . static::$version);
    }

    /**
     * @param Builder $builder
     * @return Builder
     */
    public function scopeCurrentVersion(Builder $builder) : Builder
    {
        return $builder->where('version', static::$version ?: config('app.version'));
    }

    /**
     * Convert the model to its string representation.
     *
     * @return string
     */
    public function __toString()
    {
        return $this->version;
    }
}
