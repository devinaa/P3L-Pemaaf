<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\cabang;

class CabangTransformer extends TransformerAbstract
{
    /**
     * Transform Cabang.
     *
     * @param cabang $branch
     */
    public function transform(cabang $cabangs)
    {
        return [
            'cab_id' => $cabangs->cab_id,
            'cab_nama' => $cabangs->cab_nama,
            'cab_alamat' => $cabangs->cab_alamat,
            'cab_telepon' => $cabangs->cab_telepon,
            'cab_web' => $cabangs->cab_web
        ];
    }
}
