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



Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/', 'BackController@index');
Route::resource('pegawai','pegawaiController');
Route::resource('jabatan','jabatanController');
Route::resource('golongan','golonganController');
Route::resource('kategori','kategoriController');
Route::resource('tunjangan','tunjanganController');
Route::resource('lembur','lemburController');