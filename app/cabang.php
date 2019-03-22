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
       'cab_web',];
    public function pegawais(){
        return $this->hasMany('App\pegawai','pgw_id');
    }
}
