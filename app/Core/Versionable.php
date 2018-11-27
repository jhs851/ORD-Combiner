<?php

namespace App\Core;

use App\Scopes\VersionScope;

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

        static::creating(function($model) {
            $model->version_id = version()->id;
        });
    }

    /**
     * @param int|null $versionId
     */
    public function setVersionIdAttribute(int $versionId = null) : void
    {
        $this->attributes['version_id'] = $versionId ?: version()->id;
    }
}
