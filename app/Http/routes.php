<?php

Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

Route::model('timers', App\Timer::class);
Route::get('/', 'TimerController@index');
Route::get('timers/{timers}/destroy', 'TimerController@destroy');
Route::resource('timers', 'TimerController');