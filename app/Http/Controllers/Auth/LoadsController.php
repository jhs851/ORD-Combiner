<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\LoadsRequest;
use App\Models\{Load, User};
use App\Http\Controllers\Controller;

class LoadsController extends Controller
{
    /**
     * LoadsController constructor.
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Display a listing of the resource.
     *
     * @param User $user
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function index(User $user)
    {
        $this->authorize('update', $user);

        return view('loads.index', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param LoadsRequest $request
     * @param User         $user
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(LoadsRequest $request, User $user)
    {
        $user->loads()->create($request->all());

        return $this->respondForJson('생성되었습니다.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param LoadsRequest $request
     * @param User         $user
     * @param Load         $load
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(LoadsRequest $request, User $user, Load $load)
    {
        $load->update($request->all());

        return $this->respondForJson('변경되었습니다.', compact('load'));
    }

    /**
     * @param User $user
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function deletes(User $user)
    {
        $this->authorize('update', $user);

        Load::whereIn('id', request()->get('ids'))->delete();

        return $this->respondForJson('삭제되었습니다.');
    }
}
