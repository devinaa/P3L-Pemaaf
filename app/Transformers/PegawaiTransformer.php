<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\pegawai;

class PegawaiTransformer extends TransformerAbstract
{
    /**
     * Transform Barang.
     *
     * @param pegawai $pegawais
     */
    public function transform(pegawai $pegawais)
    {
        return [
            'pgw_id' => $pegawais->pgw_id,
            'pgw_nama' => $pegawais->pgw_nama,
            'pgw_alamat' => $pegawais->pgw_alamat,
            'pgw_gaji' => $pegawais->pgw_gaji,
            'pgw_telepon' => $pegawais->pgw_telepon,
            'pgw_jabatan' => $pegawais->pgw_jabatan,
            'pgw_username' => $pegawais->pgw_username,
            'pgw_password'=> $pegawais->pgw_password,
            // 'namacabang'=> $pegawais->cabangs->cab_nama,

            'cab_id'=> $pegawais->cab_id,
        ];
    }
}