<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\UsersRequest;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * UsersController constructor.
     */
    public function __construct()
    {
        $this->middleware('verified');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(User $user)
    {
        $this->authorize('update', $user);

        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UsersRequest $request
     * @param User         $user
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(UsersRequest $request, User $user)
    {
        $this->authorize('update', $user);

        $user->update($request->all());

        return $this->toRespond('변경되었습니다.', route('users.edit', $user->id));
    }

    /**
     * @param User $user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function dropout(User $user)
    {
        $this->authorize('update', $user);

        return view('users.dropout', compact('user'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param User    $user
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function destroy(Request $request, User $user)
    {
        $this->authorize('update', $user);

        $request->validate(['remove_confirm' => 'accepted']);

        $user->delete();

        return $this->toRespond('탈퇴되었습니다.<br>그동안 이용해주셔서 감사합니다.', route('login'));
    }
}
