<?php

namespace App\Core;

trait Versionable
{
    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function bootVersionable()
    {
        static::addGlobalScope(new VersionScope);
    }

    public function setVersionIdAttribute() : void
    {
        $this->attributes['version_id'] = version()->id;
    }
}
