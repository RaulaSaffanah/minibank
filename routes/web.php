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

Route::get('/home', 'HomeController@home');

Route::get('/bayar', 'HomeController@pemb');
Route::get('/bayar/{id}', 'HomeController@pemb');

Route::get('/input', 'HomeController@in');
Route::get('/input/{id}', 'HomeController@in');

Route::get('/kredit/{id}', 'HomeController@indebt');
// Route::post('/indebtpro', 'HomeController@indebtpro');

Route::get('/login', 'HomeController@log');

Route::get('/register', 'HomeController@regis');

Route::get('/sum', 'HomeController@sum');
Route::get('/sum/{id}', 'HomeController@sum');

Route::get('/print', 'HomeController@daftar');

Route::get('/lobby', 'PembayaranController@lob');

Route::get('/add', 'HomeController@add');
Route::post('/addprocess', 'HomeController@addprocess');
 
Route::post('/inprocess', 'HomeController@inprocess');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
