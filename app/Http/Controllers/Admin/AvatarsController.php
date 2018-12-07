<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\AvatarsRequest;
use App\Models\Avatar;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AvatarsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.avatars.index', ['avatars' => Avatar::cache(function($avatar) {
            return $avatar->oldest()->get();
        })]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param AvatarsRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(AvatarsRequest $request)
    {
        return $this->respondForJson('생성되었습니다.', ['item' => Avatar::create($request->all())]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Avatar  $avatar
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Avatar $avatar)
    {
        $avatar->update($request->all());

        $avatar->touch();

        return $this->respondForJson("변경되었습니다.", compact('avatar'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Avatar $avatar
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(Avatar $avatar)
    {
        $avatar->delete();

        return $this->respondForJson('삭제되었습니다.');
    }
}
