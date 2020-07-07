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

Route::get('/', function () {
    return redirect()->route('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/show_{id}', 'HomeController@show')->name('show');

// update sondage
Route::put('sondages/updated', 'SondageController@updated')->name('sondages.updated');

Route::prefix('dashboard')->name('dashboard.')->middleware(['auth'])->group(function () {

    Route::get('/', 'Dashboard\WelcomeController@index')->name('welcome');

    // sondage routes
    Route::resource('sondages', 'SondageController')->except(['show']);

    // user routes
    Route::resource('users', 'Dashboard\UserController')->except(['show']);

});
