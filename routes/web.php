<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\ProdectController;
use App\Models\Customer;
use GuzzleHttp\Middleware;
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

Route::view('/','welcome');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::view ('/dashboard', 'dashboard')->name('dashboard');
});

Route::group([ 'Middleware' => 'auth'] , function(){
    Route::resource('prodects' , ProdectController::class);
    Route::resource('employees' , EmployeesController::class);
    Route::resource('customers' , CustomerController::class);
    Route::POST('customers/{id}', [CustomerController::class , 'update'])->name('customers.update');
    Route::POST('prodects/{id}', [ProdectController::class , 'update'])->name('prodects.update');
});
