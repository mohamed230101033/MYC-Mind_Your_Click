<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Mind Your Click - Cybersecurity Game for Kids</title>
        
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Righteous&family=Nunito:wght@400;600;700&family=Comic+Neue:wght@400;700&display=swap" rel="stylesheet">
        
        <!-- Animate.css for animations -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
        
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
                            'kids': ['Comic Neue', 'cursive'],
                        }
                    }
                }
            }
        </script>
        <style>
            .floating {
                animation: floating 3s ease-in-out infinite;
            }
            @keyframes floating {
                0% { transform: translateY(0px); }
                50% { transform: translateY(-10px); }
                100% { transform: translateY(0px); }
            }
            .bg-pattern {
                background-image: url("data:image/svg+xml,%3Csvg width='100' height='100' viewBox='0 0 100 100' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M11 18c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm48 25c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm-43-7c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm63 31c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM34 90c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm56-76c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM12 86c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm28-65c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm23-11c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-6 60c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm29 22c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zM32 63c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm57-13c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-9-21c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM60 91c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM35 41c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM12 60c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2z' fill='%239C92AC' fill-opacity='0.1' fill-rule='evenodd'/%3E%3C/svg%3E");
            }
            .bubble {
                position: absolute;
                border-radius: 50%;
                background: rgba(255, 255, 255, 0.3);
                animation: float 8s ease-in-out infinite;
                z-index: -1;
            }
            @keyframes float {
                0% { transform: translateY(0) rotate(0); }
                50% { transform: translateY(-20px) rotate(180deg); }
                100% { transform: translateY(0) rotate(360deg); }
            }
        </style>
    </head>
    <body class="bg-gradient-to-b from-blue-100 to-purple-100 dark:from-gray-900 dark:to-blue-900 bg-pattern min-h-screen font-kids">
        <!-- Animated bubbles background -->
        <div class="bubble" style="width: 80px; height: 80px; left: 10%; top: 10%; animation-delay: 0s;"></div>
        <div class="bubble" style="width: 50px; height: 50px; left: 20%; top: 40%; animation-delay: 1s;"></div>
        <div class="bubble" style="width: 70px; height: 70px; left: 80%; top: 15%; animation-delay: 2s;"></div>
        <div class="bubble" style="width: 40px; height: 40px; left: 70%; top: 70%; animation-delay: 3s;"></div>
        <div class="bubble" style="width: 60px; height: 60px; left: 30%; top: 80%; animation-delay: 4s;"></div>
        <div class="bubble" style="width: 90px; height: 90px; left: 90%; top: 60%; animation-delay: 5s;"></div>
        
        <div class="min-h-screen flex flex-col items-center justify-center p-4">
            <!-- Animated Welcome Banner -->
            <div class="mb-2 text-center animate__animated animate__bounceIn">
                <h1 class="text-5xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-purple-600 font-game">Welcome Cyber Heroes!</h1>
                <p class="text-xl text-gray-600 dark:text-gray-300 mt-2 animate__animated animate__fadeIn animate__delay-1s">Are you ready for an amazing adventure?</p>
            </div>
            
            <!-- Animated Character -->
            <div class="mb-6 animate__animated animate__fadeInUp animate__delay-1s">
                <img src="https://cdn-icons-png.flaticon.com/512/2995/2995440.png" alt="Robot Character" class="w-32 h-32 mx-auto floating">
            </div>
            
            <!-- Logo -->
            <div class="mb-8 text-center animate__animated animate__zoomIn animate__delay-2s">
                <div class="relative">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" class="w-24 h-24 text-blue-600 dark:text-blue-400 mx-auto">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                    </svg>
                    <div class="absolute -top-2 -right-2 w-8 h-8 bg-yellow-400 rounded-full flex items-center justify-center animate__animated animate__pulse animate__infinite">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M11.3 1.046A1 1 0 0112 2v5h4a1 1 0 01.82 1.573l-7 10A1 1 0 018 18v-5H4a1 1 0 01-.82-1.573l7-10a1 1 0 011.12-.38z" clip-rule="evenodd" />
                        </svg>
                    </div>
                </div>
                <h1 class="text-4xl font-bold mt-4 text-blue-800 dark:text-white font-game">MYC: Mind Your Click</h1>
                <p class="text-xl text-gray-600 dark:text-gray-300 mt-2">A Cybersecurity Adventure for Young Digital Explorers</p>
            </div>
            
            <!-- Game Start Form -->
            <div class="w-full max-w-md bg-white dark:bg-gray-800 rounded-2xl shadow-lg overflow-hidden border-4 border-blue-400 animate__animated animate__fadeInUp animate__delay-2s">
                <div class="p-6">
                    <div class="text-center mb-6">
                        <h2 class="text-2xl font-semibold text-gray-800 dark:text-white font-game">Start Your Adventure</h2>
                        <p class="text-gray-600 dark:text-gray-300 mt-2">Enter your name to begin your journey to become a cyber hero!</p>
                    </div>
                    
                    <form method="POST" action="{{ route('start-game') }}" class="animate__animated animate__fadeIn animate__delay-3s">
                        @csrf
                        <div class="mb-4">
                            <label for="player_name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Your Hero Name</label>
                            <input 
                                type="text" 
                                id="player_name" 
                                name="player_name" 
                                class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white" 
                                placeholder="Enter your first name"
                                required
                                maxlength="20"
                            >
                        </div>
                        
                        <div class="flex items-center justify-center mt-6">
                            <button type="submit" class="px-6 py-3 border border-transparent text-base font-medium rounded-full text-white bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-300 ease-in-out transform hover:scale-105 font-game animate__animated animate__pulse animate__infinite animate__slow">
                                Start Mission
                                <span class="ml-2">🚀</span>
                            </button>
                        </div>
                    </form>
                </div>
                
                <div class="bg-gradient-to-r from-blue-100 to-purple-100 dark:from-gray-700 dark:to-gray-800 px-6 py-4">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600 dark:text-blue-400 animate__animated animate__tada animate__delay-4s" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2h-1V9z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm text-gray-700 dark:text-gray-300">
                                Learn how to protect yourself online with fun challenges and missions!
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Features -->
            <div class="mt-12 grid grid-cols-1 md:grid-cols-3 gap-8 max-w-6xl">
                <div class="bg-white dark:bg-gray-800 p-6 rounded-2xl shadow-lg border-2 border-blue-300 transform transition duration-300 hover:scale-105 hover:rotate-1 animate__animated animate__fadeInLeft animate__delay-3s">
                    <div class="text-blue-600 dark:text-blue-400 mb-4">
                        <img src="https://cdn-icons-png.flaticon.com/512/2996/2996058.png" alt="Story Mode" class="h-16 w-16 mx-auto">
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 dark:text-white text-center font-game">Story Mode</h3>
                    <p class="mt-2 text-gray-600 dark:text-gray-300 text-center">Join Circuit on exciting missions to stop cyber villains and learn important online safety skills.</p>
                </div>
                
                <div class="bg-white dark:bg-gray-800 p-6 rounded-2xl shadow-lg border-2 border-purple-300 transform transition duration-300 hover:scale-105 hover:rotate-1 animate__animated animate__fadeInUp animate__delay-3s">
                    <div class="text-blue-600 dark:text-blue-400 mb-4">
                        <img src="https://cdn-icons-png.flaticon.com/512/2996/2996068.png" alt="Cyber Village" class="h-16 w-16 mx-auto">
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 dark:text-white text-center font-game">Secret Code Game</h3>
                    <p class="mt-2 text-gray-600 dark:text-gray-300 text-center">Explore different locations and face unique cybersecurity challenges in our interactive village.</p>
                </div>
                
                <div class="bg-white dark:bg-gray-800 p-6 rounded-2xl shadow-lg border-2 border-green-300 transform transition duration-300 hover:scale-105 hover:rotate-1 animate__animated animate__fadeInRight animate__delay-3s">
                    <div class="text-blue-600 dark:text-blue-400 mb-4">
                        <img src="https://cdn-icons-png.flaticon.com/512/2996/2996067.png" alt="Cyber Shield" class="h-16 w-16 mx-auto">
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 dark:text-white text-center font-game">Cyber Time Travel
                    </h3>
                    <p class="mt-2 text-gray-600 dark:text-gray-300 text-center">Earn badges and level up your cyber shield by completing challenges and learning to stay safe online.</p>
                </div>
            </div>
            
            <!-- Animated Characters -->
            <div class="flex justify-center mt-8 space-x-4 animate__animated animate__fadeInUp animate__delay-4s">
                <img src="https://cdn-icons-png.flaticon.com/512/4616/4616734.png" alt="Robot Character" class="w-16 h-16 floating" style="animation-delay: 0.5s;">
                <img src="https://cdn-icons-png.flaticon.com/512/4616/4616218.png" alt="Robot Character" class="w-16 h-16 floating" style="animation-delay: 1s;">
                <img src="https://cdn-icons-png.flaticon.com/512/4616/4616608.png" alt="Robot Character" class="w-16 h-16 floating" style="animation-delay: 1.5s;">
            </div>
            
            <!-- Footer -->
            <div class="mt-16 text-center text-gray-500 dark:text-gray-400 text-sm animate__animated animate__fadeIn animate__delay-4s">
                <p>© 2025 Mind Your Click | An Educational Cybersecurity Game for Kids</p>
            </div>
        </div>
        
        <!-- Simple animation script -->
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                // Add hover effect to the form
                const form = document.querySelector('form');
                form.addEventListener('mouseenter', () => {
                    form.classList.add('animate__animated', 'animate__pulse');
                });
                form.addEventListener('mouseleave', () => {
                    form.classList.remove('animate__animated', 'animate__pulse');
                });
            });
        </script>
    </body>
</html>
