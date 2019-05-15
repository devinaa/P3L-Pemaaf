<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pegawai extends Model
{
    protected $table = 'pegawais';
    protected $primaryKey = 'pgw_id';
    public $timestamps = true;
    protected $fillable = [
    'pgw_nama',
    'pgw_alamat',
    'pgw_gaji',
    'pgw_telepon',
    'pgw_jabatan',
    'pgw_username',
    'pgw_password',
    'cab_id',
    ];

    public function cabangs(){
        return $this->belongsTo('App\cabang','cab_id');
    }
    public function transaksi_bayars(){
        return $this->belongsToMany('App\transaksi_bayar','pegawaikerjas','pgw_id','tb_id');
    }
     public function pegawaikerja(){
        return $this->belongsTo('App\pegawaikerja','id');
    }
}
