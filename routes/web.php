<?php

Route::get('/', 'HomeController@index');
Auth::routes();

Route::get('validate-data', 'ValidateController@index');
Route::get('validate-data-test', 'ValidateController@test');

Route::group(['prefix' => 'db'], function($route){
    $route->get('insert', 'DBController@insert');
    $route->get('delete', 'DBController@delete');
    $route->get('update', 'DBController@update');
    $route->get('select', 'DBController@select');
    $route->get('create', 'DBController@create');
});