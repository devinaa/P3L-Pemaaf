<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable; 
class sparepart extends Model
{

    use Sortable;
    public $sortable = ['sp_hargaJual','sp_stok'];
    protected $guarded = [];
    protected $table = 'spareparts';
    protected $primaryKey = 'sp_id';
    public $timestamps = true;
    protected $fillable = [
    'sp_nama',
    'sp_tipe',
    'sp_hargaBeli',
    'sp_hargaJual',
    'sp_kodeLetak',
    'sp_minStok',
    'sp_stok',
    'sp_merk',
    'sp_gambar',
    'su_id',
    ];
     public function sisa_stok(){
        return $this->hasMany('App\sisa_stok','sisa_id');
    }
    public function supllier(){
        return $this->belongsTo('App\supplier','su_id');
    }
    public function motor(){
        return $this->belongsToMany('App\motor','detail_sparepart_motors','sp_id','mtr_id');
    }
    public function detail_sparepart(){
        return $this->hasMany('App\detail_sparepart','dsp_id');
    }
    public function detail_pengadaan(){
        return $this->hasMany('App\detail_pengadaan','dpgd_id');
    }
}
