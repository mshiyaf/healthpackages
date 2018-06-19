<?php


Route::get('/', 'PackagesController@index');
Route::post('select-ajax', 'PackagesController@selectAjax');

Route::post('/packages','PackagesController@store');

Route::get('/edit/{id}','PackagesController@edit');

Route::post('/update','PackagesController@update');

Route::get('/delete/{id}','PackagesController@delete');
