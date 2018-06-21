<?php


Route::post('/data/users', 'DatatablesController@getData')->name('dataProcessing');
Route::get('/create_package','PackagesController@create');
Route::post('/select-ajax', 'PackagesController@selectAjax');
Route::post('/packages','PackagesController@store');
Route::get('/edit/{id}','PackagesController@edit');
Route::post('/update','PackagesController@update');
Route::get('/delete/{id}','PackagesController@delete');
Route::get('/','PackagesController@index');
