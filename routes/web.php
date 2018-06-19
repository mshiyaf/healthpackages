<?php


Route::get('/', 'PackagesController@index');
Route::post('select-ajax', 'PackagesController@selectAjax');

Route::post('/packages','PackagesController@store');

Route::resource('edit','PackagesController');

// Route::get('/delete/{id}','PackagesController@delete');
