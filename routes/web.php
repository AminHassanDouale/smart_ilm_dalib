<?php
// routes/web.php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use Illuminate\Support\Facades\Log;


// Public Routes
Volt::route('/', 'welcome');
Volt::route('/login', 'login')->middleware('guest')->name('login');
Volt::route('/register', 'register')->middleware('guest')->name('register');

// Protected Routes
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/homepages/resources', function () {
        // Add debug log
        Log::info('Resources route hit', [
            'user_id' => auth()->id(),
            'time' => now()
        ]);

        return view('livewire.homepages.resources');
    })->name('homepages.resources');
});

// Handle auth redirects
Route::redirect('/home', '/homepages/resources');
