<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Auth::routes();

//Users
Route::get('/', 'UserController@index')->name('home');
Route::post('soal/search={request}', 'UserController@show');
Route::post('soal/search=', 'UserController@show');

//Admin Dashboard
Route::get('myadmin', 'AdminController@index')->name('admin');

//Admin Tabel Data Mahasiswa
Route::get('myadmin/mahasiswa', 'MahasiswaController@index')->name('ShowAllMahasiswa');
Route::post('myadmin/mahasiswa', 'MahasiswaController@create')->name('CreateMahasiswa');
Route::delete('myadmin/mahasiswa/delete', 'MahasiswaController@delete')->name('DeleteMahasiswa');
Route::patch('myadmin/mahasiswa/update', 'MahasiswaController@update')->name('UpdateMahasiswa');
Route::post('myadmin/mahasiswa/search={request}', 'MahasiswaController@search')->name('SearchMahasiswa');
Route::post('myadmin/mahasiswa/search=', 'MahasiswaController@search')->name('SearchMahasiswa');

//Admin Tabel Data Soal
Route::get('myadmin/soal', 'BankSoalController@index')->name('ShowAllSoal');
Route::post('myadmin/soal', 'BankSoalController@create')->name('CreateSoal');
Route::delete('myadmin/soal/delete', 'BankSoalController@delete')->name('DeleteSoal');
Route::patch('myadmin/soal/update', 'BankSoalController@update')->name('UpdateSoal');
Route::post('myadmin/soal/search={request}', 'BankSoalController@search')->name('SearchSoal');
Route::post('myadmin/soal/search=', 'BankSoalController@search')->name('SearchSoal');

// Admin Report
Route::get('myadmin/report', 'ReportController@index')->name('ShowReport');
Route::get('myadmin/report/download', 'ReportController@download')->name('DownloadReport');
Route::get('download/{matakuliah}/{mahasiswa}', 'ReportController@add')->name('AddReport');
