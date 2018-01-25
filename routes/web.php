<?php

$router->get('/', function() {
    return view('index');
});

$router->get('/api/set/tweets', 'IndexController@setTweets');

$router->get('/api/get/tweets', 'IndexController@getTweets');