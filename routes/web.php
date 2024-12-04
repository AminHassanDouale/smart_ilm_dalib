<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group that
| contains the "web" middleware group. Now create something great!
|
*/

// Public Routes
Volt::route('/', 'welcome'); // Welcome page
Volt::route('/login', 'login')->name('login'); // Login page
Volt::route('/register', 'register')->name('register'); // Registration page

// Authenticated Routes
    // Home page for authenticated users
    Volt::route('/homepages/home', 'homepages.home')->name('homepages.home');
    Volt::route('/homepages/resources', 'homepages.resources')->name('homepages.resources');

    // Logout Route
    Route::get('/logout', function () {
        auth()->logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect('/'); // Redirect to welcome or login page after logout
    })->name('logout');
