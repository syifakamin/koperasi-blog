<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    //
    public function index()
        {
            //Ambil Query untuk ambil data produk yang diurutkan
            //dan di-load 10 data per pagenya
            $products = Product::orderBy('created_at','DESC')->paginate(10);
            //load view app.blade.php dan passing data dari variable products
            return view('frontend.app', compact('products'));
        }
}

