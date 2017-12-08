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

Route::get('/outing/create','EventsController@show_create_outing')->name('show_create_outing');
Route::post('/outing/create','EventsController@create_outing')->name('create_outing');


Route::prefix('trafic')->group(function (){
	Route::get('/', 'TraficController@index')->name('index_trafic');
	Route::get('/overview', 'TraficController@overview')->name('overview');
	Route::get('/mapj', 'TraficController@mapj')->name('mapj');
	Route::get('/addAlert', 'TraficController@addAlert')->name('addAlert');
	Route::post('/addAlert', 'TraficController@postAlert')->name('postAlert');
});

Route::get('/home', 'HomeController@index')->name('home');

/**Route::get('/trafic', function () {
    return view('trafic.timeline');
})->name('trafic');**/

Route::get('/trafic/map', function () {
    return view('trafic.map');
})->name('trafic.map');

Route::get('/event','EventsController@index_event')->name('index_event');


Route::get('/event/create','EventsController@show_create_event')->name('show_create_event');
Route::post('/event/create','EventsController@create_event')->name('create_event');

Route::get('/event/search', 'SearchController@search_event')->name('search_event');
Route::post('/event/search','SearchController@find_event')->name('find_event');

Route::get('/my_event/{id}','SearchController@myevent');