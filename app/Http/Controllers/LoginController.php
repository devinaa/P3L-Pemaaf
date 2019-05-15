<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use App\pegawai;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class LoginController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request){
        
        $dataPegawai= pegawai::where('pgw_username', $request->pgw_username)->where('pgw_password',$request->pgw_password)->first();
        if($dataPegawai){
            //login berhasil untuk pegawai
                Session::put('pgw_id',$dataPegawai->pgw_id);
                Session::put('pgw_username',$dataPegawai->pgw_username);
                Session::put('pgw_password',$dataPegawai->pgw_password);
                Session::put('login',TRUE);
                return redirect('/homepegawai');
            //guard pegawai diambil dari auth.php
        }
        else{
            //gagal login

            return "login gagal";
            return redirect('/');
            
        }
      
        
    }
    function logout(){
         Session::put('login',FALSE);
         Session::flush();
         return redirect('/');
    }
}
