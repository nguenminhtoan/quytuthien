<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'HomeController@index');
Route::get('/index', 'HomeController@index');
Route::get('/quyen-gop/{id}', 'QuyengopController@index');
Route::post('/quyen-gop/{id}', 'QuyengopController@create');
Route::get('/tu-thien/{id}', 'QuyengopController@index');
Route::get('/gay-quy', 'GayquyController@index');
