<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ParkingController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


// Route::middleware([
//     'admin',
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });


    Route::get('/parking', [ParkingController::class, 'showForm'])->name('showForm');
    Route::post('/parking', [ParkingController::class, 'submitForm'])->name('submitForm');

