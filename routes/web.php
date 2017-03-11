<?php

Route::get('/', 'HomeController@index');
Auth::routes();

Route::group(['prefix' => 'db'], function($route){
    $route->get('insert', 'DBController@insert');
});