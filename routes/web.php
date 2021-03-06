<?php

use App\Http\Controllers\NipController;
use Illuminate\Support\Facades\Route;

Route::get('/', [NipController::class, 'index'])->name('home');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
