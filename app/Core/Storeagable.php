<?php

namespace App\Core;

trait Storeagable
{
    /**
     * @return bool
     */
    protected function hasImage() : bool
    {
        return request()->hasFile('image') && request()->file('image')->isValid();
    }

    /**
     * @return string
     */
    protected function getHashImageName() : string
    {
        return str_replace(static::DIRECTORY . '/', '', request()->file('image')->store(static::DIRECTORY));
    }
}
