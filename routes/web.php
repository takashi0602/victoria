<?php

$router->get('/', function() {
    return view('index');
});

$router->get('/api/search', 'IndexController@search');