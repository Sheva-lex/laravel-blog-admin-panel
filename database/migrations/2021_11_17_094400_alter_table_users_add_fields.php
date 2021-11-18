<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableUsersAddFields extends Migration
{

    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('patronymic')->nullable()->after('name');
            $table->string('surname')->nullable()->after('patronymic');
            $table->enum('role', ['admin', 'manager', 'user'])->default('user')->after('surname');
            $table->string('phone')->nullable()->after('role');
        });
    }


    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('patronymic');
            $table->dropColumn('surname');
            $table->dropColumn('role');
            $table->dropColumn('phone');
        });
    }
}
