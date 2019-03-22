<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\supplier;

class SupplierTransformer extends TransformerAbstract
{
    /**
     * Transform Supplier.
     *
     * @param supplier $suppliers
     */
    public function transform(supplier $suppliers)
    {
        return [
            'su_id' => $suppliers->su_id,
            'su_nama' => $suppliers->su_nama,
            'su_telepon' => $suppliers->su__telepon,
            'su_namaSales' => $suppliers->su_namaSales,
            'su_teleponSales' => $suppliers->su_teleponSales, 
        ];
    }
}