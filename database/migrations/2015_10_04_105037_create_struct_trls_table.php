<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStructTrlsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('struct_trls', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('lng_id')->unsigned();
            $table->integer('struct_id')->unsigned();
            $table->string('trl');
            $table->timestamps();

            $table->foreign('lng_id')->references('id')->on('languages');
            $table->foreign('struct_id')->references('id')->on('structures');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('struct_trls');
    }
}
