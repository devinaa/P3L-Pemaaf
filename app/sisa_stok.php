<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sisa_stok extends Model
{
    protected $table = 'sisa_stoks';
    protected $primaryKey = 'sisa_id';
    public $timestamps = true;
    protected $fillable = [
    'sisa_jumlah',
    'sp_id',
    'sisa_tanggal',
    'sp_id'
    ];
     public function spareparts(){
        return $this->hasMany('App\sparepart','sp_id');
    }
}
