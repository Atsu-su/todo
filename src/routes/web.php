<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TodoController;
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

// TodoController
Route::get('/', [TodoController::class, 'index'])->name('index');
Route::post('/store', [TodoController::class, 'store'])->name('store');
Route::patch('/update/{id}', [TodoController::class, 'update'])->name('update');
Route::delete('/delete/{id}', [TodoController::class, 'destroy'])->name('delete');
Route::get('/search', [TodoController::class, 'search'])->name('search');
Route::post('/search', [TodoController::class, 'search'])->name('search');

// CategoryController
Route::get('/category', [CategoryController::class, 'index'])->name('category-index');
Route::post('/category/store', [CategoryController::class, 'store'])->name('category-store');
Route::patch('/category/update/{id}', [CategoryController::class, 'update'])->name('category-update');
Route::delete('/category/delete/{id}', [CategoryController::class, 'destroy'])->name('category-delete');
