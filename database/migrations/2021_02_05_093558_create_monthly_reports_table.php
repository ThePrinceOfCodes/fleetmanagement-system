<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMonthlyReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('monthly_reports', function (Blueprint $table) {
            $table->id();
            $table->String('truck_no');
            $table->double('ago');
            $table->double('truck_expenses');
            $table->double('vat');
            $table->double('trip_allowance');
            $table->double('overhead');
            $table->double('waiver');
            $table->double('salary');
            $table->double('income');
            $table->String('date_from');
            $table->String('date_to');
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
        Schema::dropIfExists('monthly_reports');
    }
}
