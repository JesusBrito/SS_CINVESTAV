<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix('inventory')->group(function() {
    Route::resource('/', 'InventoryController');
    Route::resource('toxicities','ToxicitiesController');
    Route::resource('typeReactives','TypeReactivesController');
    Route::resource('locations','LocationsController');
    Route::resource('temperatures','TemperaturesController');
    Route::resource('brands','BrandsController');
    Route::resource('unities','UnitiesController');
    
    //Rutas AJAX
    Route::put('toxicity/change-status', 'ToxicitiesController@changeStatus');
    Route::put('typeReactive/change-status', 'TypeReactivesController@changeStatus');
    Route::put('location/change-status', 'LocationsController@changeStatus');
    Route::put('temperature/change-status', 'TemperaturesController@changeStatus');
});
