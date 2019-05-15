<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Alert;
use Validator;
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
use App\sisa_stok;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Providers\SweetAlertServiceProvider;
use App\Transformers\PenjualanTransformer;
use Illuminate\Support\Carbon;

class PenjualanController extends RestController
{
   
    protected $transformer = PenjualanTransformer::class;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
    public function create()
    {
        return view('create');
    }

   public function tampil(Request $request){
        //  $transaksi_juals = transaksi_jual::when($request->tj_id, function ($query) use ($request) {
        //     $query->where('tj_id','like',"%{$request->tj_id}%");
        //     })->get();

        $transaksi_juals = transaksi_jual::all();
         return view('penjualanTampil',['transaksi_juals'=>$transaksi_juals]);
         
    }
    public function tampilDetailService(Request $request, $tj_id){
        //  $detail_services = detail_service::when($request->tj_id, function ($query) use ($request) {
        //     $query->where('tj_id','like',"%{$request->tj_id}%");
        //     })->get();
        $transaksi_juals = transaksi_jual::where('tj_id',$tj_id)->firstOrFail(); //tambah ini buat cari transaksi jual 
            
        // $detail_services = DB::table('detail_services')->where('tj_id','like',"%{$request->tj_id}%")->get(); //tambah ini buat nyari detail dengan tj_id tertentu 
        $detail_services = DB::table('detail_services')
                                ->where('tj_id','like',"%{$request->tj_id}%")
                                ->join('jasas', 'jasas.jasa_id', '=', 'detail_services.jasa_id')
                                ->get();
        return view('penjualanTampilDetailService', compact('transaksi_juals', 'detail_services')); //kirim detail sama transaksi jual ke blade buat diambil idnya 
         
    }
     public function tampilDetailSparepart(Request $request,$tj_id){
        //  $detail_spareparts = detail_sparepart::when($request->tj_id, function ($query) use ($request) {
        //     $query->where('tj_id','like',"%{$request->tj_id}%");
        //     })->get();
        // $detail_spareparts = DB::table('detail_spareparts')->where('tj_id','like',"%{$request->tj_id}%")->get(); 
        $transaksi_juals = transaksi_jual::where('tj_id',$tj_id)->firstOrFail(); //tambah ini buat cari transaksi jual
        $detail_spareparts = DB::table('detail_spareparts')
                                ->where('tj_id','like',"%{$request->tj_id}%")
                                ->join('spareparts', 'spareparts.sp_id', '=', 'detail_spareparts.sp_id')
                                ->get();
        return view('penjualanTampilDetailSparepart', compact('transaksi_juals', 'detail_spareparts'));
         
    }
    public function tampilDetailMotor(Request $request){
         $detail_motors = detail_motor::when($request->tj_id, function ($query) use ($request) {
            $query->where('tj_id','like',"%{$request->tj_id}%");
            })->get();
         return view('penjualanTampilDetailMotor',['detail_motors'=>$detail_motors]);
         
    }
    public function cari($tj_id){
        if(Session::get('login')){
            $transaksi_juals = DB::table('transaksi_juals')->where('tj_id','like',"%".$tj_id."%")->first();
            return view('penjualanEditService ',compact('transaksi_juals'));
            return redirect('penjualanTampil');
        }
        else {
            return view('home');
        }
    }
     public function cariMotor($dm_id){
            $detail_motors = DB::table('detail_motors')->where('dm_id','like',"%".$dm_id."%")->first();
            return view('penjualanEditMotor ',compact('detail_motors'));
            return redirect('penjualanTampilDetailMotor');
    }
     public function cariService($ds_id){
            $detail_services = DB::table('detail_services')->where('ds_id','like',"%".$ds_id."%")->first();
            return view('penjualanEditService ',compact('detail_services'));
            return redirect('penjualanTampilDetailService');
    }
    public function cariSparepart($dsp_id){
            $detail_spareparts = DB::table('detail_spareparts')->where('dsp_id','like',"%".$dsp_id."%")->first();
            return view('penjualanEditSparepart ',compact('detail_spareparts'));
            return redirect('penjualanTampilDetailSparepart');
    }
    
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeSV(Request $request, $tj_id){
       
        $validator = Validator::make($request->all(), [
            'jasa_id' => 'required',	
            'ds_jumlah' => 'required',
        ]);  
        if ($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()->all()]);
        }      
        $detail_services = new detail_service;
        $transaksi_juals = transaksi_jual::find($tj_id);
        // $depan = $request->get('tj_jenis');
        // $transaksi_juals->tj_id = $depan . '-' . $transaksi_juals->tj_id;
        $jasas = jasa::find($request->jasa_id);
        $detail_services->ds_jasa = $jasas->jasa_harga;
        $detail_services->ds_jumlah=$request->get('ds_jumlah');
        $detail_services->subSV = $jasas->jasa_harga*$request->ds_jumlah;
        $detail_services->tj_id=$transaksi_juals->tj_id;
        $detail_services->jasa_id=$request->get('jasa_id');
        $detail_services->save();

        $sum = DB::table('detail_services')
                ->where('tj_id', '=', $tj_id)
                ->join('jasas', 'detail_services.jasa_id', '=', 'jasas.jasa_id')
                ->sum(DB::raw('jasas.jasa_harga*detail_services.ds_jumlah'));
        $transaksi_juals->tj_subtotal_jasa = $sum;
        $transaksi_juals->save();
        $sum = DB::table('transaksi_juals')
        ->where('tj_id', '=', $tj_id)
        ->sum(DB::raw('transaksi_juals.tj_subtotal_spareparts+transaksi_juals.tj_subtotal_jasa'));
        $transaksi_juals->tj_jumlah = $sum;
        $transaksi_juals->save();
         return redirect()->action('PenjualanController@tampilDetailService', ['tj_id' => $tj_id]); //balik ke tampil detail lagi
        // return redirect('penjualanTampilDetailService');
    }
    public function storeSP(Request $request, $tj_id){
        $validator = Validator::make($request->all(), [
            'sp_id' => 'required',	
            'ds_jumlah' => 'required',
        ]);  
        if ($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()->all()]);
        }      
        $detail_spareparts = new detail_sparepart;
        $sisa_stoks= new sisa_stok;
        $detail_spareparts->ds_jumlah=$request->get('ds_jumlah');
        $detail_spareparts->sp_id=$request->get('sp_id');
        $spareparts= sparepart::find($request->sp_id);
        $transaksi_juals = transaksi_jual::find($tj_id);
        $detail_spareparts->subSP = $spareparts->sp_hargaJual*$request->ds_jumlah;
        $spareparts->sp_stok = $spareparts->sp_stok-$request->ds_jumlah;
        $detail_spareparts->tj_id=$tj_id;

        
        $spareparts->save();
        $detail_spareparts->save();
        $sum = DB::table('detail_spareparts')
            ->where('tj_id', '=', $tj_id)
            ->join('spareparts', 'detail_spareparts.sp_id', '=', 'spareparts.sp_id')
            ->sum(DB::raw('spareparts.sp_hargaJual*detail_spareparts.ds_jumlah'));
            
        $transaksi_juals->tj_subtotal_spareparts = $sum;
        $transaksi_juals->save();
        $sisa_stoks->sisa_jumlah=$spareparts->sp_stok;
        $sisa_stoks->sp_id=$spareparts->sp_id;
        $sisa_stoks->sisa_tanggal=$transaksi_juals->tj_tanggal;
        $sisa_stoks->save();

        $sum = DB::table('transaksi_juals')
        ->where('tj_id', '=', $tj_id)
        ->sum(DB::raw('transaksi_juals.tj_subtotal_spareparts+transaksi_juals.tj_subtotal_jasa'));
        $transaksi_juals->tj_jumlah = $sum;
        $transaksi_juals->save();
      return redirect()->action('PenjualanController@tampilDetailSparepart', ['tj_id' => $tj_id]);
    }
    public function storeMotor(Request $request){
        $validator = Validator::make($request->all(), [
                'mtr_id' => 'required',	
                'dm_plat' => 'required',
                'dm_status' => 'required'
            ]);  
             if ($validator->fails())
            {
                return response()->json(['errors'=>$validator->errors()->all()]);
            }  
        $detail_motors = new detail_motor;
        $detail_motors->tj_id=$request->get('tj_id');
        $detail_motors->dm_plat=$request->get('dm_plat');
        $detail_motors->dm_status=$request->get('dm_status');
        $detail_motors->mtr_id=$request->get('mtr_id');
        $detail_motors->save();
         return redirect()->action('PenjualanController@tampilDetailMotor', ['tj_id' => $detail_motors->tj_id]); 
    }
    public function store(Request $request)
    {
          $validator = Validator::make($request->all(), [
                'tj_jenis' => 'required',
                'tj_noTransaksi' => 'required',
                'cab_id'=> 'required',
                // tj_jumlah digunkan utk total
                'tj_subtotal_spareparts'=> 'nullable',
                'tj_subtotal_jasa'=> 'nullable',
                'tj_nama' => 'required',
                'tj_telepon' => 'required|regex:/(08)[0-9]{9}/',
                'id_cs' => 'required',
                'id_montir' => 'nullable',
                'id_montir2'=> 'nullable',
                'tb_status'=> 'required',
            ]);  
             if ($validator->fails())
            {
                return response()->json(['errors'=>$validator->errors()->all()]);
            }  
                $depan = $request->get('tj_jenis');
                $tengah = $request->get('tanggal');
                $tengah = Carbon::now()->setTimezone('Asia/Jakarta')->format('dmy');
                $belakang = $request->get('tj_noTransaksi');
                $tj_id = $depan. '-' .$tengah. '-' .$belakang;
                
                // $depan = $request->get('tj_jenis');
                // $tengah = $request->get('tj_tanggal');
                // $belakang = $request->get('tj_noTransaksi');
                // $tj_id = $depan . '-' . $tengah . '-' . $belakang;
                $transaksi_juals = new transaksi_jual;
                $detail_services= new detail_service;
                $transaksi_juals->tj_subtotal_jasa = $transaksi_juals->tj_subtotal_jasa+$detail_services->subSV;
                $detail_spareparts= new detail_sparepart;
                $transaksi_juals->tj_subtotal_spareparts = $transaksi_juals->tj_subtotal_spareparts+$detail_spareparts->subSP;
               
                $transaksi_juals->tj_nama=$request->get('tj_nama');
                $transaksi_juals->tj_telepon=$request->get('tj_telepon');
                // $transaksi_juals->tj_tanggal=$request->get('tj_tanggal');
                $transaksi_juals->tj_tanggal=Carbon::now()->setTimezone('Asia/Jakarta')->format('ymd');

                $transaksi_juals->cab_id=$request->get('cab_id');
                $transaksi_juals->tb_status=$request->get('tb_status');
                $transaksi_juals->tj_id= $tj_id;
                $transaksi_juals->tj_subtotal_jasa=0;
                $transaksi_juals->tj_subtotal_spareparts=0;
                $transaksi_juals->tj_jumlah= $detail_services->tj_subtotal_jasa+$detail_spareparts->tj_subtotal_spareparts;
                // pegawaikerja
                $transaksi_juals->id_cs=$request->get('id_cs');
                $transaksi_juals->id_montir=$request->get('id_montir');
                $transaksi_juals->id_montir2=$request->get('id_montir2');
                $transaksi_juals->save();
                // $detail_services->tj_id=$transaksi_penjualans->tj_id;
                // $detail_spareparts->tj_id=$transaksi_penjualans->tj_id;
                // $detail_motors->tj_id=$transaksi_penjualans->tj_id;
                return redirect('/penjualanTampil');  
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   
    public function show($tj_id)
    {
        try {
            $transaksi_juals=transaksi_jual::find($tj_id);
            $response = $this->generateItem($transaksi_juals);
            return $this->sendResponse($response);
            return view('penjualanTampilSemua',compact('transaksi_jual'));
        } catch (ModelNotFoundException $e) {
            return $this->sendNotFoundResponse('Pengadaan Tidak Ada');
        } catch (\Exception $e) {
            return $this->sendIseResponse($e->getMessage());
        }
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function updateMotor(Request $request, $dm_id)
    {

        $detail_motors=detail_motor::find($dm_id);    
        $detail_motors->dm_status=$request->get('dm_status');
        $detail_motors->save();
        // return redirect('penjualanTampilDetailMotor')->with('success', 'Data Pengadaan telah diEdit'); 
         return redirect()->action('PenjualanController@tampilDetailMotor', ['tj_id' => $detail_motors->tj_id]); 
    }
    public function updateService(Request $request, $ds_id)
    {

        $detail_services=detail_service::find($ds_id);    
        $detail_services->ds_id=$request->get('ds_id');
        $detail_services->save();
        return redirect('penjualanTampilDetailService')->with('success', 'Data Pengadaan telah diEdit'); 
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyService($ds_id)
    {   
            try {
                $detail_services=detail_service::find($ds_id);
                $detail_services->delete();
                return redirect('/penjualanTampiService');
                return response()->json('Success',200);
            } catch (ModelNotFoundException $e) {
                return $this->sendNotFoundResponse('Penjualan Tidak Ditemukan');
            } catch (\Exception $e) {
                return $this->sendIseResponse($e->getMessage());
            }
       
    }
      public function destroySparepart($dsp_id)
    {   
            try {
                $detail_spareparts=detail_sparepart::find($dsp_id);
                $detail_spareparts->delete();
                return redirect('/penjualanTampilSparepart');
                return response()->json('Success',200);
            } catch (ModelNotFoundException $e) {
                return $this->sendNotFoundResponse('Penjualan Tidak Ditemukan');
            } catch (\Exception $e) {
                return $this->sendIseResponse($e->getMessage());
            }
       
    }
/*public function destroyMotor($dm_id)
    {   
            try {
                $detail_motors=detail_motor::find($dm_id);
                $detail_motors->delete();
                return redirect('/penjualanTampilMotor');
                return response()->json('Success',200);
            } catch (ModelNotFoundException $e) {
                return $this->sendNotFoundResponse('Penjualan Tidak Ditemukan');
            } catch (\Exception $e) {
                return $this->sendIseResponse($e->getMessage());
            }
       
    }*/
}
