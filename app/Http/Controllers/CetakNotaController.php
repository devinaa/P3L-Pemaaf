<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\transaksi_jual;
use App\transaksi_bayar;
use App\detail_motor;
use App\detail_service;
use App\detail_sparepart;
use App\motor;
use App\jasa;
use App\pegawai;
use App\sparepart;
use App\cabang;


class CetakNotaController extends RestController
{
   public function cetak(Request $request){
        $transaksi_juals = transaksi_jual::when($request->tj_id, function ($query) use ($request) {
           $query->where('tj_id','like',"%{$request->tj_id}%");
           })->get();
        return view('cetakNota', compact('detail_motors', 'detail_spareparts','detail_services'));
        
    }
     public function index()
    {
        $transaksi_juals = transaksi_jual::all();
        $response = $this->generateCollection($transaksi_juals);
        return $this->sendResponse($response);
        
    }
    public function indexMotor()
    {
        $detail_motors = detail_motor::all();
        $response = $this->generateCollection($detail_motors);
        return $this->sendResponse($response);
        
    }
    public function indexService()
    {
        $detail_services = detail_service::all();
        $response = $this->generateCollection($detail_services);
        return $this->sendResponse($response);
        
    }
     public function indexSparepart()
    {
        $detail_spareparts = detail_sparepart::all();
        $response = $this->generateCollection($detail_spareparts);
        return $this->sendResponse($response);
        
    }
    public function getNota($tj_id){
        $motors = motor::all();
        $jasas = jasa::all();
        $pegawais = pegawai::all();
        $spareparts = sparepart::all();
        $cabangs = cabang::all();
        $detail_services = detail_service::where('tj_id',$tj_id)->get(); 
        $transaksi_juals = transaksi_jual::where('tj_id',$tj_id)->firstOrFail(); 
        $detail_spareparts = detail_sparepart::where('tj_id',$tj_id)->get(); 
        $detail_motors = detail_motor::where('tj_id',$tj_id)->get();  
         return view('cetakNota', compact('motors','jasas','pegawais','spareparts','cabangs','transaksi_juals','detail_motors','detail_services','detail_spareparts'));
        
    }
  
    public function tampilDetailService(Request $request, $tj_id){
        //  $detail_services = detail_service::when($request->tj_id, function ($query) use ($request) {
        //     $query->where('tj_id','like',"%{$request->tj_id}%");
        //     })->get();
        $transaksi_juals = transaksi_jual::where('tj_id',$tj_id)->firstOrFail(); //tambah ini buat cari transaksi jual 
            
        $detail_services = DB::table('detail_services')->where('tj_id','like',"%{$request->tj_id}%")->get(); //tambah ini buat nyari detail dengan tj_id tertentu 
        return view('cetakNota', compact('transaksi_juals', 'detail_services')); //kirim detail sama transaksi jual ke blade buat diambil idnya 
         
    }
     public function tampilDetailSparepart(Request $request,$tj_id){
        //  $detail_spareparts = detail_sparepart::when($request->tj_id, function ($query) use ($request) {
        //     $query->where('tj_id','like',"%{$request->tj_id}%");
        //     })->get();
        $transaksi_juals = transaksi_jual::where('tj_id',$tj_id)->firstOrFail(); //tambah ini buat cari transaksi jual
        $detail_spareparts = DB::table('detail_spareparts')->where('tj_id','like',"%{$request->tj_id}%")->get(); 
         return view('cetakNota', compact('transaksi_juals', 'detail_spareparts'));
         
    }
    public function tampilDetailMotor(Request $request){
         $detail_motors = detail_motor::when($request->tj_id, function ($query) use ($request) {
            $query->where('tj_id','like',"%{$request->tj_id}%");
            })->get();
         return view('cetakNota',['detail_motors'=>$detail_motors]);
         
    }
}
