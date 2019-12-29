<?php

namespace App\Http\Controllers\home;
use Illuminate\Http\Request;
use App\Category;
use App\Http\Controllers\Controller;
use App\Product;



class FrontController extends Controller
{
    //
    public function index()
    {
            //Ambil Query untuk ambil data produk yang diurutkan
            //dan di-load 10 data per pagenya
            $products = Product::orderBy('created_at','DESC')->paginate(12);
            //load view app.blade.php dan passing data dari variable products
            return view('ecommerce.index', compact('products'));
    }

    public function show($slug)
    {
        //QUERY UNTUK MENGAMBIL SINGLE DATA BERDASARKAN SLUG-NYA
        $product = Product::with(['category'])->where('slug', $slug)->first();
        //LOAD VIEW SHOW.BLADE.PHP DAN PASSING DATA PRODUCT
        return view('ecommerce.show', compact('product'));
    }

    public function categoryProduct($slug)
    {
        $products = Category::where('slug', $slug)->first()->product()->orderBy('created_at', 'DESC')->paginate(12);
        return view('ecommerce.product', compact('products'));
    }

}

