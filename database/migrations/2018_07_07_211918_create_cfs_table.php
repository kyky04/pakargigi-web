<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCfsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cfs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_penyakit')->unsigned();
            $table->integer('id_gejala')->unsigned();
            $table->double('cf');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('id_penyakit')->references('id')->on('penyakits');
            $table->foreign('id_gejala')->references('id')->on('gejalas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('cfs');
    }
}
