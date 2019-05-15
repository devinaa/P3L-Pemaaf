<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class detail_pengadaan extends Model
{
    protected $table = 'detail_pengadaans';
    protected $primaryKey = 'dpgd_id';
    public $timestamps = true;
    protected $fillable = [
        'sp_id',
        'dpgd_satuan',
        'dpgd_jumlah'
        ];
        public function sparepart(){
        return $this->belongsTo('App\sparepart','sp_id');
        }
        public function transaksi_pengadaan(){
            return $this->belongsTo('App\transaksi_pengadaan','ta_id');
        }
}
