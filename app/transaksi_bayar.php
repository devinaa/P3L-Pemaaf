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
   ];
   public function pegawais(){
        return $this->hasMany('App\pegawai','pgw_id');
    }
    
}
