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

Route::get('youtube', function () {
    return view('youtube');
});

Route::get('/', 'InternetRadioStationsViewerController@index');

Route::get('spotify', function () {
    return view('spotify');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('internetradiostationseditor','InternetRadioStationsController');