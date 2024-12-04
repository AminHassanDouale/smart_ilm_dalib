<?php

use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Volt\Component;

new
#[Layout('components.layouts.empty')]
#[Title('Welcome')]
class extends Component {

}; ?>



<main class="bg-gray-100 font-montserrat">

    <!-- Navigation -->
    <nav class="absolute top-0 left-0 z-10 flex items-center justify-between w-full px-6 py-4 bg-white shadow-md">
        <div class="flex items-center space-x-4">
            <!-- Brand Logo -->
            <span class="flex items-center text-xl font-bold text-gray-900">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="48" height="48" fill="none">
                    <path d="M20.1475 5.43668L19.4895 4.39419C19.1252 3.81704 18.943 3.52846 18.7044 3.50178C18.4657 3.4751 18.1993 3.74896 17.6664 4.29667C15.9443 6.06689 14.2221 5.80537 12.5 8.98839C10.7779 5.80537 9.05571 6.06689 7.33356 4.29667C6.80071 3.74896 6.53429 3.4751 6.29565 3.50178C6.057 3.52846 5.87485 3.81704 5.51054 4.39419L4.85251 5.43668C4.59827 5.83945 4.47115 6.04084 4.50553 6.2528C4.53991 6.46476 4.72324 6.60998 5.08991 6.90042L11.2724 11.7977C11.8634 12.2659 12.159 12.5 12.5 12.5C12.841 12.5 13.1366 12.2659 13.7276 11.7977L19.9101 6.90042C20.2768 6.60998 20.4601 6.46476 20.4945 6.2528C20.5288 6.04084 20.4017 5.83945 20.1475 5.43668Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M22.5 8.5L6.5 20.5V15.8043M2.5 8.5L18.5 20.5V15.8043" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                Smart-Ilm-Dalib
            </span>
        </div>

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
    </nav>


    <!-- Mobile Menu -->
    <div id="mobile-menu" class="absolute left-0 hidden w-full bg-white shadow-md top-16 md:hidden">
        <div class="flex flex-col p-6 space-y-4">
            <a href="#dashboard" class="text-gray-700 hover:text-green-500">Dashboard</a>
            <a href="#courses" class="text-gray-700 hover:text-green-500">Courses</a>
            <a href="#profile" class="text-gray-700 hover:text-green-500">Profile</a>
        </div>
    </div>

    <!-- Hero Section -->
    <div class="flex flex-col items-center justify-center w-full h-[70vh]">
        <h1 class="text-4xl font-bold text-gray-900 md:text-6xl animated-title">
            Learn Quran Online with Expert Teachers
        </h1>
        <p class="mt-4 text-lg text-gray-600 md:text-xl">
            Join our interactive online platform for personalized Quran, Tajweed, and Tarteel lessons from certified instructors.
        </p>
        <div class="flex justify-center mt-8 space-x-4">
            <a href="/home" class="px-6 py-3 text-lg text-white bg-black rounded-md hover:bg-gray-800">
                Browse Courses
            </a>
            <a href="/login" class="px-6 py-3 text-lg text-black bg-white border border-black rounded-md hover:bg-gray-100">
                Get Started
            </a>
        </div>
    </div>


    <!-- Why Choose Section -->
    <!-- Why Choose Section -->
    <!-- Why Choose Section -->
    <section class="py-20 bg-gray-50">
        <div class="max-w-6xl px-4 mx-auto text-center sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold text-gray-900 md:text-4xl">Why Choose Smart-Ilm-Dalib?</h2>
            <div class="grid grid-cols-1 mt-12 gap-y-16 gap-x-10 md:grid-cols-2 lg:grid-cols-4">
                <!-- Card 1 -->
                <div class="p-6 transition duration-300 ease-in-out bg-white border rounded-lg shadow-md hover:bg-green-500 hover:text-white">
                    <div class="flex justify-center mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="48" height="48" color="#000000" fill="none">
                            <path d="M2 2H16C17.8856 2 18.8284 2 19.4142 2.58579C20 3.17157 20 4.11438 20 6V12C20 13.8856 20 14.8284 19.4142 15.4142C18.8284 16 17.8856 16 16 16H9" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M10 6.5H16" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M2 17V13C2 12.0572 2 11.5858 2.29289 11.2929C2.58579 11 3.05719 11 4 11H6M2 17H6M2 17V22M6 17V11M6 17V22M6 11H9H12" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M6 6.5C6 7.60457 5.10457 8.5 4 8.5C2.89543 8.5 2 7.60457 2 6.5C2 5.39543 2.89543 4.5 4 4.5C5.10457 4.5 6 5.39543 6 6.5Z" stroke="currentColor" stroke-width="1.5" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold">Expert Teachers</h3>
                    <p class="mt-4 text-gray-600 hover:text-white">
                        Learn from certified Quran teachers with years of experience.
                    </p>
                </div>

                <!-- Card 2 -->
                <div class="p-6 transition duration-300 ease-in-out bg-white border rounded-lg shadow-md hover:bg-green-500 hover:text-white">
                    <div class="flex justify-center mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="48" height="48" color="#000000" fill="none">
                            <path d="M12 22L10 16H2L4 22H12ZM12 22H16" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M12 13V12.5C12 10.6144 12 9.67157 11.4142 9.08579C10.8284 8.5 9.88562 8.5 8 8.5C6.11438 8.5 5.17157 8.5 4.58579 9.08579C4 9.67157 4 10.6144 4 12.5V13" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M19 13C19 14.1046 18.1046 15 17 15C15.8954 15 15 14.1046 15 13C15 11.8954 15.8954 11 17 11C18.1046 11 19 11.8954 19 13Z" stroke="currentColor" stroke-width="1.5" />
                            <path d="M10 4C10 5.10457 9.10457 6 8 6C6.89543 6 6 5.10457 6 4C6 2.89543 6.89543 2 8 2C9.10457 2 10 2.89543 10 4Z" stroke="currentColor" stroke-width="1.5" />
                            <path d="M14 17.5H20C21.1046 17.5 22 18.3954 22 19.5V20C22 21.1046 21.1046 22 20 22H19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold">Flexible Learning</h3>
                    <p class="mt-4 text-gray-600 hover:text-white">
                        Choose your preferred schedule and learn at your own pace.
                    </p>
                </div>

                <!-- Card 3 -->
                <div class="p-6 transition duration-300 ease-in-out bg-white border rounded-lg shadow-md hover:bg-green-500 hover:text-white">
                    <div class="flex justify-center mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="48" height="48" color="#000000" fill="none">
                            <path d="M2 11C4.3317 8.55783 7.64323 8.44283 10 11M8.49509 4.5C8.49509 5.88071 7.37421 7 5.99153 7C4.60885 7 3.48797 5.88071 3.48797 4.5C3.48797 3.11929 4.60885 2 5.99153 2C7.37421 2 8.49509 3.11929 8.49509 4.5Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                            <path d="M14 22C16.3317 19.5578 19.6432 19.4428 22 22M20.4951 15.5C20.4951 16.8807 19.3742 18 17.9915 18C16.6089 18 15.488 16.8807 15.488 15.5C15.488 14.1193 16.6089 13 17.9915 13C19.3742 13 20.4951 14.1193 20.4951 15.5Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                            <path d="M3 14C3 17.87 6.13 21 10 21L9 19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M15 3H21M15 6H21M15 9H18.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold">Interactive Classes</h3>
                    <p class="mt-4 text-gray-600 hover:text-white">
                        Engage in live sessions with real-time feedback and guidance.
                    </p>
                </div>

                <!-- Card 4 -->
                <div class="p-6 transition duration-300 ease-in-out bg-white border rounded-lg shadow-md hover:bg-green-500 hover:text-white">
                    <div class="flex justify-center mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="48" height="48" color="#000000" fill="none">
                            <path d="M18.7185 10.7151C18.5258 10.8979 18.2682 11 18.0001 11C17.732 11 17.4744 10.8979 17.2817 10.7151C15.5167 9.03169 13.1515 7.15111 14.305 4.42085C14.9286 2.94462 16.4257 2 18.0001 2C19.5745 2 21.0715 2.94462 21.6952 4.42085C22.8472 7.14767 20.4878 9.03749 18.7185 10.7151Z" stroke="currentColor" stroke-width="1.5" />
                            <path d="M18 6H18.009" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            <circle cx="5" cy="19" r="3" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M11 7H9.5C7.567 7 6 8.34315 6 10C6 11.6569 7.567 13 9.5 13H12.5C14.433 13 16 14.3431 16 16C16 17.6569 14.433 19 12.5 19H11" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold">Track Progress</h3>
                    <p class="mt-4 text-gray-600 hover:text-white">
                        Monitor your learning journey with detailed progress reports.
                    </p>
                </div>
            </div>
        </div>
    </section>




    <!-- Footer -->
    <footer class="absolute bottom-0 left-0 w-full py-3 bg-gray-900">
        <div class="text-center text-gray-400">
            © 2024 Smart-Ilm-Dalib. All rights reserved.
        </div>
    </footer>

    <!-- JavaScript for Burger Menu -->
    <script>
        document.getElementById('menu-toggle').addEventListener('click', function () {
            const menu = document.getElementById('mobile-menu');
            if (menu.classList.contains('hidden')) {
                menu.classList.remove('hidden');
            } else {
                menu.classList.add('hidden');
            }
        });
    </script>

</main>



</body>
</html>
