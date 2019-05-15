<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class detail_service extends Model
{
    protected $table = 'detail_services';
    protected $primaryKey = 'ds_id';
    public $timestamps = true;
    protected $fillable = [
        'jasa_id',
        'tj_id',
        'ds_jasa',
        'ds_jumlah',
        'subSV'
        ];
    public function jasa(){
        return $this->belongsTo('App\jasa','jasa_id');
    }
    public function transaksi_jual(){
        return $this->belongsTo('App\transaksi_jual','tj_id');
    }
}
