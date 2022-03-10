<?php

use App\Http\Controllers\Admin\Drivers\BreakagesCurrentController;
use App\Http\Controllers\Admin\Drivers\BreakagesController;


//dashboard
Route::get('/',[BreakagesCurrentController::class,'index'])->name('dashboard');
//input data
Route::post('/input',[BreakagesCurrentController::class,'input'])->name('input');

//search data
Route::get('/search',[BreakagesCurrentController::class,'search'])->name('search');

//input new data form
Route::get('/new',[BreakagesController::class,'new'])->name('new');

//show individual records
Route::get('/{mobile}',[BreakagesController::class,'records'])->name('records');



//individual records search
//Route::post('/recordsearch',[BreakagesController::class,'records_search'])->name('records.search');



//input new data 
//Route::post('/updateData',[BreakagesController::class,'updateData'])->name('updatedata');