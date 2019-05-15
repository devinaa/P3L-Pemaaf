<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('cabang','CabangController');
Route::resource('pegawai','PegawaiController');
Route::resource('supplier','SupplierController');
Route::resource('jasa','JasaController');
Route::resource('motor','MotorController');
Route::resource('sparepart','SparepartController');
Route::resource('transaksi_pengadaan','PengadaanController');
Route::resource('detail_pengadaan','PengadaanController');
Route::resource('detailSparepartMotor', 'DetailSparepartMotorController');

Route::resource('transaksi_jual','PenjualanController');
Route::resource('detail_motor','PenjualanController');
Route::resource('detail_service','PenjualanController');
Route::resource('detail_sparepart','PenjualanController');

Route::resource('transaksi_bayar','PembayaranController');
// Di hide aja kalau mau melakukan input Sparepart
Route::resource('sparepartKostumer', 'KostumerSortirController');
Route::resource('transaksi_jualRiwayat', 'KostumerRiwayatController');

Route::resource('transaksi_bayar', 'LaporanController');

Route::resource('histori','HistoriController');


Route::get('/cabang/cari/{cab_id}', 'CabangController@cari');