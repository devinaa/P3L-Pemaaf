<?php

namespace App\Http\Controllers;

use DB;
use Form;
use Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\sparepart;
use App\motor;
use App\supplier;
use App\sisa_stok;
use App\detailSparepartMotor;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Transformers\SparepartTransformer;
class SparepartController extends RestController
{
     protected $transformer = SparepartTransformer::class;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $path;
    public function index()
    {
        $spareparts = sparepart::with('motor')->sortable()->get();
        //  return view('sparepart.index')->withUsers($spareparts);
        return view('sparepart.index',compact('spareparts'));
    }
    
    public function tampilRiyawat(Request $request){
        $sisa_stoks = sisa_stok::with('spareparts')
            ->when($request->sp_nama, function ($query) use ($request) {
            $query->where('sp_nama','like',"%{$request->sp_nama}%")
            ->join('spareparts', 'sisa_stoks.sp_id', '=', 'spareparts.sp_id');
            })->sortable()->get();
        return view('riwayatSparepart', compact('sisa_stoks'));
        // return response()->json($sisa_stoks, 200);
    }
   
    public function cariRiwayat($sp_id){
        $sisa_stoks = DB::table('sisa_stoks')->where('sp_id','like',"%".$sp_id."%")->first();
        return view('riwayatSparepart ',compact('sisa_stoks'));
        return redirect('riwayatSparepart');
    }
    
    
    // INI utk dropdown
    public function getSupplierandMotor()
    {
        $suppliers = supplier::all();
        $motors = motor::all();
        return view('sparepartInput', compact('suppliers','motors'));
    }
    public function tampil(Request $request){
         $spareparts = sparepart::when($request->sp_nama, function ($query) use ($request) {
                $query->where('sp_nama','like',"%{$request->sp_nama}%");
            })->get();
         return view('sparepartTampil',['spareparts'=>$spareparts]);
        
    }
    public function cari($sp_id){
        
            $spareparts = DB::table('spareparts')->where('sp_id','like',"%".$sp_id."%")->first();
            return view('sparepartEdit ',compact('spareparts'));
            return redirect('sparepartTampil');
    
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'sp_nama' => 'required',
            'sp_tipe' => 'required',
            'sp_hargaBeli' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'sp_hargaJual' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'sp_minStok' => 'required',
            'sp_stok' => 'required',
            'sp_letak' => 'required',
            'sp_ruang' => 'required',
            'sp_noUrut' => 'required',
            'sp_merk' => 'required',
            'sp_gambar' => 'required|image|mimes:jpg,png,jpeg',
            'su_id' => 'required',
        ]);
        if ($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()->all()]);
        }     
        // if($validator->fails()) {
            //     return Redirect::back()->withErrors($validator);
            // }
            // $validator = Validator::make(sparepart::all(), $rules);

            // if ($validator->fails())
            // {
            //     return Redirect::to('sparepartInput')->withErrors($validator);
            // }
                    
            $depan = $request->get('sp_letak');
            $tengah = $request->get('sp_ruang');
            $belakang = $request->get('sp_noUrut');
            $sp_kodeLetak = $depan . '-' . $tengah . '-' . $belakang;
            

                $spareparts = new sparepart;

                if($request->hasfile('sp_gambar'))
                {
                    $file = $request->file('sp_gambar');
                    $name=time().$file->getClientOriginalName();
                    $file->move(public_path().'/images/', $name);
                    $spareparts->sp_gambar=$name;
                }
                else{
                    $spareparts->sp_gambar='';
                }
                
            if($request->sp_hargaBeli>$request->sp_hargaJual)
            {
                 return response()->json(['errors'=>$validator->errors()->all()]);
            }
                $spareparts->sp_nama=$request->get('sp_nama');
                $spareparts->sp_tipe=$request->get('sp_tipe');
                $spareparts->sp_hargaBeli=$request->get('sp_hargaBeli');
                $spareparts->sp_hargaJual=$request->get('sp_hargaJual');
                $spareparts->sp_minStok=$request->get('sp_minStok');
                $spareparts->sp_stok=$request->get('sp_stok');
                $spareparts->sp_kodeLetak=$sp_kodeLetak;
                $spareparts->sp_merk=$request->get('sp_merk');
                $spareparts->su_id=$request->get('su_id');
               
                $spareparts->save();
                $spareparts->motor()->attach($request->mtr_id);
                return redirect('sparepartTampil')->with('success', 'Data Sparepart telah diinput');   

    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($sp_id)
    {
        try {
            $spareparts=sparepart::find($sp_id);
            $response = $this->generateItem($spareparts);
            return $this->sendResponse($response);
        } catch (ModelNotFoundException $e) {
            return $this->sendNotFoundResponse('Sparepart Tidak Ada');
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
    public function edit($sp_id)
    {
        //
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $sp_id)
    {
                // UPDATE FOTONYA MASIH GAGAL
                // if ($request->hasFile('sp_gambar')) 
                // {
                    
                //     $file = $request->file('sp_gambar');
                //     $rules = array('file' => 'required|mimes:png,jpg,jpeg'); 
                //     $validator = \Illuminate\Support\Facades\Validator::make(array('file'=> $file), $rules);

                //     if($validator->passes()) 
                //     {
                //         $filename = $file->getClientOriginalName(); 
                //         $extension = $file -> getClientOriginalExtension();
                //         $name=time().$file->getClientOriginalName();
                //         $upload_success = $file->move(public_path(), $name);

                //         if($upload_success)
                //         {
                //             //if success, create thumb
                //             $request->file('sp_gambar')->move(public_path(), $name) ;
                //         }
                //     }

                //     $requestData['sp_gambar'] = "public_path()/{$name}";

                // }
                // else{
                //     $spareparts->sp_gambar='';
                // }
                



                $depan = $request->get('sp_letak');
                $tengah = $request->get('sp_ruang');
                $belakang = $request->get('sp_noUrut');
                $sp_kodeLetak = $depan . '-' . $tengah . '-' . $belakang;
                
                $spareparts=sparepart::find($sp_id);
                if ($request->hasFile('sp_gambar')) {
                    $dir = 'images/';
                    if ($spareparts->sp_gambar != '' && File::exists($dir . $spareparts->sp_gambar)){
                        $file = $request->file('sp_gambar');
                        $name=time().$file->getClientOriginalName();
                        $request->file('sp_gambar')->move($dir, $name);
                        $spareparts->sp_gambar = $name;
                    }
                   
                } 
                $mtr_id = json_decode($request->mtr_id); //ini dalam bentuk array
                $spareparts->sp_nama=$request->get('sp_nama');
                $spareparts->sp_tipe=$request->get('sp_tipe');
                $spareparts->sp_hargaBeli=$request->get('sp_hargaBeli');
                $spareparts->sp_hargaJual=$request->get('sp_hargaJual');
                $spareparts->sp_minStok=$request->get('sp_minStok');
                $spareparts->sp_stok=$request->get('sp_stok');
                // $spareparts->sp_kodeLetak=$sp_kodeLetak;
                $spareparts->sp_kodeLetak=$sp_kodeLetak;
                $spareparts->sp_merk=$request->get('sp_merk');
                // $spareparts->sp_gambar=$request->get('sp_gambar');
                $spareparts->su_id=$request->get('su_id');
                $spareparts->save();
                $spareparts->motor()->attach($mtr_id);
                return redirect('sparepartTampil')->with('success', 'Data Sparepart telah diinput');  
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($sp_id)
    {

        try {
                $spareparts=sparepart::find($sp_id);
                $spareparts->delete();
                return redirect('/sparepartTampil');
                return response()->json('Success',200);
            } catch (ModelNotFoundException $e) {
                return $this->sendNotFoundResponse('Sparepart Tidak Ditemukan');
            } catch (\Exception $e) {
                return $this->sendIseResponse($e->getMessage());
            }
       
    }

    
    
}
