<?php

Route::name('home-page')->get('/', 'HomeController@index');
Route::get('hello-{people?}-{name?}', ['uses' => 'HomeController@greet', 'as' => 'greet']);




Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function($r){
    $r->get('/', 'AdminController@dashboard');
});
