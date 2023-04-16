<?php
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\RaceController;

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


Route::resource('paddocks', 'App\http\Controllers\PaddocksController');

Route::middleware(['auth:sanctum', 'verified'])->group(static function () {
    Route::get('animal', [AnimalController::class, 'index']);
    Route::delete('animal/{id}', [AnimalController::class,'destroy'])->name('animal.destroy');
    Route::get('animal/{id}/edit', [AnimalController::class,'edit']);
    Route::put('animal/{animal}', [AnimalController::class,'update'])->name('animal.update');
    Route::get('animal/create', [AnimalController::class,'create']);
    Route::post('animal', [AnimalController::class,'store']);
});

Route::middleware(['auth:sanctum', 'verified'])->group(static function () {
    Route::get('/dashboard', function () { return view('dashboard');})->name('dashboard');
    //Route::get('/register');
});

Route::middleware(['auth:sanctum', 'verified'])->group(static function () {
    Route::get('race', [RaceController::class, 'index']);
    Route::delete('race/{id}', [RaceController::class,'destroy'])->name('race.destroy');
    Route::get('race/{id}/edit', [RaceController::class,'edit']);
    Route::put('race/{animal}', [RaceController::class,'update'])->name('race.update');
    Route::get('race/create', [RaceController::class,'create']);
    Route::post('race', [RaceController::class,'store']);
});

