<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pegawai extends Model
{
    protected $table = 'pegawais';
    protected $primaryKey = '[pgw_id]';
    public $timestamps = true;
    protected $fillable = [
    'pgw_nama',
    'pgw_alamat',
    'pgw_gaji',
    'pgw_telepon',
    'pgw_jabatan',
    'pgw_username',
    'pgw_password',
    ];

   public function cabangs(){
        return $this->belongTo('App\cabang','cab_id');
    }
}
