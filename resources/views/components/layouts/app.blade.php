<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, viewport-fit=cover">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ isset($title) ? $title.' - '.config('app.name') : config('app.name') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <style>
        @media print {
            .print-hide {
                display: none;
            }
        }

        /* Sidebar adjustments */
        aside {
            position: relative;
            top: 20px; /* Adjust the vertical offset */
            margin-left: 20px; /* Add spacing from the left */
            max-width: 250px; /* Adjust sidebar width */
        }

        /* Responsive sidebar for smaller screens */
        @media (max-width: 768px) {
            aside {
                margin: 0 auto;
                width: 100%;
                top: 10px;
                position: relative;
            }
        }

        /* Main content responsiveness */
        main {
            margin-top: 20px;
        }
    </style>
</head>
<body class="h-screen bg-gray-100">

    <!-- Navigation -->
    <nav class="fixed top-0 left-0 z-10 w-full bg-white shadow-md">
        <div class="flex items-center justify-between px-6 py-4">
            <!-- Brand Logo -->
            <div class="flex items-center space-x-4">
                <span class="flex items-center text-2xl font-bold text-gray-900">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="32" height="32" fill="none">
                        <path d="M20.1475 5.43668L19.4895 4.39419C19.1252 3.81704 18.943 3.52846 18.7044 3.50178C18.4657 3.4751 18.1993 3.74896 17.6664 4.29667C15.9443 6.06689 14.2221 5.80537 12.5 8.98839C10.7779 5.80537 9.05571 6.06689 7.33356 4.29667C6.80071 3.74896 6.53429 3.4751 6.29565 3.50178C6.057 3.52846 5.87485 3.81704 5.51054 4.39419L4.85251 5.43668C4.59827 5.83945 4.47115 6.04084 4.50553 6.2528C4.53991 6.46476 4.72324 6.60998 5.08991 6.90042L11.2724 11.7977C11.8634 12.2659 12.159 12.5 12.5 12.5C12.841 12.5 13.1366 12.2659 13.7276 11.7977L19.9101 6.90042C20.2768 6.60998 20.4601 6.46476 20.4945 6.2528C20.5288 6.04084 20.4017 5.83945 20.1475 5.43668Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M22.5 8.5L6.5 20.5V15.8043M2.5 8.5L18.5 20.5V15.8043" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    Smart-Ilm-Dalib
                </span>
            </div>

            <!-- Burger Menu for Mobile -->
            <button id="menu-toggle" class="md:hidden focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>

            <!-- Desktop Menu -->
            <!-- Desktop Menu -->
            <div class="hidden space-x-6 md:flex">
                <!-- Dashboard Link -->
                <a href="#dashboard" class="flex items-center text-gray-700 hover:text-green-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path d="M2 18C2 16.4596 2 15.6893 2.34673 15.1235C2.54074 14.8069 2.80693 14.5407 3.12353 14.3467C3.68934 14 4.45956 14 6 14C7.54044 14 8.31066 14 8.87647 14.3467C9.19307 14.5407 9.45926 14.8069 9.65327 15.1235C10 15.6893 10 16.4596 10 18C10 19.5404 10 20.3107 9.65327 20.8765C9.45926 21.1931 9.19307 21.4593 8.87647 21.6533C8.31066 22 7.54044 22 6 22C4.45956 22 3.68934 22 3.12353 21.6533C2.80693 21.4593 2.54074 21.1931 2.34673 20.8765C2 20.3107 2 19.5404 2 18Z" />
                        <path d="M14 18C14 16.4596 14 15.6893 14.3467 15.1235C14.5407 14.8069 14.8069 14.5407 15.1235 14.3467C15.6893 14 16.4596 14 18 14C19.5404 14 20.3107 14 20.8765 14.3467C21.1931 14.5407 21.4593 14.8069 21.6533 15.1235C22 15.6893 22 16.4596 22 18C22 19.5404 22 20.3107 21.6533 20.8765C21.4593 21.1931 21.1931 21.4593 20.8765 21.6533C20.3107 22 19.5404 22 18 22C16.4596 22 15.6893 22 15.1235 21.6533C14.8069 21.4593 14.5407 21.1931 14.3467 20.8765C14 20.3107 14 19.5404 14 18Z" />
                        <path d="M2 6C2 4.45956 2 3.68934 2.34673 3.12353C2.54074 2.80693 2.80693 2.54074 3.12353 2.34673C3.68934 2 4.45956 2 6 2C7.54044 2 8.31066 2 8.87647 2.34673C9.19307 2.54074 9.45926 2.80693 9.65327 3.12353C10 3.68934 10 4.45956 10 6C10 7.54044 10 8.31066 9.65327 8.87647C9.45926 9.19307 9.19307 9.45926 8.87647 9.65327C8.31066 10 7.54044 10 6 10C4.45956 10 3.68934 10 3.12353 9.65327C2.80693 9.45926 2.54074 9.19307 2.34673 8.87647C2 8.31066 2 7.54044 2 6Z" />
                    </svg>
                    Dashboard
                </a>

                <!-- Courses Link -->
                <a href="#courses" class="flex items-center text-gray-700 hover:text-green-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path d="M20.5 16.9286V10C20.5 6.22876 20.5 4.34315 19.3284 3.17157C18.1569 2 16.2712 2 12.5 2H11.5C7.72876 2 5.84315 2 4.67157 3.17157C3.5 4.34315 3.5 6.22876 3.5 10V19.5" />
                        <path d="M20.5 17H6C4.61929 17 3.5 18.1193 3.5 19.5C3.5 20.8807 4.61929 22 6 22H20.5" />
                        <path d="M20.5 22C19.1193 22 18 20.8807 18 19.5C18 18.1193 19.1193 17 20.5 17" />
                        <path d="M15 7L9 7" />
                        <path d="M12 11L9 11" />
                    </svg>
                    Courses
                </a>
                @if (Auth::check())
                <!-- Home Link for Authenticated Users -->
                <a href="/home" class="flex items-center text-gray-700 hover:text-green-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path d="M5.08069 15.2964C3.86241 16.0335 0.668175 17.5386 2.61368 19.422C3.56404 20.342 4.62251 21 5.95325 21H13.5468C14.8775 21 15.936 20.342 16.8863 19.422C18.8318 17.5386 15.6376 16.0335 14.4193 15.2964C11.5625 13.5679 7.93752 13.5679 5.08069 15.2964Z" />
                        <path d="M13.5 7C13.5 9.20914 11.7091 11 9.5 11C7.29086 11 5.5 9.20914 5.5 7C5.5 4.79086 7.29086 3 9.5 3C11.7091 3 13.5 4.79086 13.5 7Z" />
                    </svg>
                    Home
                </a>
            @else
                <!-- Login Link for Unauthenticated Users -->
                <a href="/login" class="flex items-center text-gray-700 hover:text-green-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path d="M5.08069 15.2964C3.86241 16.0335 0.668175 17.5386 2.61368 19.422C3.56404 20.342 4.62251 21 5.95325 21H13.5468C14.8775 21 15.936 20.342 16.8863 19.422C18.8318 17.5386 15.6376 16.0335 14.4193 15.2964C11.5625 13.5679 7.93752 13.5679 5.08069 15.2964Z" />
                        <path d="M13.5 7C13.5 9.20914 11.7091 11 9.5 11C7.29086 11 5.5 9.20914 5.5 7C5.5 4.79086 7.29086 3 9.5 3C11.7091 3 13.5 4.79086 13.5 7Z" />
                    </svg>
                    Login
                </a>
            @endif


            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden w-full bg-white shadow-md">
            <div class="flex flex-col px-6 py-4 space-y-4">
                <a href="/" class="text-gray-700 hover:text-green-500">Home</a>
                <a href="/courses" class="text-gray-700 hover:text-green-500">Courses</a>
                <a href="/about" class="text-gray-700 hover:text-green-500">About</a>
                @auth
                <a href="/dashboard" class="text-gray-700 hover:text-green-500">Dashboard</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="text-red-600 hover:underline">Logout</button>
                </form>
                @else
                <a href="/login" class="text-gray-700 hover:text-green-500">Login</a>
                <a href="/register" class="px-4 py-2 text-white bg-green-600 rounded-lg hover:bg-green-700">Register</a>
                @endauth
            </div>
        </div>
    </nav>
    <div class="flex flex-wrap mt-16 ml-20 md:flex-nowrap">

    <!-- Sidebar Filters -->
    <aside class="w-full p-4 bg-white rounded-lg shadow-lg md:w-1/4 md:ml-6 lg:ml-10">
        <h2 class="mb-6 text-lg font-bold text-gray-900">Filters</h2>

        <!-- Category Section -->
        <div class="mb-6">
            <h3 class="mb-4 font-semibold text-gray-700 text-md">Category</h3>
            <ul class="space-y-2">
                <li>
                    <label class="flex items-center text-sm text-gray-700">
                        <input type="radio" name="category" value="all" class="mr-2">
                        All Courses
                    </label>
                </li>
                <li>
                    <label class="flex items-center text-sm text-gray-700">
                        <input type="radio" name="category" value="quran" class="mr-2">
                        Quran
                    </label>
                </li>
                <li>
                    <label class="flex items-center text-sm text-gray-700">
                        <input type="radio" name="category" value="tajweed" class="mr-2">
                        Tajweed
                    </label>
                </li>
                <li>
                    <label class="flex items-center text-sm text-gray-700">
                        <input type="radio" name="category" value="tarteel" class="mr-2">
                        Tarteel
                    </label>
                </li>
            </ul>
        </div>

        <hr class="mb-6 border-t border-gray-300">

        <!-- Level Section -->
        <div class="mb-6">
            <h3 class="mb-4 font-semibold text-gray-700 text-md">Level</h3>
            <ul class="space-y-2">
                <li>
                    <label class="flex items-center text-sm text-gray-700">
                        <input type="radio" name="level" value="all" class="mr-2">
                        All Levels
                    </label>
                </li>
                <li>
                    <label class="flex items-center text-sm text-gray-700">
                        <input type="radio" name="level" value="beginner" class="mr-2">
                        Beginner
                    </label>
                </li>
                <li>
                    <label class="flex items-center text-sm text-gray-700">
                        <input type="radio" name="level" value="intermediate" class="mr-2">
                        Intermediate
                    </label>
                </li>
                <li>
                    <label class="flex items-center text-sm text-gray-700">
                        <input type="radio" name="level" value="advanced" class="mr-2">
                        Advanced
                    </label>
                </li>
            </ul>
        </div>

        <hr class="mb-6 border-t border-gray-300">

        <!-- Price Section -->
        <div>
            <h3 class="mb-4 font-semibold text-gray-700 text-md">Price</h3>
            <ul class="space-y-2">
                <li>
                    <label class="flex items-center text-sm text-gray-700">
                        <input type="radio" name="price" value="all" class="mr-2">
                        All Prices
                    </label>
                </li>
                <li>
                    <label class="flex items-center text-sm text-gray-700">
                        <input type="radio" name="price" value="free" class="mr-2">
                        Free
                    </label>
                </li>
                <li>
                    <label class="flex items-center text-sm text-gray-700">
                        <input type="radio" name="price" value="paid" class="mr-2">
                        Paid
                    </label>
                </li>
            </ul>
        </div>
    </aside>



    <!-- Main Content -->
      <main class="">
        {{ $slot }}
    </main>
</div>

    <x-toast />

    <!-- JavaScript for Burger Menu -->
    <script>
        document.getElementById('menu-toggle').addEventListener('click', function () {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        });
    </script>
</body>
</html>
