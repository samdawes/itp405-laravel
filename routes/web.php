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
Route::get('/', 'InvoicesController@index');

Route::get('/genres', 'GenresController@index');

Route::get('/tracks', 'TracksController@index');

Route::get('/tracks/new', 'TracksController@new');

Route::get('/playlists', 'PlaylistController@index');

Route::get('/playlists/new', 'PlaylistController@create');

Route::get('/playlists/{id}', 'PlaylistController@index');

Route::get('/genres/{id}/edit', 'GenresController@edit');

Route::post('/playlists', 'PlaylistController@store');

Route::post('/tracks', 'TracksController@store');

Route::post('/genres', 'GenresController@store');
