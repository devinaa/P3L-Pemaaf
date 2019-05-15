<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\transaksi_pengadaan;

class PengadaanTransformer extends TransformerAbstract
{
    /**
     * Transform Barang.
     *
     * @param transaksi_pengadaan $transaksi_pengadaans
     */
    public function transform(transaksi_pengadaan $transaksi_pengadaans)
    {
        return [
            'ta_id' => $transaksi_pengadaans->ta_id,
            'su_id'=> $transaksi_pengadaans->su_id,
            'sp_id'=> $transaksi_pengadaans->sp_id,
            'dpgd_satuan' => $transaksi_pengadaans->dpgd_satuan,
            'dpgd_jumlah' => $transaksi_pengadaans->dpgd_jumlah,
            'ta_tanggal'=> $transaksi_pengadaans->ta_tanggal,
            'dpgd_id' => $transaksi_pengadaans->dpgd_id,
            
        ];
    }
}