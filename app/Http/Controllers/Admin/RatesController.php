<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\RatesRequest;
use App\Models\Rate;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RatesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.rates.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param RatesRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(RatesRequest $request)
    {
        return $this->respondForJson('생성되었습니다.', ['item' => Rate::create($request->all())]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param RatesRequest $request
     * @param Rate         $rate
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(RatesRequest $request, Rate $rate)
    {
        $rate->update($request->all());

        return $this->respondForJson('변경되었습니다.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Rate $rate
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(Rate $rate)
    {
        $rate->delete();

        return $this->respondForJson('삭제되었습니다.');
    }

    /**
     * @param Request $request
     * @param Rate    $rate
     * @return \Illuminate\Http\JsonResponse
     */
    public function order(Request $request, Rate $rate)
    {
        $rate->updateOrder($request->only(['column_id', 'order']));

        return $this->respondForJson('순서가 변경되었습니다.');
    }
}
