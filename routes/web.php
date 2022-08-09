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
Route::get('/', 'HomeController@index')->name('dashboard');

Route::get('/pegawai', 'PegawaiController@index')->name('pegawai');
Route::get('/pegawai/create', 'PegawaiController@create')->name('pegawai.create');
Route::post('/pegawai/create', 'PegawaiController@store')->name('pegawai.store');
Route::get('/pegawai/edit/{id}', 'PegawaiController@edit')->name('pegawai.edit');
Route::post('/pegawai/edit/{id}', 'PegawaiController@update')->name('pegawai.update');
Route::get('/pegawai/{id}', 'PegawaiController@show')->name('pegawai.show');
Route::delete('/pegawai/delete/{id}', 'PegawaiController@destroy')->name('pegawai.delete');

Route::get('/poli', 'PoliController@index')->name('poli');
Route::get('/poli/create', 'PoliController@create')->name('poli.create');
Route::post('/poli/create', 'PoliController@store')->name('poli.store');
Route::get('/poli/edit/{id}', 'PoliController@edit')->name('poli.edit');
Route::post('/poli/edit/{id}', 'PoliController@update')->name('poli.update');
Route::delete('/poli/delete/{id}', 'PoliController@destroy')->name('poli.delete');

Route::get('/jadwal', 'JadwalController@index')->name('jadwal');
Route::get('/jadwal/cetak', 'JadwalController@cetak_pdf')->name('jadwal.cetak');
Route::get('/jadwal/create', 'JadwalController@create')->name('jadwal.create');
Route::post('/jadwal/create', 'JadwalController@store')->name('jadwal.store');
Route::get('/jadwal/edit/{id}', 'JadwalController@edit')->name('jadwal.edit');
Route::post('/jadwal/edit/{id}', 'JadwalController@update')->name('jadwal.update');
Route::delete('/jadwal/delete/{id}', 'JadwalController@destroy')->name('jadwal.delete');