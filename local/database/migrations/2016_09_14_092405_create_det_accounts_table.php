<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDetAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('det_accounts', function(Blueprint $table) {
            $table->increments('detaccount_id');
            $table->integer('account_id');
            $table->string('detaccount_name');
            $table->integer('category_id');
            $table->integer('option_id');
            $table->integer('destination_id');
            $table->string('detaccount_tr');
            $table->float('debit');
            $table->float('credit');
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
        Schema::drop('det_accounts');
    }
}
