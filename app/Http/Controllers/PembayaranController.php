<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\transaksi_bayar;
use App\cabang;
use App\pegawai;
use App\transaksi_jual;
use App\sisa_stok;
use App\sparepart;

use Alert;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Providers\SweetAlertServiceProvider;
use App\Transformers\PembayaranTransformer;

class PembayaranController extends RestController
{
     protected $transformer = PembayaranTransformer::class;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaksi_juals = transaksi_jual::all();
        $cabangs = cabang::all(); 
        $pegawais = pegawai::where('pgw_jabatan','=','cs')->get();
        // $response = $this->generateCollection($transaksi_bayars);
        // return $this->sendResponse($response);
        return view('pembayaranInput', compact('cabangs','pegawais','transaksi_juals'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

   public function tampil(Request $request){
         $transaksi_bayars = transaksi_bayar::when($request->tj_id, function ($query) use ($request) {
            $query->where('tj_id','like',"%{$request->tj_id}%");
            })->get();
         return view('pembayaranTampil',['transaksi_bayars'=>$transaksi_bayars]);
         
    }
    public function cari($tj_id){
            $transaksi_bayars = DB::table('transaksi_bayars')->where('tj_id','like',"%".$tj_id."%")->first();
            return redirect('pembayaranTampil');
           
    }
// public function tampil(Request $request){
         
//          $motors = motor::when($request->mtr_merk, function ($query) use ($request) {
//                 $query->where('mtr_merk','like',"%{$request->mtr_merk}%");
//             })->get();
//          return view('motorTampil',['motors'=>$motors]);
        
//     }
//     public function cari($mtr_id){
       
//             $motors = DB::table('motors')->where('mtr_id','like',"%".$mtr_id."%")->first();
//             return view('motorEdit ',compact('motors'));
//             return redirect('motorTampil');
//     }
    
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    public function tampilDetailService(Request $request, $tj_id){
        $transaksi_bayars = transaksi_bayar::where('tj_id',$tj_id)->firstOrFail(); //tambah ini buat cari transaksi jual 
            
        $detail_services = DB::table('detail_services')->where('tj_id','like',"%{$request->tj_id}%")->get(); //tambah ini buat nyari detail dengan tj_id tertentu 
        return view('pembayaranTampilDetailService', compact('transaksi_bayars', 'detail_services')); //kirim detail sama transaksi jual ke blade buat diambil idnya 
         
    }
    public function tampilDetailSparepart(Request $request,$tj_id){
        $transaksi_bayars = transaksi_bayar::where('tj_id',$tj_id)->firstOrFail(); //tambah ini buat cari transaksi jual
        $detail_spareparts = DB::table('detail_spareparts')->where('tj_id','like',"%{$request->tj_id}%")->get(); 
         return view('pembayaranTampilDetailSparepart', compact('transaksi_bayars', 'detail_spareparts'));
         
    }
    public function tampilDetailMotor(Request $request){
         $detail_motors = detail_motor::when($request->tj_id, function ($query) use ($request) {
            $query->where('tj_id','like',"%{$request->tj_id}%");
            })->get();
         return view('pembayaranTampilDetailMotor',['detail_motors'=>$detail_motors]);
    }
    public function tampilPembayaran(Request $request){
        $transaksi_bayars = transaksi_bayar::when($request->tj_id, function ($query) use ($request) {
            $query->where('tj_id','like',"%{$request->tj_id}%");
            })->get();
         return view('pembayaranTampil',['transaksi_bayars'=>$transaksi_bayars]);
    }
    public function getPembayaran()
    {    
        $cabangs = cabang::all(); 
        $pegawais = pegawai::where('pgw_jabatan','=','cs')->get();
        $transaksi_juals = transaksi_jual::all();
        $transaksi_bayars = transaksi_bayar::all();
        return view('pembayaranTampil', compact('cabangs','pegawais','transaksi_juals', 'transaksi_bayars'));
    }
    public function cariPembayaran($tb_id){
            $transaksi_juals = DB::table('transaksi_juals')->where('tb_id','like',"%".$tb_id."%")->first();
            return view('pembayaranEdit ',compact('transaksi_bayars'));
            return redirect('pembayaranTampil');
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'cab_id' => 'required',
            'tb_diskon' => 'nullable|min:0',
            'pgw_id'=> 'required',
            'tj_id' => 'required',
            'tb_status' => 'required'
        ]);
        if ($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()->all()]);
            // return redirect('/pgwInput')->withInput()->withErrors($validator);
        }

        $transaksi_bayars = new transaksi_bayar;
        $transaksi_juals= transaksi_jual::find($request->tj_id);
        $transaksi_bayars->tb_diskon=$request->get('tb_diskon');
        $total = $transaksi_juals->tj_jumlah-$request->tb_diskon;
        $tb_bayar = $request->get('tb_bayar');
        if($tb_bayar>=$total){
            $kembalian = $tb_bayar-$total;
            $transaksi_bayars->cab_id=$request->get('cab_id');
            $transaksi_bayars->pgw_id=$request->get('pgw_id');
            $transaksi_bayars->tj_id=$request->get('tj_id');
            $transaksi_bayars->tb_diskon=$request->get('tb_diskon');
            $transaksi_bayars->tb_status=$request->get('tb_status');
            $transaksi_bayars->save();
            $transaksi_juals->tb_status=$request->get('tb_status');
            $transaksi_juals->save();
            // if($success)
            //     return response()->json('sukses', 201);
            // else {
            //     # code...
            //     return response()->json('failed saving', 500);
            // }
            
           return redirect('pembayaranTampil');
           
        }
    }

    public function update(Request $request, $tb_id)
    {

        $transaksi_bayars=transaksi_bayar::find($tb_id);    
        $transaksi_bayars->cab_id=$request->get('cab_id');
        $transaksi_bayars->tb_diskon=$request->get('tb_diskon');
        $transaksi_bayars->pgw_id=$request->get('pgw_id');
        $transaksi_bayars->tj_id=$request->get('tj_id');
        $transaksi_bayars->save();
        return redirect('pembayaranTampil');
    
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($tb_id)
    {   
        if(!Session::get('login')){
            try {
                $transaksi_bayars=transaksi_bayar::find($tb_id);
                $transaksi_bayars->delete();
                return redirect('/pembayaranTampil');
                return response()->json('Success',200);
            } catch (ModelNotFoundException $e) {
                return $this->sendNotFoundResponse('Transaksi Tidak Ditemukan');
            } catch (\Exception $e) {
                return $this->sendIseResponse($e->getMessage());
            }
        }
        else {
            return view('home');
        }
    }
}
