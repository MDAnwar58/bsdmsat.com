<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Period extends Model
{
    use HasFactory;
    protected $fillable = [
        'No',
        'position',
        'firstPeriod',
        'secondPeriod',
        'thirdPeriod',
        'fourthPeriod',
        'fifthPeriod',
        'sixthPeriod',
        'seventhPeriod',
        'eighthPeriod',
        'comment',
    ];
}
