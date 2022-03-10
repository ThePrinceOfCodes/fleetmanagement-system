<?php

use App\Http\Controllers\Admin\IncomeController;

//income dashboard
Route::get('/', [IncomeController::class, 'index'])->name('dashboard');
//add new income
Route::post('add', [IncomeController::class, 'add'])->name('add');
//add new income form route
Route::get('create', [IncomeController::class, 'create'])->name('create');
//add search route
Route::post('search', [IncomeController::class, 'search'])->name('search');
//add multiple
Route::post('import', [IncomeController::class, 'import'])->name('import');