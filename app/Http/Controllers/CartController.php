<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Cart;
class CartController extends Controller
{
    public function index()
    {
        $user=Auth::user();
        $Productscart=Cart::where('user_id',$user->id)->get();
        return view('cart.carts',compact('Productscart'));
    }
    public function store(Request $request,$id)
    {
        $user=Auth::user();
        $product=Product::where('id',$id)->first();
         $cart= Cart::create([
            'user_id'=>$user->id,
            'product_id'=>$product->id,
            'quantity'=>$request->input('quantity')
         ]
         );
        $cart->save();
        $shop_id=$product->shop_id;
        return redirect("/product/$shop_id");

    }
}
