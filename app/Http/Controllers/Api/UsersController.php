<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;

class UsersController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function __invoke()
    {
        return User::cache(function($user) {
            return $user->orderBy('created_at', 'desc')->paginate(10);
        });
    }
}
