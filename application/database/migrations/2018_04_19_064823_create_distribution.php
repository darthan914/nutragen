<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDistribution extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('distribution', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name');
            $table->string('image_logo');
            $table->float('image_height')->nullable();
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
        Schema::dropIfExists('distribution');
    }
}
