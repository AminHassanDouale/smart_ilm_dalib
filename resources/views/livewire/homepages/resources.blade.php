<?php

use Livewire\Volt\Component;

new class extends Component {
    //
}; ?>

<div class="container px-4 mx-auto md:px-6 lg:px-8">
    <!-- Search Bar -->
    <div class="flex items-center mb-4">
        <div class="relative w-full max-w-lg">
            <input
                type="text"
                placeholder="Search courses..."
                class="w-full px-4 py-2 pl-10 border rounded-lg focus:outline-none focus:ring focus:ring-green-200"
            />
            <svg
                class="absolute left-3 top-2.5 text-gray-400"
                xmlns="http://www.w3.org/2000/svg"
                width="20"
                height="20"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="2"
                stroke-linecap="round"
                stroke-linejoin="round"
            >
                <circle cx="11" cy="11" r="8"></circle>
                <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
            </svg>
        </div>
        <button class="px-4 py-2 ml-4 text-white bg-black rounded-lg hover:bg-green-600">
            Search
        </button>
    </div>

    <!-- Course Cards -->
    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
        <!-- Example Card -->
        <div class="transition-shadow bg-white rounded-lg shadow-md hover:shadow-lg">
            <img
                src="https://via.placeholder.com/300"
                alt="Course Thumbnail"
                class="object-cover w-full h-48"
            />
            <div class="p-4">
                <div class="flex items-center gap-2 mb-2">
                    <span class="px-2 py-1 text-sm text-black border rounded shadow">Quran</span>
                    <span class="px-2 py-1 text-sm text-black border rounded shadow">Beginner</span>
                </div>
                <h3 class="mb-2 text-lg font-bold">Quran Memorization</h3>
                <p class="mb-4 text-sm text-gray-600">
                    Learn to memorize the Quran with proper techniques and guidance.
                </p>
                <div class="flex items-center justify-between">
                    <span class="text-lg font-bold">$80</span>
                    <button class="px-4 py-2 text-white bg-black rounded hover:bg-green-600">
                        Enroll Now
                    </button>
                </div>
            </div>
        </div>

        <!-- Repeat Example Card -->
        <div class="transition-shadow bg-white rounded-lg shadow-md hover:shadow-lg">
            <img
                src="https://via.placeholder.com/300"
                alt="Course Thumbnail"
                class="object-cover w-full h-48"
            />
            <div class="p-4">
                <div class="flex items-center gap-2 mb-2">
                    <span class="px-2 py-1 text-sm text-black border rounded shadow">Tajweed</span>
                    <span class="px-2 py-1 text-sm text-black border rounded shadow">Intermediate</span>
                </div>
                <h3 class="mb-2 text-lg font-bold">Tajweed Mastery</h3>
                <p class="mb-4 text-sm text-gray-600">
                    Master the rules of Tajweed with expert guidance.
                </p>
                <div class="flex items-center justify-between">
                    <span class="text-lg font-bold">$80</span>
                    <button class="px-4 py-2 text-white bg-black rounded hover:bg-green-600">
                        Enroll Now
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>







