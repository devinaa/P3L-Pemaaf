<?php

namespace App\Http\Controllers;

use Validator;
use DB;
use Illuminate\Http\Request;
use App\jasa;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Transformers\JasaTransformer;

class JasaController extends RestController
{
     protected $transformer = JasaTransformer::class;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jasas = jasa::all();
        $response = $this->generateCollection($jasas);
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
    public function tampil(Request $request){
        if(Session::get('login')){
            $jasas = jasa::when($request->jasa_nama, function ($query) use ($request) {
                $query->where('jasa_nama','like',"%{$request->jasa_nama}%");
            })->get();
            return view('jasaTampil',['jasas'=>$jasas]);
        }
        else {
            return view('home');
        }
    }
    public function cari($jasa_id){
        if(Session::get('login')){
            $jasas = DB::table('jasas')->where('jasa_id','like',"%".$jasa_id."%")->first();
            return view('jasaEdit ',compact('jasas'));
            return redirect('jasaTampil');
        }
        else {
            return view('home');
        }
    }
    public function store(Request $request)
    {
        if(!Session::get('login')){
              
            $validator = Validator::make($request->all(), [
               'jasa_harga' => 'required|regex:/^\d+(\.\d{1,2})?$/',
               'jasa_nama' => 'required',
            ]);
            if ($validator->fails())
            {
                return response()->json(['errors'=>$validator->errors()->all()]);
                // return redirect('/pgwInput')->withInput()->withErrors($validator);
                //  return redirect('/pgwTampil')->with(['error' => $validator->getMessage()]);
            }    
            $jasas = new jasa;
            $jasas->jasa_harga=$request->get('jasa_harga');
            $jasas->jasa_nama=$request->get('jasa_nama');
            $jasas->save();
            return redirect('jasaTampil')->with('success', 'Data Jasa telah diinput');   
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
    public function show($jasa_id)
    {
        try {
            $jasas=jasa::find($jasa_id);
            $response = $this->generateItem($jasas);
            return $this->sendResponse($response);
        } catch (ModelNotFoundException $e) {
            return $this->sendNotFoundResponse('Jasa Tidak Ada');
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
    public function edit($jasa_id)
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
    public function update(Request $request, $jasa_id)
    {
        if(!Session::get('login')){
            try {
                $jasas=jasa::find($jasa_id);
                $jasas->jasa_harga=$request->get('jasa_harga');
                $jasas->jasa_nama=$request->get('jasa_nama');
                $jasas->save();
                return redirect('jasaTampil')->with('success', 'Data Jasa telah diedit');   
            }catch (ModelNotFoundException $e) {
                return $this->sendNotFoundResponse('Jasa Tidak Ditemukan');
            }
            catch (\Exception $e) {
                return $this->sendIseResponse($e->getMessage());
            }
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
    public function destroy($jasa_id)
    {
        if(!Session::get('login')){
            try {
                $jasas=jasa::find($jasa_id);
                $jasas->delete();
                return redirect('jasaTampil');   
                return redirect('jasaTampil')->response()->json('Success',200);
            } catch (ModelNotFoundException $e) {
                return $this->sendNotFoundResponse('Jasa Tidak Ditemukan');
            } catch (\Exception $e) {
                return $this->sendIseResponse($e->getMessage());
            }
        }
        else {
            return view('home');
        }
    }
}
