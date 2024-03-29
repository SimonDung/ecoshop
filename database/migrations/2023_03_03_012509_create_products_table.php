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
            $table->string('product_name');
            $table->integer('product_price');
            $table->text('product_short_des');
            $table->text('product_long_des');
            $table->string('product_img');
            $table->integer('product_id');
            $table->integer('product_category_id');
            $table->string('product_category_name');
            $table->integer('product_subcategory_id');
            $table->string('product_subcategory_name');
            $table->string('slug');
            $table->string('product_size');
            $table->string('product_color');
            $table->string('status')->default('active');
            $table->integer('quantity')->default(0);
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
