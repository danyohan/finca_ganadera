<?php

use App\Http\Controllers\AnimalController;
use App\Http\Controllers\PaddocksController;
use App\Http\Controllers\RaceController;
use App\Http\Controllers\testController;
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



Route::middleware(['auth:sanctum', 'verified'])->group(static function () {
    Route::get('animal', [AnimalController::class, 'index']);
    Route::delete('animal/{id}', [AnimalController::class, 'destroy'])->name('animal.destroy');
    Route::get('animal/{id}/edit', [AnimalController::class, 'edit']);
    Route::put('animal/{animal}', [AnimalController::class, 'update'])->name('animal.update');
    Route::get('animal/create', [AnimalController::class, 'create']);
    Route::post('animal', [AnimalController::class, 'store']);
});

Route::middleware(['auth:sanctum', 'verified'])->group(static function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    //Route::get('/register');
});

Route::middleware(['auth:sanctum', 'verified'])->group(static function () {
    Route::get('race', [RaceController::class, 'index']);
    Route::delete('race/{id}', [RaceController::class, 'destroy'])->name('race.destroy');
    Route::get('race/{id}/edit', [RaceController::class, 'edit']);
    Route::put('race/{race}', [RaceController::class, 'update'])->name('race.update');
    Route::get('race/create', [RaceController::class, 'create']);
    Route::post('race', [RaceController::class, 'store']);
});


Route::middleware(['auth:sanctum', 'verified'])->group(static function () {
    Route::get('paddocks', [PaddocksController::class, 'index']);
    Route::delete('paddocks/{id}', [PaddocksController::class, 'destroy'])->name('paddocks.destroy');
    Route::get('paddocks/{id}/edit', [PaddocksController::class, 'edit']);
    Route::put('paddocks/{paddock}', [PaddocksController::class, 'update'])->name('paddocks.update');
    Route::get('paddocks/create', [PaddocksController::class, 'create']);
    Route::post('paddocks', [PaddocksController::class, 'store']);
});
