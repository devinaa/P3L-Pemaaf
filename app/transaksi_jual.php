<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class transaksi_jual extends Model
{
    protected $table = 'transaksi_juals';
    protected $primaryKey = 'tj_id';
    public $timestamps = true;
    public $incrementing = false;
    protected $fillable = [
       'cab_id',
        'tj_tanggal',
        'tj_jumlah',
        'tj_subtotal_spareparts',
        'tj_subtotal_jasa',
        'tj_nama',
        'tj_telepon',
        'id_cs',
        'id_montir',
        'id_montir2',
        'tb_status',
    ];
    public function pegawaikerja(){
        return $this->belongsTo('App\pegawaikerja','id');
    }
    public function cabang(){
        return $this->belongsTo('App\cabang','cab_id');
    }
     public function detail_service(){
        return $this->hasMany('App\detail_service','ds_id');
    }
    public function detail_motor(){
        return $this->hasMany('App\detail_motor','dm_id');
    }
    public function detail_sparepart(){
        return $this->hasMany('App\detail_sparepart','ds_id');
    }
    public function transaksi_bayar(){
        return $this->belongsTo('App\transaksi_bayar','tb_id');
    }
}
