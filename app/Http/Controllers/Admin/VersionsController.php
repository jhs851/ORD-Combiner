<?php

namespace App\Http\Controllers\Admin;

use App\Models\Version;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VersionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.versions.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $request->validate(['version' => ['required', 'unique:versions,version']]);

        return $this->respondForJson('생성되었습니다.', ['item' => Version::create($request->all())]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param Version                   $version
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Version $version)
    {
        $request->validate(['version' => 'required']);

        $version->update($request->all());

        return $this->respondForJson('변경되었습니다.', compact('version'));
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function deletes()
    {
        Version::whereIn('id', request()->get('ids'))->delete();

        return $this->respondForJson('삭제되었습니다.');
    }
}
