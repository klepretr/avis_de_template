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

Route::get('/outlings','EventsController@index');
Route::get('/outling/create','EventsController@show_create_outling');
Route::post('/outling/create','EventsControlller@create_outling')->name('create_outling');

Route::get('/outlings/connect',function(){
	return view('connect_outlings');
});
Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');
