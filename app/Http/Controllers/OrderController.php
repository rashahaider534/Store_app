<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetail;

class OrderController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $Productscart = Cart::where('user_id', $user->id)->get();
        return view('order.orderdetails', compact('Productscart'));
    }
    public function store_order(Request $request)
    {
        $user = Auth::user();
        $total_price=0;
        $cartItems = Cart::with('product')->where('user_id', $user->id)->with('product')->get();
        foreach($cartItems as $item)
        {
             $total_price=$item->quantity * $item->product->price;
        }
        $order = Order::create([
            'name' =>$request->name,
            'email' =>$request->email,
            'address' => $request->address,
            'phone' => $request->phone,
            'user_id' => $user->id,
            'total_price'=> $total_price
        ]);

        foreach ($cartItems as $item) {
            OrderDetail::create([
                'order_id'   => $order->id,
                'product_id' => $item->product_id,
                'quantity'   => $item->quantity,
                'price'=>$item->product->price
            ]);
        }

        Cart::where('user_id', $user->id)->delete();
        return redirect()->back()->with('success', 'Your order has been placed successfully!');
    }
}
