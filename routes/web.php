<?php

use App\Http\Controllers\LeadsController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\SalesController;
use App\Models\Sales;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/sales', 'App\Http\Controllers\SalesController@index');

Route::resource('leads', LeadsController::class);
Route::get('/leads/search', [LeadsController::class, 'search'])->name('leads.search');
Route::resource('products', ProductsController::class);
Route::resource('sales', SalesController::class);

Route::get('/', function () {
    return view('layout');
});
