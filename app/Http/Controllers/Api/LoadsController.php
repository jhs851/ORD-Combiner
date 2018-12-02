<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;

class LoadsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param User $user
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function index(User $user)
    {
        return $user->loads()->orderBy('clear', 'desc')->paginate(10);
    }

    /**
     * @param User $user
     * @return int
     */
    public function next(User $user) : int
    {
        return $user->maxLoad ? $user->maxLoad->clear + 1 : 1;
    }
}
