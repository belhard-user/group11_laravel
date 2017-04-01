<?php

Route::get('/', 'HomeController@index');

Route::group(['prefix' => 'articles'], function($route){
    $route->name('article.index')->get('/', 'ArticleController@index');
    $route->name('article.create')->get('create', 'ArticleController@create')->middleware('auth');
    $route->name('article.show')->get('/{article}', 'ArticleController@view');
    $route->name('article.edit')->get('/{article}/edit', 'ArticleController@edit')->middleware('auth');
    $route->name('article.update')->put('/{article}/update', 'ArticleController@update')->middleware('auth');
    $route->name('article.store')->post('create', 'ArticleController@store');
});

Route::group(['prefix' => 'tag'], function($route){
    $route->get('{tag}', 'TagController@articlesByTagsSlug')->name('bytagname');
});

Auth::routes();