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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("user_id");
            $table->bigInteger('delivery_agent')->nullable();
            $table->bigInteger("pump_id")->nullable();
            $table->double('petrol_price', 15, 8)->nullable();
            $table->double('diesel_price', 15, 8)->nullable();
            $table->double('premium_petrol_price', 15, 8)->nullable();
            $table->double('delivery_fee', 15, 8)->nullable();
            $table->integer('petrol_qty')->nullable();
            $table->integer('diesel_qty')->nullable();
            $table->integer('premium_petrol_qty')->nullable();
            $table->double('total', 15, 8)->nullable();
            $table->string('address')->nullable();
            $table->string('pincode')->nullable();
            $table->integer('status')->default(1)->comment('1=>pending,2=>active,3->delivered');
            $table->bigInteger('otp')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('name')->nullable();
            $table->string('order_number')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
