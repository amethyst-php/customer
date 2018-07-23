<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Schema;

class CreateCustomersAddressesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create(Config::get('ore.customer-address.table'), function (Blueprint $table) {
            $table->integer('customer_id')->unsigned();
            $table->foreign('customer_id')->references('id')->on(Config::get('ore.customer.table'))->onDelete('cascade');
            $table->integer('address_id')->unsigned();
            $table->foreign('address_id')->references('id')->on(Config::get('ore.address.table'))->onDelete('cascade');
            $table->unique(['customer_id', 'address_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists(Config::get('ore.customer-address.table'));
    }
}
