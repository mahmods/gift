<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            //$table->longtext('title');
            $table->integer('category');
            $table->float('price', 11, 2);
            $table->text('images');
            //$table->text('text');
            $table->text('quantity');
            $table->text('download');
            $table->text('options');
            $table->timestamps();
        });

        Schema::create('products_translations', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id')->unsigned();
            $table->longtext('title');
            $table->text('text');
            $table->string('locale')->index();

            $table->unique(['product_id','locale']);
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
        Schema::dropIfExists('products_translations');
    }
}