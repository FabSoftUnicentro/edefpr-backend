<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('assisted_id')->unsigned();
            $table->foreign('assisted_id')->references('id')->on('assisteds');
            $table->string('phone');
            $table->string('name');
            $table->string('email')->unique()->nullable();
            $table->string('uf', 2)->nullable();
            $table->string('city')->nullable();
            $table->string('number')->nullable();
            $table->string('street')->nullable();
            $table->string('postcode')->nullable();
            $table->string('complement')->nullable();
            $table->string('neighborhood')->nullable();
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
        Schema::dropIfExists('contacts');
    }
}
