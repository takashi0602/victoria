<?php

$router->get('/', 'IndexController@search');

$router->get('/api/search', 'IndexController@search');