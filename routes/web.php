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
    return view('home');
});
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/login', function () {
    return view('login');
})->middleware('auth:pegawai');
Route::get('/login', 'LoginController@index')->name('login');

Route::post('/kirimdata','LoginController@send');
Route::post('/logut','LoginController@logut');