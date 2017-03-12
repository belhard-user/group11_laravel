<?php

Route::get('/', 'HomeController@index');

Route::group(['prefix' => 'articles'], function($route){
    $route->name('article.index')->get('/', 'ArticleController@index');
    $route->name('article.show')->get('/{article}', 'ArticleController@view');
});

Auth::routes();