<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\SuppliersController;
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



Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/', function () {
        return redirect('/dashboard');
    })->name('/');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/suppliers', [SuppliersController::class, 'index'])->name('suppliers');
    Route::post('/suppliers', [SuppliersController::class, 'create'])->name('suppliers.create');
    Route::delete('/suppliers/{id}', [SuppliersController::class, 'delete'])->name('suppliers.delete');

    Route::get('/customers', [CustomerController::class, 'index'])->name('customers');
    Route::post('/customers', [CustomerController::class, 'create'])->name('customers.create');
    Route::delete('/customers/{id}', [CustomerController::class, 'delete'])->name('customers.delete');


    Route::get('/order', [OrderController::class, 'index'])->name('order');
    Route::get('/purchase', [PurchaseController::class, 'index'])->name('purchase');
});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
