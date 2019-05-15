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
use App\supplier;
// HOME SELAIN PEGAWAI
Route::get('/', function () {
    return view('home');
});
// HOME KHUSUS PEGAWAI
Route::get('/homepegawai', function(){
    if(Session::get('login')){
        return view('homepegawai');
    }else{
        return redirect()->back();
    }
})->name('homepegawai');
// CABANG
Route::get('/cabangInput', function(){
    return view('cabangInput', compact('cabangs'));
});
Route::get('/cabangEdit', function(){
    return view('cabangEdit');
});
Route::get('/cabangCari', function(){
    return view('cabangCari');
});
Route::post('/cabangInput','CabangController@store')->name('cabangInput');
Route::post('/cabangEdit/{cab_id}','CabangController@update');
Route::get('/cabangCari','CabangController@search')->name('cabangCari');
Route::get('/cabangTampil', 'CabangController@tampil');
Route::get('/cabangTampil/{cab_id}', 'CabangController@destroy');
Route::get('/cabangEdit/{cab_id}', 'CabangController@cari')->name('cabangEdit');

// PEGAWAI
Route::get('/pgwInput', function(){
    return view('pgwInput');
});

Route::get('/pgwEdit', function(){
    return view('pgwEdit');
});
Route::get('/pgwCari', function(){
    return view('pgwCari');
});
Route::get('/editPassword', function(){
    return view('editPassword');
});
Route::get('/pgwInput', 'PegawaiController@getCabangs');
Route::post('/pgwInput','PegawaiController@store')->name('pgwInput');
Route::get('/pgwTampil', 'PegawaiController@tampil');
Route::get('/pgwTampil/{pgw_id}', 'PegawaiController@destroy');
Route::post('/pgwEdit/{pgw_id}','PegawaiController@update');
Route::get('/pgwEdit/{pgw_id}', 'PegawaiController@cari')->name('pgwEdit');
Route::patch('/editPassword/{pgw_id}','PegawaiController@updatePassword');
Route::get('/pgwTampil/cetak_pdf', 'PegawaiController@cetak_pdf');
Route::get('pgwTampil/cetakNotakLunas','PegawaiController@cetak_pdf');

// SUPPLIER
Route::get('/supplierInput', function(){
    $suppliers = supplier::all();
    return view('supplierInput',compact('suppliers'));
});
Route::get('/supplierEdit', function(){
    return view('supplierEdit');
});
Route::get('/supplierCari', function(){
    return view('supplierCari');
});
Route::post('/supplierInput','SupplierController@store')->name('supplierInput');
Route::post('/supplierEdit/{su_id}','SupplierController@update');
Route::get('/supplierCari','SupplierController@search')->name('supplierCari');
Route::get('/supplierTampil', 'SupplierController@tampil');
Route::get('/supplierTampil/{su_id}', 'SupplierController@destroy');
Route::get('/supplierEdit/{su_id}', 'SupplierController@cari')->name('supplierEdit');
// JASA
Route::get('/jasaInput', function(){
    return view('jasaInput');
});
Route::get('/jasaEdit', function(){
    return view('jasaEdit');
});
Route::get('/jasaTampil', function(){
    return view('jasaTampil');
});
Route::get('/jasaCari', function(){
    return view('jasaCari');
});
Route::post('/jasaInput','JasaController@store')->name('jasaInput');
Route::post('/jasaEdit/{jasa_id}','JasaController@update');
Route::get('/jasaCari','JasaController@search')->name('jasaCari');
Route::get('/jasaTampil', 'JasaController@tampil');
Route::get('/jasaTampil/{jasa_id}', 'JasaController@destroy');
Route::get('/jasaEdit/{jasa_id}', 'JasaController@cari')->name('jasaEdit');
// MOTOR
Route::get('/motorInput', function(){
    return view('motorInput',compact('motors'));
});
Route::get('/motorEdit', function(){
    return view('motorEdit');
});
Route::get('/motorTampil', function(){
    return view('motorTampil');
});
Route::get('/motorCari', function(){
    return view('motorCari');
});
Route::post('/motorInput','MotorController@store')->name('motorInput');
Route::post('/motorEdit/{motor_id}','MotorController@update');
Route::get('/motorCari','MotorController@search')->name('motorCari');
Route::get('/motorTampil', 'MotorController@tampil');
Route::get('/motorTampil/{motor_id}', 'MotorController@destroy');
Route::get('/motorEdit/{motor_id}', 'MotorController@cari')->name('motorEdit');
// SPAREPART
// Route::get('/sparepartInput', function(){
//     return view('sparepartInput');
// });
// Route::get('/sparepartInput', function () {
//     $motors = motor::all();
//     return view('sparepartInput',compact('motors'));
// });
// Route::get('/sparepartInput', function () {
//     $suppliers = supplier::all();
//     return view('sparepartInput',compact('suppliers'));
// });
Route::get('/sparepartEdit', function(){
    return view('sparepartEdit');
});
Route::get('/sparepartCari', function(){
    return view('sparepartCari');
});
Route::get('/sparepartInput','SparepartController@getSupplierandMotor');
Route::post('/sparepartInput','SparepartController@store')->name('sparepartInput');
Route::get('/sparepartTampil', 'SparepartController@tampil');
Route::get('/sparepartTampil/{sp_id}', 'SparepartController@destroy');
Route::post('/sparepartEdit/{sp_id}','SparepartController@update');
Route::get('/sparepartEdit/{sp_id}', 'SparepartController@cari')->name('sparepartEdit');
Route::get('/detailSparepartMotor', 'DetailSparepartMotorController@tampil');
// Riwayat Sparepart yang kurang dari stok minimal
Route::get('/riwayatSparepart', 'SparepartController@tampilRiyawat');
Route::get('/riwayatSparepart/{sp_id}', 'SparepartController@cariRiyawat')->name('riwayatSparepart');


