<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\sparepart;

class SparepartTransformer extends TransformerAbstract
{
    /**
     * Transform Sparepart.
     *
     * @param sparepart $sparepart
     */
    public function transform(sparepart $spareparts)
    {
        return [
            'sp_id',
            'sp_nama',
            'sp_tipe',
            'sp_hargaBeli',
            'sp_hargaJual',
            'sp_minStok',
            'sp_stok',
            'sp_gambar',
            'sisa_stok'
        ];
    }
}