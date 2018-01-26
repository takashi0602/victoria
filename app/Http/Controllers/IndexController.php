<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Abraham\TwitterOAuth\TwitterOAuth;

class IndexController extends Controller
{
    public function setTweets() {
        $CONSUMER_KEY = env('CONSUMER_KEY');
        $CONSUMER_SECRET = env('CONSUMER_SECRET');
        $ACCESS_TOKEN = env('ACCESS_TOKEN');
        $ACCESS_TOKEN_SECRET = env('ACCESS_TOKEN_SECRET');

        $SEARCH_KEYWORD = env('SEARCH_KEYWORD');

        $connection = new TwitterOAuth($CONSUMER_KEY, $CONSUMER_SECRET, $ACCESS_TOKEN, $ACCESS_TOKEN_SECRET);

        $response = $connection->get('search/tweets', [
            'q' => "#$SEARCH_KEYWORD -RT",
            'count' => '30',
            'result_type' => 'recent'
        ]);

        for ($i = 0; $i < 29; $i++) {
            DB::table('tweets')->insert([
                'tweet' => $response->statuses[$i]->text,
                'created_at' => $response->statuses[$i]->created_at
            ]);
        }

        return;
    }

    public function getTweets() {
        $tweets = DB::table('tweets')->latest('created_at')->take(16)->get();
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
