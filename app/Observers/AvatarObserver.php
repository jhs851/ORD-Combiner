<?php

namespace App\Observers;

use App\Core\Storeagable;
use App\Models\{Avatar, User};
use Illuminate\Support\Facades\Storage;

class AvatarObserver
{
    use Storeagable;

    /**
     * @var string
     */
    const DIRECTORY = 'avatars';

    /**
     * Handle the avatar "creating" event.
     *
     * @param  \App\Models\Avatar  $avatar
     * @return void
     */
    public function creating(Avatar $avatar)
    {
        if ($this->hasImage()) $avatar->image = $this->getHashImageName();
    }

    /**
     * Handle the avatar "updating" event.
     *
     * @param  \App\Models\Avatar  $avatar
     * @return void
     */
    public function updating(Avatar $avatar)
    {
        if ($this->hasImage()) $avatar->image = $this->getHashImageName();
    }

    /**
     * Handle the avatar "deleted" event.
     *
     * @param  \App\Models\Avatar  $avatar
     * @return void
     */
    public function deleted(Avatar $avatar)
    {
        Storage::delete(static::DIRECTORY . '/' . $avatar->image);

        User::where('avatar_id', $avatar->id)->update(['avatar_id' => null]);
    }
}
