<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GalleryImage extends Model
{
    use HasFactory;
    protected $fillable = [
        'gallery_category_id',
        'img'
    ];

    function category()
    {
        // return $this->belongsTo('App\Models\GalleryCategory', 'gallery_category_id');
        return $this->belongsTo(GalleryCategory::class, 'gallery_category_id');
    }
}
