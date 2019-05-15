<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pegawaikerja extends Model
{
    protected $table = 'pegawaikerjas';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = [
       'pgw_id',
       'tb_id',];
    public function pegawai(){
        return $this->hasMany('App\pegawai','pgw_id');
    }
    public function transaksi_jual(){
        return $this->hasMany('App\transaksi_jual','ta_id');
    }
    public function transaksi_bayar(){
        return $this->hasMany('App\transaksi_bayar','tb_id');
    }
}