// PENGADAAN BARANG
// Route::get('/pengadaanInput', function(){
//     return view('pengadaanInput');
// });
Route::get('/pengadaanEdit', function(){
    return view('pengadaanEdit');
});
Route::get('/pengadaanCari', function(){
    return view('pengadaanCari');
});
Route::get('/pengadaanInput','PengadaanController@getSupportSparepart');
Route::post('/pengadaanInput','PengadaanController@store')->name('pengadaanInput');
Route::post('/pengadaanEdit/{ta_id}','PengadaanController@update');
Route::get('/pengadaanCari','PengadaanController@search')->name('pengadaanCari');
Route::get('/pengadaanTampil', 'PengadaanController@tampil');
// Route::get('/pengadaanTampil/{ta_id}', 'PengadaanController@destroy');
// Route::get('/pengadaanTampilDetailTransaksi/{dpgd_id}', 'PengadaanController@destroy2');
Route::get('/pengadaanEdit/{ta_id}', 'PengadaanController@cari')->name('pengadaanEdit');
Route::get('/pengadaanTampilDetailTransaksi/{ta_id}', 'PengadaanController@tampilDetail');

// Pengadaan Surat
Route::get('/suratPengadaanInput','LaporanController@getSuratPengadaaan');
Route::post('/suratPengadaanInput','LaporanController@inputSuratPengadaan')->name('suratPengadaanInput');
Route::get('/suratPengadaanTampil', 'LaporanController@tampil');
Route::get('/suratPengadaanEdit/{ta_id}', 'LaporanController@cari')->name('suratPengadaanEdit');
Route::patch('/suratPengadaanEdit/{ta_id}','LaporanController@updateSuratPengadaan');
// Pengadaan Surat Print
Route::get('/suratPengadaanInputPrint','LaporanController@getSuratPengadaaanPrint');
Route::post('/suratPengadaanInputPrint','LaporanController@inputSuratPengadaanPrint')->name('inputSuratPengadaanPrint');




// PENJUALAN
// --Motor--
Route::get('/penjualanEditMotor', function(){
    return view('penjualanEditMotor');
});
Route::get('/penjualanInputMotor/{tj_id}','PenjualanController@getPenjualanMotor');
Route::post('/penjualanInputMotor','PenjualanController@storeMotor')->name('penjualanInputMotor');
Route::post('/penjualanEditMotor/{dm_id}','PenjualanController@updateMotor');
Route::get('/penjualanTampilDetailMotor/{tj_id}', 'PenjualanController@tampilDetailMotor');

Route::get('/penjualanEditMotor/{dm_id}', 'PenjualanController@cariMotor')->name('penjualanEditMotor');
Route::patch('/penjualanEditMotor/{dm_id}','PenjualanController@updateMotor');
// --Service--
Route::get('/penjualanEditService', function(){
    return view('penjualanEditService');
});
Route::get('/penjualanInputSV','PenjualanController@indexService');
Route::get('/penjualanInputSV/{tj_id}','PenjualanController@getPenjualanSV');
Route::post('/penjualanInputSV/{tj_id}','PenjualanController@storeSV')->name('penjualanInputSV');
Route::post('/penjualanEditService/{ds_id}','PenjualanController@updateService');
Route::get('/penjualanTampilDetailService/{tj_id}', 'PenjualanController@tampilDetailService');
Route::get('/penjualanTampilDetailService/{ds_id}','PenjualanController@destroyService');
Route::get('/penjualanEditService/{ds_id}', 'PenjualanController@cari')->name('penjualanEditService');
// --Sparepart--
Route::get('/penjualanInputSP','PenjualanController@indexSparepart');
Route::get('/penjualanInputSP/{tj_id}','PenjualanController@getPenjualanSP');
Route::post('/penjualanInputSP/{tj_id}','PenjualanController@storeSP')->name('penjualanInputSP');
Route::post('/penjualanEditSparepart/{dsp_id}','PenjualanController@updateSparepart');
Route::get('/penjualanTampilDetailSparepart/{tj_id}', 'PenjualanController@tampilDetailSparepart');
Route::get('/penjualanTampilDetailSparepart/{dsp_id}','PenjualanController@destroySparepart');
Route::get('/penjualanEditSparepart/{dsp_id}', 'PenjualanController@cari')->name('penjualanEditSparepart');

