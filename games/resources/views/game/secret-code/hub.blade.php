@extends('layouts.app')

@section('content')
<div class="bg-gradient-to-b from-blue-600 via-blue-700 to-blue-800 min-h-screen py-12 px-4">
    <div class="container mx-auto max-w-4xl">
        <!-- Header -->
        <div class="bg-white/10 backdrop-blur-md border border-white/20 p-6 rounded-2xl shadow-xl text-white mb-8">
            <div class="flex items-center justify-between mb-4">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-8 h-8 mr-3 text-secondary-300">
                        <path fill-rule="evenodd" d="M12 1.5a.75.75 0 01.75.75V4.5a.75.75 0 01-1.5 0V2.25A.75.75 0 0112 1.5zM5.636 4.136a.75.75 0 011.06 0l1.592 1.591a.75.75 0 01-1.061 1.06l-1.591-1.59a.75.75 0 010-1.061zm12.728 0a.75.75 0 010 1.06l-1.591 1.592a.75.75 0 01-1.06-1.061l1.59-1.591a.75.75 0 011.061 0zm-6.816 4.496a.75.75 0 01.82.311l5.228 7.917a.75.75 0 01-.777 1.148l-2.097-.43 1.045 3.9a.75.75 0 01-1.45.388l-1.044-3.899-1.601 1.42a.75.75 0 01-1.247-.606l.569-9.47a.75.75 0 01.554-.68z" clip-rule="evenodd" />
                    </svg>
                    <h1 class="text-3xl font-game">Secret Code Academy</h1>
                </div>
                <div class="hidden md:flex items-center">
                    <div class="cyber-shield w-12 h-12 mr-2">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-7 h-7">
                            <path fill-rule="evenodd" d="M12.516 2.17a.75.75 0 00-1.032 0 11.209 11.209 0 01-7.877 3.08.75.75 0 00-.722.515A12.74 12.74 0 002.25 9.75c0 5.942 4.064 10.933 9.563 12.348a.75.75 0 00.674 0c5.499-1.415 9.563-6.406 9.563-12.348 0-1.39-.223-2.73-.635-3.985a.75.75 0 00-.722-.516l-.143.001c-2.996 0-5.717-1.17-7.734-3.08zm3.094 8.016a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm opacity-80">Cyber Shield Level</p>
                        <div class="w-48 h-3 bg-gray-700 rounded-full overflow-hidden">
                            <div class="h-full bg-gradient-to-r from-green-400 to-blue-500" style="width: {{ session('shield_level', 0) * 10 }}%"></div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="space-y-4">
                <p class="text-lg">Welcome to the Secret Code Academy, {{ $player_name }}! Here you'll learn about encryption and how to keep messages safe.</p>
                <p>Complete each level to unlock new challenges and earn Cyber Shield points!</p>
            </div>
        </div>

        <!-- Level Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @foreach($levels as $level)
            <a href="{{ $level['unlocked'] ? route('game.secret-code.level', $level['id']) : '#' }}" 
               class="block transition transform hover:scale-105 {{ !$level['unlocked'] ? 'opacity-60 cursor-not-allowed' : '' }}">
                <div class="bg-white/10 backdrop-blur-md border border-white/20 p-6 rounded-2xl shadow-xl text-white">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 rounded-full bg-secondary-100 flex-shrink-0 flex items-center justify-center">
                            @if(!$level['unlocked'])
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 text-secondary-600">
                                <path fill-rule="evenodd" d="M12 1.5a5.25 5.25 0 00-5.25 5.25v3a3 3 0 00-3 3v6.75a3 3 0 003 3h10.5a3 3 0 003-3v-6.75a3 3 0 00-3-3v-3c0-2.9-2.35-5.25-5.25-5.25zm3.75 8.25v-3a3.75 3.75 0 10-7.5 0v3h7.5z" clip-rule="evenodd" />
                            </svg>
                            @else
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 text-secondary-600">
                                <path d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-12.15 12.15a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32L19.513 8.2z" />
                            </svg>
                            @endif
                        </div>
                        <div class="ml-4">
                            <h3 class="text-xl font-game">Level {{ $level['id'] }}: {{ $level['name'] }}</h3>
                            <p class="text-sm text-white/70">Difficulty: {{ $level['difficulty'] }}</p>
                        </div>
                    </div>
                    <p class="text-white/90">{{ $level['description'] }}</p>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</div>
@endsection
