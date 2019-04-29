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
            $table->string('social_name')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('cpf', 11)->unique();
            $table->date('birth_date');
            $table->string('rg');
            $table->string('rg_issuer');
            $table->string('naturalness');
            $table->enum('gender', [
                'male',
                'female',
                'undefined',
                'Others'
            ]);
            $table->enum('marital_status', [
                'single',
                'married',
                'divorced',
                'separated',
                'widow',
                'stable_union',
                'others'
            ]);
            $table->enum('schooling', [
                'illiterate',
                'incomplete_primary_education',
                'complete_primary_education',
                'in_primary_school',
                'complete_high_school',
                'incomplete_high_school',
                'in_high_school',
                'incomplete_technical_education',
                'complete_technical_education',
                'in_technical_education',
                'complete_higher_education',
                'incomplete_higher_education',
                'in_higher_education',
                'others'
            ]);
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
