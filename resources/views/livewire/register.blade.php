<?php

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Volt\Component;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\ParentProfile;
use App\Models\TeacherProfile;
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
    public $role = 'parent'; // Default role

    // Additional fields for Teacher
    public $qualification = '';
    public $subject_specialty = '';

    // Additional fields for Parent
    public $children_count = '';
    public $emergency_contact = '';

    public function updatedRole()
    {
        // Reset additional fields when role changes
        $this->qualification = '';
        $this->subject_specialty = '';
        $this->children_count = '';
        $this->emergency_contact = '';
    }

    public function register()
    {
        try {
            $baseValidation = [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users,email',
                'number' => 'required|numeric|unique:users,number',
                'password' => 'required|string|min:8|same:password_confirmation',
                'role' => 'required|in:parent,teacher',
            ];

            // Add role-specific validation rules
            if ($this->role === 'teacher') {
                $baseValidation['qualification'] = 'required|string|max:255';
                $baseValidation['subject_specialty'] = 'required|string|max:255';
            } else {
                $baseValidation['children_count'] = 'required|integer|min:1';
                $baseValidation['emergency_contact'] = 'required|string|max:255';
            }

            $validated = $this->validate($baseValidation);

            $user = User::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'number' => $validated['number'],
                'password' => Hash::make($validated['password']),
                'role' => $validated['role'],
            ]);

            // Create role-specific profile
            if ($this->role === 'teacher') {
                TeacherProfile::create([
                    'user_id' => $user->id,
                    'qualification' => $validated['qualification'],
                    'subject_specialty' => $validated['subject_specialty'],
                ]);
            } else {
                ParentProfile::create([
                    'user_id' => $user->id,
                    'children_count' => $validated['children_count'],
                    'emergency_contact' => $validated['emergency_contact'],
                ]);
            }

            \Log::info('User created', [
                'user_id' => $user->id,
                'email' => $user->email
            ]);

            if ($user && $user->email) {
                $user->sendEmailVerificationNotification();
            }

            Auth::login($user);

            return redirect()->route('verification.notice')
                ->with('message', 'Please check your email for the verification link.');

        } catch (\Exception $e) {
            \Log::error('Registration Error', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            return back()->withError('Registration failed: ' . $e->getMessage());
        }
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
            <!-- Role Selection Switch -->
            <div class="mb-6">
                <label class="block mb-2 text-sm font-medium text-gray-700">Select Role</label>
                <div class="flex items-center justify-center space-x-4">
                    <button
                        type="button"
                        wire:click="$set('role', 'parent')"
                        class="px-6 py-2 text-sm font-medium rounded-lg transition-all duration-200
                            {{$role === 'parent'
                                ? 'bg-blue-600 text-white shadow-lg scale-105 hover:bg-blue-700'
                                : 'bg-gray-100 text-gray-700 hover:bg-gray-200 hover:scale-105'
                            }}"
                    >
                        <div class="flex items-center space-x-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"
                                />
                            </svg>
                            <span>Parent</span>
                        </div>
                    </button>
                    <button
                        type="button"
                        wire:click="$set('role', 'teacher')"
                        class="px-6 py-2 text-sm font-medium rounded-lg transition-all duration-200
                            {{$role === 'teacher'
                                ? 'bg-blue-600 text-white shadow-lg scale-105 hover:bg-blue-700'
                                : 'bg-gray-100 text-gray-700 hover:bg-gray-200 hover:scale-105'
                            }}"
                    >
                        <div class="flex items-center space-x-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 6h-4V4a2 2 0 00-2-2h-2a2 2 0 00-2 2v2H5a2 2 0 00-2 2v12a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2zm-8-2h2v2h-2V4zm6 14H7a1 1 0 01-1-1v-7a1 1 0 011-1h10a1 1 0 011 1v7a1 1 0 01-1 1z"
                                />
                            </svg>
                            <span>Teacher</span>
                        </div>
                    </button>
                </div>
            </div>

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

            <!-- Conditional Fields Based on Role -->
            @if($role === 'teacher')
            <div class="mb-6">
                <x-input
                    label="Qualification"
                    name="qualification"
                    wire:model="qualification"
                    icon="o-academic-cap"
                    inline
                />
            </div>
            <div class="mb-6">
                <x-input
                    label="Subject Specialty"
                    name="subject_specialty"
                    wire:model="subject_specialty"
                    icon="o-book-open"
                    inline
                />
            </div>
            @else
            <div class="mb-6">
                <x-input
                    label="Number of Children"
                    name="children_count"
                    wire:model="children_count"
                    type="number"
                    icon="o-users"
                    inline
                />
            </div>
            <div class="mb-6">
                <x-input
                    label="Emergency Contact"
                    name="emergency_contact"
                    wire:model="emergency_contact"
                    icon="o-phone"
                    inline
                />
            </div>
            @endif

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
