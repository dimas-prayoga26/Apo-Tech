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
        CREATE FUNCTION select_category_by_id(p_id CHAR(36))
            RETURNS CHAR(36)
            BEGIN
                DECLARE result_name CHAR(36);
                
                SELECT name INTO result_name FROM categories WHERE id = p_id;
                
                RETURN result_name;
            END;
        ');

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared('DROP FUNCTION `update_category`');
    }
};
