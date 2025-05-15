<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'MYC: Mind Your Click') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Righteous&family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            50: '#f0f9ff',
                            100: '#e0f2fe',
                            200: '#bae6fd',
                            300: '#7dd3fc',
                            400: '#38bdf8',
                            500: '#0ea5e9',
                            600: '#0284c7',
                            700: '#0369a1',
                            800: '#075985',
                            900: '#0c4a6e',
                            950: '#082f49',
                        },
                        secondary: {
                            50: '#fdf4ff',
                            100: '#fae8ff',
                            200: '#f5d0fe',
                            300: '#f0abfc',
                            400: '#e879f9',
                            500: '#d946ef',
                            600: '#c026d3',
                            700: '#a21caf',
                            800: '#86198f',
                            900: '#701a75',
                            950: '#4a044e',
                        },
                        danger: {
                            50: '#fef2f2',
                            100: '#fee2e2',
                            200: '#fecaca',
                            300: '#fca5a5',
                            400: '#f87171',
                            500: '#ef4444',
                            600: '#dc2626',
                            700: '#b91c1c',
                            800: '#991b1b',
                            900: '#7f1d1d',
                            950: '#450a0a',
                        },
                        success: {
                            50: '#f0fdf4',
                            100: '#dcfce7',
                            200: '#bbf7d0',
                            300: '#86efac',
                            400: '#4ade80',
                            500: '#22c55e',
                            600: '#16a34a',
                            700: '#15803d',
                            800: '#166534',
                            900: '#14532d',
                            950: '#052e16',
                        },
                    },
                    fontFamily: {
                        'game': ['Righteous', 'cursive'],
                        'sans': ['Nunito', 'sans-serif'],
                    }
                }
            }
        }
    </script>
</head>
<body class="font-sans antialiased bg-gray-50 min-h-screen">
    <header class="bg-primary-700 text-white p-4 shadow-md">
        <div class="container mx-auto flex justify-between items-center">
            <div class="flex items-center space-x-2">
                <img src="{{ asset('images/shield-logo.svg') }}" alt="MYC Logo" class="w-10 h-10">
                <h1 class="font-game text-2xl">MYC: Mind Your Click</h1>
            </div>
            <nav class="hidden md:block">
                <ul class="flex space-x-6">
                    <li><a href="{{ route('home') }}" class="hover:text-primary-200 transition">Home</a></li>
                    <li><a href="{{ route('game.story') }}" class="hover:text-primary-200 transition">Story Mode</a></li>
                    <li><a href="{{ route('game.village') }}" class="hover:text-primary-200 transition">Cyber Village</a></li>
                    <li><a href="{{ route('game.challenge') }}" class="hover:text-primary-200 transition">Challenges</a></li>
                </ul>
            </nav>
            <div class="md:hidden">
                <button id="mobile-menu-button" class="text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                </button>
            </div>
        </div>
        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden md:hidden mt-4">
            <nav>
                <ul class="flex flex-col space-y-2">
                    <li><a href="{{ route('home') }}" class="block hover:bg-primary-600 p-2 rounded">Home</a></li>
                    <li><a href="{{ route('game.story') }}" class="block hover:bg-primary-600 p-2 rounded">Story Mode</a></li>
                    <li><a href="{{ route('game.village') }}" class="block hover:bg-primary-600 p-2 rounded">Cyber Village</a></li>
                    <li><a href="{{ route('game.challenge') }}" class="block hover:bg-primary-600 p-2 rounded">Challenges</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main>
        @yield('content')
    </main>

    <footer class="bg-gray-800 text-white py-6 mt-12">
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <div class="mb-4 md:mb-0">
                    <img src="{{ asset('images/shield-logo.svg') }}" alt="MYC Logo" class="w-8 h-8 inline-block mr-2">
                    <span class="font-game text-xl">MYC: Mind Your Click</span>
                </div>
                <div class="text-center md:text-left">
                    <p class="text-sm">An educational cybersecurity game for kids aged 7-13</p>
                    <p class="text-xs mt-2 text-gray-400">&copy; {{ date('Y') }} Cybersecurity Education Team</p>
                </div>
            </div>
        </div>
    </footer>

    <script>
        // Mobile menu toggle
        document.getElementById('mobile-menu-button')?.addEventListener('click', function() {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        });
    </script>
</body>
</html> 