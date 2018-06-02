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


Route::get('/', 'HomeController@index');
Route::get('perencanaan', 'HomeController@getPerencanaan');
Route::get('perencanaan/uk/{unit}', 'HomeController@getPerencanaanUk');
Route::get('thn/{tahun}', 'HomeController@changeTahun');
Route::get('pengukuran', 'HomeController@getPengukuran');
Route::get('pelaporan', 'HomeController@getPelaporan');
Route::get('evaluasi', 'HomeController@getEvaluasi');
Route::group([
    'prefix' => config('backpack.base.route_prefix'),
    'middleware' => ['web', 'admin'],
  //  'namespace' => '',
], function () {
    CRUD::resource('unitkerja-item', 'UnitKerjaController');
});

Route::get('{page}/{subs?}', ['uses' => 'PageController@index'])
    ->where(['page' => '^((?!admin).)*$', 'subs' => '.*']);