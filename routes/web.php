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

Route::get('/', function(){
    return redirect('login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
    Route::get('admin/dashboard', 'DashboardController@index');
    Route::get('admin', function() {
        return redirect('admin/dashboard');
    });

    Route::post('/admin/logout', function() {
        Session::flush();
        Auth::logout();
        return redirect('/login');
    });

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
    Route::get('admin/analisa-kriteria/hasil/{id}', 'AnalisaKriteriaController@result');

    //Analisa Alternatif
    Route::get('admin/analisa-alternatif', 'AnalisaAlternatifController@index');
    Route::post('admin/analisa-alternatif/check', 'AnalisaAlternatifController@check');
    Route::get('admin/analisa-alternatif/hasil/{id}', 'AnalisaAlternatifController@result');

    //Hasil Perhitungan
    Route::get('admin/hasil/{id}', 'AnalisaAlternatifController@final_result');
    Route::get('admin/hasil', 'HasilController@index');
    Route::post('admin/hasil-result', 'HasilController@hasil_result');

    //Laporan
    Route::get('admin/laporan-hasil-keputusan', 'LaporanController@laporan_hasil_keputusan');
    Route::get('admin/laporan-bobot-kriteria', 'LaporanController@laporan_bobot_kriteria');
    Route::post('admin/laporan/cetak', 'LaporanController@cetak');
});