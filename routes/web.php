<?php

Route::get('/', 'HomeController@index');
Auth::routes();

Route::group(['prefix' => 'db'], function($route){
    $route->get('insert', 'DBController@insert');
    $route->get('delete', 'DBController@delete');
    $route->get('update', 'DBController@update');
    $route->get('select', 'DBController@select');
});