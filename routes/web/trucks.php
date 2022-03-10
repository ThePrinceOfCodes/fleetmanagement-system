<?php

use App\Http\Controllers\Admin\TrucksController;

//trucksexpenses


Route::get('/', [TrucksController::class, 'index'])->name('dashboard');
Route::post('detailssearch', [TrucksController::class, 'detailssearch'])->name('detailssearch');
Route::get('events', [TrucksController::class, 'events'])->name('events');
Route::post('eventssearch', [TrucksController::class, 'eventssearch'])->name('eventssearch');
Route::post('eventsimport', [TrucksController::class, 'eventsimport'])->name('eventsimport');
Route::post('eventsexcel', [TrucksController::class, 'eventsexcel'])->name('eventsexcel');
Route::get('eventscreate', [TrucksController::class, 'eventscreate'])->name('eventscreate');
Route::get('strip/{truck_no}',[TrucksController::class,'strip'])->name('strip');
Route::post('changedriver/{truck_no}', [TrucksController::class, 'changedriver'])->name('changedriver');
Route::post('changeloading/{truck_no}', [TrucksController::class, 'changeloading'])->name('changeloading');
//Route::get('status/{truck_no}/{status}',[TrucksController::class,'status'])->name('status');