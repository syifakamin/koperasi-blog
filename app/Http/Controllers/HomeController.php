<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $totalKategori = DB::table("categories")->count();
        $totalPengunjung = DB::table("sessions")->count();
        $totalCustomer = DB::table("customers")->count();
        $totalProduct = DB::table("products")->count();

        $data = [$totalProduct,$totalPengunjung,$totalProduct,$totalCustomer];
        // return View::make('admin.dashboard')->with($data);

        return View::make('admin.dashboard', compact('totalKategori','totalPengunjung','totalProduct','totalCustomer'));

        return view('admin.dashboard');
    }

    // public function totalProduct()
    // {
    //     DB::table('products')->count();
    // }
} 
