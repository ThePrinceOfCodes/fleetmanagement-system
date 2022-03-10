<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrucksDescriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trucks_descriptions', function (Blueprint $table) {
            $table->string('truck_no')->unique();
            $table->integer('capacity');
            $table->string('loading_no')->unique();
            $table->string('date_acquired');
            $table->string('status');
            $table->string('drivers_name');
            $table->integer('drivers_mobile')->unique();
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trucks_descriptions');
    }
}
