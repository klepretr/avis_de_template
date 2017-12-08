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
})->name('home_landing');

Route::get('/events',function(){
	return view('events');
});

Route::get('/outings','EventsController@index')->name('index_outings');

Route::get('/events', function () {
    return view('events');
});

Route::get('/outing/create','EventsController@show_create_outing')->name('show_create_outing');
Route::post('/outing/create','EventsControlller@create_outing')->name('create_outing');

Route::get('/outings/connect',function(){
	return view('connect_outings');
});

Route::prefix('trafic')->group(function (){
	Route::get('/', 'TraficController@index');
	Route::get('/overview', 'TraficController@overview')->name('overview');
	Route::get('/mapj', 'TraficController@mapj')->name('mapj');
});

Route::get('/home', 'HomeController@index')->name('home');

/**Route::get('/trafic', function () {
    return view('trafic.timeline');
})->name('trafic');**/

Route::get('/trafic/map', function () {
    return view('trafic.map');
})->name('trafic.map');
