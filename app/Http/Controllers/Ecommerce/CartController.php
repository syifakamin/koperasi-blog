<?php

namespace App\Http\Controllers\Ecommerce;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $this->validate($request, [
            'product_id' => 'required|exists:products,id' ,
            'qty' => 'required|integer'
        ]);

        $carts = json_decode($request->cookie('koperasi-blog'), true);
        if ($carts && array_key_exists($request->product_id, $carts)) {
            $carts[$request->product_id]['qty'] += $request->qty;
        }else{
            $product = Product::find($request->product_id);
            $carts[$request->product_id] = [
                'qty' => $request->qty,
                'product_id' => $product->id,
                'product_name' => $product->name,
                'product_price' => $product->price,
                'product_image' => $product->image
            ];
        }

        $cookie = cookie('koperasi-blog', json_encode($carts), 2880);
        return redirect()->back()->cookie($cookie);
    }

    public function listCart()
    {
        $carts = json_decode(request()->cookie('koperasi-blog'), true);

        $subtotal = collect($carts)->sum(function($q){
            return $q['qty'] * $q['product_price'];
        });

        return view('ecommerce.cart', compact('carts', 'subtotal'));
    }

    public function getCarts()
    {
        $carts = $this->getCarts();
        $carts = $carts != '' ? $carts:[];
        return $carts;
    }
}
