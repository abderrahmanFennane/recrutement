<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Models\contact;
use App\Models\organisation;

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


Route::get('/', [MainController::class, 'index'])->name('indexRoute');
Route::post('/', [MainController::class, 'store'])->name('submit-form');
Route::post('/show', [MainController::class, 'show'])->name('show-data');
Route::post('/edit', [MainController::class, 'update'])->name('edit-data');
Route::DELETE('{id}', [MainController::class, 'destroy'])->name('delete.contact');
Route::POST('/search', [MainController::class, 'search'])->name('search');