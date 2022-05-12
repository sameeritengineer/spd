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

Auth::routes();

Route::group(['middleware' => ['auth']],function(){
Route::get('/summary', 'MainworkController@summary')->name('summary');
});

Route::get('/', 'MainworkController@index')->name('myhome');
Route::get('/about-us', 'MainworkController@aboutus')->name('aboutus');
Route::get('/services', 'MainworkController@services')->name('services');
Route::get('/contact-us', 'MainworkController@contact')->name('contact');
Route::post('/contact_form', 'MainworkController@contact_form')->name('contact_form');
Route::get('/check-postcode', 'MainworkController@getpostcode')->name('getpostcode');
Route::post('/check-postcode', 'MainworkController@checkpostcode')->name('checkpostcode');
Route::get('/get-cartypes', 'MainworkController@cartypes')->name('cartypes');
Route::post('/get-license-plate', 'MainworkController@getlicense')->name('getlicense');
Route::post('/get-deal-services', 'MainworkController@dealservices')->name('dealservices');
Route::post('/workingday_time', 'MainworkController@workingday_time')->name('workingday_time');
Route::post('/main_form', 'MainworkController@main_form')->name('main_form');
Route::get('/home', 'HomeController@index')->name('home');
