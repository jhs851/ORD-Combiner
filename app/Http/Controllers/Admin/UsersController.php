<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\UsersRequest;
use App\Models\User;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.users.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UsersRequest $request
     * @param User         $user
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(UsersRequest $request, User $user)
    {
        if ($request->input('email_verfied') && ! $user->hasVerifiedEmail())
            $request->request->add(['email_verified_at' => $user->freshTimestamp()]);
        else if (! $request->input('email_verfied') && $user->hasVerifiedEmail())
            $request->request->add(['email_verified_at' => null]);

        $user->update($request->all());

        return $this->toRespond('변경되었습니다.', route('admin.users.edit', $user->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function destroy(User $user)
    {
        $user->delete();

        return $this->toRespond('삭제되었습니다.', route('admin.users.index'));
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function deletes()
    {
        User::whereIn('id', request()->get('ids'))->delete();

        return $this->respondForJson('삭제되었습니다.');
    }
}
