<?php

namespace App\Imports;

use App\Models\Certificate;
use App\Models\Employee;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CertificatesImport implements ToModel, WithHeadingRow, WithCalculatedFormulas
{
    private $title;
    private $year;
    public function __construct($title , $year)
    {
        $this->title = $title;
        $this->year = $year;
    }
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        if($row['names'] != "" && $row['names'] != null){
            $employee = Employee::where('name', $row['names'])->first();
            $score = 0;
            if(isset($row['overall_score'])){
                $score = $row['overall_score'];
            }elseif(isset($row['overall_score_per_participant'])){
                $score = $row['overall_score_per_participant'];

            }
            return new Certificate([
                'name' => $row['names'],
                'employee_id' => $employee ? $employee->employee_id : null,
                'email' => $employee ? $employee->email : null,
                'code' => $this->generateTenDigitNumber(),
                'score' => $score,
                'opco' => $row['opco'],
                'title' => $this->title,
                'year' => $this->year
            ]);
        }
    }
    public function generateTenDigitNumber() {
        $randomPart = str_pad(rand(1, 9999999), 7, "0", STR_PAD_LEFT);
        $timestampPart = substr(time(), -3);
        return $timestampPart . $randomPart;
    }
}
