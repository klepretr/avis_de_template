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

Route::get('/outlings',function(){
	return view('outlings');

});
Route::get('/outlings/create',function(){
	return view('create_outling');
});
Route::get('/outlings/connect',function(){
	return view('connect_outlings');
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
