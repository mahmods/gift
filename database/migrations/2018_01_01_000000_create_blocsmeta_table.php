<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlocsMetaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blocsmeta', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('bloc_id')->unsigned();
            $table->foreign('bloc_id')->references('id')->on('blocs')->onDelete('cascade');
            $table->string('meta_key');
            $table->text('meta_value');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blocsmeta');
    }
}