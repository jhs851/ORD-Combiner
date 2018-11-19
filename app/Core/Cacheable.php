<?php

namespace App\Core;

use Cache;
use Closure;

trait Cacheable
{
    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function bootCacheable()
    {
        foreach (static::methodsToFlush() as $method) {
            static::$method(function($model) {
                $model->flush();
            });
        }
    }

    /**
     * @return array
     */
    public static function methodsToFlush() : array
    {
        return ['created', 'updated', 'deleted'];
    }

    /**
     * @param Closure     $callback
     * @param string|null $addKeyName
     * @return mixed
     */
    public static function cache(Closure $callback, string $addKeyName = null)
    {
        if (! config('cache.enable')) return $callback(new static);

        $cache = static::taggable()
            ? app('cache')->tags(static::getTags())
            : app('cache');

        return $cache->rememberForever(static::getCacheKey($addKeyName), function() use ($callback) {
            return $callback(new static);
        });
    }

    /**
     * @return bool|void
     */
    public static function flush()
    {
        if (! static::taggable()) {
            return Cache::flush();
        }

        return Cache::tags(static::getTags())->flush();
    }

    /**
     * @return bool
     */
    public static function taggable() : bool
    {
        return in_array(config('cache.default'), ['memcached', 'redis']);
    }

    /**
     * @param string|null $addKeyName
     * @return string
     */
    protected static function getCacheKey(string $addKeyName = null) : string
    {
        $routeName = app('router')->getRoutes()->match(request())->getName() . '.' . static::getTags();
        $key = ($queryString = request()->getQueryString())
            ? $routeName . '.' . urlencode($queryString)
            : $routeName;

        return md5($key . $addKeyName);
    }

    /**
     * @return string
     */
    protected static function getTags() : string
    {
        return str_plural(strtolower(class_basename(new static)));
    }
}
