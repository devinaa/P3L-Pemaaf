<?php

namespace App\Http\Controllers;

use Validator;
use DB;
use Illuminate\Http\Request;
use App\supplier;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Transformers\SupplierTransformer;

class SupplierController extends RestController
{
     protected $transformer = SupplierTransformer::class;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suppliers = supplier::all();
        $response = $this->generateCollection($suppliers);
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
         
         $suppliers = supplier::when($request->su_nama, function ($query) use ($request) {
                $query->where('su_nama','like',"%{$request->su_nama}%");
            })->get();
         return view('supplierTampil',['suppliers'=>$suppliers]);
    }
    public function cari($su_id){
		$suppliers = DB::table('suppliers')->where('su_id','like',"%".$su_id."%")->first();
        return view('supplierEdit ',compact('suppliers'));
        return redirect('supplierTampil');
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'su_nama' => 'required',
            'su_alamat' => 'required',
            'su_telepon' => 'required|regex:/(08)[0-9]{9}/',
            'su_namaSales' => 'required',
            'su_teleponSales' => 'required|regex:/(08)[0-9]{9}/'
        ]);
        if ($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()->all()]);
            // return redirect('/pgwInput')->withInput()->withErrors($validator);
            //  return redirect('/pgwTampil')->with(['error' => $validator->getMessage()]);
        }    
                    $suppliers = new supplier;
                    $suppliers->su_nama=$request->get('su_nama');
                    $suppliers->su_telepon=$request->get('su_telepon');
                    $suppliers->su_alamat=$request->get('su_alamat');
                    $suppliers->su_namaSales=$request->get('su_namaSales');
                    $suppliers->su_teleponSales=$request->get('su_teleponSales');
                    $suppliers->save();
                    return redirect('supplierTampil')->with('success', 'Data Supplier telah diinput'); 
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($su_id)
    {
        try {
            $suppliers=supplier::find($su_id);
            $response = $this->generateItem($suppliers);
            return $this->sendResponse($response);
        } catch (ModelNotFoundException $e) {
            return $this->sendNotFoundResponse('Supplier Tidak Ada');
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
    public function edit($su_id)
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
    public function update(Request $request, $su_id)
    {
        
            try {
                $suppliers=supplier::find($su_id);
                $suppliers->su_nama=$request->get('su_nama');
                $suppliers->su_telepon=$request->get('su_telepon');
                $suppliers->su_alamat=$request->get('su_alamat');
                $suppliers->su_namaSales=$request->get('su_namaSales');
                $suppliers->su_teleponSales=$request->get('su_teleponSales');
                $suppliers->save();
                return redirect('supplierTampil')->with('success', 'Data Supplier telah diedit');
            }catch (ModelNotFoundException $e) {
                return $this->sendNotFoundResponse('Supplier Tidak Ditemukan');
            }
            catch (\Exception $e) {
                return $this->sendIseResponse($e->getMessage());
            }
    
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($su_id)
    {   
       
            try {
                $suppliers=supplier::find($su_id);
                $suppliers->delete();
                return redirect('/supplierTampil');
                // return response()->json('Success',200);
            } catch (ModelNotFoundException $e) {
                return $this->sendNotFoundResponse('Supplier Tidak Ditemukan');
            } catch (\Exception $e) {
                return $this->sendIseResponse($e->getMessage());
            }
        
        
    }
}
