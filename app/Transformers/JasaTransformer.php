<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\jasa;

class JasaTransformer extends TransformerAbstract
{
    /**
     * Transform Jasa.
     *
     * @param jasa $jasas
     */
    public function transform(jasa $jasas)
    {
        return [
            'jasa_id' => $jasas->jasa_id,
            'jasa_nama' => $jasas->jasa_nama,
            'jasa_harga' => $jasas->jasa_harga
        ];
    }
}