<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBreakagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('breakages', function (Blueprint $table) {
            $table->id();
            $table->String('name');
            $table->String('mobile');
            $table->String('truck_no');
            $table->String('shipment_date');
            $table->String('shipment_no');
            $table->String('shipment_point');
            $table->String('description');
            $table->integer('breakages');
            $table->integer('breakages_cost');
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
        Schema::dropIfExists('breakages');
    }
}
