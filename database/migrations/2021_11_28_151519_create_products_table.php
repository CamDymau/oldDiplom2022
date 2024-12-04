<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->binary('image')->nullable();
            $table->string('name')->nullable();
            $table->foreignId("category_id");
            $table->foreign("category_id")->references('id')->on('categories');
            $table->string('price')->nullable();
            $table->string('pricePledge')->nullable();
            $table->integer('height')->nullable();
            $table->integer('weight')->nullable();
            $table->string('description')->nullable();
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
    }
}
