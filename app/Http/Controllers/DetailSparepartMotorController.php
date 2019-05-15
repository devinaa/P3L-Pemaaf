<?php

namespace App\Http\Controllers;

use DB;
use Form;
use Validator;
use Illuminate\Http\Request;
use App\detailSparepartMotor;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Transformers\DetailSparepartMotorTransformer;

class DetailSparepartMotorController extends RestController
{
    protected $transformer = DetailSparepartMotorTransformer::class;
    public function tampil(Request $request){
         $detail_sparepart_motors = detailSparepartMotor::when($request->sp_id, function ($query) use ($request) {
                $query->where('sp_id','like',"%{$request->sp_id}%");
            })->get();
         return view('detailSparepartMotor',['detail_sparepart_motors'=>$detail_sparepart_motors]);
        
    }
}
