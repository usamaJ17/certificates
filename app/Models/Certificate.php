<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    use HasFactory;
    protected $table = 'certificates';
    protected $fillable = [
        'name',
        'employee_id',
        'opco',
        'title',
        'year',
        'code',
        'email',
        'score'
    ];
    public function fields(){
        return $this->hasMany(CertificateFields::class, 'certificate_id', 'id');
    }
}
