<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWithdrawalFundsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('withdrawal_funds', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->string('login', 20);
            $table->string('currency', 20);
            $table->float('available_balance');
            $table->string('withdrawal_type', 20);
            $table->string('bank_account', 255);
            $table->string('bank_name', 255);
            $table->string('swift_code', 20);
            $table->string('iban', 20);
            $table->string('account_name', 255);
            $table->float('balance');
            $table->string('withdrawal_currency', 20);
            $table->float('amount');
            $table->string('account_holder', 255);
            $table->string('bank_branch_name', 255);
            $table->string('bank_address', 255);
            $table->string('note', 255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('withdrawal_funds');
    }
}
