<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;
     protected $guarded=[];
    public function order()
    {
        return $this->hasMany(Order::class,'order_id');
    }
     public function product()
    {
        return $this->hasMany(Product::class,'product_id');
    }
}
