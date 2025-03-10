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
            $table->integer('customer_id');
            $table->text('order_date');
            $table->text('order_timestamp');
            $table->float('order_total', 10,2);
            $table->float('tax_total', 10,2);
            $table->float('shipping_total', 10,2);
            $table->string('order_status')->default('pendding');
            $table->text('delevary_address');
            $table->string('delevary_status')->default('pendding');
            $table->string('payment_type');
            $table->string('payment_status')->default('pendding');
            $table->string('currency')->default('BDT');
            $table->string('transaction_id')->nullable();
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
