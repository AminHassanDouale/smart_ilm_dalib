<?php
// app/Http/Controllers/Auth/LoginController.php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($validated, $request->boolean('remember'))) {
            $user = Auth::user();

            if ($user->hasVerifiedEmail()) {
                $request->session()->regenerate();

                Log::info('Login successful, attempting direct redirect', [
                    'user_id' => $user->id,
                    'email' => $user->email
                ]);

                // Return a direct redirect response instead of JSON
                return redirect()->intended('/homepages/resources');
            }

            Auth::logout();
            return back()->withErrors([
                'email' => 'Please verify your email first.'
            ]);
        }

        return back()->withErrors([
            'email' => 'Invalid credentials.'
        ]);
    }
}

