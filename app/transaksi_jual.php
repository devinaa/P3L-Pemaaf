<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class transaksi_jual extends Model
{
    protected $table = 'transaksi_juals';
    protected $primaryKey = 'tj_id';
    public $timestamps = true;
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
    ];
}
