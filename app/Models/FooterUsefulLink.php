<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FooterUsefulLink extends Model
{
    use HasFactory;
    protected $fillable = [
        'manus',
        'link',
    ];

    function navbar()
    {
        return $this->belongsTo(Navbar::class, 'manus_id', 'id');
    }
}
