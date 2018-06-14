<?php


Route::get('/', 'PackagesController@index');
Route::post('select-ajax', 'PackagesController@selectAjax');

Route::post('/packages','PackagesController@store');
