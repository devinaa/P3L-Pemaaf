<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable; 

class sisa_stok extends Model
{
    use Sortable;
    protected $table = 'sisa_stoks';
    protected $primaryKey = 'sisa_id';
    public $sortable = ['sisa_jumlah'];
    public $timestamps = true;
    protected $fillable = [
    'sisa_jumlah',
    'sp_id',
    'sisa_tanggal',
    ];
     public function spareparts(){
        return $this->belongsTo('App\sparepart','sp_id');
    }
}
