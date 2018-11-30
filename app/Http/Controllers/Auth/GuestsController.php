<?php

namespace App\Http\Controllers\Auth;

use App\Models\{Guest, User};
use App\Rules\EmailMatch;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class GuestsController extends Controller
{
    use RegistersUsers;

    /**
     * GuestsController constructor.
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Guest $guest
     * @return \Illuminate\Http\Response
     */
    public function edit(Guest $guest)
    {
        return view('guests.edit', compact('guest'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request $request
     * @param  Guest   $guest
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function update(Request $request, Guest $guest)
    {
        return $this->register($request->merge(['name' => $guest->name]));
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => ['required', new EmailMatch(request()->route('guest'))],
            'tel'   => ['required', 'string', 'min:6'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create($data);
    }

    /**
     * The user has been registered.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function registered(Request $request, $user)
    {
        $user->markEmailAsVerified();

        Guest::where('email', $user->email)->delete();
    }
}
