<?php

use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\changePasswordController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\UserController;
use App\Models\Enrigistrement;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

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

// Welcome
Volt::route('/', 'welcome');

// Login
Volt::route('/login', 'login')->name('login');

//Logout


Route::middleware('auth')->group(function () {
//    // home
    Volt::route('/home', 'dashboard.index');
//

Route::get('/logout', function () {
    auth()->logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();

    return redirect('/');
});
});
