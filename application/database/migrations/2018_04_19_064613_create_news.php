<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNews extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug_url')->unique();
            $table->string('title');
            $table->text('description')->nullable();
            $table->text('content');
            $table->text('photo')->nullable();
            $table->boolean('flag_publish')->default(0);
            $table->string('author');
            $table->integer('id_created')->nullable();
            $table->integer('id_updated')->nullable();
            $table->integer('version')->default(0);

            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->string('meta_url')->nullable();
            $table->string('meta_image')->nullable();
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
        Schema::dropIfExists('news');
    }
}
