<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\transaksi_jual;

class KostumerSortirTransformer extends TransformerAbstract
{
     public function transform(transaksi_jual $transaksi_juals)
    {
        return [
            'tj_id' => $transaksi_juals->tj_id,
            'cab_id'=> $transaksi_juals->cab_id,
            'tj_jumlah'=> $transaksi_juals->tj_jumlah,
            'tj_subtotal_spareparts'=> $transaksi_juals->tj_subtotal_spareparts,
            'tj_subtotal_jasa'=> $transaksi_juals->tj_subtotal_jasa,
            'tj_nama' => $transaksi_juals->tj_nama,
            'tj_telepon' => $transaksi_juals->tj_telepon,
            'id_cs' => $transaksi_juals->id_cs,
            'id_montir' => $transaksi_juals->id_montir,
            'id_montir2'=> $transaksi_juals->id_montir2,
            'dm_plat'=> $transaksi_juals->dm_plat,
            'mtr_id'=> $transaksi_juals->mtr_id,
            'dm_status'=> $transaksi_juals->dm_status,
            'jasa_id'=> $transaksi_juals->jasa_id,
            'ds_jasa'=> $transaksi_juals->ds_jasa,
            'ds_jumlah'=> $transaksi_juals->ds_jumlah,
            'ds_id'=> $transaksi_juals->ds_id,
            'dm_id'=> $transaksi_juals->dm_id,
            'dsp_id'=> $transaksi_juals->dsp_id,
            'sp_id'=> $transaksi_juals->sp_id,
            'tj_id'=> $transaksi_juals->tj_id,
            'pgw_id'=> $transaksi_juals->pgw_id,
            'tb_id'=> $transaksi_juals->tb_id,
            'id'=> $transaksi_juals->id
        ];
    }
}