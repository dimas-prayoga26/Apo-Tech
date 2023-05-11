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
            $table->uuid('id')->primary();
            $table->foreignUuid('categories_id')->constrained();
            $table->foreignUuid('user_apoteches_id')->constrained();
            $table->foreignUuid('products_images_id')->constrained();
            // $table->foreignUuid('reviews_id')->constrained();
            $table->string('name');
            $table->text('description');
            $table->integer('quantity');
            $table->string('is_need_prescription');
            $table->integer('price');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product');
    }
};
