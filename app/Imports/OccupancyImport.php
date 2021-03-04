<?php

namespace App\Imports;

use App\Models\Occupancy;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class OccupancyImport implements ToModel, WithHeadingRow
{
    public function transformDate($value, $format = 'Y/m/d')
    {
        try {
            return \Carbon\Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($value));
        } catch (\ErrorException $e) {
            return \Carbon\Carbon::createFromFormat($format, $value);
        }
    }

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Occupancy([
            'user_id'     => $row['user_id'],
            'badge'     => $row['badge'],
            'building_id'     => $row['building_id'],
            'issued_date'     => $this->transformDate($row['issued_date']),
        ]);
    }

 

}
