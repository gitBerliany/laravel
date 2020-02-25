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



Route::get('/', 'MoviesController@index');
Route::get('/movies', 'MoviesController@index');
Route::get('/create', 'MoviesController@create');
Route::get('/{movie}', 'MoviesController@show');
Route::post('/', 'MoviesController@store');
Route::delete('/{movie}', 'MoviesController@destroy');
Route::put('/{movie}', 'MoviesController@update');
Route::get('/{movie}/edit', 'MoviesController@edit');
Route::put('/{movie}/img', 'MoviesController@imgupdate');