<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function setTweets() {
    }

    public function getTweets() {
        $tweets = DB::table('tweets')->get();
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
