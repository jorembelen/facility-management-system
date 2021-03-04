<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UsersImport implements ToModel, WithHeadingRow
{  
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new User([
            'badge'     => $row['badge'],
            'name'     => $row['name'],
            'email'     => $row['email'],
            'mobile'     => $row['mobile'],
            'password'     => $row['password'],
            'role'     => $row['role'],
        ]);
    }
}

