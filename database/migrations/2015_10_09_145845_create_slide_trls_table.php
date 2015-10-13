<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSlideTrlsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('slide_trls', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('slide_id')->unsigned();
            $table->integer('lng_id')->unsigned();
            $table->string('slide_alt');
            $table->text('slide_html');
            $table->timestamps();

            $table->foreign('lng_id')->references('id')->on('languages');
            $table->foreign('slide_id')->references('id')->on('slides');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('slide_trls');
    }
}
