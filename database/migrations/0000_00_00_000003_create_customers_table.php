<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create(Config::get('amethyst.customer.data.customer.table'), function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('notes')->nullable();
            $table->integer('legal_entity_id')->unsigned()->nullable();
            $table->foreign('legal_entity_id')->references('id')->on(Config::get('amethyst.legal-entity.data.legal-entity.table'));
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create(Config::get('amethyst.customer.data.customer-address.table'), function (Blueprint $table) {
            $table->integer('customer_id')->unsigned();
            $table->foreign('customer_id')->references('id')->on(Config::get('amethyst.customer.data.customer.table'))->onDelete('cascade');
            $table->integer('address_id')->unsigned();
            $table->foreign('address_id')->references('id')->on(Config::get('amethyst.address.data.address.table'))->onDelete('cascade');
            $table->unique(['customer_id', 'address_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists(Config::get('amethyst.customer.data.customer.table'));
        Schema::dropIfExists(Config::get('amethyst.customer.data.customer-address.table'));
    }
}
