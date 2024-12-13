<?php

use Livewire\Volt\Component;
use Illuminate\Support\Facades\Auth;

new class extends Component {
    public function mount()
    {
        // Verify user is authenticated and email is verified
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $user = Auth::user();

        if (!$user->hasVerifiedEmail()) {
            \Log::warning('Unverified user access attempt', [
                'user_id' => $user->id,
                'email' => $user->email
            ]);
            return redirect()->route('verification.notice');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
};
?>

<div class="container px-4 py-8 mx-auto">
    <div class="p-6 bg-white rounded-lg shadow-md">
        <h1 class="mb-4 text-2xl font-bold">Home Page</h1>

        <div class="flex items-center justify-between">
            <p>Welcome, {{ Auth::user()->name }}!</p>
            <button
                wire:click="logout"
                class="px-4 py-2 text-white bg-red-500 rounded hover:bg-red-600"
            >
                Logout
            </button>
        </div>

        <div class="mt-6">
            <h2 class="mb-4 text-xl font-semibold">Dashboard</h2>
            <p>This is your home page with some basic information.</p>
        </div>
    </div>
</div>
