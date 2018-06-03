<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

/** Login */
Route::group(['as' => 'login'], function() {
    Route::post('/login', 'AuthenticationController@login');
    Route::get('/logout', 'AuthenticationController@logout');
});

Route::get('/', 'HomeController@index');
Route::get('/perencanaan', 'HomeController@getPerencanaan');
Route::post('/perencanaan/tambah', 'HomeController@getPerencanaanTambah');
Route::get('/perencanaan/edit/{id}', 'HomeController@editPerencanaan');
Route::post('/perencanaan/update/{id}', 'HomeController@updatePerencanaan');
Route::get('/perencanaan/uk/{unit}', 'HomeController@getPerencanaanUk');
Route::get('/perencanaan/download/{file}', 'HomeController@download');
Route::get('/perencanaan/rkt/{unit}', 'HomeController@getRkt');
Route::post('/perencanaan/rkt/tambah/{unit}', 'HomeController@postRkt');
Route::get('/perencanaan/rkt/edit/{id}', 'HomeController@editRkt');
Route::post('/perencanaan/rkt/update/{id}', 'HomeController@updateRkt');
Route::get('/perencanaan/iku/{unit}', 'HomeController@getIku');
Route::post('/perencanaan/iku/tambah/{unit}', 'HomeController@postIku');
Route::get('/perencanaan/iku/edit/{id}', 'HomeController@editIku');
Route::post('/perencanaan/iku/update/{id}', 'HomeController@updateIku');

Route::get('/thn/{tahun}', 'HomeController@changeTahun');

Route::get('/pengukuran/tambah', 'HomeController@getPengukuranTambah');
Route::get('/pengukuran', 'HomeController@getPengukuran');
Route::get('/pengukuran/uk/{unit}', 'HomeController@getPengukuran');

Route::get('/pelaporan', 'HomeController@getPelaporan');
Route::get('/evaluasi', 'HomeController@getEvaluasi');
Route::group([
    'prefix' => config('backpack.base.route_prefix'),
    'middleware' => ['web', 'admin'],
  //  'namespace' => '',
], function () {
    CRUD::resource('unitkerja-item', 'UnitKerjaController');
});

Route::get('{page}/{subs?}', ['uses' => 'PageController@index'])
    ->where(['page' => '^((?!admin).)*$', 'subs' => '.*']);
