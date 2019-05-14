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

Route::prefix('documents')->group(function () {
    Route::resource('groups', 'GroupController');
    Route::resource('usuarios', 'UsersControllerDocuments');

    // RUTAS AJAX
    Route::post('/guardar-detalle-nivel', 'UsersControllerDocuments@saveDetailLevel')->name('detalle.guardar');
    Route::delete('/eliminar-detalle-nivel/{id}', 'UsersControllerDocuments@deleteDetailLevel')->name('detalle.eliminar');
});
