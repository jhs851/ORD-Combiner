<?php

namespace App\Observers;

use App\Models\Version;

class VersionObserver
{
    /**
     * Handle the version "created" event.
     *
     * @param  \App\Models\Version  $version
     * @return void
     */
    public function created(Version $version)
    {
        $currentVersion = version();

        version($version);

        $before = Version::where('id', '<>', $version->id)->orderBy('version', 'desc')->first();

        $before->units->each(function($unit) use ($version) {
            $version->units()->create($unit->toArray());
        });

        $before->formulas->each(function($formula) use ($version) {
            $version->formulas()->create($formula->toArray());
        });

        version($currentVersion);
    }

    /**
     * Handle the version "deleted" event.
     *
     * @param  \App\Models\Version  $version
     * @return void
     */
    public function deleted(Version $version)
    {
        $version->units->each->delete();

        $version->formulas->each->delete();
    }
}
