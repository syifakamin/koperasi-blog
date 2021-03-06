<?php

namespace App\Http\Controllers\Ecommerce;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Order;
use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }
    public function loginForm()
    {
        
        return view('ecommerce.login');
    }

    public function login(Request $request)
    {
        
        $this->validate($request, [
            'email' => 'required|email|exists:customers,email',
            'password' => 'required|string'
        ]);

        $auth = [
            "email" => $request->email,
            "password" => $request->password
        ];
        // $auth['status'] = 1;
        
        // dd($auth);
        
        if (Auth::guard("customer")->attempt($auth)) {
            
            return redirect()->intended(route('customer.dashboard'));
        }
        else{
            return redirect()->back()->with(['error' => 'Email / Password anda Salah']);
        }
        
    }

    public function dashboard()
    {
        $orders = Order::selectRaw('COALESCE(sum(CASE WHEN status = 0 THEN subtotal END), 0) as pending, 
        COALESCE(count(CASE WHEN status = 3 THEN subtotal END), 0) as shipping,
        COALESCE(count(CASE WHEN status = 4 THEN subtotal END), 0) as completeOrder')
        ->where('customer_id', auth()->guard('customer')->user()->id)->get();

         return view('customer.dashboard', compact('orders'));
    }

    public function logout()
    {
        auth()->guard('customer')->logout();
        return redirect(route('customer.login'));
    }
}
