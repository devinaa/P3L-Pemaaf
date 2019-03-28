<?php

namespace App\Http\Controllers;
use App\pegawai;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    function login(Request $send){
        $dataPegawai= pegawai:: where('pgw_username', $send->pgw_username)->where('pgw_password',$send->pgw_password)->get();
        
        if(count($dataPegawai)>0){
            //login berhasil untuk pegawai
            Auth::guard('pegawai')->loginUsingId($dataPegawai[0]['pgw_id']);
            return redirect('/homepegawai');

            //guard pegawai diambil dari auth.php
        }
        else{
            //gagal login
            return "login gagal";
        }
    }
    function logout(){
        if(Auth::guard('pegawai')->check()){
            Auth::guard('pegawai')->logout();
        }
         return redirect('/home');
    }
}
