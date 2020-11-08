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

Route::get('/', function () {
    return view('admin/dashboard/index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
    Route::get('admin/dashboard', 'DashboardController@index');

    //Nilai
    Route::get('admin/nilai', 'NilaiController@index');
    Route::post('admin/nilai/create', 'NilaiController@store');
    Route::post('admin/nilai/update', 'NilaiController@update');
    Route::get('admin/nilai/delete/{id}', 'NilaiController@destroy');

    //Kriteria
    Route::get('admin/kriteria', 'KriteriaController@index');
    Route::post('admin/kriteria/create', 'KriteriaController@store');
    Route::post('admin/kriteria/update', 'KriteriaController@update');
    Route::get('admin/kriteria/delete/{id}', 'KriteriaController@destroy');

    //Karyawan
    Route::get('admin/karyawan', 'KaryawanController@index');
    Route::post('admin/karyawan/create', 'KaryawanController@store');
    Route::post('admin/karyawan/update', 'KaryawanController@update');
    Route::get('admin/karyawan/delete/{id}', 'KaryawanController@destroy');

    //Analisa Kriteria
    Route::get('admin/analisa-kriteria', 'AnalisaKriteriaController@index');
    Route::post('admin/analisa-kriteria/check', 'AnalisaKriteriaController@check');
});