<?php

namespace App\Imports;

use App\Models\Certificate;
use App\Models\CertificateFields;
use App\Models\Employee;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CertificatesImport implements ToModel, WithHeadingRow, WithCalculatedFormulas
{
    private $title;
    private $year;
    private $cus_title = [];
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
        // if its first row
        if(empty($this->cus_title)){
            foreach ($row as $key => $value) {
                    if ($key === 'name' || $key === 'opco' || is_int($key)) {
                        foreach ($row as $key => $value) {
                            if($value != null){
                                $this->cus_title[$key] = $value;
                            }
                        }
                    }
            }
        }
        if($row['names'] != "" && $row['names'] != null){
            $employee = Employee::where('name', $row['names'])->first();
            $score = 0;
            if(isset($row['overall_score'])){
                $score = $row['overall_score'];
            }elseif(isset($row['overall_score_per_participant'])){
                $score = $row['overall_score_per_participant'];
            }
            if($score <= 1){
                $score = number_format((float)($score * 100), 0, '.', '');
            }
            $cert = Certificate::create([
                'name' => $row['names'],
                'employee_id' => $employee ? $employee->employee_id : null,
                'email' => $employee ? $employee->email : null,
                'code' => $this->generateTenDigitNumber(),
                'score' => $score,
                'opco' => $row['opco'],
                'title' => $this->title,
                'year' => $this->year
            ]);
            unset($this->cus_title['opco'], $this->cus_title['names'], $this->cus_title['overall_score'], $this->cus_title['overall_score_per_participant']);
            foreach ($this->cus_title as $c_key => $c_value) {
                if (is_numeric($row[$c_key])){
                    CertificateFields::create([
                        'certificate_id' => $cert->id,
                        'name' => $c_value,
                        'score' => number_format((float)($row[$c_key] * 100), 0, '.', ''),
                    ]);
                }
            }
            return $cert;
        }
    }
    public function generateTenDigitNumber() {
        $randomPart = str_pad(rand(1, 9999999), 7, "0", STR_PAD_LEFT);
        $timestampPart = substr(time(), -3);
        return $timestampPart . $randomPart;
    }
}
