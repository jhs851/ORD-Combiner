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
        if (app()->environment() === 'testing' || ! $before = Version::before($version)->first()) return;

        $before->seedUnitsAndFormulas($version);
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
    }
}
