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
    public function transaksi_jual(){
        return $this->belongsTo('App\transaksi_jual','tj_id');
    }
    public function sparepart(){
        return $this->belongsToMany('App\sparepart','detail_sparepart_motors','mtr_id','sp_id');
    }
    public function detail_motor(){
        return $this->hasMany('App\detail_motor','dm_id');
    }
}
