<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agos', function (Blueprint $table) {
            $table->id();
            $table->String('name');
            $table->String('mobile');
            $table->String('truck_no');
            $table->integer('shipment_no');
            $table->String('destination');
            $table->String('date');
            $table->integer('quantity');
            $table->double('rate');
            $table->double('total_cost');
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
        Schema::dropIfExists('agos');
    }
}
