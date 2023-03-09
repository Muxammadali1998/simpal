<?php

use App\Http\Controllers\CityController;
use App\Http\Controllers\ObyektController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\SiteController;
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


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
   
    Route::get('/',[SiteController::class, 'index'])->name('home');
    Route::get('/region/{id}', [SiteController::class, 'region']);
    Route::get('/object/{id}', [SiteController::class, 'obyekt']);
    Route::resource('/city', CityController::class);
    Route::resource('/region', RegionController::class);
    Route::post('/region/{id}', [RegionController::class, 'update']);
    Route::post('/city/{id}', [CityController::class, 'update']);
    Route::post('/obyekt/{id}', [ObyektController::class, 'edit']);
    Route::apiResource('/obyekt', ObyektController::class);
});

require __DIR__.'/auth.php';
