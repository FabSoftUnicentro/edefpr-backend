<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssistedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assisteds', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique()->nullable();
            $table->string('cpf', 11)->unique();
            $table->date('birth_date');
            $table->string('rg');
            $table->string('rg_issuer');
            $table->enum('gender', [
                'male',
                'female',
                'undefined',
                'others'
            ]);
            $table->string('marital_status');
            $table->string('profession');
            $table->text('note')->nullable();
            $table->string('uf', 2);
            $table->string('city');
            $table->string('number');
            $table->string('street');
            $table->string('postcode');
            $table->string('complement')->nullable();
            $table->string('neighborhood')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('assisteds');
    }
}
