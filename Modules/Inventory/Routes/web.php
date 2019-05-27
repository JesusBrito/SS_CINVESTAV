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
    Route::get('/', function() {
        session(['sistema' => 'inventario']);
        return view('inventory::index');
    })->name('inventory.index');

    Route::resource('toxicities','ToxicitiesController');
    Route::resource('typeReactives','TypeReactivesController');
    Route::resource('locations','LocationsController');
    Route::resource('temperatures','TemperaturesController');
    Route::resource('brands','BrandsController');
    Route::resource('unities','UnitiesController');
    Route::resource('categoryConsumables','CategoryConsumablesController');
    Route::resource('consumables','ConsumablesController');
    Route::resource('wastes','WastesController');
    Route::resource('wasteslog','WastesLogController');




    //Rutas AJAX
    Route::put('toxicity/change-status', 'ToxicitiesController@changeStatus');
    Route::put('typeReactive/change-status', 'TypeReactivesController@changeStatus');
    Route::put('location/change-status', 'LocationsController@changeStatus');
    Route::put('temperature/change-status', 'TemperaturesController@changeStatus');
    Route::put('brand/change-status', 'BrandsController@changeStatus');
    Route::put('unity/change-status', 'UnitiesController@changeStatus');
    Route::put('categoryConsumable/change-status', 'CategoryConsumablesController@changeStatus');
    Route::put('consumable/change-status', 'ConsumablesController@changeStatus');
    Route::put('waste/change-status', 'WastesController@changeStatus');
});
