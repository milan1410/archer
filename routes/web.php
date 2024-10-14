<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\TimeLogForm;
use App\Livewire\LoggedHours;

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
    // Correct way to define Livewire component routes
    Route::get('/time-log', TimeLogForm::class)->name('time-log.form');
    Route::get('/logged-hours', LoggedHours::class)->name('logged-hours.index');
    
    // Route for exporting logs to CSV
    Route::get('/logged-hours/export', LoggedHours::class . '@export')->name('logged-hours.export');
    
});
