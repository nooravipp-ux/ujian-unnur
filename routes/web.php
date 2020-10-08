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
    return view('welcome');
});

Auth::routes();
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');


Route::get('/home', 'HomeController@index')->name('home');


Route::get('/frame','FrameController@index')->middleware('auth');
Route::get('/dash','DashboardController@index')->middleware('auth');

//dosen
    //kategori_soal
    Route::get('/dosen/kategori_soal','KategoriSoalController@index');
    Route::post('/dosen/kategori_soal/simpan','KategoriSoalController@simpan_kategori')->name('simpan.kategori_soal');
    Route::get('/dosen/kategori_soal/get_kategori','KategoriSoalController@get_kategori')->name('get.kategori');
    Route::post('/dosen/kategori_soal/ubah','KategoriSoalController@ubah_kategori')->name('ubah.kategori_soal');
    Route::get('/dosen/kategori_soal/hapus/{id}','KategoriSoalController@hapus_kategori')->name('hapus.kategori_soal');
    //soal
    Route::get('/dosen/paket_soal','SoalController@index');
    Route::get('/dosen/soal/get_data_kategori','SoalController@get_data_kategori');
    Route::post('/dosen/paket_soal/simpan','SoalController@simpan_paket')->name('simpan.paket_soal');
    Route::get('/dosen/paket_soal/get_paket','SoalController@get_paket')->name('get.paket');
    Route::post('/dosen/paket_soal/ubah','SoalController@ubah_paket')->name('ubah.paket_soal');
    Route::get('/dosen/paket_soal/hapus/{id}','SoalController@hapus_paket')->name('hapus.paket_soal');
        //input soal
        Route::get('/dosen/paket_soal/input/{id}','SoalController@tampil_input_soal')->name('show.input_soal');
        Route::post('/dosen/paket_soal/soal/simpan','SoalController@simpan_soal')->name('simpan.soal');
        Route::get('/dosen/paket_soal/soal/hapus/{id}','SoalController@hapus_soal')->name('hapus.soal');
        Route::get('/dosen/paket_soal/soal/get_soal','SoalController@get_soal')->name('get.soal');
        Route::post('/dosen/paket_soal/soal/ubah','SoalController@ubah_soal')->name('ubah.soal');
        //role soal
        Route::get('/dosen/paket_soal/soal/role_soal/simpan/{id}','SoalController@role_soal')->name('simpan.role_soal');
        Route::get('/dosen/paket_soal/soal/role_soal/hapus/{id}','SoalController@hapus_role_soal')->name('hapus.role_soal');
//mhs
    //ujian
    Route::get('/mhs/ujian','MhsController@index_ujian');
    Route::get('/mhs/ujian/show_ujian/{id}','MhsController@tampil_ujian')->name('show.ujian');
    Route::post('/mhs/ujian/show_ujian/cek_jawaban','MhsController@cek_jawaban')->name('cek.jawaban');         
