<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    use HasFactory;
    protected $fillable = [
        'sName',
        'student_count',
        'tName',
        'teacher_count',
        'aName',
        'authority_count',
        'bName',
        'book_count'
    ];
}
