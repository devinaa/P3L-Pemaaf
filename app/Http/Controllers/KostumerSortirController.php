<?php

namespace App\Http\Controllers;
use DB;
use Form;
use Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\sparepart;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Transformers\KostumerSortirTransformer;

class KostumerSortirController extends RestController
{
    public function tampil(Request $request){
        $spareparts = sparepart::when($request->sp_nama, function ($query) use ($request) {
            $query->where('sp_nama','like',"%{$request->sp_nama}%")->join('detail_sparepart_motors', 'detail_sparepart_motors.sp_id', '=', 'spareparts.sp_id')
                    ->join('motors', 'motors.mtr_id', '=', 'detail_sparepart_motors.sp_id');
        })->sortable()->get();
        return view('kostumerSortir',['spareparts'=>$spareparts]);

    }
    public function tampilTable(Request $request){
        // $spareparts = DB::table('spareparts')
        //             ->join('detail_sparepart_motors', 'detail_sparepart_motors.sp_id', '=', 'spareparts.sp_id')
        //             ->join('motors', 'motors.mtr_id', '=', 'detail_sparepart_motors.sp_id')->get();
        $spareparts = sparepart::when($request->sp_nama, function ($query) use ($request) {
            $query->where('sp_nama','like',"%{$request->sp_nama}%")->join('detail_sparepart_motors', 'detail_sparepart_motors.sp_id', '=', 'spareparts.sp_id')
                    ->join('motors', 'motors.mtr_id', '=', 'detail_sparepart_motors.sp_id');
        })->sortable()->get();

        return view('kostumerSortir',['spareparts'=>$spareparts]);
    }
    public function cari($sp_id){
        $spareparts = DB::table('spareparts')->where('sp_id','like',"%".$sp_id."%")->first();
        return view('kostumerSortir ',compact('spareparts'));
        return redirect('kostumerSortir');
    }
}
