<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->timestamp('email_verified_at')->nullable();
            $table->foreignUuid('status_user_id')->constrained();
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
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
     *
     * @return void
     */
    public function down()
    {
        // $triggerSql = "
        //     DROP TRIGGER IF EXISTS after_login_trigger;
        //     DROP TRIGGER IF EXISTS after_logout_trigger;
        // ";

        // DB::unprepared($triggerSql);

        Schema::dropIfExists('users');
    }
};
