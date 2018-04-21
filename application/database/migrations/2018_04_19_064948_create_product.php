<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name');
            $table->string('image_logo');
            $table->float('image_logo_height')->nullable();
            $table->string('image_product');
            $table->float('image_product_height')->nullable();
            $table->text('short_description');
            $table->text('description');
            $table->boolean('flag_publish');
            $table->integer('id_created')->nullable();
            $table->integer('id_updated')->nullable();
            $table->integer('version')->default(0);

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
        Schema::dropIfExists('product');
    }
}
