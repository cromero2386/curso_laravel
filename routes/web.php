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
    return view('welcome');
});

Route::get('bienvenido', function () {
    return view('presentacion');
});

/*Route::get('area', function () {
    return view('areas.index');
});*/
Route::resource('area', 'AreaController');
Route::get('get_areas', 'AreaController@get_areas');
Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();


