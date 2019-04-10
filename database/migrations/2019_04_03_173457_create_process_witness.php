<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProcessWitness extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('process_witness', function (Blueprint $table) {
            $table->Increments('id');
            $table->integer('witness_id')->unsigned();
            $table->foreign('witness_id')->references('id')->on('witnesses');
            $table->integer('process_id')->unsigned();
            $table->foreign('process_id')->references('id')->on('processes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('process_witness');
    }
}
