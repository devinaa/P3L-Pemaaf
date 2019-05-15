<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class transaksi_pengadaan extends Model
{
    protected $table = 'transaksi_pengadaans';
    protected $primaryKey = 'ta_id';
    public $timestamps = true;
    protected $fillable = [
        'su_id',
        'ta_tanggal',
        'surat_status'

    ];
    public function supllier(){
        return $this->belongsTo('App\supplier','su_id');
    }
    public function detail_pengadaan(){
        return $this->hasMany('App\detail_pengadaan','ta_id');
    }
}
