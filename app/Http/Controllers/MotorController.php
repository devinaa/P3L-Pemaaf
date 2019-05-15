<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\motor;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Transformers\MotorTransformer;

class MotorController extends RestController
{
     protected $transformer = MotorTransformer::class;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $motors = motor::all();
        $response = $this->generateCollection($motors);
        return $this->sendResponse($response);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
            $this->validate($request,[
                'mtr_merk' => 'required',
                'mtr_tipe' => 'required',
            ]);   
            $motors = new motor;
            $motors->mtr_merk=$request->get('mtr_merk');
            $motors->mtr_tipe=$request->get('mtr_tipe');
            $motors->save();
            // $request->session()->flash('success', 'Data Sudah Disimpan!');
            // $request->session()->flash('alert-success', 'Motor was successful added!');
            // return redirect('motorTampil')->route('motor');
            return redirect('motorTampil')->with('success', 'Data Sudah Disimpan!');

        
    }
    public function tampil(Request $request){
         
         $motors = motor::when($request->mtr_merk, function ($query) use ($request) {
                $query->where('mtr_merk','like',"%{$request->mtr_merk}%");
            })->get();
         return view('motorTampil',['motors'=>$motors]);
    }
    public function cari($mtr_id){
       
            $motors = DB::table('motors')->where('mtr_id','like',"%".$mtr_id."%")->first();
            return view('motorEdit ',compact('motors'));
            return redirect('motorTampil');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($mtr_id)
    {
        try {
            $motors=motor::find($mtr_id);
            $response = $this->generateItem($motors);
            return $this->sendResponse($response);
        } catch (ModelNotFoundException $e) {
            return $this->sendNotFoundResponse('Motor Tidak Ada');
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
    public function edit($mtr_id)
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
    public function update(Request $request, $mtr_id)
    {
        $motors=motor::find($mtr_id);
        $motors->mtr_merk=$request->get('mtr_merk');
        $motors->mtr_tipe=$request->get('mtr_tipe');
        $motors->save();
        return redirect('motorTampil')->with('success', 'Data Motor telah diedit');   
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($mtr_id)
    {
        $motors=motor::find($mtr_id);
        $motors->delete();
        return redirect('motorTampil')->with('success', 'Data Motor berhasil dihapus');   
          
    }
}
