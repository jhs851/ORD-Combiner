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
        foreach ((new static)->methodsToFlush() as $method) {
            static::$method(function($model) {
                $model->flush();
            });
        }
    }

    /**
     * @return array
     */
    private function methodsToFlush() : array
    {
        return ['created', 'updated', 'deleted'];
    }

    /**
     * @param Closure $callback
     * @return mixed
     */
    public static function cache(Closure $callback)
    {
        if (! config('cache.enable')) return $callback(new static);

        $cache = static::taggable()
            ? app('cache')->tags(static::getTags())
            : app('cache');

        return $cache->rememberForever(static::getCacheKey(), function() use ($callback) {
            return $callback(new static);
        });
    }

    /**
     * @return bool|void
     */
    protected function flush()
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
     * @return string
     */
    protected static function getCacheKey() : string
    {
        $routeName = app('router')->getRoutes()->match(request())->getName() . '.' . static::getTags();
        $key = ($queryString = request()->getQueryString())
            ? $routeName . '.' . urlencode($queryString)
            : $routeName;

        return md5($key);
    }

    /**
     * @return string
     */
    protected static function getTags() : string
    {
        return str_plural(strtolower(class_basename(new static)));
    }
}
