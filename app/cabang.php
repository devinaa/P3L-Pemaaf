<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cabang extends Model
{
   protected $table = 'cabangs';
   protected $primaryKey = 'cab_id';
   public $timestamps = true;
   protected $fillable = [
       'cab_nama',
       'cab_alamat',
       'cab_telepon',
       'cab_web',
    ];
    public function pegawai(){
        return $this->hasMany('App\pegawai','cab_id');
    }
    public function transaksi_jual(){
        return $this->belongsTo('App\transaksi_jual','tj_id');
    }
}
