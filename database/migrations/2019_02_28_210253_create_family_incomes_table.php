<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFamilyIncomesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('family_incomes', function (Blueprint $table) {
            $table->increments('id');
            $table->double('family_income');
            $table->double('social_programs')->nullable();
            $table->double('social_security_contribution')->nullable();
            $table->double('income_tax')->nullable();
            $table->double('alimony')->nullable();
            $table->double('extraordinary_expenses')->nullable();
            $table->double('net_family_income');
            $table->integer('assisted_id')->unsigned();
            $table->foreign('assisted_id')->references('id')->on('assisteds');
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
        Schema::dropIfExists('family_incomes');
    }
}
