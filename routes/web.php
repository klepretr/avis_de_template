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

Route::get('/outings','EventsController@index')->name('index_outings');

Route::get('/events', function () {
    return view('events');
});

Route::get('/outing/create','EventsController@show_create_outing')->name('show_create_outing');
Route::post('/outing/create','EventsController@create_outing')->name('create_outing');


Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');

Route::get('/trafic', function () {
    return view('trafic.timeline');
});

Route::get('/trafic/map', function () {
    return view('trafic.map');
});

Route::get('/event','EventsController@index')->name('index_event');


Route::get('/event/create','EventsController@show_create_event')->name('show_create_event');
Route::post('/event/create','EventsController@create_event')->name('create_event');