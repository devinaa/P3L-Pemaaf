<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class motor extends Model
{
   protected $table = 'motors';
   protected $primaryKey = 'mtr_id';
   public $timestamps = true;
   protected $fillable = [
       'mtr_merk',
       'mtr_tipe',];
    // public function transaksi_jual(){
    //     return $this->belong('App\transaksi_jual','tj_id');
    // }
}
