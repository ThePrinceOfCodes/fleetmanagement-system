<?php

use App\Http\Controllers\Admin\Reports\ReportsController;
use App\Http\Controllers\Admin\Reports\MonthlyReportController;

//dashboard
Route::get('/',[ReportsController::class,'index'])->name('dashboard');

//generate monthly reports
Route::post('/monthly',[MonthlyReportController::class,'monthly'])->name('monthly');