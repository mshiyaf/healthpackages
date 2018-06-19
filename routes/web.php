<?php


//Route::get('/','DatatablesController@index')->name('dataProcessing');
Route::get('/', 'DatatablesController@index');
Route::get('/datatable', 'DatatablesController@getdata');
Route::get('/create_package','PackagesController@create');
Route::post('select-ajax', 'PackagesController@selectAjax');
Route::post('/packages','PackagesController@store');

Route::get('/edit/{id}','PackagesController@edit');

Route::post('/update','PackagesController@update');

Route::get('/delete/{id}','PackagesController@delete');
