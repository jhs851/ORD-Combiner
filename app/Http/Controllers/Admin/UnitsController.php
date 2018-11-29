<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\UnitsRequest;
use App\Models\Unit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UnitsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.units.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UnitsRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(UnitsRequest $request)
    {
        return $this->respondForJson('생성되었습니다.', ['item' => Unit::create($request->all())]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UnitsRequest $request
     * @param Unit         $unit
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UnitsRequest $request, Unit $unit)
    {
        $unit->update($request->all());

        $unit->touch();

        return $this->respondForJson("변경되었습니다.", compact('unit'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Unit $unit
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(Unit $unit)
    {
        $unit->delete();

        return $this->respondForJson('삭제되었습니다.');
    }

    /**
     * @param Request $request
     * @param Unit    $unit
     * @return \Illuminate\Http\JsonResponse
     */
    public function order(Request $request, Unit $unit)
    {
        $unit->updateOrder($request->only(['rate_id', 'order']));

        return $this->respondForJson('순서가 변경되었습니다.');
    }
}
