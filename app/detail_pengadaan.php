<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class detail_pengadaan extends Model
{
    protected $table = 'detail_pengadaans';
    protected $primaryKey = 'dpgd_id';
    public $timestamps = true;
    protected $fillable = [
        'ta_id',
        'sp_id',
        'dpgd_satuan',
        'dpgd_jumlah'
        ];
}
