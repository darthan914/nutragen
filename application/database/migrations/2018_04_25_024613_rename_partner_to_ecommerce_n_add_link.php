<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenamePartnerToEcommerceNAddLink extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::rename('partner', 'ecommerce');
        Schema::table('ecommerce', function (Blueprint $table) {
            $table->string('link')->after('name')->default('#');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ecommerce', function (Blueprint $table) {
            $table->dropColumn('link');
        });
        Schema::rename('ecommerce', 'partner');
    }
}
