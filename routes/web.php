<?php

Route::get('/', function () {
    return "<a href='/hello-trinity-neo'>say hello</a>";
});

Route::get('hello-{people}-{name}', function($people, $name){
    return 'hello ' . ucfirst($people) . ' from ' . ucfirst($name);
})->where([
    'people' => '\d',
    'name' => '[5-8]'
]);

Route::group(['prefix' => 'admin'], function($r){
    $r->get('user', function(){return 'users';});
    $r->get('dashboard', function(){return 'dashboard';});
    $r->get('money-history', function(){return 'money-history';});
});
