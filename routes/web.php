<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

// Route::get('/truckexpenses', function () {
//     return view('TruckExpenses');
// });
Auth::routes(['register'=>false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//trucksexpenses
Route::prefix('trucksexpenses')->middleware('auth')->name('admin.trucksexpenses.')->group(base_path('routes/web/trucksexpenses.php'));
//admin
Route::prefix('adminexpenses')->middleware('auth')->name('admin.adminexpenses.')->group(base_path('routes/web/adminexpenses.php'));
//breakages
Route::prefix('breakages')->middleware('auth')->name('admin.breakages.')->group(base_path('routes/web/breakages.php'));
//iou
Route::prefix('iou')->middleware('auth')->name('admin.iou.')->group(base_path('routes/web/iou.php'));
//reports
Route::prefix('reports')->middleware('auth')->name('admin.reports.')->group(base_path('routes/web/reports.php'));
//AGO
Route::prefix('ago')->middleware('auth')->name('admin.ago.')->group(base_path('routes/web/ago.php'));
//Income
Route::prefix('income')->middleware('auth')->name('admin.income.')->group(base_path('routes/web/income.php'));
//trip allowance
Route::prefix('tripsallowance')->middleware('auth')->name('admin.tripsallowance.')->group(base_path('routes/web/tripsallowance.php'));
//trucks
Route::prefix('trucks')->middleware('auth')->name('admin.trucks.')->group(base_path('routes/web/trucks.php'));
//driver
Route::prefix('driver')->middleware('auth')->name('admin.driver.')->group(base_path('routes/web/drivers.php'));