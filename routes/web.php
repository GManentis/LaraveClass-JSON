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

Route::get('/','IndexController@index');
Route::get('/signup','SignUpController@getForm');
Route::post('/signup','SignUpController@signUpUser');
Route::get('/logout','SignUpController@logout');
Route::get('/login','SignUpController@loginForm');
Route::post('/login','SignUpController@login');
Route::get('/insert','EntriesController@form');
Route::post('/insertValue','EntriesController@fetch');
Route::get('/manage/{id}','EntriesController@viewEntries');







