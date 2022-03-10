<?php

use App\Http\Controllers\Admin\Drivers\DriversController;

//drivers index
Route::get('/',[DriversController::class, 'index'])->name('dashboard');
//drivers search
Route::POST('search',[DriversController::class, 'search'])->name('search');