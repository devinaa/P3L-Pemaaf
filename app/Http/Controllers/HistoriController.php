<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use PDF;
use App\sparepart;
use App\transaksi_jual;
use App\transaksi_bayar;

use App\detail_pengadaan;
use App\transaksi_pengadaan;


class HistoriController extends Controller
{
    // public function tampil(Request $request){
    //     if(Session::get('login')){
    //         $spareparts = sparepart::when($request->sp_nama, function ($query) use ($request) {
    //             $query->where('sp_nama','like',"%{$request->sp_nama}%");
    //         })->get();
    //         return view('sparepartTampil',['spareparts'=>$spareparts]);
    //     }
    //     else {
    //         return view('home');
    //     }
    // }
    public function tampilMasuk(Request $request){
        $transaksi_pengadaans = DB::table('transaksi_pengadaans')
            ->where('ta_id','like',"%{$request->ta_id}%") 
            ->join('suppliers', 'suppliers.su_id', '=', 'transaksi_pengadaans.su_id')
            ->get();
         return view('historiMasuk',['transaksi_pengadaans'=>$transaksi_pengadaans]);
         
    }
    public function tampilMasukDetail(Request $request){
         $detail_pengadaans = DB::table('detail_pengadaans')
                                ->where('ta_id','like',"%{$request->ta_id}%") 
                                ->join('spareparts', 'spareparts.sp_id', '=', 'detail_pengadaans.sp_id')
                                ->get();
            // return response()->json($detail_pengadaans, 200);   
         return view('historiMasukDetail',['detail_pengadaans'=>$detail_pengadaans]);
    }

    // public function tampilKeluar(Request $request){
    //     $transaksi_bayars = DB::table('transaksi_bayars')
    //         ->where('ta_id','like',"%{$request->ta_id}%") 
    //         ->join('suppliers', 'suppliers.su_id', '=', 'transaksi_pengadaans.su_id')
    //         ->get();
    //      return view('historiMasuk',['transaksi_pengadaans'=>$transaksi_pengadaans]);
         
    // }
    // public function tampilKeluarDetail(Request $request){
    //      $detail_pengadaans = DB::table('detail_pengadaans')
    //                             ->where('ta_id','like',"%{$request->ta_id}%") 
    //                             ->join('spareparts', 'spareparts.sp_id', '=', 'detail_pengadaans.sp_id')
    //                             ->get();
    //         // return response()->json($detail_pengadaans, 200);   
    //      return view('historiMasukDetail',['detail_pengadaans'=>$detail_pengadaans]);
    // }
    public function tampilKeluar(Request $request){
        // $transaksi_bayars = transaksi_bayar::where('tj_id',$tj_id)->find(); //tambah ini buat cari transaksi jual
        // $detail_spareparts = DB::table('detail_spareparts')->where('tj_id','like',"%{$request->tj_id}%")->get(); 
        //  return view('historiKeluar', compact('transaksi_jual','transaksi_bayars', 'detail_spareparts'));
        // //  return view('historiKeluar',['transaksi_bayars'=>$transaksi_bayars]);
        $transaksi_juals = transaksi_jual::where('tj_id',$tj_id)->firstOrFail(); //tambah ini buat cari transaksi jual
        $detail_spareparts = DB::table('detail_spareparts')
                                ->where('tj_id','like',"%{$request->tj_id}%")
                                ->join('spareparts', 'spareparts.sp_id', '=', 'detail_spareparts.sp_id')
                                ->get();
        return view('historiKeluar', compact('transaksi_juals', 'detail_spareparts'));
    }
}
