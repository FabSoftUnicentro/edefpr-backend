<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFamilyCompositionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('family_compositions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->date('birth_date');
            $table->enum('situation', ['general', 'elderly', 'child', 'deficient', 'ex-prisoner']);
            $table->enum('kinship', ['daughter', 'son', 'cousin', 'sister', 'brother', 'mother', 'father',
                                'grandmother', 'grandfather','uncle', 'aunt', 'wife', 'husband', 'grandson',
                                'granddaughter', 'nephew', 'niece', 'stepfather', 'stepmother', 'stepbrother',
                                'stepsister']);
            $table->string('work');
            $table->double('income');
            $table->integer('assisted_id')->unsigned();
            $table->foreign('assisted_id')->references('id')->on('assisteds');
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
        Schema::dropIfExists('family_compositions');
    }
}