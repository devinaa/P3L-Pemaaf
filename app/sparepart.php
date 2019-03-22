<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sparepart extends Model
{
    protected $table = 'spareparts';
    protected $primaryKey = 'sp_id';
    public $timestamps = true;
    protected $fillable = [
    'sp_nama',
    'sp_tipe',
    'sp_hargaBeli',
    'sp_hargaJual',
    'sp_minStok',
    'sp_stok',
    'sp_gambar',
    ];
}
