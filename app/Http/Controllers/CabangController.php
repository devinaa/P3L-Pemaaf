<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\cabang;
use Alert;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Providers\SweetAlertServiceProvider;
use App\Transformers\CabangTransformer;

class CabangController extends RestController
{
     protected $transformer = CabangTransformer::class;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cabangs = cabang::all();
        $response = $this->generateCollection($cabangs);
        return $this->sendResponse($response);
        
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
        if(Session::get('login')){
         $cabangs = cabang::when($request->cab_nama, function ($query) use ($request) {
                $query->where('cab_nama','like',"%{$request->cab_nama}%");
            })->get();
         return view('cabangTampil',['cabangs'=>$cabangs]);
        }
        else {
            return view('home');
        }
         
    }
    public function cari($cab_id){
        if(Session::get('login')){
            $cabangs = DB::table('cabangs')->where('cab_id','like',"%".$cab_id."%")->first();
            return view('cabangEdit ',compact('cabangs'));
            return redirect('cabangTampil');
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
        if(!Session::get('login')){
             $validator = Validator::make($request->all(), [
                'cab_nama' => 'required',
                'cab_alamat' => 'required',
                'cab_telepon' => 'required|regex:/(08)[0-9]{9}/',
                'cab_web' => 'required',

            ]);
            if ($validator->fails())
            {
                return response()->json(['errors'=>$validator->errors()->all()]);
                // return redirect('/pgwInput')->withInput()->withErrors($validator);
                //  return redirect('/pgwTampil')->with(['error' => $validator->getMessage()]);
            }  
            try {
                $cabangs = new cabang;
                $cabangs->cab_nama=$request->get('cab_nama');
                $cabangs->cab_alamat=$request->get('cab_alamat');
                $cabangs->cab_telepon=$request->get('cab_telepon');
                $cabangs->cab_web=$request->get('cab_web');
                $cabangs->save();
                alert()->success('Data telah ditambahkan','Berhasil')->persistent('Close');
                Alert::message('Data telah ditambahkan','Berhasil');
                return redirect('cabangTampil');
                
  
            } catch (\Throwable $th) {
                return redirect()->back()->with('alert','hello');
            }
           
        }
        else {
            
            return view('home');
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   
    public function show($cab_id)
    {
        try {
            $cabangs=cabang::find($cab_id);
            $response = $this->generateItem($cabangs);
            return $this->sendResponse($response);
            return view('cabangTampil',compact('cabangs'));
        } catch (ModelNotFoundException $e) {
            return $this->sendNotFoundResponse('Cabang Tidak Ada');
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
    public function edit($cab_id)
    {
        $cabang = cabang::find($cab_id);
        return view('edit',compact('cabang','cab_id'));  
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $cab_id)
    {
        if(!Session::get('login')){
            $cabangs=cabang::find($cab_id);
            $cabangs->cab_nama=$request->get('cab_nama');
            $cabangs->cab_alamat=$request->get('cab_alamat');
            $cabangs->cab_telepon=$request->get('cab_telepon');
            $cabangs->cab_web=$request->get('cab_web');
            $cabangs->save();
            return redirect('cabangTampil')->with('success', 'Data Cabang telah diEdit');  
        }
        else {
            return view('home');
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($cab_id)
    {   
        if(!Session::get('login')){
            try {
                $cabangs=cabang::find($cab_id);
                $cabangs->delete();
                return redirect('/cabangTampil');
                return response()->json('Success',200);
            } catch (ModelNotFoundException $e) {
                return $this->sendNotFoundResponse('Cabang Tidak Ditemukan');
            } catch (\Exception $e) {
                return $this->sendIseResponse($e->getMessage());
            }
        }
        else {
            return view('home');
        }
    }
}
