<?php

namespace App\Imports;

use App\Models\Employee;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class EmployeeImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        if($row['id'] != null && $row['name'] != null){
            return new Employee([
                'name' => $row['name'],
                'email' => $row['email'],
                'phone' => $row['mobile_number'],
                'whatsapp' => $row['whatsapp_number'],
                'employee_id' => $row['id'],
                'opco' => $row['opco'],
            ]);   
        }
    }
}
