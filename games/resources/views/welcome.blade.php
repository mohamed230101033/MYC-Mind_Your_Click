<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Mind Your Click - Cybersecurity Game for Kids</title>
        
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
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
    <body class="bg-blue-50 dark:bg-gray-900">
        <div class="min-h-screen flex flex-col items-center justify-center p-4">
            <!-- Logo -->
            <div class="mb-8 text-center">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" class="w-24 h-24 text-blue-600 dark:text-blue-400 mx-auto">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                </svg>
                <h1 class="text-4xl font-bold mt-4 text-blue-800 dark:text-white">MYC: Mind Your Click</h1>
                <p class="text-xl text-gray-600 dark:text-gray-300 mt-2">A Cybersecurity Adventure for Young Digital Explorers</p>
            </div>
            
            <!-- Game Start Form -->
            <div class="w-full max-w-md bg-white dark:bg-gray-800 rounded-lg shadow-lg overflow-hidden">
                <div class="p-6">
                    <div class="text-center mb-6">
                        <h2 class="text-2xl font-semibold text-gray-800 dark:text-white">Start Your Adventure</h2>
                        <p class="text-gray-600 dark:text-gray-300 mt-2">Enter your name to begin your journey to become a cyber hero!</p>
                    </div>
                    
                    <form method="POST" action="{{ route('start-game') }}">
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
                            <button type="submit" class="px-6 py-2 border border-transparent text-base font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-150 ease-in-out">
                                Start Mission
                            </button>
                        </div>
                    </form>
                </div>
                
                <div class="bg-blue-100 dark:bg-gray-700 px-6 py-4">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600 dark:text-blue-400" viewBox="0 0 20 20" fill="currentColor">
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
                <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow">
                    <div class="text-blue-600 dark:text-blue-400 mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 dark:text-white">Story Mode</h3>
                    <p class="mt-2 text-gray-600 dark:text-gray-300">Join Circuit on exciting missions to stop cyber villains and learn important online safety skills.</p>
                </div>
                
                <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow">
                    <div class="text-blue-600 dark:text-blue-400 mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 dark:text-white">Cyber Village</h3>
                    <p class="mt-2 text-gray-600 dark:text-gray-300">Explore different locations and face unique cybersecurity challenges in our interactive village.</p>
                </div>
                
                <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow">
                    <div class="text-blue-600 dark:text-blue-400 mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 dark:text-white">Cyber Shield</h3>
                    <p class="mt-2 text-gray-600 dark:text-gray-300">Earn badges and level up your cyber shield by completing challenges and learning to stay safe online.</p>
                </div>
            </div>
            
            <!-- Footer -->
            <div class="mt-16 text-center text-gray-500 dark:text-gray-400 text-sm">
                <p>© 2025 Mind Your Click | An Educational Cybersecurity Game for Kids</p>
            </div>
        </div>
    </body>
</html>
