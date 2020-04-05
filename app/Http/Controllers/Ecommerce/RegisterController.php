<?php

namespace App\Http\Controllers\Ecommerce;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Customer;
class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest'); 
    }

    public function redirectToRegisterPage()
    {
        return view('customer.register');
    }

    public function postRegister(RegisterRequest $request)
    {
        $customer = new Customer;
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->password = bcrypt($request->password);
        $customer->save();

         
        return redirect()->route('customer.login');

    }
}
