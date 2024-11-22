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
        Schema::create('discount_coupons', function (Blueprint $table) {
            $table->id();
            
            // the discount coupon code 
            $table->string('code');
            
            // the human readable discount coupon code
            $table->string('name')->nullable();
            
            // the description of coupon - not neccessary
            $table->text('description')->nullable();
            
            // the max use discount coupon has
            $table->integer('max_use')->nullable();
            
            // how many time users can use this coupon
            $table->integer('max_uses_user')->nullable();
            
            // whether or not the is a  percentage or fixe price
            $table->enum('type',['percent','fixed'])->default('fixed');

            // the amount discount base on type 
            $table->double('discount_amount',10,2);

            // minimum amount
            $table->double('min_amount',10,2)->nullable();

            // active or block 
            $table->integer('status')->default(1);

            // when a coupn beings 
            $table->timestamp('starts_at')->nullable();
            
            // when a coupon is end
            $table->timestamp('expires_at')->nullable();
            

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('discount_coupons');
    }
};
