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
    Route::get('/', function() {
        session(['sistema' => 'documentos']);
        return redirect()->route('users.show', auth()->user());
    })->name('documents.index');

    Route::resource('groups', 'GroupController');
    Route::prefix('groups')->group(function () {
        Route::post('{group}/students', 'GroupController@addStudent')->name('groups.add-student');
        Route::delete('{group}/students/{student}', 'GroupController@removeStudent')->name('groups.remove-student');
        Route::get('{group}/available-users', 'GroupController@availableUsers')->name('groups.available-users');
    });
    Route::resource('publications','PublicationController');
    Route::resource('patents','PatentController');
    Route::resource('users','UsersControllerDocuments');
    Route::resource('conferencias','ConferenciasController');
});
