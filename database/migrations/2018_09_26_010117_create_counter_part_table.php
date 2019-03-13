<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCounterPartTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('counterpart', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('rg')->nullable();
            $table->string('rg_issuer')->nullable();
            $table->string('phone_number')->nullable();
            $table->decimal('remuneration', 10, 2)->nullable();
            $table->string('profession')->nullable();
            $table->text('note')->nullable();
            $table->string('cpf')->nullable();
            $table->string('uf', 2);
            $table->string('city');
            $table->string('number');
            $table->string('street');
            $table->string('postcode');
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
        Schema::dropIfExists('counterpart');
    }
}
