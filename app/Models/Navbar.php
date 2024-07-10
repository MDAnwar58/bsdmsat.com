<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Navbar extends Model
{
    use HasFactory;
    protected $fillable = [
        'firstManus',
        'secondManus',
        'thirdManus',
        'fourthManus',
        'fifthManus',
        'sixthManus',
        'seventhManus',
        'eighthManus',
    ];
}
