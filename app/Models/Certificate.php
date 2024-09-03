<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_name',
        'user_email',
        'title',
        'employee_id',
        'description',
        'code',
        'url'
    ];

}
