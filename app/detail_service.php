<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class detail_service extends Model
{
    protected $table = 'detail_services';
    protected $primaryKey = 'ds_id';
    public $timestamps = true;
    protected $fillable = [
        'jasa_id',
        'tj_id',
        'ds_jasa',
        'ds_jumlah'
        ];
}
