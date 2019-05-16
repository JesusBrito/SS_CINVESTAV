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

Auth::routes();
Route::redirect('/', 'login', 301);

Route::group(['middleware' => ['auth']], function () {
    Route::resource('usuarios', 'UserController');

    // RUTAS AJAX
    Route::group(['prefix' => 'usuarios'], function () {
        Route::post('detalle-nivel', 'UserController@guardarDetalle')->name('usuarios.guardarDetalle');
        Route::delete('detalle-nivel/{id}', 'UserController@eliminarDetalle')->name('detalle.eliminarDetalle');
    });
});
