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
        Schema::table('addresses', function (Blueprint $table) {
            $table->foreignUuid('user_apotech_id')->nullable()->constrained('user_apoteches')->cascadeOnDelete();
            $table->boolean('is_default')->default(0);
        });

        // remove address_id in user_apoteches table
        Schema::table('user_apoteches', function (Blueprint $table) {
            $table->dropConstrainedForeignId('address_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('addresses', function (Blueprint $table) {
            $table->dropConstrainedForeignId('user_apotech_id');
            $table->dropColumn('is_default');
        });

        Schema::table('user_apoteches', function (Blueprint $table) {
            $table->foreignUuid('address_id')->nullable()->constrained('address')->cascadeOnDelete();
        });

    }
};
