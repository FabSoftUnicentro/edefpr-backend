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
            $table->decimal('family_income', 10, 2);
            $table->decimal('social_programs', 10, 2)->nullable();
            $table->decimal('social_security_contribution', 10, 2)->nullable();
            $table->decimal('income_tax', 10, 2)->nullable();
            $table->decimal('alimony', 10, 2)->nullable();
            $table->decimal('extraordinary_expenses', 10, 2)->nullable();
            $table->decimal('net_family_income', 10, 2);
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
