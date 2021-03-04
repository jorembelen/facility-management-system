<?php

namespace App\Imports;

use App\Models\Occupant;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class OccupantsImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Occupant([
            'badge'     => $row['badge'],
            'name'     => $row['name'],
            'email'     => $row['email'],
            'mobile'     => $row['mobile'],
        ]);
    }
}
