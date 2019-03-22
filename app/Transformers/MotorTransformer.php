<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\motor;

class MotorTransformer extends TransformerAbstract
{
    /**
     * Transform Motor.
     *
     * @param motor $motors
     */
    public function transform(motor $motors)
    {
        return [
            'mtr_id' => $motors->mtr_id,
            'mtr_merk' => $motors->mtr_merk,
            'mtr_tipe' => $motors->mtr_tipe
        ];
    }
}