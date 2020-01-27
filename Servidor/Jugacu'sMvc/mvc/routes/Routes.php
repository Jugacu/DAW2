<?php

require_once 'Route.php';

Route::get('/', 'HomeController@index');

Route::get('/([0-9]*)', 'HomeController@test');
