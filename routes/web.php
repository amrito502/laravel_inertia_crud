<?php

use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;
// use Inertia\Inertia;
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

// Route::get('/', function () {
//     return inertia::render('create');
// });


Route::get('/customers/create',[CustomerController::class,'create'])->name('create');
Route::get('/customers',[CustomerController::class,'index'])->name('index');
Route::post('/customers',[CustomerController::class,'store'])->name('store');
Route::delete('/customers/{id}',[CustomerController::class,'destroy'])->name('destroy');
Route::get('/customers/{customer}/edit',[CustomerController::class,'edit'])->name('edit');
Route::put('/customers/{customer}',[CustomerController::class,'update'])->name('update');




//
