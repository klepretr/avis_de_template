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

Route::get('/', function () {
    return view('welcome');
});

/**
 * Trafic Routes
 */
Route::prefix('trafic')->group(function ()
{
	Route::get('/', 'TraficController@index');
	Route::get('add', 'TraficController@addAlert');
	Route::post('add', 'TraficController@postAlert');
	Route::get('test', 'TraficController@addAlert');
});

Route::get('/home', 'HomeController@index')->name('home');
