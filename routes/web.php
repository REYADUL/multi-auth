<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/admin/home', [App\Http\Controllers\HomeController::class, 'adminHome'])->name('admin-home')->middleware('is_admin');

Route::get('/unapproved', [App\Http\Controllers\HomeController::class, 'waitingPage'])->name('unapproved')->middleware('is_admin');

Route::put('/admin/home/update/{id}', [App\Http\Controllers\HomeController::class, 'update'])->name('update');

Route::delete('/admin/home/delete/{id}', [App\Http\Controllers\HomeController::class, 'delete'])->name('destroy');
