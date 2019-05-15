<?php

namespace App\Http\Controllers;

use Validator;
use DB;
use Illuminate\Http\Request;
use App\transaksi_pengadaan;
use Alert;
use App\sparepart;
use App\supplier;
use App\motor;
use App\detailSparepartMotor;
use App\detail_pengadaan;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Providers\SweetAlertServiceProvider;
use App\Transformers\PengadaanTransformer;

class PengadaanController extends RestController
{
     protected $transformer = PengadaanTransformer::class;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    public function index()
    {
        $transaksi_pengadaans = transaksi_pengadaan::all();
        $response = $this->generateCollection($transaksi_pengadaans);
        return $this->sendResponse($response);
        
    }
     public function getSupportSparepart()
    {
        // ini utk dropdown
        $suppliers = supplier::all();
        $motors = motor::all();
        $spareparts = sparepart::all();
        $detail_sparepart_motors = detailSparepartMotor::all();
        return view('pengadaanInput', compact('suppliers','motors','spareparts','detail_sparepart_motors'));
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
        //  $transaksi_pengadaans = transaksi_pengadaan::when($request->ta_id, function ($query) use ($request) {
        //     $query->where('ta_id','like',"%{$request->ta_id}%");
        //     })->get();

        $transaksi_pengadaans = DB::table('transaksi_pengadaans')
            ->where('ta_id','like',"%{$request->ta_id}%") 
            ->join('suppliers', 'suppliers.su_id', '=', 'transaksi_pengadaans.su_id')
            ->get();
         return view('pengadaanTampil',['transaksi_pengadaans'=>$transaksi_pengadaans]);
         
    }
    public function tampilDetail($ta_id){
        //  $detail_pengadaans = detail_pengadaan::when($request->ta_id, function ($query) use ($request) {
        //     $query->where('ta_id','like',"%{$request->ta_id}%")
        //     ->join('spareparts', 'spareparts.sp_id', '=', 'detail_pengadaans.sp_id');
        //     })->get();

        $detail_pengadaans = DB::table('detail_pengadaans')
                                ->where('ta_id','like',"%{$ta_id}%") 
                                ->join('spareparts', 'spareparts.sp_id', '=', 'detail_pengadaans.sp_id')
                                ->get();
            // return response()->json($detail_pengadaans, 200);   
         return view('pengadaanTampilDetailTransaksi',['detail_pengadaans'=>$detail_pengadaans]);
         
    }
    public function cari($ta_id){
        if(Session::get('login')){
            $transaksi_pengadaans = DB::table('transaksi_pengadaans')->where('ta_id','like',"%".$ta_id."%")->first();
            return view('pengadaanEdit ',compact('transaksi_pengadaans'));
            return redirect('pengadaanTampil');
        }
        else {
            return view('home');
        }
    }
    
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
         $validator = Validator::make($request->all(), [
                'su_id' => 'required',
                'sp_id' => 'required',
                'dpgd_jumlah' => 'required|numeric|same:dpgd_satuan',
                'ta_tanggal' => 'required',
                'ta_status'
            ]);  
             if ($validator->fails())
            {
                return response()->json(['errors'=>$validator->errors()->all()]);
            }      
                $detail_pengadaans = new detail_pengadaan;
                // $spareparts= sparepart::find($request->sp_id);
                // $spareparts->sp_stok = $spareparts->sp_stok+$request->dpgd_jumlah;
                // $spareparts->save();
                
                $ta_status=$request->get('ta_status');
                $transaksi_pengadaans = new transaksi_pengadaan;
                $transaksi_pengadaans->su_id=$request->get('su_id');
                $transaksi_pengadaans->ta_tanggal=$request->get('ta_tanggal');
                $transaksi_pengadaans->ta_status=$request->get('ta_status');
                $transaksi_pengadaans->save();
                $detail_pengadaans->ta_id=$transaksi_pengadaans->ta_id;
                $detail_pengadaans->sp_id=$request->get('sp_id');
                // $detail_pengadaans->ta_status=$ta_status;

                $detail_pengadaans->dpgd_satuan=$request->get('dpgd_satuan');
                $detail_pengadaans->dpgd_jumlah=$request->get('dpgd_jumlah');
                $detail_pengadaans->save();
                
                return redirect('pengadaanTampil');  
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   
    public function show($dpgd_id)
    {
        try {
            $detail_pengadaans=detail_pengandaan::find($dpgd_id);
            $response = $this->generateItem($detail_pengadaans);
            return $this->sendResponse($response);
            return view('pengadaanTampil',compact('detail_pengadaans'));
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
    
    public function update(Request $request, $ta_id)
    {

        $transaksi_pengadaans=transaksi_pengadaan::find($ta_id);    
        $transaksi_pengadaans->ta_status=$request->get('ta_status');
        $transaksi_pengadaans->save();
        return redirect('pengadaanTampil')->with('success', 'Data Pengadaan telah diEdit'); 
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($ta_id)
    {   
            try {
                // $transaksi_pengadaans=transaksi_pengadaan::find($ta_id);
                // $detail_pengadaans=detail_pengadaan::find($ta_id);
                // $spareparts= sparepart::find($sp_id);
                // $spareparts->sp_stok = $spareparts->sp_stok-$detail_pengadaans->dpgd_jumlah;
                // $spareparts->save();
                // $detail_pengadaans->delete();
                // $transaksi_pengadaans->delete();
                $transaksi_pengadaans=transaksi_pengadaan::find($ta_id);
                $transaksi_pengadaans->delete();
                return redirect('/pengadaanTampil');
                return response()->json('Success',200);
            } catch (ModelNotFoundException $e) {
                return $this->sendNotFoundResponse('Pengadaan Tidak Ditemukan');
            } catch (\Exception $e) {
                return $this->sendIseResponse($e->getMessage());
            }
       
    }
    public function destroy2($dpgd_id)
    {   
            try {
                // $transaksi_pengadaans=transaksi_pengadaan::find($ta_id);
                // $detail_pengadaans=detail_pengadaan::find($ta_id);
                // $spareparts= sparepart::find($sp_id);
                // $spareparts->sp_stok = $spareparts->sp_stok-$detail_pengadaans->dpgd_jumlah;
                // $spareparts->save();
                // $detail_pengadaans->delete();
                // $transaksi_pengadaans->delete();
                $detail_pengadaans=detail_pengadaan::find($dpgd_id);
                $detail_pengadaans->delete();
                return redirect('/pengadaanTampil');
                return response()->json('Success',200);
            } catch (ModelNotFoundException $e) {
                return $this->sendNotFoundResponse('Pengadaan Tidak Ditemukan');
            } catch (\Exception $e) {
                return $this->sendIseResponse($e->getMessage());
            }
       
    }
}
