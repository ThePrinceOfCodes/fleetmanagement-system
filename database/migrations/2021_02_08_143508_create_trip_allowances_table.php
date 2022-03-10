<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTripAllowancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trip_allowances', function (Blueprint $table) {
            $table->id();
            $table->String('truck_no');
            $table->String('shipment_no');
            $table->String('start_location');
            $table->String('end_location');
            $table->double('amount');
            $table->String('date');
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
        Schema::dropIfExists('trip_allowances');
    }
}
