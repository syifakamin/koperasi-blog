<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
        public function boot()
        {
            $this->registerPolicies();

            //KITA MEMBUAT GATE DENGAN NAMA order-view, DIMANA DIA MEMINTA DUA PARAMETER YAKNI CUSTOMER DAN ORDER
            Gate::define('order-view', function($customer, $order) {
                //KEMUDIAN DICEK, JIKA CUSTOMER ID SAMA DENGAN CUSTOMER_ID YANG ADA PADA TABLE ORDER
                //MAKA RETURN-NYA TRUE
                //GATE INI HANYA AKAN ME-RETURN TRUE/FALSE SEBAGAI TANDA DIIZINKAN ATAU TIDAK
                return $customer->id == $order->customer_id;
            });
        
            //DEFINISIKAN GATE LAINNYA DISINI JIKA PERLU
        }
}
