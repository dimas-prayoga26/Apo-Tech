<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::unprepared('
            CREATE PROCEDURE insert_category(IN p_id char(36), IN p_name varchar(255))
            BEGIN
                INSERT INTO categories (id, name, created_at, updated_at) VALUES (p_id, p_name, now(), now());
            END
        ');

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared('DROP PROCEDURE `insert_category`');
    }
};
