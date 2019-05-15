<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class detail_sparepart extends Model
{
    protected $table = 'detail_spareparts';
    protected $primaryKey = 'dsp_id';
    public $timestamps = true;
    protected $fillable = [
        'sp_id',
        'tj_id',
        'ds_jumlah',
        ];

    public function sparepart(){
        return $this->belongsTo('App\sparepart','sp_id');
    }
    public function transaksi_jual(){
        return $this->belongsTo('App\transaksi_jual','tj_id');
    }
}
