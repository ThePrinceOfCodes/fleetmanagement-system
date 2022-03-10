<?php

use App\Http\Controllers\Admin\Expenses\AdminexpensesController;




//admin expenses
Route::get('/', [AdminexpensesController::class,'index'])->name('dashboard');
Route::get('search', [AdminexpensesController::class, 'search'])->name('search');
Route::post('import', [AdminexpensesController::class, 'import'])->name('import');
//add new admin expenses
Route::post('add', [AdminexpensesController::class, 'add'])->name('add');
//add new admin expenses form route
Route::get('create', [AdminexpensesController::class, 'create'])->name('create');