<?php

namespace App\Http\Controllers;

use App\Models\{Characteristic, Unit};

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
        }, '.' . version()->id);

        $characteristics = Characteristic::cache(function($characteristic) {
            return $characteristic->orderBy('id', 'asc')->get();
        });

        return view('combiner', compact('unitsCount', 'characteristics'));
    }

    public function version()
    {
        $cookie = cookie()->forever('version', request('version'));

        cookie()->queue($cookie);

        return ($return = request('return'))
            ? redirect(urldecode($return))->withCookie($cookie)
            : redirect(route('home'))->withCookie($cookie);
    }
}
