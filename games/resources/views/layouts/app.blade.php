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
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Custom Styles -->
    <link href="{{ asset('css/space-background.css') }}" rel="stylesheet">

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

    <!-- Custom CSS -->
    <style>
        /* Add custom animations for the Social Media Mayhem activity */
        .animate-spin-slow {
            animation: spin 15s linear infinite;
        }
        
        .animate-pulse-slow {
            animation: pulse 3s cubic-bezier(0.4, 0, 0.6, 1) infinite;
        }
        
        @keyframes spin {
            from {
                transform: rotate(0deg);
            }
            to {
                transform: rotate(360deg);
            }
        }
        
        @keyframes pulse {
            0%, 100% {
                opacity: 1;
                transform: scale(1);
            }
            50% {
                opacity: 0.8;
                transform: scale(0.95);
            }
        }
        
        /* Social stage classes */
        .social-stage {
            transition: all 0.3s ease;
        }
        
        .social-stage.hidden {
            display: none;
        }
        
        .social-stage.active {
            display: block;
        }
        
        /* Time Travel Effect Styles */
        .time-travel-active {
            animation: timeTravel 3s forwards;
        }
        
        @keyframes timeTravel {
            0% { filter: brightness(1) blur(0); }
            50% { filter: brightness(1.5) blur(5px); }
            100% { filter: brightness(1) blur(0); }
        }
        
        #warp-container {
            pointer-events: none;
        }
        
        /* Achievement animations */
        .animate-pulse-subtle {
            animation: pulse-subtle 2s infinite;
        }
        
        .animate-bounce-subtle {
            animation: bounce-subtle 1s infinite;
        }
        
        @keyframes pulse-subtle {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.7; }
        }
        
        @keyframes bounce-subtle {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-5px); }
        }
        
        /* Achievement notification styles */
        .achievement-notification {
            z-index: 9999;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
        }
        
        /* Power-up styles */
        .power-ups-container {
            display: flex;
            gap: 8px;
            margin-bottom: 1rem;
        }
        
        .power-up-btn {
            background: linear-gradient(135deg, #2a3f5f, #1e293b);
            border: 2px solid rgba(99, 102, 241, 0.4);
            border-radius: 8px;
            padding: 8px;
            position: relative;
            transition: all 0.2s;
            width: 48px;
            height: 48px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .power-up-btn:hover {
            transform: scale(1.1);
            border-color: rgba(99, 102, 241, 0.8);
            box-shadow: 0 0 15px rgba(99, 102, 241, 0.4);
        }
        
        .power-up-icon {
            width: 24px;
            height: 24px;
            color: white;
        }
        
        .power-up-count {
            position: absolute;
            top: -5px;
            right: -5px;
            background: #ef4444;
            color: white;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            font-size: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        /* Notification styles */
        .notification {
            z-index: 9999;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
        }
        
        .notification.show {
            opacity: 1;
        }
    </style>

    <!-- Scripts -->
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
                    <li><a href="{{ route('game.truth-detective') }}" class="hover:text-primary-200 transition">Truth Detective</a></li>
                    <li><a href="{{ route('game.time-travel') }}" class="hover:text-primary-200 transition">Cyber Time Travel</a></li>
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
                    <li><a href="{{ route('game.truth-detective') }}" class="block hover:bg-primary-600 p-2 rounded">Truth Detective</a></li>
                    <li><a href="{{ route('game.time-travel') }}" class="block hover:bg-primary-600 p-2 rounded">Cyber Time Travel</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main>
        @yield('content')
    </main>

    <footer class="bg-primary-900 text-white py-6 mt-12">
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <div class="mb-4 md:mb-0">
                    <h3 class="text-xl font-bold mb-2">MYC - Mind Your Click</h3>
                    <p class="text-sm text-gray-300">Teaching safe online navigation for children</p>
                </div>
                <div class="flex space-x-4">
                    <a href="#" class="text-gray-300 hover:text-white transition">
                        <i class="fab fa-twitter text-xl"></i>
                    </a>
                    <a href="#" class="text-gray-300 hover:text-white transition">
                        <i class="fab fa-facebook text-xl"></i>
                    </a>
                    <a href="#" class="text-gray-300 hover:text-white transition">
                        <i class="fab fa-instagram text-xl"></i>
                    </a>
                </div>
            </div>
            <div class="border-t border-gray-700 mt-6 pt-6 text-center text-sm text-gray-400">
                <p>&copy; {{ date('Y') }} MYC-Mind Your Click. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Core JS Files -->
    <script src="{{ asset('js/sound-manager.js') }}"></script>
    <script src="{{ asset('js/game-timer.js') }}"></script>
    <script src="{{ asset('js/achievements.js') }}"></script>
    <script src="{{ asset('js/confetti.js') }}"></script>
    
    <script>
        // Mobile menu toggle
        document.getElementById('mobile-menu-button')?.addEventListener('click', function() {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        });
    </script>

    <!-- Time Travel Script -->
    @if(Route::is('game.time-travel') || Route::is('game.time-travel.attack'))
    <script src="{{ asset('js/time-travel.js') }}"></script>
    @endif

    @stack('scripts')
</body>
</html> 