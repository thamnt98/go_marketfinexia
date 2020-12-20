<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class AlterUsersTableAddSomeColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function($table) {
            $table->string('city', 255)->nullable();
            $table->string('state', 255)->nullable();
            $table->string('zip_code', 255)->nullable();
            $table->string('address', 255)->nullable();
            $table->string('country', 255)->nullable();
            $table->string('copy_of_id', 255)->nullable();
            $table->string('proof_of_address', 255)->nullable();
            $table->string('addtional_file', 255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
        Schema::table('users', function($table) {
            $table->dropColumn(['city', 'state', 'zip_code', 'address', 'country', 'copy_of_id', 'proof_of_address', 'addtional_file']);
        });
    }
}
