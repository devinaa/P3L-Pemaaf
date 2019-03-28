<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class detail_motor extends Model
{
    protected $table = 'detail_motors';
    protected $primaryKey = 'dm_id';
    public $timestamps = true;
    protected $fillable = [
        'tj_id',
        'dm_plat',
        'mtr_id',
        'dm_status',
        ];
}
