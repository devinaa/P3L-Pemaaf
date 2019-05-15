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
            'sp_id' => $spareparts->sp_id,
            'sp_nama'=> $spareparts->sp_nama,
            'sp_tipe' => $spareparts->sp_tipe,
            'sp_hargaBeli' => $spareparts->sp_hargaBeli,
            'sp_hargaJual' => $spareparts->sp_hargaJual,
            'sp_minStok' => $spareparts->sp_minStok,
            'sp_stok' => $spareparts->sp_stok,
            'sp_gambar' => $spareparts->sp_gambar,
            'sp_kodeLetak' => $spareparts->sp_kodeLetak,
            'sp_merk' => $spareparts->sp_merk
        ];
    }
}