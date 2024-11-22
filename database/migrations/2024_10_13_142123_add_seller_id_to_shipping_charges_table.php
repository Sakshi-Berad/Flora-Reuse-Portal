<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('shipping_charges', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('seller_id')->after('id');
            $table->foreign('seller_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('shipping_charges', function (Blueprint $table) {
            //
            $table->dropForeign(['seller_id']);
            $table->dropColumn('seller_id');
        });
    }
};
