<?php

namespace App\Imports;

use App\Models\Certificate;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CertificatesImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Certificate([
            'user_name' => $row['name'],
            'user_email' => $row['email'],
            'title' => $row['title'],
            'employee_id' => $row['employee_id'],
            'description' => $row['description'],
            'code' => $this->generateTenDigitNumber(),
        ]);
    }
    public function generateTenDigitNumber() {
        $randomPart = str_pad(rand(1, 9999999), 7, "0", STR_PAD_LEFT);
        $timestampPart = substr(time(), -3);
        return $timestampPart . $randomPart;
    }
}
