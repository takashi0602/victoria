<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function search() {
        $tweets = DB::select('SELECT * FROM tweets');
        $tweets = json_encode($tweets);
        return $tweets;
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
