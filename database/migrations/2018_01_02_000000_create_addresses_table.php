<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('customer_id')->unsigned();
            $table->foreign("customer_id")->references('id')->on('customers')->onDelete('cascade');
            $table->string("first_name")->nullable();
            $table->string("last_name")->nullable();
            $table->string("phone")->nullable();
            $table->string("address_1")->nullable();
            $table->string("address_2")->nullable();
            $table->string("region")->nullable();
            $table->string("city")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('addresses');
    }
}
