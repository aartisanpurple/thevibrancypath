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
            $table->string('name');
            $table->text('description');
            $table->decimal('price', 10, 2); // Adjust the precision and scale based on your need
            $table->integer('stock');
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('category');
            $table->string('image')->nullable();
            $table->string('image_back')->nullable();
            $table->string('image_left')->nullable();
            $table->string('course_doc')->nullable();
            $table->string('course_url')->nullable();
            $table->tinyInteger('course_status')->default(0); // 0 = inactive, 1 = active
            $table->tinyInteger('category_type')->default(0); // 0 = physical, 1 = digital
            $table->tinyInteger('product_status')->default(0); // 0 = available, 1 = out_of_stock, 2 = discontinued
            $table->decimal('discount_price', 10, 2)->nullable();
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
