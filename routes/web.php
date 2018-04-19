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
Route::get('/', 'AuthController@index')->name('home');
Route::get('/login', 'AuthController@login')->name('login');
Route::get('/logout', 'AuthController@logout')->name('logout');
Route::post('/login', 'AuthController@checkLogin')->name('checkLogin');
Route::get('/register', 'AuthController@register')->name('register');
Route::post('/register', 'AuthController@createUser')->name('createUser');
Route::get('/dashboard', 'ImageScannerController@dashboard')->middleware('auth')->name('dashboard');
Route::get('/image', 'ImageScannerController@index')->middleware('auth')->name('index');
Route::post('/text', 'ImageScannerController@scanText')->middleware('auth')->name('scanText');
Route::get('history','ImageScannerController@history')->middleware('auth')->name('history');
Route::get('history/{history_id}','ImageScannerController@getHistory')->middleware('auth')->name('getHistory');
Route::get('download/{history_id}', 'ImageScannerController@download')->middleware('auth')->name('download');
Route::get('edit-text/{history_id}', 'ImageScannerController@editText')->middleware('auth')->name('editText');

Route::post('save-text/{history_id}', 'ImageScannerController@saveText')->middleware('auth')->name('saveText');

