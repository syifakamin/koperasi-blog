<?php

namespace App\Http\Controllers\Ecommerce;

use App\Category;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index ()
    {
        $products = Product::orderBy('created_at', 'DESC')->paginate(10);
        return view('ecommerce.index', compact('products'));
    }

    public function product()
{
    
    $products = Product::orderBy('created_at', 'DESC')->paginate(12);
    $categories = Category::with(['child'])->withCount(['child'])->getParent()->orderBy('name', 'ASC')->get();
    return view('ecommerce.product', compact('products', 'categories'));
}
}
