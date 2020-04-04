<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class NullableDistrictIdInCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('customers', function (Blueprint $table) {
            $table->unsignedBigInteger('district_id')->nullable()->change();
            $table->foreign('district_id')->references('id')->on('districts')->onUpdate('cascade')->onDelete('cascade');
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
            $table->unsignedBigInteger('district_id');
        });
    }
}
