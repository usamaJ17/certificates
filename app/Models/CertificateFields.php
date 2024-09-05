<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CertificateFields extends Model
{
    use HasFactory;
    protected $table = "certificate_fields";

    protected $fillable = [
        'name',
        'score',
        'certificate_id'
    ];
    public function Certificate(){
        return $this->belongsTo(Certificate::class);
    }
}
