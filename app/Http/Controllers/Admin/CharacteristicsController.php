<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CharacteristicsRequest;
use App\Models\Characteristic;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CharacteristicsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.characteristics.index', ['characteristics' => Characteristic::cache(function($characteristic) {
            return $characteristic->orderBy('id', 'asc')->get();
        })]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CharacteristicsRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(CharacteristicsRequest $request)
    {
        return $this->respondForJson('생성되었습니다.', ['item' => Characteristic::create($request->all())]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request        $request
     * @param Characteristic $characteristic
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Characteristic $characteristic)
    {
        $request->validate([
            'name'   => 'required',
            'regexp' => 'required',
        ]);

        $characteristic->update($request->all());

        return $this->respondForJson('변경되었습니다.', compact('characteristic'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Characteristic $characteristic
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(Characteristic $characteristic)
    {
        $characteristic->delete();

        return $this->respondForJson('삭제되었습니다.');
    }
}
