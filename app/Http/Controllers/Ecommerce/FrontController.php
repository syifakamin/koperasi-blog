<?php

namespace App\Http\Controllers\Ecommerce;

use App\Category;
use App\Http\Controllers\Controller;
use App\Product;
use App\Province;
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

    public function customerSettingForm()
    {
        $customer = auth()->guard('customer')->user()->load('district');
        $provinces = Province::orderBy('name', 'ASC')->get();
        return view ('ecommerce.setting', compact('customer', 'provinces'));
    }

    public function customerUpdateProfile(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:100',
            'phone_number' => 'required|max:15',
            'address' => 'required|string',
            'district_id' => 'required|exists:districts,id',
            'password' => 'nullable|string|min:6'
        ]);
    
       
        $user = auth()->guard('customer')->user();
        
        $data = $request->only('name', 'phone_number', 'address', 'district_id');
        
        if ($request->password != '') {
        
            $data['password'] = $request->password;
        }
        
        $user->update($data);
        
        return redirect()->back()->with(['success' => 'Profil berhasil diperbaharui']);
    }
}