Route::get('/penjualanTampil', 'PenjualanController@tampil');
Route::get('/penjualanCari','PenjualanController@search')->name('penjualanCari');
Route::get('/penjualanInput','PenjualanController@getPenjualan');
Route::post('/penjualanInput','PenjualanController@store')->name('penjualanInput');
// --Pencarian utk Semua -- 
Route::get('/penjualanCari', function(){
    return view('penjualanCari');
});

// PEMBAYARAN
// Route::get('/pengadaanInput', function(){
//     return view('pengadaanInput');
// });
Route::get('/pembayaranEdit', function(){
    return view('pembayaranEdit');
});
Route::get('/pembayaranCari', function(){
    return view('pembayaranCari');
});
Route::get('/pembayaranInput','PembayaranController@index');
Route::get('/pembayaranInput/{tj_id}','PembayaranController@getPembayaran');
Route::post('/pembayaranInput','PembayaranController@store')->name('pembayaranInput');
Route::get('/pembayaranTampil','PembayaranController@getPembayaran');
Route::get('/pembayaranTampil/cari','PembayaranController@tampil');
// Route::post('/pembayaranTampil','PembayaranController@store')->name('pembayaraanTampil');

Route::get('/pembayaranCari','PembayaranController@cari')->name('pembayaranCari');
Route::post('/pembayaranInput','PembayaranController@store')->name('pembayaranInput');
Route::get('/pembayaranEdit', 'PembayaranController@cariPembayaran')->name('pembayaranEdit');
Route::get('/pembayaranTampilDetailMotor', 'PembayaranController@tampilDetailMotor');
Route::get('/pembayaranTampilDetailService', 'PembayaranController@tampilDetailService');
Route::get('/pembayaranTampilDetailSparepart', 'PembayaranController@tampilDetailSparepart');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/login', 'LoginController@index')->name('login');
Route::post('/kirimdata','LoginController@login');
Route::get('/logout','LoginController@logout');
Route::get('/login', function () {
    return view('login');
})->middleware('auth:pegawai');
Route::get('/informasi', function(){
    return view('informasiBengkel');
});

// RIWAYAT
Route::get('/historiMasuk', 'HistoriController@tampilMasuk');
Route::get('/historiMasukDetail', 'HistoriController@tampilMasukDetail');
Route::get('/historiKeluar', 'HistoriController@tampilKeluar');

// //NOTA
// Route::get('cetakNota','CetakNotaController@cetak');
// Route::get('/cetakNota/{tj_id}','CetakNotaController@getNota');

// //LAPORAN
Route::get('/laporanTampilSemua', 'LaporanController@tampilSemuaLaporan');

//      tampilinLaporannya
Route::get('/laporanSparepartTerlaris', 'LaporanController@sparepartTerlaris');
Route::get('/laporanPendapatanBulanan', 'LaporanController@pendapatanBulanan');
Route::get('/laporanPendapatanTahunan', 'LaporanController@pendapatanTahunan');
Route::get('/laporanPengeluaranBulanan', 'LaporanController@pengeluaranBulanan');
Route::get('/laporanPenjualanJasa', 'LaporanController@penjualanJasa');
Route::get('/laporanSisaStok', 'LaporanController@sisaStokSetiapSparepart');
Route::get('/suratPengadaan', 'LaporanController@suratPengadaan');

//chart
Route::get('/chartBulanan', 'LaporanController@chartBulanan');
Route::get('/chartTahunan', 'LaporanController@chartTahunan');
Route::get('/chartPengeluaran', 'LaporanController@chartPengeluaran');
Route::get('/chartSisa', 'LaporanController@chartSisa');






// Route::get('/cetakNotaLunas', function(){
//     $pdf = PDF::loadview('cetakNotaLunas');
//     return $pdf->download('CetakNota.pdf');
// });
// Route::get('/cetakNotaLunas','CetakNotaController@getGenerate');
// Route::get('/cetakNotaLunas','CetakNotaController@generatePDF');


// KOSTUMER SORTIR
Route::get('/kostumerSortirCari', 'KostumerSortirController@tampil');
Route::get('/kostumerSortir', 'KostumerSortirController@tampilTable');
Route::get('/kostumerSortir/{sp_id}', 'KostumerSortirController@cari')->name('kostumerSortir');
// KOSTUMER RIWAYAT
Route::get('/kostumerRiwayat', 'KostumerRiwayatController@tampil');
Route::get('/kostumerRiwayatCari', 'KostumerRiwayatController@cari');
Route::get('/kostumerRiwayatTampilMotor/{tj_id}', 'KostumerRiwayatController@tampilDetailMotor');
Route::get('/kostumerRiwayatTampilService/{ds_id}', 'KostumerRiwayatController@tampilDetailService');
Route::get('/kostumerRiwayatTampilSparepart/{dsp_id}', 'KostumerRiwayatController@tampilDetailSparepart');

