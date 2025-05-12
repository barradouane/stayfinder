<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ProfileController;


Route::get('/', [PropertyController::class, 'index'])
    ->name('home');

Route::resource('properties', PropertyController::class)
    ->only(['index', 'show']);



Route::middleware('auth')->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware('verified')
      ->name('dashboard');

    Route::prefix('profile')
        ->name('profile.')
        ->group(function () {
            Route::get('/', [ProfileController::class, 'edit'])->name('edit');
            Route::patch('/', [ProfileController::class, 'update'])->name('update');
            Route::delete('/', [ProfileController::class, 'destroy'])->name('destroy');
        });

    Route::get('bookings', [BookingController::class, 'index'])
        ->name('bookings.index');
    Route::delete('bookings/{booking}', [BookingController::class, 'destroy'])
        ->name('bookings.destroy');

    Route::get('properties/{property}/bookings/create', [BookingController::class, 'create'])
        ->name('bookings.create');
        
    Route::post('properties/{property}/bookings', [BookingController::class, 'store'])
        ->name('bookings.store');
});

require __DIR__ . '/auth.php';
