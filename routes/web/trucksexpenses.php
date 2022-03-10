<?php

use App\Http\Controllers\Admin\Expenses\TrucksexpensesController;

//trucksexpenses


Route::get('/', [TrucksexpensesController::class, 'index'])->name('dashboard');
Route::get('search', [TrucksexpensesController::class, 'search'])->name('search');
Route::post('import', [TrucksexpensesController::class, 'import'])->name('import');
//add new Trucks expenses
Route::post('add', [TrucksexpensesController::class, 'add'])->name('add');
//add new Trucks expenses form route
Route::get('create', [TrucksexpensesController::class, 'create'])->name('create');
