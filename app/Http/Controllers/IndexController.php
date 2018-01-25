<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function setTweets() {
        $tweets = DB::select('SELECT * FROM tweets');
        $tweets = json_encode($tweets);
        return $tweets;
    }

    public function getTweets() {
        return;
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
