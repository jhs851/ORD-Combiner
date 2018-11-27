<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\FormulasRequest;
use App\Models\{Formula, Rate, Unit};
use App\Rules\ExistWisp;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FormulasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.formulas.index', ['rates' => Rate::cache(function($rate) {
            return $rate->general()->get();
        })]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'target_id' => ['required', new ExistWisp($unit = Unit::find($request->get('target_id')))]
        ]);

        $formula = $unit
            ->formulas()
            ->create(['unit_id' => Unit::wisp()->value('id')])
            ->load('unit');

        return $this->respondForJson('생성되었습니다.', compact('formula'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param FormulasRequest $request
     * @param Formula         $formula
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(FormulasRequest $request, Formula $formula)
    {
        $formula->update($request->all());

        return $this->respondForJson('변경되었습니다.', ['formula' => $formula->load('unit')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Formula $formula
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(Formula $formula)
    {
        $formula->delete();

        return $this->respondForJson('삭제되었습니다.');
    }
}
