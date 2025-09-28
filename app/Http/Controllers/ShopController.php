<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Schema;
use App\Models\Product;
use App\Models\Shop;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function getshops()
    {
        // $resulte=DB::table('shops')->get();
        // return view('welcome',['shops'=>$resulte]);
        $resulte = Shop::all();
        return view('welcome', ['shops' => $resulte]);
    }
    public function search(Request $request)
    {


        $resulte = Product::where('name', 'LIKE', "%{$request->Keywords}%")->get();
       // $resulte1 = Shop::where('name', 'LIKE', "%{$request->Keywords}%")->get();
       // if (Schema::hasColumn('products', 'shop_id')) {
            return view('layouts.product', ['products' => $resulte]);
        // } else {
        //     return view('welcome', ['shops' => $resulte1]);
        // }
    }
    // public function searchsh(Request $request) {

    public function searchp(Request $request) {}
}
