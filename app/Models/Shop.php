<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;
    protected $fillable=['name','image','description'];
    public function product()
    {
        return $this->hasMany(Product::class,'shop_id');
    }
}
