<?php

namespace App\Http\Controllers;
use DB;
use Form;
use Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\jasa;
use App\pegawai;
use App\sparepart;
use App\supplier;
use App\cabang;
use App\motor;
use App\pegawaikerjas;
use App\detailSparepartMotor;
use App\detail_pengadaan;
use App\detail_service;
use App\transaksi_jual;
use App\transaksi_bayar;
use App\detail_sparepart;
use App\detail_motor;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Transformers\KostumerRiwayatTransformer;

class KostumerRiwayatController extends RestController
{
    // public function tampil(Request $request){
    //     $spareparts = sparepart::when($request->sp_nama, function ($query) use ($request) {
    //         $query->where('sp_nama','like',"%{$request->sp_nama}%");
    //     })->get();
    //     $spareparts = DB::table('spareparts')
    //                 ->join('detail_sparepart_motors', 'detail_sparepart_motors.sp_id', '=', 'spareparts.sp_id')
    //                 ->join('motors', 'motors.mtr_id', '=', 'detail_sparepart_motors.sp_id')->get();
    //     return view('kostumerSortir',['spareparts'=>$spareparts]);
    // }
    // public function cari($sp_id){
    //     $spareparts = DB::table('spareparts')->where('sp_id','like',"%".$sp_id."%")->first();
    //     return view('kostumerSortir ',compact('spareparts'));
    //     return redirect('kostumerSortir');
    // }

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
    public function getPenjualanSV($tj_id)
    {
        $motors = motor::all();
        $jasas = jasa::all();
        $pegawais = pegawai::all();
        $spareparts = sparepart::all();
        // $transaksi_juals = transaksi_jual::find($tj_id);                             ganti
        $transaksi_juals = transaksi_jual::where('tj_id',$tj_id)->firstOrFail(); //<-- jadi ini
        return view('penjualanInputSV', compact('motors','jasas','pegawais','spareparts', 'transaksi_juals'));
    }
    public function getPenjualanSP($tj_id)
    {
        $motors = motor::all();
        $jasas = jasa::all();
        $pegawais = pegawai::all();
        $spareparts = sparepart::all();
        $transaksi_juals = transaksi_jual::where('tj_id',$tj_id)->firstOrFail(); 
        return view('penjualanInputSP', compact('motors','jasas','pegawais','spareparts','transaksi_juals'));
    }
    public function getPenjualan()
    {
        $pegawais = pegawai::all();
        $cabangs = cabang::all();
        return view('penjualanInput', compact('pegawais','cabangs'));
    }
    public function getPenjualanMotor()
    {
        $motors = motor::all();
        return view('penjualanInputMotor', compact('motors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function tampil(Request $request){
       $transaksi_juals = transaksi_jual::when($request->dm_plat, function ($query) use ($request) {
                $query->where('dm_plat','like',"%{$request->dm_plat}%")
                ->where('tj_telepon','like',"%{$request->tj_telepon}%")
                ->join('detail_motors', 'detail_motors.tj_id', 'transaksi_juals.tj_id');
            })->first();
         return view('kostumerRiwayat',['transaksi_juals'=>$transaksi_juals]);  
    }
    public function tampilDetailService(Request $request, $tj_id){
        $transaksi_juals = transaksi_jual::where('tj_id',$tj_id)->firstOrFail(); //tambah ini buat cari transaksi jual 
        $detail_services = DB::table('detail_services')->where('tj_id','like',"%{$tj_id}%")->get(); //tambah ini buat nyari detail dengan tj_id tertentu 
        return view('kostumerRiwayatTampilService', compact('transaksi_juals', 'detail_services')); //kirim detail sama transaksi jual ke blade buat diambil idnya 
         
    }
     public function tampilDetailSparepart(Request $request, $tj_id){
        $transaksi_juals = transaksi_jual::where('tj_id',$tj_id)->firstOrFail(); //tambah ini buat cari transaksi jual
        $detail_spareparts = DB::table('detail_spareparts')->where('tj_id','like',"%{$tj_id}%")->get(); 
         return view('kostumerRiwayatTampilSparepart', compact('transaksi_juals', 'detail_spareparts'));
         
    }
    public function tampilDetailMotor(Request $request, $tj_id){

        $detail_motors = DB::table('detail_motors')->where('tj_id','like',"%{$tj_id}%")->get();

        // return response()->json($detail_motors, 200);
         return view('kostumerRiwayatTampilMotor',['detail_motors'=>$detail_motors]);
         
    }
    public function cari(){
            return view('kostumerRiwayatCari');
    }
    //  public function cariMotor($dm_id){
    //         $detail_motors = DB::table('detail_motors')->where('dm_id','like',"%".$dm_id."%")->first();
    //         return view('penjualanEditMotor ',compact('detail_motors'));
    //         return redirect('penjualanTampilDetailMotor');
    // }
    //  public function cariService($ds_id){
    //         $detail_services = DB::table('detail_services')->where('ds_id','like',"%".$ds_id."%")->first();
    //         return view('penjualanEditService ',compact('detail_services'));
    //         return redirect('penjualanTampilDetailService');
    // }
    // public function cariSparepart($dsp_id){
    //         $detail_spareparts = DB::table('detail_spareparts')->where('dsp_id','like',"%".$dsp_id."%")->first();
    //         return view('penjualanEditSparepart ',compact('detail_spareparts'));
    //         return redirect('penjualanTampilDetailSparepart');
    // }
}
