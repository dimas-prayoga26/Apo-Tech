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
        Schema::table('users', function (Blueprint $table) {
            $table->enum('status', ['login', 'logout'])->default('logout');
        });

        // $triggerSql = "
        //     CREATE TRIGGER after_login_trigger AFTER UPDATE ON users
        //     FOR EACH ROW
        //     BEGIN
        //         IF NEW.status = 'login' AND OLD.status != 'login' THEN
        //             CALL update_last_login(NEW.id);
        //         END IF;
        //     END;

        //     CREATE TRIGGER after_logout_trigger AFTER UPDATE ON users
        //     FOR EACH ROW
        //     BEGIN
        //         IF NEW.status = 'logout' AND OLD.status != 'logout' THEN
        //             CALL update_last_logout(NEW.id);
        //         END IF;
        //     END;
        // ";

        // DB::unprepared($triggerSql);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // $triggerSql = "
        //     DROP TRIGGER IF EXISTS after_login_trigger;
        //     DROP TRIGGER IF EXISTS after_logout_trigger;
        // ";

        // DB::unprepared($triggerSql);

        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
};
