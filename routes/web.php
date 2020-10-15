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
//admin
    //pengaturan
    Route::get('/admin/pengaturan','PengaturanController@index_pengaturan');
        //form_nilai_mhs
        Route::get('/admin/pengaturan/update_form_nilai_mhs/aktif','PengaturanController@update_nilai_mhs_aktif')->name('update_nilai_mhs.aktif');
        Route::get('/admin/pengaturan/update_form_nilai_mhs/nonaktif','PengaturanController@update_nilai_mhs_nonaktif')->name('update_nilai_mhs.nonaktif');
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
        Route::get('/dosen/paket_soal/soal/salin/{id}','SoalController@salin_soal')->name('salin.soal');
        //input soal essay
        Route::post('/dosen/paket_soal/soal/simpan_essay','SoalController@simpan_soal_essay')->name('simpan.soal_essay');
        Route::get('/dosen/paket_soal/soal/hapus_essay/{id}','SoalController@hapus_soal_essay')->name('hapus.soal_essay');
        Route::get('/dosen/paket_soal/soal/get_soal_essay','SoalController@get_soal_essay')->name('get.soal_essay');
        Route::post('/dosen/paket_soal/soal/ubah_essay','SoalController@ubah_soal_essay')->name('ubah.soal_essay');
        Route::get('/dosen/paket_soal/soal/salin_essay/{id}','SoalController@salin_soal_essay')->name('salin.soal_essay');
        //role soal
        Route::get('/dosen/paket_soal/soal/role_soal/simpan/{id}','SoalController@role_soal')->name('simpan.role_soal');
        Route::get('/dosen/paket_soal/soal/role_soal/hapus/{id}','SoalController@hapus_role_soal')->name('hapus.role_soal');
    //laporan
    Route::get('/dosen/laporan','LaporanController@index');
    Route::get('/dosen/laporan/list-paket/{id}','LaporanController@get_data_paket')->name('show.list-paket');
    Route::get('/dosen/laporan/list-mhs/{id}','LaporanController@get_data_mhs')->name('show.list-mhs');
    Route::get('/dosen/laporan/list-mhs/detail-mhs/{id_mhs}/{id_paket}','LaporanController@get_detail_mhs')->name('show.detail-mhs');
    Route::get('/dosen/laporan/listh-mhs/detail-mhs/get_data_jawaban_essay','LaporanController@get_data_jawaban_essay')->name('get.data_jawab_essay');
       
        
//mhs
    //ujian
    Route::get('/mhs/ujian','MhsController@index_ujian');
    Route::get('/mhs/ujian/show_ujian/{id}','MhsController@tampil_ujian')->name('show.ujian');
    Route::post('/mhs/ujian/show_ujian/cek_jawaban','MhsController@cek_jawaban')->name('cek.jawaban');         
