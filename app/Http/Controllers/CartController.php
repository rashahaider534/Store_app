<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;


class CartController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $Productscart = Cart::where('user_id', $user->id)->get();
        return view('cart.carts', compact('Productscart'));
    }
    public function store(Request $request, $id)
    {
        $user = Auth::user();
        $product = Product::where('id', $id)->first();
        $productexist = Cart::where('user_id', $user->id)->where('product_id', $id)->first();
        $product->quantity -= $request->input('quantity');
        $product->save();
        if ($productexist) {
            $productexist->quantity += $request->input('quantity');
            $productexist->save();
        } else {
            Cart::create(
                [
                    'user_id' => $user->id,
                    'product_id' => $product->id,
                    'quantity' => $request->input('quantity'),
                ]
            );
        }
        $shop_id = $product->shop_id;
        return redirect("/product/$shop_id");
    }
    public function remove_product($id)
    {
        $cartproduct = Cart::where('product_id', $id)->where('user_id', auth()->id())->first();
        $product = Product::where('id', $id)->first();
        $product->quantity += $cartproduct->quantity;
        $product->save();
        if ($cartproduct) {
            $cartproduct->delete();
        }
        return redirect('/cart');
    }
}
