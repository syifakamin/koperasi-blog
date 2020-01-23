<?php

namespace App\Http\Controllers\Ecommerce;

use App\Http\Controllers\Controller;
use App\Product;
use App\Province;
use App\City;
use App\District;
use App\Customer;
use App\Order;
use App\OrderDetail;
use Illuminate\Support\Str;
use DB;
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
    private function getCarts()
    {
        $carts = json_decode(request()->cookie('koperasi-blog'), true);
        $carts = $carts != '' ? $carts:[];
        return $carts;
    }
    public function updateCart(Request $request)
    {
        $carts = json_decode(request()->cookie('koperasi-blog'), true);
        foreach ($request->product_id as $key => $row) {
            if ($request->qty[$key] == 0){
                unset($carts[$row]);
            }else{
                $carts[$row]['qty'] = $request->qty[$key];
            }
        }
        $cookie = cookie('koperasi-blog', json_encode($carts), 2880);
        return redirect()->back()->cookie($cookie);
    }

    public function checkout()
    {
    //QUERY UNTUK MENGAMBIL SEMUA DATA PROPINSI
    $provinces = Province::orderBy('created_at', 'DESC')->get();
    $carts = $this->getCarts(); //MENGAMBIL DATA CART
    //MENGHITUNG SUBTOTAL DARI KERANJANG BELANJA (CART)
    $subtotal = collect($carts)->sum(function($q) {
        return $q['qty'] * $q['product_price'];
    });
    //ME-LOAD VIEW CHECKOUT.BLADE.PHP DAN PASSING DATA PROVINCES, CARTS DAN SUBTOTAL
    return view('ecommerce.checkout', compact('provinces','carts', 'subtotal'));
    }

    public function getCity()
    {
        $cities = City::where('province_id', request()->province_id)->get();
        return response()->json(['status' => 'success', 'data' => $cities]);
        

    }

    public function getDistrict()
    {
        $districts = District::where('city_id', request()->city_id)->get();
        return response()->json(['status' => 'success', 'data' => $districts]);
    }

    public function prosessCheckout(Request $request)
    {
        $this->validate($request, [
            'customer_name' => 'required|string|max:100',
            'customer_phone' => 'required',
            'email' => 'required|email',
            'customer_address' => ''
        ]);

        DB::beginTransaction();
        try{
            $customer = Customer::where('email', $request->email)->first();
            if (!auth()->check() && $customer){
                return redirect()->back()->with(['error' => 'Silahkan login terlebih dahulu']);

            }

            $carts = $this->getCarts();
            $subtotal = collect($carts)->sum(function($q){
                return $q['qty'] * $q['product_price'];
            });

            $customer = Customer::create([
                'name' => $request->customer_name,
                'email' => $request->email,
                'phone_number' => $request->customer_phone,
                'address' => $request->customer_address,
                'district_id' => $request->district_id,
                'status' => false
            ]);

            $order = Order::create([
                'invoice' => Str::random(4) . '-' .time(),
                'customer_id' => $customer->id,
                'customer_name' => $customer->name,
                'customer_phone' => $request->customer_phone,
                'customer_address' => $request->customer_address,
                'district_id' => $request->district_id,
                'subtotal' => $subtotal
            ]);

            foreach ($carts as $row) {
                $product = Product::find($row['product_id']);
                orderDetail::create([
                    'order_id' => $order->id,
                    'product_id' => $row['product_id'],
                    'price' => $row['product_price'],
                    'qty' => $row['qty'],
                    'weight' => $product->weight
                ]);
            }

            DB:commit();

            $carts = [];

            $cookie = cookie('koperasi-blog', json_encode($carts), 2880);

            return redirect (route('front.finish.checkout', $order->invoice))->cookie($cookie);
        } catch (\Exception $e) {
            DB::rollback();

            return redirect()->back()->with(['error' => $e->getMessage()]);
        
        }
    }

    public function checkoutFinish($invoice)
    {
        $order = Order::with(['district.city'])->where('invoice', $invoice)->first();
        return view('ecommerce.checkout_finish', compact('order'));
    }
}