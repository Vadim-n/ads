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

Route::get('/', 'AdsController@index');
Route::get('/ads', 'AdsController@allAds');
Route::get('/users', 'CommentsController@allUsers');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/update/{id}', 'HomeController@update')->name('home');

Route::get('/ad/create', 'AdsController@create');
Route::post('/ad/store', 'AdsController@store')->name('ad.store');
Route::get('/ad/{ad}', 'AdsController@show');
Route::get('/ad/{ad}/edit', 'AdsController@edit');
Route::post('/ad/{ad}/update', 'AdsController@update');
Route::get('/ad/{ad}/delete', 'AdsController@delete');

Route::get('/user/{user}', 'CommentsController@show');
Route::post('/user/{user}/comment', 'CommentsController@create');