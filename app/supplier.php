<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class supplier extends Model
{
    protected $table = 'suppliers';
    protected $primaryKey = 'su_id';
    public $timestamps = true;
    protected $fillable = [
    'su_nama',
    'su_telepon',
    'su_namaSales',
    'su_teleponSales',
    ];

    public function sparepart(){
        return $this->hasMany('App\sparepart','sp_id');
    }
    public function transaksi_pengadaan(){
        return $this->hasMany('App\transaksi_pengadaan','ta_id');
    }
}
