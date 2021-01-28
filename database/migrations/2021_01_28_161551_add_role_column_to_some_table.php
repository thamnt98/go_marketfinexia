<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRoleColumnToSomeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('withdrawal_funds', function (Blueprint $table) {
            $table->tinyInteger('is_staff')->default(2);
        });
        Schema::table('orders', function (Blueprint $table) {
            $table->tinyInteger('is_staff')->default(2);
        });
        Schema::table('live_accounts', function (Blueprint $table) {
            $table->tinyInteger('is_staff')->default(2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('withdrawal_funds', function (Blueprint $table) {
            $table->dropColumn('is_staff');
        });
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn('is_staff');
        });
        Schema::table('live_accounts', function (Blueprint $table) {
            $table->dropColumn('is_staff');
        });
    }
}
