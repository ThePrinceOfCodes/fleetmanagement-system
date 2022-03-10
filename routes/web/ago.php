<?php

use App\Http\Controllers\Admin\Expenses\AgoController;



//ago dashboard
Route::get('/', [AgoController::class, 'index'])->name('dashboard');
//add new ago
Route::post('add', [AgoController::class, 'add'])->name('add');
//add new ago form route
Route::get('create', [AgoController::class, 'create'])->name('create');
//add search route
Route::post('search', [AgoController::class, 'search'])->name('search');
//add multiple
Route::post('import', [AgoController::class, 'import'])->name('import');