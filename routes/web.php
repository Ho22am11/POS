<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\permissionController;
use App\Http\Controllers\ProdectController;
use App\Http\Controllers\RoleController;
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
    Route::get('/dashboard', [ProdectController::class , 'viewprodect'])->name('dashboard');
});

Route::group([ 'Middleware' => 'auth'] , function(){
    Route::resource('prodects' , ProdectController::class);
    Route::POST('prodects/{id}', [ProdectController::class , 'update'])->name('prodects.update');
    Route::resource('employees' , EmployeesController::class);
    Route::POST('employees/{id}', [EmployeesController::class , 'update'])->name('prodects.update');
    Route::resource('customers' , CustomerController::class);
    Route::POST('customers/{id}', [CustomerController::class , 'update'])->name('customers.update');
    Route::resource('orders', OrderController::class );
    Route::resource('roles', RoleController::class );
    Route::resource('permissions', permissionController::class );
    Route::POST('roles/{id}', [RoleController::class , 'update'])->name('roles.update');
    
    
});
