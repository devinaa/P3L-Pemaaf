<?php

namespace App\Http\Controllers;

use Validator;
use DB;
use PDF;
use Alert;
use App\cabang;
use Illuminate\Http\Request;
use App\pegawai;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Transformers\PegawaiTransformer;

class PegawaiController extends RestController
{
     protected $transformer = PegawaiTransformer::class;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pegawais = pegawai::all();
        return view('pegawai',['pegawai'=>$pegawais]);
        // $response = $this->generateCollection($pegawais);
        // return $this->sendResponse($response);
    }
     public function cetak_pdf()
    {
    	$pegawais = pegawai::get();
 
    	$pdf = PDF::loadview('pegawai',compact('pegawais'));
        // return $pdf->stream();
        return $pdf->download('laporan-pegawai-pdf');
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
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getCabangs()
    {
        $cabangs = cabang::all();
        return view('pgwInput', compact('cabangs'));
    }
    public function store(Request $request)
    {
            $validator = Validator::make($request->all(), [
               
                'pgw_nama' => 'required',
                'pgw_alamat' => 'required',
                'pgw_gaji' => 'required|regex:/^\d+(\.\d{1,2})?$/',
                'pgw_telepon' => 'required|regex:/(08)[0-9]{9}/',
                'pgw_jabatan' => 'required',
                'pgw_username' => 'required|unique:pegawais',
                'pgw_password' => 'required',
                'cab_id' => 'required'

            ]);
            if ($validator->fails())
            {
                return response()->json(['errors'=>$validator->errors()->all()]);
                // return redirect('/pgwInput')->withInput()->withErrors($validator);
                //  return redirect('/pgwTampil')->with(['error' => $validator->getMessage()]);
            }
            // $this->validate($request,[
            //     'pgw_nama' => 'required',
            //     'pgw_alamat' => 'required',
            //     'pgw_gaji' => 'required',
            //     'pgw_telepon' => 'required',
            //     'pgw_jabatan' => 'required',
            //     'pgw_username' => 'required|unique:pegawais',
            //     'pgw_password' => 'required',
            //     'cab_id' => 'required'
            // ]);  
                // $pegawais = pegawai::where('pgw_username', '=', $request->get('pgw_username'))->first();
                // if ($pegawais === null) {
                // user doesn't exist
                    $pegawais = new pegawai;
                    $pegawais->pgw_nama=$request->get('pgw_nama');
                    $pegawais->pgw_alamat=$request->get('pgw_alamat');
                    $pegawais->pgw_gaji=$request->get('pgw_gaji');
                    $pegawais->pgw_telepon=$request->get('pgw_telepon');
                    $pegawais->pgw_jabatan=$request->get('pgw_jabatan');
                    $pegawais->pgw_username=$request->get('pgw_username');
                    $pegawais->pgw_password=$request->get('pgw_password');
                    $pegawais->cab_id=$request->get('cab_id');
                    $pegawais->save();
                    // Alert::success('Berhasil disimpan', 'Judul Pesan');
                    // Session::flash('flash_message','Data berhasil di simpan');
                    // session()->flash('status', 'Task was successful!');
                    return redirect('pgwTampil');
                    // >with(['success' => '<strong>' . $pegawais->pgw_nama . '</strong> Telah disimpan']);;
                    
                    // session()->flash('notif', 'Success to save');
                    // return redirect('pgwTampil');
                   
       
    }
    // public function messages()
    //     {
    //         return [
            
    //             'pgw_nama.required' => 'The name of your is required',
    //             'pgw_alamat.required' => 'The alamat  is required',
    //             'pgw_gaji.required' => 'The mobile number is already registered',
    //             'pgw_telepon.required' => 'The email address is required',
    //             'pgw_jabatan.email' => 'Please enter a valid email address',
    //             'pgw_username.unique' => 'The email ID you entered already exist',    
    //             'pgw_password.required' => 'Password Belum Dimasukkan',  
    //             'cab_id.required' => 'Please',
            
    //         ];
    //     }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   
    public function show($pgw_id)
    {
        try {
            $pegawais=pegawai::find($pgw_id);
            $response = $this->generateItem($pegawais);
            return $this->sendResponse($response);
            return view('pgwTampil',compact('pegawais'));
        } catch (ModelNotFoundException $e) {
            return $this->sendNotFoundResponse('Pegawai Tidak Ada');
        } catch (\Exception $e) {
            return $this->sendIseResponse($e->getMessage());
        }
    }
     public function tampil(Request $request){
    
         $pegawais = pegawai::when($request->pgw_nama, function ($query) use ($request) {
                $query->where('pgw_nama','like',"%{$request->pgw_nama}%");
            })->get();
        $cabangs = cabang::all();
         return view('pgwTampil',compact('pegawais','cabangs'));
        
    }
    public function cari($pgw_id){

        $pegawais = DB::table('pegawais')->where('pgw_id','like',"%".$pgw_id."%")->first();
        return view('pgwEdit ',compact('pegawais'));
        return redirect('pgwTampil');
      
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function edit($pgw_id)
    {
         if(!Session::get('login')){
            $pegawais = pegawais::find($pgw_id);
            return view('edit',compact('pegawais','pgw_id'));
        }
        else {
            return view('home');
        }
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $pgw_id)
    {
         if(!Session::get('login')){

            try {
                $pegawais=pegawai::find($pgw_id);
                $pegawais->pgw_nama=$request->get('pgw_nama');
                $pegawais->pgw_alamat=$request->get('pgw_alamat');
                $pegawais->pgw_gaji=$request->get('pgw_gaji');
                $pegawais->pgw_telepon=$request->get('pgw_telepon');
                $pegawais->pgw_jabatan=$request->get('pgw_jabatan');
                $pegawais->pgw_username=$request->get('pgw_username');
                $pegawais->pgw_password=$request->get('pgw_password');
                // $pegawais->cab_id=$request->get('cab_id');
                $pegawais->save();
                return redirect('pgwTampil')->with('success', 'Data Pegawai telah diEdit');  
                // $response = $this->generateItem($pegawais);
                // return $this->sendResponse($response, 201);
            }catch (ModelNotFoundException $e) {
                return $this->sendNotFoundResponse('Pegawai Tidak Ditemukan');
            }
            catch (\Exception $e) {
                return $this->sendIseResponse($e->getMessage());
            }
        }
        else {
            return view('home');
        }
    }
    public function updatePassword(Request $request, $pgw_id)
    {

            try {
                $pegawais=pegawai::find($pgw_id);
                $pegawais->pgw_password=$request->get('pgw_password');
                $pegawais->save();
                return redirect('pgwTampil')->with('success', 'Data Pegawai telah diEdit');  
            }catch (ModelNotFoundException $e) {
                return $this->sendNotFoundResponse('Pegawai Tidak Ditemukan');
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
    public function editPassword(Request $request, $pgw_id)
    {
        $pegawais=pegawai::find($pgw_id);
        $pegawais->pgw_password=$request->get('pgw_password');
        $pegawais->save();
        return redirect('pgwTampil')->with('success', 'Data Pegawai telah diinput'); 
    }
    public function destroy($pgw_id)
    {
        if(!Session::get('login')){
            try {
                $pegawais=pegawai::find($pgw_id);
                $pegawais->delete();
                return redirect('/pgwTampil');
                return response()->json('Success',200);
            } catch (ModelNotFoundException $e) {
                return $this->sendNotFoundResponse('Pegawai Tidak Ditemukan');
            } catch (\Exception $e) {
                return $this->sendIseResponse($e->getMessage());
            }
        }
        else {
            return view('home');
        }
    }
}
