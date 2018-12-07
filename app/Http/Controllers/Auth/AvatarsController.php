<?php

namespace App\Http\Controllers\Auth;

use App\Models\Avatar;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AvatarsController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $avatars = Avatar::cache(function($avatar) use ($user) {
            return $avatar->possibleAvatars($user)->get();
        });

        return view('avatars.edit', compact('user', 'avatars'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param User                      $user
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, User $user)
    {
        $request->validate(['avatar_id' => ['required', 'exists:avatars,id']]);

        $avatar = Avatar::find($request->get('avatar_id'));

        $avatar->users()->save($user);

        return $this->respondForJson('변경되었습니다.', compact('avatar'));
    }
}
