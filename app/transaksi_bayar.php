<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class transaksi_bayar extends Model
{
   protected $table = 'transaksi_bayars';
   protected $primaryKey = 'tb_id';
   public $timestamps = true;
   protected $fillable = [
       'cab_id',
       'tb_diskon',
       'pgw_id',
       'tj_id', 
       'tb_status',
   ];
   public function pegawaikerja(){
        return $this->belongsTo('App\pegawaikerja','id');
    }
    public function transaksi_jual(){
        return $this->belongsTo('App\transaksi_jual','tj_id');
    }
}
