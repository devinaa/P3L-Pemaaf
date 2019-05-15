<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class jasa extends Model
{
   protected $table = 'jasas';
   protected $primaryKey = 'jasa_id';
   public $timestamps = true;
   protected $fillable = [
       'jasa_nama',
       'jasa_harga',];
    public function detail_service(){
        return $this->hasMany('App\detail_service','ds_id');
    }
}
