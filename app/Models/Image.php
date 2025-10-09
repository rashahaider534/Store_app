<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Image extends Model
{
    use HasFactory;
       protected $fillable = [
        'image_path',
        'product_id',
    ];

    // العلاقة مع المنتج (اختياري)
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
