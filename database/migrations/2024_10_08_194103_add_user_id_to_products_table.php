<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('user_id')->after('id')->nullable();  // You can make it nullable or required depending on your use case
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');  // Add foreign key constraint
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            //
            $table->dropForeign(['user_id']);  // Drop foreign key first
            $table->dropColumn('user_id');  // Then drop the column
        });
    }
};
