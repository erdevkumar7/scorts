<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEmailAndPasswordToEscortsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('escorts', function (Blueprint $table) {
            $table->string('email')->after('nickname');
            $table->string('password')->after('email');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('escorts', function (Blueprint $table) {
            $table->dropColumn(['email', 'password']);
        });
    }
}
