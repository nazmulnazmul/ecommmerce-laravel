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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cat_id')->nullable();
            $table->unsignedBigInteger('sub_cat_id')->nullable();
            $table->unsignedBigInteger('brand_id')->nullable();
            $table->string('name')->nullable();
            $table->string('product_slug')->unique();
            $table->integer('qty')->nullable();
            $table->decimal('regular_price', 10,2)->nullable();
            $table->decimal('selling_price', 10,2)->nullable();
            $table->string('product_code')->nullable();
            $table->string('product_model')->nullable();
            $table->text('image')->nullable();
            $table->longText('product_short_des')->nullable();
            $table->longText('product_long_des')->nullable();
            $table->boolean('is_popular')->nullable();
            $table->boolean('is_new')->nullable();
            $table->boolean('is_featured')->nullable();
            $table->tinyInteger('product_status')->comment('1 for active 0 inactive')->default(1);
            $table->foreign('cat_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('sub_cat_id')->references('id')->on('sub_categories')->onDelete('cascade');
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');
            $table->timestamps();
        });

     
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
 
    }
};
