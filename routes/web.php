<?php


Route::get('/', 'PackagesController@index');
Route::post('/packages','PackagesController@store');
