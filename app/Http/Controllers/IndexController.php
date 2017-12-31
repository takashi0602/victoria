<?php

namespace App\Http\Controllers;

class IndexController extends Controller
{
    public function search() {
//        $tweets = DB::table('tweets')->get();
        return view('index', [
            'tweets' => 'aa'
        ]);
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
