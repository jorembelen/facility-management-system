<?php

namespace App\Imports;

use App\Models\Building;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class BuildingsImport implements ToModel, WithHeadingRow
{  
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Building([
            'user_id'     => $row['user_id'],
            'tenant_id'     => $row['tenant_id'],
            'rc_no'     => $row['rc_no'],
            'ifc_no'     => $row['ifc_no'],
            'flat_no'     => $row['flat_no'],
            'villa_no'     => $row['villa_no'],
            'lot_no'     => $row['lot_no'],
            'block_no'     => $row['block_no'],
            'street'     => $row['street'],
            'description'     => $row['description'],
            'status'     => $row['status'],
        ]);
    }
}

