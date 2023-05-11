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
        Schema::create('user_apoteches', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('user_id')->constrained();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('phone_number')->nullable();
            $table->unsignedBigInteger('address_id')->nullable();
            $table->string('image')->nullable();
            $table->string('licenses')->nullable();
            $table->boolean('is_main')->default(0);
            $table->string('registered_at');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users_apotech');
    }
};
