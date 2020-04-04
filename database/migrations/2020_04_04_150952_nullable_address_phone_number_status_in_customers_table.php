<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class NullableAddressPhoneNumberStatusInCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('customers', function (Blueprint $table) {
            $table->string('phone_number')->nullable()->change();
            $table->string('address')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('customers', function (Blueprint $table) {
            $table->string('phone_number');
            $table->string('address');
        });
    }
}
