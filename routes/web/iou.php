<?php

use App\Http\Controllers\Admin\Drivers\IOUCurrentController;
use App\Http\Controllers\Admin\Drivers\IOUController;


//dashboard
Route::get('/',[IOUCurrentController::class,'index'])->name('dashboard');
//input data
Route::post('/input',[IOUCurrentController::class,'input'])->name('input');
//input new data form
Route::get('/new',[IOUController::class,'new'])->name('new');
//search data
Route::get('/search',[IOUCurrentController::class,'search'])->name('search');
//show individual records
Route::get('/{mobile}',[IOUController::class,'records'])->name('records');
//individual records search
Route::post('/recordsearch',[IOUController::class,'records_search'])->name('records.search');

Route::post('import', [IOUController::class, 'import'])->name('import');
