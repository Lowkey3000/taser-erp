<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{LandingController, LeadController};

Route::get('/', [LandingController::class, 'index'])->name('landing');
Route::post('/contacto', [LeadController::class, 'store'])->name('leads.store')->middleware('throttle:5,1');
