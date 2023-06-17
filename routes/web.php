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
    return view('index');
});

//Route untuk Data konser
Route::get('/konser', 'konserController@konsertampil');
Route::post('/konser/tambah','konserController@konsertambah');
Route::get('/konser/hapus/{id_konser}','konserController@konserhapus');
Route::put('/konser/edit/{id_konser}', 'konserController@konseredit');

//Route untuk Data konser
Route::get('/home', function(){return view('view_home');});

//Route untuk Data masyarakat
Route::get('/masyarakat', 'masyarakatController@masyarakattampil');
Route::post('/masyarakat/tambah', 'masyarakatController@masyarakattambah');
Route::get('/masyarakat/hapus/{id_masyarakat}', 'masyarakatController@masyarakathapus');
Route::put('/masyarakat/edit/{id_masyarakat}', 'masyarakatController@masyarakatedit');

//Route untuk Data Petugas
Route::get('/petugas', 'PetugasController@petugastampil');
Route::post('/petugas/tambah', 'PetugasController@petugastambah');
Route::get('/petugas/hapus/{id_petugas}', 'PetugasController@petugashapus');
Route::put('/petugas/edit/{id_petugas}', 'PetugasController@petugasedit');

//Route untuk Data Pemesanan
Route::get('/pemesanan', 'pemesananController@pemesanantampil');
Route::post('/pemesanan/tambah','pemesananController@pemesanantambah');
Route::get('/pemesanan/hapus/{id_pemesanan}','pemesananController@pemesananhapus');
Route::put('/pemesanan/edit/{id_pemesanan}', 'pemesananController@pemesananedit');
