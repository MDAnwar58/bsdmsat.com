<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'slug',
        'position',
        'indexNo',
        'dateOfBirth',
        'joiningDate',
        'educationalQualification',
        'address',
        'img',
    ];
}
