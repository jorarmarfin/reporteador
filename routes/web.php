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

Auth::routes();

Route::get('/', 'HomeController@index')->name('inicio');
Route::get('/home', 'HomeController@index')->name('inicio');
Route::post('cargar', 'HomeController@cargar')->name('cargar');
Route::get('reset', 'HomeController@reset')->name('reset');
Route::get('reporte', 'HomeController@reporte')->name('reporte');
Route::get('pdf', 'HomeController@pdf')->name('pdf');
Route::get('email', 'HomeController@email')->name('email');
Route::post('send', 'HomeController@send')->name('send');
Route::get('plantilla', 'HomeController@plantilla')->name('plantilla');


Auth::routes();

Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');