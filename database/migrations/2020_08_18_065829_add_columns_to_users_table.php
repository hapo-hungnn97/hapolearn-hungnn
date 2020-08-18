<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->tinyInteger('gender')->nullable()->comment("1-Male 2-Female")->after('password');
            $table->string('phone_number')->nullable()->after('gender');
            $table->string('address')->nullable()->after('phone_number');
            $table->string('avatar')->nullable()->after('address');
            $table->tinyInteger('isTeacher')->comment("1-user 2-teacher")->after('avatar');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('gender');
            $table->dropColumn('phone_number');
            $table->dropColumn('address');
            $table->dropColumn('avatar');
            $table->dropColumn('isTeacher');
            $table->dropColumn('deleted_at');
        });
    }
}
