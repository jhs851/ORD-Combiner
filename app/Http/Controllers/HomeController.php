<?php

namespace App\Http\Controllers;

use App\Models\{Characteristic, Column, Unit};

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('verified');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $unitsCount = Unit::cache(function($unit) {
            return $unit->count();
        });

        $characteristics = Characteristic::cache(function($characteristic) {
            return $characteristic->orderBy('id', 'asc')->get();
        });

        return view('combiner', compact('columns', 'unitsCount', 'characteristics'));
    }
}
