<?php

namespace App\Models;

use App\Core\Cacheable;
use App\Exceptions\NotFoundVersionException;
use App\Scopes\VersionScope;
use Illuminate\Database\Eloquent\{Builder, Model, Relations\HasMany};

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
        if (app()->environment() === 'testing' && static::currentVersion()->first() === null) return new static;

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
     * @return HasMany
     */
    public function units() : HasMany
    {
        return $this->hasMany(Unit::class)->withoutGlobalScope(VersionScope::class);
    }

    /**
     * @return HasMany
     */
    public function formulas() : HasMany
    {
        return $this->hasMany(Formula::class)->withoutGlobalScope(VersionScope::class);
    }

    /**
     * @param Version $version
     * @throws NotFoundVersionException
     */
    public function seedUnitsAndFormulas(Version $version) : void
    {
        $currentVersion = static::getVersion();

        static::setVersion($version);

        $this->units->each->seed();

        // 조합식 시딩도 추가해야함
        // 주의할점은 새로 생성한 units를 기준으로 target과 unit id를 맞춰야한다는 점...

        static::setVersion($currentVersion);
    }

    public function scopeBefore(Builder $builder, Version $version) : Builder
    {
        return $builder->where('id', '<>', $version->id)->orderBy('version', 'desc');
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
