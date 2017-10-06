<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAccbanksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accbanks', function(Blueprint $table) {
            $table->increments('accbank_id');
            $table->string('coa_code');
            $table->integer('bank_id');
            $table->integer('owner_id');
            $table->integer('reknumber');
             $table->integer('accbanks_desc');
            $table->integer('user_id');
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
        Schema::drop('accbanks');
    }
}
