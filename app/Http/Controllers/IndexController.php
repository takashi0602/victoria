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

        $connection = new TwitterOAuth($CONSUMER_KEY, $CONSUMER_SECRET, $ACCESS_TOKEN, $ACCESS_TOKEN_SECRET);

        $response = $connection->get('search/tweets', [
            'q' => '#google -RT',
            'count' => '30'
        ]);

        for ($i = 0; $i < 30; $i++) {
//            $status = $response->data->statuses[$i];
            DB::table('tweets')->insert([
//                'tweet' => $status->text,
//                'created_at' => $status->created_at
                'tweet' => 'hoge',
                'created_at' => date("Y/m/d H:i:s", strtotime('+' . $i . ' day'))
            ]);
        }

        return json_encode($response);
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
