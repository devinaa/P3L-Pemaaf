<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class detailSparepartMotor extends Model
{
    protected $table = 'detail_sparepart_motors';
    protected $primaryKey = 'dsm_id';
    public $timestamps = true;
    protected $fillable = [
    'sp_id',
    'mtr_id'
    ];
     
}
