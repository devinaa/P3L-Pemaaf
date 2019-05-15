<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\transaksi_bayar;

class PembayaranTransformer extends TransformerAbstract
{
    /**
     * Transform Barang.
     *
     * @param transaksi_pembayaran $transaksi_pembayarans
     */
    public function transform(transaksi_bayar $transaksi_bayars)
    {
        return [
            'tb_id' => $transaksi_bayars->tb_id,
            'cab_id'=> $transaksi_bayars->cab_id,
            'pgw_id' => $transaksi_bayars->pgw_id,
            'tj_id' => $transaksi_bayars->tj_id,
            'ta_tanggal'=> $transaksi_bayars->ta_tanggal,
            'tb_diskon' => $transaksi_bayars->tb_diskon,
            
        ];
    }
}