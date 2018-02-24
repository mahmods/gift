<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ad_items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ad_id')->unsigned();
            $table->foreign('ad_id')->references('id')->on('ads')->onDelete('cascade');
            $table->text('image')->nullable();
            $table->text('url')->nullable();
            $table->integer('o')->default('1');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ad_items');
    }
}