<?php

namespace App\Http\Controllers;

class IndexController extends Controller
{
    public function search() {
        return view('index');
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    //
}
