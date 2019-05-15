<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\transaksi_jual;
use App\transaksi_bayar;
use App\detail_motor;
use App\detail_service;
use App\transaksi_pengadaan;
use App\detail_pengadaan;
use App\detail_sparepart;
use App\motor;
use App\jasa;
use App\pegawai;
use App\sparepart;
use App\cabang;
use Carbon;
use DB;
use Validator;

class LaporanController extends RestController
{
    public function tampilSemuaLaporan(Request $request){
         return view('laporanTampilSemua');
    }
    public function getSuratPengadaaan()
    {
        // ini utk dropdown
        $transaksi_pengadaans = transaksi_pengadaan::all();
        return view('suratPengadaanInput', compact('transaksi_pengadaans'));
    }
    public function getSuratPengadaaanPrint()
    {
        // ini utk dropdown
        $transaksi_pengadaans = transaksi_pengadaan::where('surat_status','=','Sudah Dicetak')->get();
        return view('suratPengadaanInputPrint', compact('transaksi_pengadaans'));
    }
    public function inputSuratPengadaan(Request $request)
    {  
        // samain aja kayak input pengadaan
        $validator = Validator::make($request->all(), [
            'ta_id' => 'required',
            'surat_status' => 'required',
        ]);
        if ($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()->all()]);
        }    
        $transaksi_pengadaans= transaksi_pengadaan::find($request->ta_id);
        $transaksi_pengadaans->ta_id=$request->get('ta_id');
        $transaksi_pengadaans->surat_status=$request->get('surat_status');
        $transaksi_pengadaans->save();
        return redirect('suratPengadaanTampil')->with('success', 'Surat Pengadaan telah diinput');   
    }
    public function inputSuratPengadaanPrint(Request $request)
    {  
        $validator = Validator::make($request->all(), [
            'ta_id' => 'required',
        ]);
        if ($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()->all()]);
        }    
        $transaksi_pengadaans= transaksi_pengadaan::find($request->ta_id);
        $transaksi_pengadaans->ta_id=$request->get('ta_id');
        $transaksi_pengadaans->save();
        return redirect('/suratPengadaan')->with('success', 'Surat Pengadaan telah diinput');   
    }
    public function tampil(Request $request){
        $transaksi_pengadaans = DB::table('transaksi_pengadaans')
            ->where('ta_id','like',"%{$request->ta_id}%") 
            ->join('suppliers', 'suppliers.su_id', '=', 'transaksi_pengadaans.su_id')
            ->get();
         return view('suratPengadaanTampil',['transaksi_pengadaans'=>$transaksi_pengadaans]);
         
    }
     public function cari($ta_id){
            $transaksi_pengadaans = DB::table('transaksi_pengadaans')->where('ta_id','like',"%".$ta_id."%")->first();
            return view('suratPengadaanEdit ',compact('transaksi_pengadaans'));
    }
    public function updateSuratPengadaan(Request $request, $ta_id)
    {

        $transaksi_pengadaans=transaksi_pengadaan::find($ta_id);    
        $transaksi_pengadaans->surat_status=$request->get('surat_status');
        $transaksi_pengadaans->save();
        return redirect()->action('LaporanController@tampil', ['ta_id' => $transaksi_pengadaans->ta_id]); 
    }
    
    public function suratPengadaan(Request $request){
        $surat = DB::table('detail_pengadaans')
        ->select(DB::raw('spareparts.sp_nama as "nama",
            spareparts.sp_merk as "merk",
            spareparts.sp_tipe as "tipe",
            suppliers.su_nama as "namaSupplier",
            suppliers.su_telepon as "noSupplier",
            suppliers.su_alamat as "alamatSupplier",
            detail_pengadaans.dpgd_satuan as "satuan"'))
        ->join('spareparts', 'detail_pengadaans.sp_id', '=', 'spareparts.sp_id')
        ->join('transaksi_pengadaans', 'detail_pengadaans.ta_id', '=', 'transaksi_pengadaans.ta_id')
        ->join('suppliers', 'transaksi_pengadaans.su_id', '=', 'suppliers.su_id')
        ->where('detail_pengadaans.ta_id','=',$request->ta_id)
        ->get();
        $tanggal = Carbon::now()->setTimezone('Asia/Jakarta')->format('d F Y');
        return view('/suratPengadaan', compact('surat', 'tanggal'));
    }
    public function sparepartTerlaris()
    {
        $laporan = DB::table('detail_spareparts')
            ->select(DB::raw('spareparts.SP_NAMA AS "nama_barang", spareparts.sp_tipe AS "tipe",
            monthname(transaksi_juals.tj_tanggal) as "bulan",
            sum(detail_spareparts.ds_jumlah) as "jumlah_penjualan"'))
            ->join('spareparts', 'detail_spareparts.sp_id', '=', 'spareparts.sp_id')
            ->join('transaksi_juals', 'detail_spareparts.tj_id', '=', 'transaksi_juals.tj_id')
            ->groupBy(DB::raw('month(transaksi_juals.tj_tanggal), spareparts.sp_id'))
            ->orderBy('detail_spareparts.ds_jumlah', 'desc')
            ->get();

        $tanggal = Carbon::now()->setTimezone('Asia/Jakarta')->format('d F Y');
             return view('laporanSparepartTerlaris', compact('laporan', 'tanggal'));
    }
    public function pendapatanBulanan()
    {
       $laporan = DB::table('transaksi_juals')
            ->select(DB::raw('monthname(tj_tanggal) as "bulan", 
                SUM(tj_subtotal_spareparts) as "spareparts", 
                SUM(tj_subtotal_jasa) as "service",
                SUM(tj_subtotal_spareparts) + SUM(tj_subtotal_jasa) as "total",
                SUM(tj_jumlah) as "totalSemua"'))
            ->where('tb_status', '=' , 'Lunas')
            ->whereYear('created_at', '2019')
            ->groupBy(DB::raw('month(tj_tanggal)'))
            ->get();
        $transaksi_jualsp = transaksi_jual::select(DB::raw("SUM(tj_subtotal_spareparts) as sp"))
            ->orderBy("tj_tanggal")
            ->groupBy(DB::raw("year(tj_tanggal)"))
            ->get()->toArray();
            $transaksi_jualsp = array_column($transaksi_jualsp, 'sp');
        
        $transaksi_jualsv = transaksi_jual::select(DB::raw("SUM(tj_subtotal_jasa) as sv"))
            ->orderBy("tj_tanggal")
            ->groupBy(DB::raw("year(tj_tanggal)"))
            ->get()->toArray();
            $transaksi_jualsv = array_column($transaksi_jualsv, 'sv');
       
        $transaksi_juals = transaksi_jual::select(DB::raw("SUM(tj_subtotal_spareparts) + SUM(tj_subtotal_jasa) as total"))
            ->orderBy("tj_tanggal")
            ->groupBy(DB::raw("year(tj_tanggal)"))
            ->get()->toArray();
            $transaksi_juals = array_column($transaksi_juals, 'total');

        $tanggal = Carbon::now()->setTimezone('Asia/Jakarta')->format('d F Y');
        return view('laporanPendapatanBulanan',  compact('laporan', 'tanggal'))
                ->with('transaksi_jualsp',($transaksi_jualsp))
                ->with('transaksi_jualsv',($transaksi_jualsv))
                ->with('transaksi_juals',($transaksi_juals));
        // refernsinya dari ini        
        // https://itsolutionstuff.com/post/how-to-add-charts-in-laravel-5-using-chart-js-example.html

    }

    public function chartBulanan()
    {
        $laporan = DB::table('transaksi_juals')
            ->select(DB::raw('monthname(tj_tanggal) as "bulan", 
                SUM(tj_subtotal_spareparts) as "spareparts", 
                SUM(tj_subtotal_jasa) as "service",
                SUM(tj_subtotal_spareparts) + SUM(tj_subtotal_jasa) as "total",
                SUM(tj_jumlah) as "totalSemua"'))
            ->where('tb_status', '=' , 'Lunas')
            ->whereYear('created_at', '2019')
            ->groupBy(DB::raw('month(tj_tanggal)'))
            ->get();

        return response()->json($laporan, 200);
    }
    public function chartTahunan()
    {
        $laporan = DB::table('transaksi_juals')
             ->select(DB::raw('year(tj_tanggal) as "tahun",
            	cab_nama as "cabang",
                SUM(tj_subtotal_spareparts) + SUM(tj_subtotal_jasa) as "total",
                SUM(tj_jumlah) as "totalSemua"
                '))
            ->where('tb_status', '=' , 'Lunas')
            ->join('cabangs', 'transaksi_juals.cab_id', '=', 'cabangs.cab_id')
            ->groupBy(DB::raw('year(tj_tanggal),transaksi_juals.cab_id'))
            ->get();
            $tanggal = Carbon::now()->setTimezone('Asia/Jakarta')->format('d F Y');
            return response()->json($laporan, 200);
    }
    
    public function pendapatanTahunan()
    {
        $laporan = DB::table('transaksi_juals')
             ->select(DB::raw('year(tj_tanggal) as "tahun",
            	cab_nama as "cabang",
                SUM(tj_subtotal_spareparts) + SUM(tj_subtotal_jasa) as "total",
                SUM(tj_jumlah) as "totalSemua"
                '))
        ->where('tb_status', '=' , 'Lunas')
        ->join('cabangs', 'transaksi_juals.cab_id', '=', 'cabangs.cab_id')
        ->groupBy(DB::raw('year(tj_tanggal),transaksi_juals.cab_id'))
        ->get();
        $tanggal = Carbon::now()->setTimezone('Asia/Jakarta')->format('d F Y');
        return view('laporanPendapatanTahunan',  compact('laporan', 'tanggal'));
    }
    public function chartPengeluaran()
    {
         $laporan = DB::table('detail_pengadaans')
             ->select(DB::raw('monthname(ta_tanggal) as "bulan", 
             SUM(dpgd_satuan*sp_hargabeli) as "total"
            '))
            ->whereYear('ta_tanggal', '=' , '2019')
            ->join('transaksi_pengadaans','transaksi_pengadaans.ta_id', 'detail_pengadaans.ta_id')
            ->join('spareparts','spareparts.sp_id',  '=', 'detail_pengadaans.sp_id')
            ->groupBy(DB::raw('month(ta_tanggal)'))
            ->get();
        $tanggal = Carbon::now()->setTimezone('Asia/Jakarta')->format('d F Y');
        return response()->json($laporan, 200);
    }
    public function pengeluaranBulanan()
    {
         $laporan = DB::table('detail_pengadaans')
             ->select(DB::raw('monthname(ta_tanggal) as "bulan", 
             SUM(dpgd_satuan*sp_hargabeli) as "total"
            '))
            ->whereYear('ta_tanggal', '=' , '2019')
            ->join('transaksi_pengadaans','transaksi_pengadaans.ta_id', 'detail_pengadaans.ta_id')
            ->join('spareparts','spareparts.sp_id',  '=', 'detail_pengadaans.sp_id')
            ->groupBy(DB::raw('month(ta_tanggal)'))
            ->get();
            
            $tanggal = Carbon::now()->setTimezone('Asia/Jakarta')->format('d F Y');
            return view('laporanPengeluaranBulanan', compact('laporan','tanggal'));
    }
    public function penjualanJasa()
    {
        $laporan = DB::table('detail_services')
             ->select(DB::raw('mtr_merk as "merk", 
                mtr_tipe as "tipe", 
                jasa_nama as "nama", 
                SUM(ds_jumlah) as "total"
            '))
            ->whereYear('transaksi_juals.tj_tanggal', '=' , '2019')
            ->join('jasas', 'detail_services.jasa_id', '=', 'jasas.jasa_id')
            ->join('transaksi_juals', 'detail_services.tj_id', '=', 'transaksi_juals.tj_id')
            ->join('detail_motors', 'detail_motors.tj_id', '=', 'transaksi_juals.tj_id')
            ->join('motors', 'detail_motors.mtr_id', '=', 'motors.mtr_id')
            ->groupBy('mtr_merk', 'mtr_tipe','jasa_nama')
            ->get();
            
            $tanggal = Carbon::now()->setTimezone('Asia/Jakarta')->format('d F Y');
            return view('laporanPenjualanJasa', compact('laporan','tanggal'));
    }
    public function sisaStokSetiapSparepart()
    {
        $laporan = DB::table('sisa_stoks')
             ->select(DB::raw(' monthname(sisa_tanggal) as "bulan", 
                sisa_jumlah as "sisa_jumlah"
            '))
            ->whereYear('sisa_tanggal', '=' , '2019')
            ->join('spareparts', 'spareparts.sp_id', '=', 'sisa_stoks.sp_id')
            ->groupBy('sp_tipe')
            ->get();
            
            $tanggal = Carbon::now()->setTimezone('Asia/Jakarta')->format('d F Y');
            return view('laporanSisaStok', compact('laporan','tanggal'));
    }
     public function chartSisa()
    {
        $laporan = DB::table('sisa_stoks')
             ->select(DB::raw(' monthname(sisa_tanggal) as "bulan", 
                sisa_jumlah as "sisa_jumlah"
            '))
            ->whereYear('sisa_tanggal', '=' , '2019')
            ->join('spareparts', 'spareparts.sp_id', '=', 'sisa_stoks.sp_id')
            ->groupBy('sp_tipe')
            ->where('sp_tipe', '=' , 'Lunas')
            ->get();
            
            $tanggal = Carbon::now()->setTimezone('Asia/Jakarta')->format('d F Y');
            return response()->json($laporan, 200);
    }
    
}
