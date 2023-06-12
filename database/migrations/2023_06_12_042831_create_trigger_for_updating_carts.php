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
        DB::unprepared('
            CREATE TRIGGER delete_from_cart AFTER INSERT ON `orders` FOR EACH ROW
                BEGIN
                    IF NEW.is_from_cart = 1
                    THEN
                        DELETE FROM carts WHERE user_id = NEW.user_id;
                    END IF;
                END
            ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared('DROP TRIGGER `delete_from_cart`');
    }
};