<?php

/**
 * @param string   $class
 * @param array    $attributes
 * @param int|null $times
 * @return mixed
 */
if (! function_exists('create')) {
    function create(string $class, array $attributes = [], int $times = null)
    {
        return factory($class, $times)->create($attributes);
    }
}

/**
 * @param string   $class
 * @param array    $attributes
 * @param int|null $times
 * @return mixed
 */
if (! function_exists('make')) {
    function make(string $class, array $attributes = [], int $times = null)
    {
        return factory($class, $times)->make($attributes);
    }
}
