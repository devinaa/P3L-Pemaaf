<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\detailSparepartMotor;

class DetailSparepartMotorTransformer extends TransformerAbstract
{
    /**
     * Transform Jasa.
     *
     * @param jasa $jasas
     */
    public function transform(detailSparepartMotor $detail_sparepart_motors)
    {
        return [
            'dsm_id' => $detail_sparepart_motors->dsm_id,
            'sp_id' => $detail_sparepart_motors->sp_id,
            'mtr_id' => $detail_sparepart_motors->mtr_id
        ];
    }
}