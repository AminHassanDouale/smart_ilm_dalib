<?php

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Volt\Component;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Notifications\WelcomeEmailNotification;

new
#[Layout('components.layouts.empty')]
#[Title('Register')]
class extends Component {
    public $name = '';
    public $email = '';
    public $number = '';
    public $password = '';
    public $password_confirmation = '';

    public function register()
    {
        $validated = $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'number' => 'required|numeric|unique:users,number',
            'password' => 'required|string|min:8|same:password_confirmation',
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'number' => $validated['number'],
            'password' => Hash::make($validated['password']),
        ]);
  // Send the welcome email notification
  $user->notify(new WelcomeEmailNotification());
        // Auto-login after registration
        Auth::login($user);

        // Redirect to intended page or dashboard
        return redirect()->intended('/homepages/home');
    }
};

?>

<div class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="w-full max-w-lg p-10 bg-white border rounded-lg shadow-lg">
        <!-- Centered SVG Icon -->
        <div class="flex justify-center mb-6">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="48" height="48" color="#000000" fill="none">
                <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z" fill="currentColor" />
            </svg>
        </div>

        <!-- Registration Form Heading -->
        <div class="mb-8 text-center">
            <h2 class="pt-2 text-3xl font-bold">Create Account</h2>
            <p class="pt-3 text-gray-600">Join Smart-Ilm-Dalib to start your learning journey</p>
        </div>

        <!-- Registration Form -->
        <x-form wire:submit="register">
            @csrf
            <div class="mb-6">
                <x-input
                    label="Full Name"
                    name="name"
                    wire:model="name"
                    icon="o-user"
                    inline
                />
            </div>
            <div class="mb-6">
                <x-input
                    label="Email"
                    name="email"
                    wire:model="email"
                    type="email"
                    icon="o-envelope"
                    inline
                />
            </div>
            <div class="mb-6">
                <x-input
                    label="Phone Number"
                    name="number"
                    wire:model="number"
                    type="tel"
                    icon="o-phone"
                    inline
                />
            </div>
            <div class="mb-6">
                <x-input
                    label="Password"
                    name="password"
                    wire:model="password"
                    type="password"
                    icon="o-key"
                    inline
                />
            </div>
            <div class="mb-6">
                <x-input
                    label="Confirm Password"
                    name="password_confirmation"
                    wire:model="password_confirmation"
                    type="password"
                    icon="o-key"
                    inline
                />
            </div>
            <x-slot:actions>
                <x-button
                    label="Register"
                    type="submit"
                    icon="o-paper-airplane"
                    class="w-full btn-primary"
                    spinner="register"
                />
            </x-slot:actions>
        </x-form>

        <!-- Login Link -->
        <div class="mt-6 text-center">
            <p class="text-gray-600">
                Already have an account?
                <a href="{{ route('login') }}" class="text-blue-500 hover:underline">
                    Login
                </a>
            </p>
        </div>
    </div>
</div>
