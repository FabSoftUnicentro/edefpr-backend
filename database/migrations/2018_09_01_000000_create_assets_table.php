<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assisted_assets', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('name', [
                'house',
                'apartment',
                'vacant_ground',
                'farmstead',
                'car',
                'motorcycle',
                'others'
            ]);
            $table->decimal('price', 10, 2)->default(0.00);
            $table->enum('status', [
                'paid',
                'unpaid'
            ]);
            $table->decimal('installment_price', 10, 2)->default(0.00);
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
        Schema::dropIfExists('assisted_assets');
    }
}
