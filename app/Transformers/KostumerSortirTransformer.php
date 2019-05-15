<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\sparepart;

class KostumerSortirTransformer extends TransformerAbstract
{
    public function transform(sparepart $spareparts)
    {
        return [
            'sp_id' => $spareparts->sp_id,
            'sp_nama'=> $spareparts->sp_nama,
            'sp_tipe' => $spareparts->sp_tipe,
            'sp_hargaJual' => $spareparts->sp_hargaJual,
            'sp_stok' => $spareparts->sp_stok,
            'sp_gambar' => $spareparts->sp_gambar,
            'sp_merk' => $spareparts->sp_merk
        ];
    }
}