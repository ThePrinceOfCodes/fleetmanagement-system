<?php

use App\Http\Controllers\Admin\TripAllowanceController;

//tripsallowance dashboard
Route::get('/', [TripAllowanceController::class, 'index'])->name('dashboard');
//add new tripsallowance
Route::post('add', [TripAllowanceController::class, 'add'])->name('add');
//add new tripsallowance form route
Route::get('create', [TripAllowanceController::class, 'create'])->name('create');
//search route
Route::post('search', [TripAllowanceController::class, 'search'])->name('search');
//add multiple
Route::post('import', [TripAllowanceController::class, 'import'])->name('import');


