<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function getproducts($shop_id = null)
    {
        if ($shop_id == null) {
            // $resulte=DB::table('products')->get();
            $resulte = Product::paginate(6);
            return view('layouts.product', ['products' => $resulte]);
        } else {
            // $resulte=DB::table('products')->where('shop_id',$shop_id)->get();
            $resulte = Product::where('shop_id', $shop_id)->paginate(6);
            return view('layouts.product', ['products' => $resulte]);
        }
    }
    public function addproduct()
    {
        $allshops = Shop::all();
        return view('product.addproduct', compact('allshops'));
    }
    public function storeproduct(Request $request)
    {
        $newproduct = new Product();
        $request->validate(
            [
                'name' => 'required |unique:products| max:10',
                'price' => 'required',
                'quantity' => 'required'
            ]
        );

        $newproduct->name = $request->name;
        $newproduct->price = $request->price;
        $newproduct->quantity = $request->quantity;
        $newproduct->discription = $request->discription;
        $newproduct->shop_id = $request->shop_id;

        $path =$request->photo->move('upload', Str::uuid()->toString() . '-' . $request->file('photo')->getClientOriginalName());
        $newproduct->image =$path;
        $newproduct->save();
        return redirect('addproduct');
    }
    public function removeproduct($product_id = null)
    {
        $currentproduct = Product::findorfail($product_id);
        $shop_id = $currentproduct->shop_id;
        $currentproduct->delete();
        return redirect("/product/" . $shop_id);
    }
    public function editproduct($id = null)
    {
        if ($id != null) {
            $product = Product::find($id);
            if ($product == null) {
                abort(403, 'product is not exist');
            }

            $allshops = Shop::all();
            return view('product.editproduct', compact('product', 'allshops'));
        } else {
            return redirect('addproduct');
        }
    }
    public function storeupdate(Request $request, $id)
    {
        $product = Product::find($id);
        if($request->has('image')){
            $path =$request->image->move('upload', Str::uuid()->toString() . '-' . $request->file('image')->getClientOriginalName());
        }
        else{ $path=$product->image;}

        $product->update([
            'name'=> $request->name,
            'price'=>$request->price,
            'quantity'=>$request->quantity,
            'discription'=>$request->discription,
            'image'=>$path
        ]
        );
        $shop_id = $product->shop_id;
        return redirect("/product/" . $shop_id);
    }
    public function productsTable()
    {
        $products=Product::all();
        return view('product.productsTable',compact('products'));
    }
}
