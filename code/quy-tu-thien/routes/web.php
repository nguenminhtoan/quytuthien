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

Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function () {
    Route::get('/login', 'AdminLoginController@index');
    Route::post('/login', 'AdminLoginController@auth');
    Route::get('/tuthien', 'AdminTuthienController@all');
    Route::get('/tuthien/{status}', 'AdminTuthienController@index');
    Route::get('/quengop', 'AdminQuyengopController@all');
    Route::get('/quengop/{status}', 'AdminQuyengopController@index');
    
});
Route::group(['namespace' => 'Api', 'prefix' => 'api'], function () {
    Route::get("/accoutcheck", "ApiInfobankController@index");
    Route::get("/listbank", "ApiInfobankController@bank");
});

Route::get('/', 'HomeController@demo');

Route::post('/', 'HomeController@annotateImage');


Route::get('/index', 'HomeController@index');
Route::get('/quyen-gop/complete', 'QuyengopController@complete');
Route::get('/quyen-gop/{id}', 'QuyengopController@index');
Route::post('/quyen-gop/{id}', 'QuyengopController@create');
Route::get('/gay-quy', 'TuthienController@create');
Route::post('/gay-quy', 'TuthienController@save');
Route::get('/tu-thien', 'TuthienController@index');
Route::get('/tu-thien/{id}', 'TuthienController@show');
Route::get('/tu-thien/tim-kiem/{id}', 'TuthienController@search');
Route::get('/hoat-dong/{id}', 'HoatdongController@index');
Route::get('/hoat-dong/chi-tiet/{id}', 'HoatdongController@show');
Route::get('/sao-ke/{id}', 'SaokeController@index');
Route::get('/chinh-sach', 'HomeController@about');
Route::get('/gop-y', 'GopyController@index');
Route::post('/gop-y', 'GopyController@save');
