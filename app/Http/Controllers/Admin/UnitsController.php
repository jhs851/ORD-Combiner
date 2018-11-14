<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\UnitsRequest;
use App\Models\{Rate, Unit};
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
        $unit = Unit::create($request->merge($this->getAppendData($request))->all());

        return $this->respondForJson('생성되었습니다.', compact('unit'));
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

    /**
     * 만약 흔함 등급에 생성되면 warn 하고 lowest true로
     * 만약 기타 등급에 생성되면 etc true로
     *
     * @param UnitsRequest $request
     * @return array
     */
    protected function getAppendData(UnitsRequest $request) : array
    {
        return [
            'lowest' => $this->isLowest($request),
            'warn'   => $this->isLowest($request),
            'etc'    => $this->isEtc($request),
        ];
    }

    /**
     * @param UnitsRequest $request
     * @return bool
     */
    protected function isLowest(UnitsRequest $request) : bool
    {
        return $request->input('rate_id') == Rate::lowest()->value('id');
    }

    /**
     * @param UnitsRequest $request
     * @return bool
     */
    protected function isEtc(UnitsRequest $request) : bool
    {
        return $request->input('rate_id') == Rate::etc()->value('id');
    }
}
