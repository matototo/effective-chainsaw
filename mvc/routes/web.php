<?php
use App\Controllers;
use App\Routes\Route;

// Client controller
Route::get('/client', 'ClientController@index');
Route::get('/client/create', 'ClientController@create');
Route::post('/client/create', 'ClientController@store');
Route::get('/client/show', 'ClientController@show');
Route::get('/client/edit', 'ClientController@edit');
Route::post('/client/edit', 'ClientController@update');
Route::post('/client/delete', 'ClientController@delete');

// Manufacturer controller
Route::get('/manufacturer', 'ManufacturerController@index');
Route::get('/manufacturer/show', 'ManufacturerController@show');

// Automobile controller
Route::get('/automobile', 'AutomobileController@index');
Route::get('/automobile/show', 'AutomobileController@show');

// Automobile-bill controller
Route::get('/bill', 'AutomobileBillController@index');
Route::get('/bill/create', 'AutomobileBillController@create');
Route::post('/bill/create', 'AutomobileBillController@store');
Route::get('/bill/show', 'AutomobileBillController@show');
Route::post('/bill/delete', 'AutomobileBillController@specialdelete');


Route::dispatch();