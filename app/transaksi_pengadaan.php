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
        'ta_tanggal'
    ];
}
