@extends('layouts.app')

@section('content')
<div class="bg-gradient-to-b from-primary-700 via-primary-800 to-primary-900 min-h-screen py-8">
    <div class="container mx-auto max-w-4xl px-4">
        <!-- Mission Header -->
        <div class="bg-white/10 backdrop-blur-md border border-white/20 p-6 rounded-2xl shadow-xl text-white mb-8">
            <div class="flex items-center justify-between mb-4">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-8 h-8 mr-3 text-danger-400">
                        @switch($mission['id'])
                            @case(1)
                                <path d="M1.5 8.67v8.58a3 3 0 003 3h15a3 3 0 003-3V8.67l-8.928 5.493a3 3 0 01-3.144 0L1.5 8.67z" />
                                <path d="M22.5 6.908V6.75a3 3 0 00-3-3h-15a3 3 0 00-3 3v.158l9.714 5.978a1.5 1.5 0 001.572 0L22.5 6.908z" />
                                @break
                            @case(2)
                                <path fill-rule="evenodd" d="M15.75 1.5a6.75 6.75 0 00-6.651 7.906c.067.39-.032.717-.221.906l-6.5 6.499a3 3 0 00-.878 2.121v2.818c0 .414.336.75.75.75H6a.75.75 0 00.75-.75v-1.5h1.5A.75.75 0 009 19.5V18h1.5a.75.75 0 00.75-.75V15h1.5a.75.75 0 00.75-.75v-1.5h1.5a.75.75 0 00.75-.75V9.262c.219-.313.41-.641.547-1.008.7-1.898 1.357-3.868 1.357-5.754 0-1.108-.806-2.057-1.907-2.185A48.507 48.507 0 0012 9.75c-2.678 0-5.25-.241-7.78-.72A48.672 48.672 0 012.507 9a.75.75 0 00-1.096-.536l-.001.002z" clip-rule="evenodd" />
                                @break
                            @case(3)
                                <div class="text-white/90 space-y-3">
                                    <div class="flex items-center gap-3 mb-2">
                                        <div class="w-12 h-12 rounded-full bg-red-500 flex items-center justify-center flex-shrink-0 animate-pulse-slow">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-7 h-7 text-white">
                                                <path d="M7.5 6a4.5 4.5 0 119 0 4.5 4.5 0 01-9 0z" />
                                                <path d="M3.751 20.105a8.25 8.25 0 0116.498 0 .75.75 0 01-.437.695A18.683 18.683 0 0112 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 01-.437-.695z" />
                                            </svg>
                                        </div>
                                        <h3 class="font-game text-xl text-red-300">Watch out for Profile Phantom!</h3>
                                    </div>
                                    
                                    <p class="text-lg">Hi {{ $player_name }}! Let's spot those tricky fake accounts!</p>
                                    
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                                        <div class="bg-blue-900/30 p-4 rounded-lg border border-blue-400/20 transform transition hover:scale-105">
                                            <div class="flex items-center gap-2 mb-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-300" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                                                </svg>
                                                <span class="font-bold text-blue-300">Fake Prizes Trick</span>
                                            </div>
                                            <p>Groups offering "free" stuff or exclusive content</p>
                                        </div>
                                        
                                        <div class="bg-purple-900/30 p-4 rounded-lg border border-purple-400/20 transform transition hover:scale-105">
                                            <div class="flex items-center gap-2 mb-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-300" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                                                </svg>
                                                <span class="font-bold text-purple-300">Sneaky Messages</span>
                                            </div>
                                            <p>Strangers asking for your personal info</p>
                                        </div>
                                        
                                        <div class="bg-red-900/30 p-4 rounded-lg border border-red-400/20 transform transition hover:scale-105">
                                            <div class="flex items-center gap-2 mb-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-300" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                                                </svg>
                                                <span class="font-bold text-red-300">Credit Card Scams</span>
                                            </div>
                                            <p>People asking for your parent's credit card</p>
                                        </div>
                                        
                                        <div class="bg-green-900/30 p-4 rounded-lg border border-green-400/20 transform transition hover:scale-105">
                                            <div class="flex items-center gap-2 mb-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-300" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                                                </svg>
                                                <span class="font-bold text-green-300">Imposters Alert</span>
                                            </div>
                                            <p>Accounts pretending to be someone you know</p>
                                        </div>
                                    </div>
                                    
                                    <div class="mt-4 text-center">
                                        <span class="inline-block animate-bounce bg-yellow-500 text-black font-bold px-4 py-2 rounded-full">
                                            Let's become social media detectives!
                                        </span>
                                    </div>
                                </div>
                            @break
                        @default
                            <path fill-rule="evenodd" d="M9 4.5a.75.75 0 01.721.544l.813 2.846a3.75 3.75 0 002.576 2.576l2.846.813a.75.75 0 010 1.442l-2.846.813a3.75 3.75 0 00-2.576 2.576l-.813 2.846a.75.75 0 01-1.442 0l-.813-2.846a3.75 3.75 0 00-2.576-2.576l-2.846-.813a.75.75 0 010-1.442l2.846-.813A3.75 3.75 0 007.466 7.89l.813-2.846A.75.75 0 019 4.5zM18 1.5a.75.75 0 01.728.568l.258 1.036c.236.94.97 1.674 1.91 1.91l1.036.258a.75.75 0 010 1.456l-1.036.258c-.94.236-1.674.97-1.91 1.91l-.258 1.036a.75.75 0 01-1.456 0l-.258-1.036a2.625 2.625 0 00-1.91-1.91l-1.036-.258a.75.75 0 010-1.456l1.036-.258a2.625 2.625 0 001.91-1.91l.258-1.036A.75.75 0 0118 1.5zM16.5 15a.75.75 0 01.712.513l.394 1.183c.15.447.5.799.948.948l1.183.395a.75.75 0 010 1.422l-1.183.395c-.447.15-.799.5-.948.948l-.395 1.183a.75.75 0 01-1.422 0l-.395-1.183a1.5 1.5 0 00-.948-.948l-1.183-.395a.75.75 0 010-1.422l1.183-.395c.447-.15.799-.5.948-.948l.395-1.183A.75.75 0 0116.5 15z" clip-rule="evenodd" />
                        @endswitch
                    </svg>
                    <h1 class="text-2xl font-game">{{ $mission['title'] }}</h1>
                </div>
                <div class="px-3 py-1 bg-danger-600 text-white text-sm rounded-full">
                    Villain: {{ $mission['villain'] }}
                </div>
            </div>
            <p class="text-white/80">{{ $mission['description'] }}</p>
            <div class="mt-3 flex items-center text-sm">
                <span class="px-2 py-1 bg-primary-700 rounded text-xs mr-2">Level {{ $mission['level'] }}</span>
                <span class="text-white/70">Difficulty: {{ $mission['difficulty'] }}</span>
            </div>
        </div>
        
        <!-- AI Helper -->
        <div class="bg-white/10 backdrop-blur-md border border-white/20 p-6 rounded-2xl shadow-xl text-white mb-8">
            <div class="flex items-start space-x-4">
                <div class="w-12 h-12 rounded-full bg-secondary-100 flex-shrink-0 flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-7 h-7 text-secondary-600">
                        <path d="M16.5 7.5h-9v9h9v-9z" />
                        <path fill-rule="evenodd" d="M8.25 2.25A.75.75 0 019 3v.75h2.25V3a.75.75 0 011.5 0v.75H15V3a.75.75 0 011.5 0v.75h.75a3 3 0 013 3v.75H21A.75.75 0 0121 9h-.75v2.25H21a.75.75 0 010 1.5h-.75V15H21a.75.75 0 010 1.5h-.75v.75a3 3 0 01-3 3h-.75V21a.75.75 0 01-1.5 0v-.75h-2.25V21a.75.75 0 01-1.5 0v-.75H9V21a.75.75 0 01-1.5 0v-.75h-.75a3 3 0 01-3-3v-.75H3A.75.75 0 013 15h.75v-2.25H3a.75.75 0 010-1.5h.75V9H3a.75.75 0 010-1.5h.75v-.75a3 3 0 013-3h.75V3a.75.75 0 01.75-.75zM6 6.75A.75.75 0 016.75 6h10.5a.75.75 0 01.75.75v10.5a.75.75 0 01-.75.75H6.75a.75.75 0 01-.75-.75V6.75z" clip-rule="evenodd" />
                    </svg>
                </div>
                <div class="flex-1">
                    <h3 class="font-bold text-secondary-300 font-game">Circuit</h3>
                    @switch($mission['id'])
                        @case(1)
                            <p class="text-white/90">Hey {{ $player_name }}! Today we're going to learn about phishing emails. Captain Clickbait is trying to trick people into clicking links that lead to fake websites where he can steal their information.</p>
                            <p class="mt-2 text-white/90">Remember these signs of a phishing email:</p>
                            <ul class="list-disc pl-5 mt-2 space-y-1 text-white/90">
                                <li>Urgency ("Act now!" or "Immediate action required!")</li>
                                <li>Strange email addresses that don't match the company</li>
                                <li>Spelling and grammar mistakes</li>
                                <li>Suspicious links or attachments</li>
                                <li>Requests for personal information</li>
                            </ul>
                            @break
                        @case(2)
                            <p class="text-white/90">Hi {{ $player_name }}! The Key Thief is trying to steal passwords to get into people's accounts. Let's learn how to create strong passwords that are hard to crack!</p>
                            <p class="mt-2 text-white/90">Good passwords should:</p>
                            <ul class="list-disc pl-5 mt-2 space-y-1 text-white/90">
                                <li>Be at least 12 characters long</li>
                                <li>Include uppercase and lowercase letters</li>
                                <li>Include numbers and special characters</li>
                                <li>Not contain personal information like birthdays</li>
                                <li>Be different for each account you have</li>
                            </ul>
                            @break
                        @case(3)
                            <div class="text-white/90 space-y-3">
                                <div class="flex items-center gap-3 mb-2">
                                    <div class="w-12 h-12 rounded-full bg-red-500 flex items-center justify-center flex-shrink-0 animate-pulse-slow">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-7 h-7 text-white">
                                            <path d="M7.5 6a4.5 4.5 0 119 0 4.5 4.5 0 01-9 0z" />
                                            <path d="M3.751 20.105a8.25 8.25 0 0116.498 0 .75.75 0 01-.437.695A18.683 18.683 0 0112 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 01-.437-.695z" />
                                        </svg>
                                    </div>
                                    <h3 class="font-game text-xl text-red-300">Watch out for Profile Phantom!</h3>
                                </div>
                                
                                <p class="text-lg">Hi {{ $player_name }}! Let's spot those tricky fake accounts!</p>
                                
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                                    <div class="bg-blue-900/30 p-4 rounded-lg border border-blue-400/20 transform transition hover:scale-105">
                                        <div class="flex items-center gap-2 mb-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-300" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                                            </svg>
                                            <span class="font-bold text-blue-300">Fake Prizes Trick</span>
                                        </div>
                                        <p>Groups offering "free" stuff or exclusive content</p>
                                    </div>
                                    
                                    <div class="bg-purple-900/30 p-4 rounded-lg border border-purple-400/20 transform transition hover:scale-105">
                                        <div class="flex items-center gap-2 mb-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-300" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                                            </svg>
                                            <span class="font-bold text-purple-300">Sneaky Messages</span>
                                        </div>
                                        <p>Strangers asking for your personal info</p>
                                    </div>
                                    
                                    <div class="bg-red-900/30 p-4 rounded-lg border border-red-400/20 transform transition hover:scale-105">
                                        <div class="flex items-center gap-2 mb-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-300" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                                            </svg>
                                            <span class="font-bold text-red-300">Credit Card Scams</span>
                                        </div>
                                        <p>People asking for your parent's credit card</p>
                                    </div>
                                    
                                    <div class="bg-green-900/30 p-4 rounded-lg border border-green-400/20 transform transition hover:scale-105">
                                        <div class="flex items-center gap-2 mb-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-300" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                                            </svg>
                                            <span class="font-bold text-green-300">Imposters Alert</span>
                                        </div>
                                        <p>Accounts pretending to be someone you know</p>
                                    </div>
                                </div>
                                
                                <div class="mt-4 text-center">
                                    <span class="inline-block animate-bounce bg-yellow-500 text-black font-bold px-4 py-2 rounded-full">
                                        Let's become social media detectives!
                                    </span>
                                </div>
                            </div>
                        @break
                        @default
                            <p class="text-white/90">Hello {{ $player_name }}! I'm Circuit, your AI guide. I'll help you complete this mission safely. Pay attention to the details and think critically about what you see!</p>
                    @endswitch
                </div>
            </div>
        </div>
        
        <!-- Mission Content -->
        <div class="bg-white/10 backdrop-blur-md border border-white/20 p-6 rounded-2xl shadow-xl text-white mb-8">
            @switch($mission['id'])
                @case(1)
                    <h2 class="text-xl font-game mb-4 text-center">The Mysterious Email Challenge</h2>
                    
                    <div class="bg-white/5 backdrop-blur-xl border border-red-500/30 p-6 rounded-xl shadow-2xl text-white mb-6 relative overflow-hidden">
                        <!-- Futuristic background elements -->
                        <div class="absolute inset-0 bg-gradient-to-br from-red-900/30 to-purple-900/30"></div>
                        <div class="absolute inset-0">
                            <div class="grid grid-cols-12 grid-rows-12 gap-2 opacity-10">
                                @for ($i = 0; $i < 144; $i++)
                                    <div class="h-6 w-full bg-red-500/30 rounded"></div>
                                @endfor
                            </div>
                        </div>
                        
                        <!-- Animated cybersecurity elements -->
                        <div class="absolute top-0 right-0 h-32 w-32 opacity-20">
                            <svg viewBox="0 0 100 100" class="animate-spin-slow">
                                <circle cx="50" cy="50" r="40" stroke="rgba(239, 68, 68, 0.5)" stroke-width="2" fill="none" />
                                <circle cx="50" cy="50" r="30" stroke="rgba(139, 92, 246, 0.5)" stroke-width="2" fill="none" />
                                <path d="M50 10 L50 90 M10 50 L90 50" stroke="rgba(236, 72, 153, 0.5)" stroke-width="2" />
                            </svg>
                        </div>
                        
                        <div class="relative z-10">
                            <!-- Stage navigation -->
                            <div class="flex justify-center mb-8">
                                <div class="flex items-center space-x-3 bg-gray-900/50 p-1 rounded-full">
                                    <button id="phishing-stage1-btn" class="px-5 py-2 bg-gradient-to-r from-red-600 to-purple-600 text-white rounded-full font-bold phishing-stage-btn active transition-all duration-300">Email Basics</button>
                                    <button id="phishing-stage2-btn" class="px-5 py-2 bg-gray-800/70 text-gray-400 rounded-full font-bold phishing-stage-btn transition-all duration-300">Outlook Phishing</button>
                                    <button id="phishing-stage3-btn" class="px-5 py-2 bg-gray-800/70 text-gray-400 rounded-full font-bold phishing-stage-btn transition-all duration-300">Gmail Phishing</button>
                                    <button id="phishing-stage4-btn" class="px-5 py-2 bg-gray-800/70 text-gray-400 rounded-full font-bold phishing-stage-btn transition-all duration-300">SMS Scams</button>
                                    <button id="phishing-stage5-btn" class="px-5 py-2 bg-gray-800/70 text-gray-400 rounded-full font-bold phishing-stage-btn transition-all duration-300">Final Test</button>
                                </div>
                            </div>
                            
                            <!-- Cartoon Character Assistant -->
                            <div class="flex items-start mb-6">
                                <div class="w-3/4 pr-4">
                                    <div class="flex items-start space-x-4 bg-red-900/30 p-4 rounded-lg border border-red-400/20 animate__animated animate__fadeIn">
                                        <div class="flex-shrink-0">
                                            <div class="w-16 h-16 rounded-full bg-gradient-to-br from-red-500 to-purple-600 flex items-center justify-center overflow-hidden border-2 border-red-300/50 shadow-lg">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-10 h-10 text-white">
                                                    <path fill="currentColor" d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm4.59-12.42L10 14.17l-2.59-2.58L6 13l4 4 8-8z"/>
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="flex-1">
                                            <div class="bg-red-800/40 p-3 rounded-lg rounded-tl-none relative">
                                                <div class="absolute -left-2 top-0 w-0 h-0 border-t-8 border-r-8 border-red-800/40 border-l-transparent"></div>
                                                <p class="text-red-100 text-sm font-medium" id="phishing-assistant-text">Hi there! I'm PhishGuard! I'll help you spot tricky emails and messages that might be trying to steal your information. Let's learn how to stay safe online!</p>
                                            </div>
                                            <div class="mt-2 text-xs text-red-300 font-medium">PhishGuard - Email Security Expert</div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="w-1/4 flex justify-center items-start">
                                    <div class="animate-pulse-slow">
                                        <img src="https://cdn-icons-png.flaticon.com/512/1691/1691945.png" alt="PhishGuard Character" class="h-32 filter drop-shadow-lg">
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Stage 1: Email Basics -->
                            <div id="phishing-stage1" class="phishing-stage active">
                                <div class="bg-white rounded-lg p-5 text-gray-800 mb-6">
                                    <div class="border-b pb-2 mb-3">
                                        <div class="flex justify-between">
                                            <div>
                                                <p class="font-semibold">From: <span class="text-danger-600">prize-alert@amazen-reward.net</span></p>
                                                <p>To: you@example.com</p>
                                                <p>Subject: <span class="font-bold">URGENT: Your $1000 Gift Card is expiring TODAY!</span></p>
                                            </div>
                                            <div class="text-gray-500 text-sm">
                                                Today, 9:42 AM
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div>
                                        <p class="font-bold mb-2">CONGRADULATIONS! YOU'VE BEEN SELECTED!</p>
                                        <p class="mb-3">Dear Customer,</p>
                                        <p class="mb-3">Your account has been selected to receive a $1000 Amazen Gift Card! You must claim this award in the next 2 HOURS or it will be given to someone else!</p>
                                        <p class="mb-3">To claim your prize immedietely, click the link below and enter your account details to verify your identity:</p>
                                        <p class="mb-4 text-center">
                                            <a href="#" class="px-4 py-2 bg-yellow-400 text-black font-bold rounded hover:bg-yellow-500">CLAIM YOUR $1000 GIFT CARD NOW!</a>
                                        </p>
                                        <p class="mb-3">If you don't claim in the next 2 hours, your prize will be FORFITTED!</p>
                                        <p class="text-sm text-gray-500">Amazen Rewards Team</p>
                                    </div>
                                </div>
                                
                                <h3 class="font-game text-lg mb-4">Find the clues that show this is a phishing email:</h3>
                                
                                <div class="space-y-3">
                                    <div class="flex items-center">
                                        <input type="checkbox" id="clue1" name="clues[]" value="sender" class="mr-2 h-5 w-5">
                                        <label for="clue1" class="text-cyan-100">The sender email (amazen-reward.net) doesn't match the real company (amazon.com)</label>
                                    </div>
                                    <div class="flex items-center">
                                        <input type="checkbox" id="clue2" name="clues[]" value="urgency" class="mr-2 h-5 w-5">
                                        <label for="clue2" class="text-cyan-100">Creates false urgency with "expiring today" and "2 hours" deadline</label>
                                    </div>
                                    <div class="flex items-center">
                                        <input type="checkbox" id="clue3" name="clues[]" value="spelling" class="mr-2 h-5 w-5">
                                        <label for="clue3" class="text-cyan-100">Contains spelling errors like "CONGRADULATIONS" and "immedietely"</label>
                                    </div>
                                    <div class="flex items-center">
                                        <input type="checkbox" id="clue4" name="clues[]" value="prize" class="mr-2 h-5 w-5">
                                        <label for="clue4" class="text-cyan-100">Offers an unrealistic prize to create excitement ($1000 gift card)</label>
                                    </div>
                                    <div class="flex items-center">
                                        <input type="checkbox" id="clue5" name="clues[]" value="link" class="mr-2 h-5 w-5">
                                        <label for="clue5" class="text-cyan-100">Contains a suspicious link that asks for account details</label>
                                    </div>
                                </div>
                                
                                <div class="border-t border-white/20 pt-4 mt-4">
                                    <h3 class="font-game text-lg mb-2">What should you do with this email?</h3>
                                    <div class="space-y-2">
                                        <div class="flex items-center">
                                            <input type="radio" id="action1" name="action" value="click" class="mr-2 h-5 w-5">
                                            <label for="action1" class="text-cyan-100">Click the link to see if the offer is real</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input type="radio" id="action2" name="action" value="ignore" class="mr-2 h-5 w-5">
                                            <label for="action2" class="text-cyan-100">Ignore the email and do not click any links</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input type="radio" id="action3" name="action" value="reply" class="mr-2 h-5 w-5">
                                            <label for="action3" class="text-cyan-100">Reply to ask for more information</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input type="radio" id="action4" name="action" value="report" class="mr-2 h-5 w-5">
                                            <label for="action4" class="text-cyan-100">Mark as spam/phishing and delete the email</label>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="mt-6 text-center">
                                    <button id="check-basics" class="btn-cyber px-8 py-3 bg-gradient-to-r from-red-600 to-purple-600 hover:from-red-700 hover:to-purple-700 text-white font-bold rounded-full transition-all duration-300 shadow-lg shadow-red-500/20 hover:shadow-red-500/40">
                                        <span class="relative z-10">Check My Answers</span>
                                    </button>
                                </div>
                            </div>
                            
                            <!-- Stage 2: Outlook Phishing -->
                            <div id="phishing-stage2" class="phishing-stage hidden">
                                <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                                    <!-- Outlook Header -->
                                    <div class="bg-[#0078d4] text-white px-4 py-2">
                                        <div class="flex justify-between items-center">
                                            <div class="flex items-center">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M21.1789 7.94018L13.1141 3.60979C12.74 3.41356 12.3718 3.38477 12 3.38477C11.6282 3.38477 11.26 3.41356 10.8859 3.60979L2.82109 7.94018C2.31451 8.20444 2 8.73422 2 9.31422V18.3713C2 19.5336 2.94945 20.4713 4.125 20.4713H19.875C21.0506 20.4713 22 19.5336 22 18.3713V9.31422C22 8.73422 21.6855 8.20444 21.1789 7.94018Z" fill="white"/>
                                                </svg>
                                                <span class="ml-2 font-semibold">Outlook</span>
                                            </div>
                                            <div class="flex items-center space-x-3">
                                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M19 6.41L17.59 5L12 10.59L6.41 5L5 6.41L10.59 12L5 17.59L6.41 19L12 13.41L17.59 19L19 17.59L13.41 12L19 6.41Z" fill="white"/>
                                                </svg>
                                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M19 13H5V11H19V13Z" fill="white"/>
                                                </svg>
                                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M12 8L6 14H18L12 8Z" fill="white"/>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- Outlook Email Body -->
                                    <div class="p-4 bg-white">
                                        <div class="border-b pb-3 mb-4">
                                            <div class="flex justify-between">
                                                <div class="flex items-start">
                                                    <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center text-blue-500 font-bold mr-3">
                                                        M
                                                    </div>
                                                    <div>
                                                        <p class="font-bold">Microsoft Account Team</p>
                                                        <p class="text-sm text-gray-500">security-noreply@microsoft-verify.com</p>
                                                        <p class="text-sm text-gray-500">To: you@outlook.com</p>
                                                    </div>
                                                </div>
                                                <div class="text-gray-400 text-sm">
                                                    Yesterday, 11:27 AM
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="mb-6">
                                            <h2 class="text-xl font-bold mb-3">Microsoft Account Security Alert: Unusual Sign-in Activity</h2>
                                            
                                            <div class="border-l-4 border-yellow-500 bg-yellow-50 p-3 mb-4">
                                                <p class="text-yellow-800">We detected an unusual sign-in attempt to your Microsoft account from a new location.</p>
                                            </div>
                                            
                                            <p class="mb-3">Dear Microsoft User,</p>
                                            
                                            <p class="mb-3">Our security systems have detected a login attempt to your Microsoft account from an unrecognized device located in <span class="font-semibold">Kyiv, Ukraine</span> on <span class="font-semibold">May 14, 2023 at 07:32 UTC</span>.</p>
                                            
                                            <div class="bg-gray-100 p-3 rounded mb-4">
                                                <p class="font-semibold mb-1">Login Details:</p>
                                                <p><span class="font-semibold">IP Address:</span> 93.184.216.34</p>
                                                <p><span class="font-semibold">Browser:</span> Chrome on Windows</p>
                                                <p><span class="font-semibold">Location:</span> Kyiv, Ukraine</p>
                                            </div>
                                            
                                            <p class="mb-3">If this was you, you can safely ignore this message.</p>
                                            
                                            <p class="mb-4">If this wasn't you, please secure your account immediately by clicking the button below to verify your identity and change your password:</p>
                                            
                                            <div class="text-center mb-4">
                                                <a href="#" class="inline-block px-6 py-3 bg-[#0078d4] text-white font-bold rounded hover:bg-[#006cbe]">Secure Your Account Now</a>
                                            </div>
                                            
                                            <p class="text-sm text-gray-500 mb-2">Microsoft account security team</p>
                                            <p class="text-sm text-gray-500 mb-4">This is an automated message. Please do not reply.</p>
                                            
                                            <div class="text-xs text-gray-400 border-t pt-3">
                                                <p>© 2023 Microsoft Corporation. All rights reserved.</p>
                                                <p>Microsoft respects your privacy. Please review our Privacy Statement: privacy.microsoft.com</p>
                                                <p>Microsoft Corporation, One Microsoft Way, Redmond, WA 98052 USA</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="mt-6 mb-6">
                                    <h3 class="font-game text-lg mb-4">What are the signs this Outlook email might be a phishing attempt?</h3>
                                    <div class="space-y-3">
                                        <div class="flex items-center">
                                            <input type="checkbox" id="outlook-clue1" name="outlook-clues[]" value="sender-domain" class="mr-2 h-5 w-5">
                                            <label for="outlook-clue1" class="text-cyan-100">The sender's email domain "microsoft-verify.com" is not an official Microsoft domain</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input type="checkbox" id="outlook-clue2" name="outlook-clues[]" value="generic-greeting" class="mr-2 h-5 w-5">
                                            <label for="outlook-clue2" class="text-cyan-100">Uses generic greeting "Dear Microsoft User" instead of your actual name</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input type="checkbox" id="outlook-clue3" name="outlook-clues[]" value="urgency" class="mr-2 h-5 w-5">
                                            <label for="outlook-clue3" class="text-cyan-100">Creates urgency by mentioning "unusual sign-in" to prompt immediate action</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input type="checkbox" id="outlook-clue4" name="outlook-clues[]" value="hover-link" class="mr-2 h-5 w-5">
                                            <label for="outlook-clue4" class="text-cyan-100">The "Secure Your Account Now" button would likely link to a fake website</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input type="checkbox" id="outlook-clue5" name="outlook-clues[]" value="vague-footer" class="mr-2 h-5 w-5">
                                            <label for="outlook-clue5" class="text-cyan-100">The footer doesn't contain specific contact information or support options</label>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="mt-6 text-center">
                                    <button id="check-outlook" class="btn-cyber px-8 py-3 bg-gradient-to-r from-red-600 to-purple-600 hover:from-red-700 hover:to-purple-700 text-white font-bold rounded-full transition-all duration-300 shadow-lg shadow-red-500/20 hover:shadow-red-500/40">
                                        <span class="relative z-10">Check My Answers</span>
                                    </button>
                                </div>
                            </div>
                            
                            <!-- Stage 3: Gmail Phishing -->
                            <div id="phishing-stage3" class="phishing-stage hidden">
                                <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                                    <!-- Gmail Header -->
                                    <div class="bg-gray-100 text-gray-800 px-4 py-2 border-b">
                                        <div class="flex justify-between items-center">
                                            <div class="flex items-center">
                                                <svg width="24" height="18" viewBox="0 0 24 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M24 2V16C24 17.1 23.1 18 22 18H2C0.9 18 0 17.1 0 16V2C0 0.9 0.9 0 2 0H22C23.1 0 24 0.9 24 2ZM22 2H2V16H22V2ZM13 5L21 10V4L13 9.5V5ZM3 5L11 10V4L3 9.5V5Z" fill="#EA4335"/>
                                                </svg>
                                                <span class="ml-2 font-semibold">Gmail</span>
                                            </div>
                                            <div class="flex items-center space-x-3 text-gray-600">
                                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M13 7H11V11H7V13H11V17H13V13H17V11H13V7ZM12 2C6.48 2 2 6.48 2 12C2 17.52 6.48 22 12 22C17.52 22 22 17.52 22 12C22 6.48 17.52 2 12 2ZM12 20C7.59 20 4 16.41 4 12C4 7.59 7.59 4 12 4C16.41 4 20 7.59 20 12C20 16.41 16.41 20 12 20Z" fill="currentColor"/>
                                                </svg>
                                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M20 4H4C2.9 4 2 4.9 2 6V18C2 19.1 2.9 20 4 20H20C21.1 20 22 19.1 22 18V6C22 4.9 21.1 4 20 4ZM20 18H4V8L12 13L20 8V18ZM12 11L4 6H20L12 11Z" fill="currentColor"/>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- Gmail Email Body -->
                                    <div class="p-4 bg-white">
                                        <div class="border-b pb-3 mb-4">
                                            <div class="flex justify-between items-start">
                                                <div class="flex items-start">
                                                    <div class="w-10 h-10 rounded-full bg-green-100 flex items-center justify-center text-green-600 font-bold mr-3">
                                                        P
                                                    </div>
                                                    <div>
                                                        <p class="font-bold">PayPal Service</p>
                                                        <p class="text-sm text-gray-500">paypal-secure@account-verification.com</p>
                                                        <p class="text-xs text-gray-400">to me <svg class="inline-block w-4 h-4" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M7 10L12 15L17 10H7Z" fill="currentColor"/>
                                                        </svg></p>
                                                    </div>
                                                </div>
                                                <div class="text-gray-500 text-sm flex items-center">
                                                    <span>May 15</span>
                                                    <span class="mx-2">⭐</span>
                                                    <span>↩️</span>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="mb-6">
                                            <h2 class="text-lg font-bold mb-4">Important: Your PayPal account has been limited</h2>
                                            
                                            <div class="mb-5 text-center">
                                                <img src="https://www.paypalobjects.com/webstatic/mktg/logo/pp_cc_mark_111x69.jpg" alt="PayPal Logo" class="h-12 inline-block">
                                            </div>
                                            
                                            <p class="mb-3">Dear Valued Customer,</p>
                                            
                                            <p class="mb-3">We noticed some unusual activity in your PayPal account. As a security measure, we have temporarily limited your account access.</p>
                                            
                                            <p class="mb-3">To remove these limitations, please verify your information by following these steps:</p>
                                            
                                            <ol class="list-decimal ml-5 mb-5 space-y-1">
                                                <li>Click on the "Verify My Account" button below</li>
                                                <li>Sign in to your PayPal account</li>
                                                <li>Confirm your billing information</li>
                                                <li>Link a new payment method if prompted</li>
                                            </ol>
                                            
                                            <div class="text-center mb-5">
                                                <a href="#" class="inline-block px-6 py-3 bg-[#0070ba] text-white font-bold rounded hover:bg-[#005ea6]">Verify My Account</a>
                                            </div>
                                            
                                            <p class="mb-3">If you do not verify your account within 48 hours, your account access will be further restricted.</p>
                                            
                                            <p class="mb-4">We apologize for any inconvenience this may cause.</p>
                                            
                                            <p class="mb-1">Thanks,</p>
                                            <p class="mb-5">PayPal Account Services</p>
                                            
                                            <div class="text-xs text-gray-400 border-t pt-3">
                                                <p>This email was sent to you by PayPal, Inc.</p>
                                                <p>Please do not reply to this email, as this mailbox is not monitored.</p>
                                                <p>Copyright © 1999-2023 PayPal. All rights reserved.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="mt-6 mb-6">
                                    <h3 class="font-game text-lg mb-4">Find the phishing clues in this PayPal email:</h3>
                                    <div class="space-y-3">
                                        <div class="flex items-center">
                                            <input type="checkbox" id="gmail-clue1" name="gmail-clues[]" value="sender-domain" class="mr-2 h-5 w-5">
                                            <label for="gmail-clue1" class="text-cyan-100">The sender is using "account-verification.com" instead of "paypal.com"</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input type="checkbox" id="gmail-clue2" name="gmail-clues[]" value="generic-greeting" class="mr-2 h-5 w-5">
                                            <label for="gmail-clue2" class="text-cyan-100">Uses generic "Dear Valued Customer" instead of your real name</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input type="checkbox" id="gmail-clue3" name="gmail-clues[]" value="urgency" class="mr-2 h-5 w-5">
                                            <label for="gmail-clue3" class="text-cyan-100">Creates urgency with "48 hours" deadline and "account limitations"</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input type="checkbox" id="gmail-clue4" name="gmail-clues[]" value="payment-method" class="mr-2 h-5 w-5">
                                            <label for="gmail-clue4" class="text-cyan-100">Asks for a new payment method, which real PayPal wouldn't do via email</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input type="checkbox" id="gmail-clue5" name="gmail-clues[]" value="browser-link" class="mr-2 h-5 w-5">
                                            <label for="gmail-clue5" class="text-cyan-100">Hovering over the button would show a non-PayPal URL</label>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="mt-6 text-center">
                                    <button id="check-gmail" class="btn-cyber px-8 py-3 bg-gradient-to-r from-red-600 to-purple-600 hover:from-red-700 hover:to-purple-700 text-white font-bold rounded-full transition-all duration-300 shadow-lg shadow-red-500/20 hover:shadow-red-500/40">
                                        <span class="relative z-10">Check My Answers</span>
                                    </button>
                                </div>
                            </div>
                            
                            <!-- Stage 4: SMS Scams -->
                            <div id="phishing-stage4" class="phishing-stage hidden">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <!-- Phone screen mock -->
                                    <div class="bg-gray-900 rounded-3xl overflow-hidden shadow-xl mx-auto" style="max-width: 300px;">
                                        <!-- Phone notch & status bar -->
                                        <div class="bg-black py-2 px-4 relative">
                                            <div class="absolute h-4 w-20 bg-black rounded-b-md top-0 left-1/2 transform -translate-x-1/2"></div>
                                            <div class="flex justify-between text-white text-xs mt-1">
                                                <div>9:41 AM</div>
                                                <div class="flex space-x-1">
                                                    <span>📶</span>
                                                    <span>🔋</span>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <!-- Messages interface -->
                                        <div class="bg-gray-800 p-3 text-white">
                                            <div class="flex justify-between items-center mb-3">
                                                <button class="text-blue-400">◀ Messages</button>
                                                <button class="text-blue-400">Edit</button>
                                            </div>
                                            
                                            <div class="flex items-center mb-3">
                                                <div class="w-8 h-8 rounded-full bg-gray-500 flex items-center justify-center mr-2">+</div>
                                                <div>
                                                    <div class="font-medium">Unknown Sender</div>
                                                    <div class="text-xs text-gray-400">From: 883-65</div>
                                                </div>
                                            </div>
                                            
                                            <div class="bg-gray-700 rounded-xl p-3 mb-10">
                                                <div class="flex flex-col space-y-3">
                                                    <!-- Message bubbles -->
                                                    <div class="bg-gray-600 p-2 rounded-lg max-w-[80%] text-sm">
                                                        <p>Your package delivery was attempted but no one was available. Reschedule at: pck-delivery.com/5ZpWra4</p>
                                                        <p class="text-xs text-gray-400 text-right">9:27 AM</p>
                                                    </div>
                                                    
                                                    <div class="bg-gray-600 p-2 rounded-lg max-w-[80%] text-sm">
                                                        <p>Banking alert: Your account has been suspended due to suspicious activity. Verify your details: bnkverify.net/Wx8Ka</p>
                                                        <p class="text-xs text-gray-400 text-right">9:31 AM</p>
                                                    </div>
                                                    
                                                    <div class="bg-gray-600 p-2 rounded-lg max-w-[80%] text-sm">
                                                        <p>You've won a FREE $500 gift card! Claim within 24 hours: prizeclaim.co/jK9pQw</p>
                                                        <p class="text-xs text-gray-400 text-right">9:35 AM</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <!-- Phone bottom bar -->
                                        <div class="bg-black py-1 flex justify-center">
                                            <div class="w-20 h-1 bg-gray-700 rounded-full"></div>
                                        </div>
                                    </div>
                                    
                                    <!-- Quiz section -->
                                    <div>
                                        <h3 class="font-game text-lg mb-4">Spot the SMS Scam Tactics</h3>
                                        <div class="space-y-3">
                                            <div class="flex items-start mb-2">
                                                <input type="checkbox" id="sms-clue1" name="sms-clues[]" value="short-codes" class="mr-2 h-5 w-5 mt-1">
                                                <label for="sms-clue1" class="text-cyan-100">Uses short codes or unknown numbers (like 883-65) instead of official company numbers</label>
                                            </div>
                                            <div class="flex items-start mb-2">
                                                <input type="checkbox" id="sms-clue2" name="sms-clues[]" value="suspicious-urls" class="mr-2 h-5 w-5 mt-1">
                                                <label for="sms-clue2" class="text-cyan-100">Contains shortened or suspicious URLs that don't match official company domains</label>
                                            </div>
                                            <div class="flex items-start mb-2">
                                                <input type="checkbox" id="sms-clue3" name="sms-clues[]" value="false-urgency" class="mr-2 h-5 w-5 mt-1">
                                                <label for="sms-clue3" class="text-cyan-100">Creates false urgency ("24 hours", "suspended account", "reschedule")</label>
                                            </div>
                                            <div class="flex items-start mb-2">
                                                <input type="checkbox" id="sms-clue4" name="sms-clues[]" value="unexpected-prizes" class="mr-2 h-5 w-5 mt-1">
                                                <label for="sms-clue4" class="text-cyan-100">Mentions unexpected prizes or rewards you didn't sign up for</label>
                                            </div>
                                            <div class="flex items-start mb-2">
                                                <input type="checkbox" id="sms-clue5" name="sms-clues[]" value="personal-info" class="mr-2 h-5 w-5 mt-1">
                                                <label for="sms-clue5" class="text-cyan-100">Asks for personal information, account details, or verification via text</label>
                                            </div>
                                        </div>
                                        
                                        <div class="mt-6">
                                            <h3 class="font-game text-lg mb-3">What should you do if you receive suspicious SMS messages?</h3>
                                            <div class="space-y-2">
                                                <div class="flex items-center">
                                                    <input type="radio" id="sms-action1" name="sms-action" value="click-links" class="mr-2 h-5 w-5">
                                                    <label for="sms-action1" class="text-cyan-100">Click the links to see if they're legitimate</label>
                                                </div>
                                                <div class="flex items-center">
                                                    <input type="radio" id="sms-action2" name="sms-action" value="reply-stop" class="mr-2 h-5 w-5">
                                                    <label for="sms-action2" class="text-cyan-100">Reply with "STOP" to all unknown senders</label>
                                                </div>
                                                <div class="flex items-center">
                                                    <input type="radio" id="sms-action3" name="sms-action" value="ignore-report" class="mr-2 h-5 w-5">
                                                    <label for="sms-action3" class="text-cyan-100">Ignore, delete, and report as spam to your carrier</label>
                                                </div>
                                                <div class="flex items-center">
                                                    <input type="radio" id="sms-action4" name="sms-action" value="call-number" class="mr-2 h-5 w-5">
                                                    <label for="sms-action4" class="text-cyan-100">Call the number back to confirm if it's legitimate</label>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="mt-6 text-center">
                                            <button id="check-sms" class="btn-cyber px-8 py-3 bg-gradient-to-r from-red-600 to-purple-600 hover:from-red-700 hover:to-purple-700 text-white font-bold rounded-full transition-all duration-300 shadow-lg shadow-red-500/20 hover:shadow-red-500/40">
                                                <span class="relative z-10">Check My Answers</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Stage 5: Final Test -->
                            <div id="phishing-stage5" class="phishing-stage hidden">
                                <div class="mb-8 relative">
                                    <!-- Villain Character Introduction -->
                                    <div class="bg-gradient-to-r from-red-900/80 to-purple-900/80 border-2 border-red-500/50 rounded-xl p-6 mb-8 shadow-xl relative overflow-hidden">
                                        <!-- Decorative elements -->
                                        <div class="absolute top-0 right-0 w-64 h-64 bg-red-500/10 rounded-full blur-3xl"></div>
                                        <div class="absolute bottom-0 left-0 w-64 h-64 bg-purple-500/10 rounded-full blur-3xl"></div>
                                        
                                        <div class="flex flex-col md:flex-row items-center gap-6">
                                            <div class="w-40 h-40 flex-shrink-0">
                                                <img src="https://cdn-icons-png.flaticon.com/512/2091/2091433.png" alt="Captain Clickbait" class="w-full h-full object-contain drop-shadow-[0_0_15px_rgba(220,38,38,0.5)] animate-pulse-slow">
                                            </div>
                                            <div class="flex-1">
                                                <div class="text-center md:text-left">
                                                    <h3 class="text-2xl font-game text-red-400 mb-2 animate__animated animate__fadeIn">Captain Clickbait</h3>
                                                    <p class="text-white mb-4">So you think you've learned how to spot my tricks? Let's see if you can pass my final test! Answer these questions correctly, or fall victim to my phishing schemes!</p>
                                                    <div class="h-2 w-full bg-gray-800 rounded-full overflow-hidden">
                                                        <div class="h-full bg-gradient-to-r from-red-600 to-purple-600 w-0 transition-all duration-1000" id="villain-power-meter"></div>
                                                    </div>
                                                    <p class="text-xs text-red-300 mt-1">Villain Power: <span id="villain-power">100%</span></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- Test Instructions -->
                                    <div class="text-center mb-6">
                                        <h3 class="text-xl font-game text-cyan-300 mb-2">Phishing Defense Final Test</h3>
                                        <p class="text-cyan-100">Answer all 10 questions to prove your phishing detection skills. Each correct answer weakens Captain Clickbait's power!</p>
                                    </div>
                                    
                                    <!-- Test Questions Container -->
                                    <div id="test-questions-container" class="space-y-8">
                                        <!-- Question 1 (Easy - Visual Gmail) -->
                                        <div class="bg-gray-900/40 rounded-lg p-6 border border-purple-500/30 shadow-lg" data-question-id="1">
                                            <div class="flex items-start gap-3 mb-4">
                                                <span class="bg-gradient-to-br from-purple-600 to-pink-500 text-white w-8 h-8 rounded-full flex items-center justify-center font-bold flex-shrink-0">1</span>
                                                <h4 class="text-lg font-medium text-white/90">Identify the phishing clue in this Gmail message:</h4>
                                            </div>
                                            
                                            <!-- Visual Gmail Interface -->
                                            <div class="bg-white rounded-lg shadow-lg overflow-hidden mb-6 transform transition-all duration-300 hover:scale-[1.02] hover:shadow-purple-500/20">
                                                <!-- Gmail Interface Header -->
                                                <div class="bg-gray-100 flex items-center p-2 border-b border-gray-200">
                                                    <svg viewBox="0 0 24 24" width="24" height="24" class="mr-2">
                                                        <path fill="#EA4335" d="M24 4.5v15c0 .85-.65 1.5-1.5 1.5H21V7.387l-9 6.463-9-6.463V21H1.5C.649 21 0 20.35 0 19.5v-15C0 3.649.649 3 1.5 3h.75L12 10.5 21.75 3h.75c.85 0 1.5.649 1.5 1.5z"></path>
                                                    </svg>
                                                    <span class="font-semibold text-gray-700">Gmail</span>
                                                    <div class="flex-grow"></div>
                                                    <div class="flex space-x-1">
                                                        <span class="w-3 h-3 bg-red-500 rounded-full"></span>
                                                        <span class="w-3 h-3 bg-yellow-500 rounded-full"></span>
                                                        <span class="w-3 h-3 bg-green-500 rounded-full"></span>
                                                    </div>
                                                </div>

                                                <!-- Gmail Email Content -->
                                                <div class="p-4">
                                                    <!-- Email Header Info -->
                                                    <div class="flex items-start mb-4">
                                                        <div class="w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center text-blue-500 font-bold mr-3 animate-pulse-slow">
                                                            A
                                                        </div>
                                                        <div class="flex-grow">
                                                            <div class="flex justify-between items-start">
                                                                <div>
                                                                    <p class="font-bold">Amazon Customer Service</p>
                                                                    <p class="text-xs text-gray-500">amazon-verification@amazonsecure-shopping.com</p>
                                                                    <p class="text-xs text-gray-400">to me <span class="inline-block ml-1">▼</span></p>
                                                                </div>
                                                                <div class="text-gray-500 text-xs flex items-center">
                                                                    <span>10:42 AM (2 hours ago)</span>
                                                                    <span class="ml-2">★</span>
                                                                    <span class="ml-2">↩️</span>
                                                                    <span class="ml-2">⋮</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Email Body -->
                                                    <div class="mb-4">
                                                        <h3 class="text-lg font-bold mb-2">Your Amazon Order Cannot Be Shipped</h3>
                                                        <div class="bg-red-50 border-l-4 border-red-500 p-3 mb-3 animate__animated animate__pulse animate__infinite animate__slow">
                                                            <p class="text-red-800 font-medium">Urgent: Action Required Within 24 Hours!</p>
                                                        </div>
                                                        <p class="mb-2">Dear Valued Customer,</p>
                                                        <p class="mb-2">We regret to inform you that your recent Amazon order (#AMZ-29581456) cannot be shipped due to a problem with your payment method.</p>
                                                        <p class="mb-2">To ensure your package is shipped promptly, please update your payment information by clicking the link below:</p>
                                                        <div class="text-center my-3">
                                                            <a href="#" class="inline-block px-6 py-2 bg-[#FF9900] hover:bg-[#e68a00] text-black font-bold rounded transition">Update Payment Method</a>
                                                        </div>
                                                        <p class="mb-2 text-sm">If you do not update your payment information within 24 hours, your order will be canceled.</p>
                                                        <p class="mb-3 text-sm">Thank you for choosing Amazon for your shopping needs.</p>
                                                        <p class="text-xs text-gray-500">Amazon Customer Service Team</p>
                                                    </div>
                                                    
                                                    <!-- Email Footer -->
                                                    <div class="border-t pt-2 text-xs text-gray-400">
                                                        <p>© 2023 Amazon.com, Inc. or its affiliates. All rights reserved.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <!-- Question Options -->
                                            <div class="ml-11 space-y-3">
                                                <label class="flex items-center bg-gray-800/50 p-3 rounded-lg hover:bg-gray-800/70 transition cursor-pointer">
                                                    <input type="radio" name="q1" value="a" class="mr-3 h-4 w-4">
                                                    <span>The email is from the official Amazon support team</span>
                                                </label>
                                                <label class="flex items-center bg-gray-800/50 p-3 rounded-lg hover:bg-gray-800/70 transition cursor-pointer">
                                                    <input type="radio" name="q1" value="b" class="mr-3 h-4 w-4">
                                                    <span>The sender's email domain is not an official Amazon domain</span>
                                                </label>
                                                <label class="flex items-center bg-gray-800/50 p-3 rounded-lg hover:bg-gray-800/70 transition cursor-pointer">
                                                    <input type="radio" name="q1" value="c" class="mr-3 h-4 w-4">
                                                    <span>The email displays an order number</span>
                                                </label>
                                                <label class="flex items-center bg-gray-800/50 p-3 rounded-lg hover:bg-gray-800/70 transition cursor-pointer">
                                                    <input type="radio" name="q1" value="d" class="mr-3 h-4 w-4">
                                                    <span>The email has an Amazon logo</span>
                                                </label>
                                            </div>
                                            <div class="mt-4 ml-11 hidden question-feedback"></div>
                                        </div>
                                        
                                        <!-- Question 2 (Easy) -->
                                        <div class="bg-gray-900/40 rounded-lg p-6 border border-purple-500/30 shadow-lg" data-question-id="2">
                                            <div class="flex items-start gap-3 mb-4">
                                                <span class="bg-gradient-to-br from-purple-600 to-pink-500 text-white w-8 h-8 rounded-full flex items-center justify-center font-bold flex-shrink-0">2</span>
                                                <h4 class="text-lg font-medium text-white/90">What should you do if you receive a suspicious email?</h4>
                                            </div>
                                            <div class="ml-11 space-y-3">
                                                <label class="flex items-center bg-gray-800/50 p-3 rounded-lg hover:bg-gray-800/70 transition cursor-pointer">
                                                    <input type="radio" name="q2" value="a" class="mr-3 h-4 w-4">
                                                    <span>Reply to ask if it's legitimate</span>
                                                </label>
                                                <label class="flex items-center bg-gray-800/50 p-3 rounded-lg hover:bg-gray-800/70 transition cursor-pointer">
                                                    <input type="radio" name="q2" value="b" class="mr-3 h-4 w-4">
                                                    <span>Click any links to see where they go</span>
                                                </label>
                                                <label class="flex items-center bg-gray-800/50 p-3 rounded-lg hover:bg-gray-800/70 transition cursor-pointer">
                                                    <input type="radio" name="q2" value="c" class="mr-3 h-4 w-4">
                                                    <span>Delete it or mark it as spam without clicking any links</span>
                                                </label>
                                                <label class="flex items-center bg-gray-800/50 p-3 rounded-lg hover:bg-gray-800/70 transition cursor-pointer">
                                                    <input type="radio" name="q2" value="d" class="mr-3 h-4 w-4">
                                                    <span>Forward it to all your contacts to warn them</span>
                                                </label>
                                            </div>
                                            <div class="mt-4 ml-11 hidden question-feedback"></div>
                                        </div>
                                        
                                        <!-- Question 3 (Medium - Visual Outlook) -->
                                        <div class="bg-gray-900/40 rounded-lg p-6 border border-purple-500/30 shadow-lg" data-question-id="3">
                                            <div class="flex items-start gap-3 mb-4">
                                                <span class="bg-gradient-to-br from-purple-600 to-pink-500 text-white w-8 h-8 rounded-full flex items-center justify-center font-bold flex-shrink-0">3</span>
                                                <h4 class="text-lg font-medium text-white/90">Find the security issue in this Microsoft Outlook email:</h4>
                                            </div>
                                            
                                            <!-- Visual Outlook Interface -->
                                            <div class="bg-white rounded-lg shadow-lg overflow-hidden mb-6 transform transition-all duration-300 hover:scale-[1.02] hover:shadow-purple-500/20">
                                                <!-- Outlook Header -->
                                                <div class="bg-[#0078d4] text-white px-4 py-2 flex justify-between items-center">
                                                    <div class="flex items-center">
                                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" class="mr-2">
                                                            <path d="M21.1789 7.94018L13.1141 3.60979C12.74 3.41356 12.3718 3.38477 12 3.38477C11.6282 3.38477 11.26 3.41356 10.8859 3.60979L2.82109 7.94018C2.31451 8.20444 2 8.73422 2 9.31422V18.3713C2 19.5336 2.94945 20.4713 4.125 20.4713H19.875C21.0506 20.4713 22 19.5336 22 18.3713V9.31422C22 8.73422 21.6855 8.20444 21.1789 7.94018Z" fill="white"/>
                                                        </svg>
                                                        <span class="font-semibold">Outlook</span>
                                                    </div>
                                                    <div class="flex items-center space-x-3">
                                                        <span class="w-3 h-3 bg-white rounded-full"></span>
                                                        <span class="w-3 h-3 bg-white rounded-full"></span>
                                                        <span class="w-3 h-3 bg-white rounded-full"></span>
                                                    </div>
                                                </div>
                                                
                                                <!-- Outlook Email Content -->
                                                <div class="p-4">
                                                    <!-- Email Header Info -->
                                                    <div class="border-b pb-3 mb-4">
                                                        <div class="flex justify-between">
                                                            <div class="flex items-start">
                                                                <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center text-blue-500 font-bold mr-3">
                                                                    M
                                                                </div>
                                                                <div>
                                                                    <p class="font-bold">Microsoft Security Team</p>
                                                                    <p class="text-sm text-gray-500 hover:underline cursor-pointer animate__animated animate__flash animate__slow animate__infinite">security@micrrosoft.com</p>
                                                                    <p class="text-sm text-gray-500">To: you@outlook.com</p>
                                                                    <p class="text-xs text-gray-400 mt-1">This message was sent with high importance</p>
                                                                </div>
                                                            </div>
                                                            <div class="text-gray-400 text-sm">
                                                                Today, 8:27 AM
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <!-- Email Body -->
                                                    <div class="mb-6">
                                                        <h2 class="text-xl font-bold mb-3 text-red-600">⚠️ URGENT: Security Alert - Unusual Sign-in Activity</h2>
                                                        
                                                        <div class="border-l-4 border-red-500 bg-red-50 p-3 mb-4">
                                                            <p class="text-red-800 font-medium">We have detected an unauthorized sign-in attempt to your Microsoft account.</p>
                                                        </div>
                                                        
                                                        <p class="mb-3">Dear Microsoft User,</p>
                                                        
                                                        <p class="mb-3">Our automated security systems have detected a suspicious login attempt to your Microsoft account from an unrecognized device located in <span class="font-semibold">Jakarta, Indonesia</span> on <span class="font-semibold">June 14, 2023 at 22:47 UTC</span>.</p>
                                                        
                                                        <div class="bg-gray-100 p-4 rounded-lg mb-4 border border-gray-300">
                                                            <p class="font-semibold mb-2 text-gray-700">Suspicious Login Details:</p>
                                                            <div class="grid grid-cols-2 gap-2">
                                                                <div>
                                                                    <p><span class="font-semibold">IP Address:</span> 103.144.175.69</p>
                                                                    <p><span class="font-semibold">Browser:</span> Chrome 114.0.5715.60</p>
                                                                </div>
                                                                <div>
                                                                    <p><span class="font-semibold">Location:</span> Jakarta, Indonesia</p>
                                                                    <p><span class="font-semibold">Status:</span> <span class="text-red-600 font-bold">Blocked</span></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="text-center mb-4">
                                                            <a href="#" class="inline-block px-6 py-3 bg-[#0078d4] text-white font-bold rounded hover:bg-[#006cbe] shadow-md">
                                                                <span class="flex items-center">
                                                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                                                    </svg>
                                                                    Verify Security Now
                                                                </span>
                                                            </a>
                                                        </div>
                                                        
                                                        <p class="text-sm text-gray-500 mb-2">Microsoft Security Team</p>
                                                        <p class="text-sm text-gray-500 mb-4">This is an automated message. Please do not reply.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <!-- Question Options -->
                                            <div class="ml-11 space-y-3">
                                                <label class="flex items-center bg-gray-800/50 p-3 rounded-lg hover:bg-gray-800/70 transition cursor-pointer">
                                                    <input type="radio" name="q3" value="a" class="mr-3 h-4 w-4">
                                                    <span>The email doesn't provide specific login details</span>
                                                </label>
                                                <label class="flex items-center bg-gray-800/50 p-3 rounded-lg hover:bg-gray-800/70 transition cursor-pointer">
                                                    <input type="radio" name="q3" value="b" class="mr-3 h-4 w-4">
                                                    <span>There's a suspicious button asking to verify security</span>
                                                </label>
                                                <label class="flex items-center bg-gray-800/50 p-3 rounded-lg hover:bg-gray-800/70 transition cursor-pointer">
                                                    <input type="radio" name="q3" value="c" class="mr-3 h-4 w-4">
                                                    <span>There's a misspelling in "Microsoft" in the email address (micrrosoft.com)</span>
                                                </label>
                                                <label class="flex items-center bg-gray-800/50 p-3 rounded-lg hover:bg-gray-800/70 transition cursor-pointer">
                                                    <input type="radio" name="q3" value="d" class="mr-3 h-4 w-4">
                                                    <span>The email was sent this morning</span>
                                                </label>
                                            </div>
                                            <div class="mt-4 ml-11 hidden question-feedback"></div>
                                        </div>
                                        
                                        <!-- Question 4 (Medium) -->
                                        <div class="bg-gray-900/40 rounded-lg p-6 border border-purple-500/30 shadow-lg" data-question-id="4">
                                            <div class="flex items-start gap-3 mb-4">
                                                <span class="bg-gradient-to-br from-purple-600 to-pink-500 text-white w-8 h-8 rounded-full flex items-center justify-center font-bold flex-shrink-0">4</span>
                                                <h4 class="text-lg font-medium text-white/90">What technique do phishers use to create a sense of urgency?</h4>
                                            </div>
                                            <div class="ml-11 space-y-3">
                                                <label class="flex items-center bg-gray-800/50 p-3 rounded-lg hover:bg-gray-800/70 transition cursor-pointer">
                                                    <input type="radio" name="q4" value="a" class="mr-3 h-4 w-4">
                                                    <span>They send emails only during business hours</span>
                                                </label>
                                                <label class="flex items-center bg-gray-800/50 p-3 rounded-lg hover:bg-gray-800/70 transition cursor-pointer">
                                                    <input type="radio" name="q4" value="b" class="mr-3 h-4 w-4">
                                                    <span>They mention deadlines and consequences like "account closure within 24 hours"</span>
                                                </label>
                                                <label class="flex items-center bg-gray-800/50 p-3 rounded-lg hover:bg-gray-800/70 transition cursor-pointer">
                                                    <input type="radio" name="q4" value="c" class="mr-3 h-4 w-4">
                                                    <span>They always send short emails</span>
                                                </label>
                                                <label class="flex items-center bg-gray-800/50 p-3 rounded-lg hover:bg-gray-800/70 transition cursor-pointer">
                                                    <input type="radio" name="q4" value="d" class="mr-3 h-4 w-4">
                                                    <span>They use professional email signatures</span>
                                                </label>
                                            </div>
                                            <div class="mt-4 ml-11 hidden question-feedback"></div>
                                        </div>
                                        
                                        <!-- Question 5 (Medium - Visual SMS) -->
                                        <div class="bg-gray-900/40 rounded-lg p-6 border border-purple-500/30 shadow-lg" data-question-id="5">
                                            <div class="flex items-start gap-3 mb-4">
                                                <span class="bg-gradient-to-br from-purple-600 to-pink-500 text-white w-8 h-8 rounded-full flex items-center justify-center font-bold flex-shrink-0">5</span>
                                                <h4 class="text-lg font-medium text-white/90">What makes this SMS message suspicious?</h4>
                                            </div>
                                            
                                            <!-- Visual SMS Interface -->
                                            <div class="flex justify-center mb-6">
                                                <div class="bg-gray-900 rounded-3xl overflow-hidden shadow-xl w-full max-w-[320px] transform transition-all duration-300 hover:scale-[1.02] hover:shadow-purple-500/20">
                                                    <!-- Phone notch & status bar -->
                                                    <div class="bg-black py-2 px-4 relative">
                                                        <div class="absolute h-4 w-20 bg-black rounded-b-md top-0 left-1/2 transform -translate-x-1/2"></div>
                                                        <div class="flex justify-between text-white text-xs mt-1">
                                                            <div class="animate__animated animate__fadeIn animate__infinite animate__slower">10:27 AM</div>
                                                            <div class="flex space-x-1">
                                                                <span>📶</span>
                                                                <span class="animate__animated animate__flash animate__infinite animate__slow">🔋</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <!-- SMS App Header -->
                                                    <div class="bg-gray-800 px-4 py-2 border-b border-gray-700 flex items-center justify-between">
                                                        <button class="text-blue-400 text-sm">← Messages</button>
                                                        <button class="text-blue-400 text-sm">Contact</button>
                                                    </div>
                                                    
                                                    <!-- Contact Info -->
                                                    <div class="bg-gray-800 px-4 py-2 flex items-center border-b border-gray-700">
                                                        <div class="w-8 h-8 rounded-full bg-red-500 flex items-center justify-center text-white font-bold mr-3">?</div>
                                                        <div>
                                                            <div class="text-white font-medium">Unknown</div>
                                                            <div class="text-xs text-gray-400">+1 (213) 555-0123</div>
                                                        </div>
                                                    </div>
                                                    
                                                    <!-- Messages Area -->
                                                    <div class="bg-gray-800 p-4 flex flex-col space-y-3 min-h-[250px]">
                                                        <!-- Incoming Messages -->
                                                        <div class="max-w-[80%] bg-gray-700 p-3 rounded-lg rounded-tl-none text-white self-start animate__animated animate__fadeInLeft">
                                                            <p class="text-sm">Your FEDEX package could not be delivered: Update delivery address at fedex-track.co/nS7bHp</p>
                                                            <p class="text-[10px] text-gray-400 text-right mt-1">10:25 AM</p>
                                                        </div>
                                                        
                                                        <div class="max-w-[80%] bg-gray-700 p-3 rounded-lg rounded-tl-none text-white self-start animate__animated animate__fadeInLeft animate__delay-1s">
                                                            <p class="text-sm">Your package will be returned to sender in 24h if not claimed.</p>
                                                            <p class="text-[10px] text-gray-400 text-right mt-1">10:26 AM</p>
                                                        </div>
                                                        
                                                        <div class="max-w-[80%] bg-gray-700 p-3 rounded-lg rounded-tl-none text-white self-start flex items-center animate__animated animate__fadeInLeft animate__delay-2s">
                                                            <span class="text-sm mr-1">Tap to claim your package:</span>
                                                            <span class="text-blue-400 underline text-sm">fedex-track.co/nS7bHp</span>
                                                            <p class="text-[10px] text-gray-400 text-right mt-1">10:27 AM</p>
                                                        </div>
                                                    </div>
                                                    
                                                    <!-- Message Input Area -->
                                                    <div class="bg-gray-700 p-3 flex items-center">
                                                        <input type="text" placeholder="Message" class="bg-gray-600 rounded-full text-white text-sm px-4 py-2 flex-grow">
                                                        <button class="ml-2 w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center text-white">
                                                            ↑
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <!-- Question Options -->
                                            <div class="ml-11 space-y-3">
                                                <label class="flex items-center bg-gray-800/50 p-3 rounded-lg hover:bg-gray-800/70 transition cursor-pointer">
                                                    <input type="radio" name="q5" value="a" class="mr-3 h-4 w-4">
                                                    <span>The message mentions FedEx, a legitimate delivery company</span>
                                                </label>
                                                <label class="flex items-center bg-gray-800/50 p-3 rounded-lg hover:bg-gray-800/70 transition cursor-pointer">
                                                    <input type="radio" name="q5" value="b" class="mr-3 h-4 w-4">
                                                    <span>The sender's number appears to be a U.S. phone number</span>
                                                </label>
                                                <label class="flex items-center bg-gray-800/50 p-3 rounded-lg hover:bg-gray-800/70 transition cursor-pointer">
                                                    <input type="radio" name="q5" value="c" class="mr-3 h-4 w-4">
                                                    <span>The URL is shortened and doesn't use the official FedEx domain (fedex.com)</span>
                                                </label>
                                                <label class="flex items-center bg-gray-800/50 p-3 rounded-lg hover:bg-gray-800/70 transition cursor-pointer">
                                                    <input type="radio" name="q5" value="d" class="mr-3 h-4 w-4">
                                                    <span>The message is too short to be legitimate</span>
                                                </label>
                                            </div>
                                            <div class="mt-4 ml-11 hidden question-feedback"></div>
                                        </div>
                                        
                                        <!-- Question 6 (Medium) -->
                                        <div class="bg-gray-900/40 rounded-lg p-6 border border-purple-500/30 shadow-lg" data-question-id="6">
                                            <div class="flex items-start gap-3 mb-4">
                                                <span class="bg-gradient-to-br from-purple-600 to-pink-500 text-white w-8 h-8 rounded-full flex items-center justify-center font-bold flex-shrink-0">6</span>
                                                <h4 class="text-lg font-medium text-white/90">You receive a text message claiming to be from your bank about a suspicious transaction. What is the safest response?</h4>
                                            </div>
                                            <div class="ml-11 space-y-3">
                                                <label class="flex items-center bg-gray-800/50 p-3 rounded-lg hover:bg-gray-800/70 transition cursor-pointer">
                                                    <input type="radio" name="q6" value="a" class="mr-3 h-4 w-4">
                                                    <span>Click the link in the text and enter your banking details</span>
                                                </label>
                                                <label class="flex items-center bg-gray-800/50 p-3 rounded-lg hover:bg-gray-800/70 transition cursor-pointer">
                                                    <input type="radio" name="q6" value="b" class="mr-3 h-4 w-4">
                                                    <span>Reply with "YES" or "NO" as instructed in the message</span>
                                                </label>
                                                <label class="flex items-center bg-gray-800/50 p-3 rounded-lg hover:bg-gray-800/70 transition cursor-pointer">
                                                    <input type="radio" name="q6" value="c" class="mr-3 h-4 w-4">
                                                    <span>Ignore the text and call your bank directly using the number on their official website or your card</span>
                                                </label>
                                                <label class="flex items-center bg-gray-800/50 p-3 rounded-lg hover:bg-gray-800/70 transition cursor-pointer">
                                                    <input type="radio" name="q6" value="d" class="mr-3 h-4 w-4">
                                                    <span>Forward the text to a family member to check if it's legitimate</span>
                                                </label>
                                            </div>
                                            <div class="mt-4 ml-11 hidden question-feedback"></div>
                                        </div>
                                        
                                        <!-- Question 7 (Medium-Hard) -->
                                        <div class="bg-gray-900/40 rounded-lg p-6 border border-purple-500/30 shadow-lg" data-question-id="7">
                                            <div class="flex items-start gap-3 mb-4">
                                                <span class="bg-gradient-to-br from-purple-600 to-pink-500 text-white w-8 h-8 rounded-full flex items-center justify-center font-bold flex-shrink-0">7</span>
                                                <h4 class="text-lg font-medium text-white/90">Which of these is an example of "spear phishing"?</h4>
                                            </div>
                                            <div class="ml-11 space-y-3">
                                                <label class="flex items-center bg-gray-800/50 p-3 rounded-lg hover:bg-gray-800/70 transition cursor-pointer">
                                                    <input type="radio" name="q7" value="a" class="mr-3 h-4 w-4">
                                                    <span>An email sent to millions of people claiming they've won a lottery</span>
                                                </label>
                                                <label class="flex items-center bg-gray-800/50 p-3 rounded-lg hover:bg-gray-800/70 transition cursor-pointer">
                                                    <input type="radio" name="q7" value="b" class="mr-3 h-4 w-4">
                                                    <span>A fake website that looks exactly like your bank's login page</span>
                                                </label>
                                                <label class="flex items-center bg-gray-800/50 p-3 rounded-lg hover:bg-gray-800/70 transition cursor-pointer">
                                                    <input type="radio" name="q7" value="c" class="mr-3 h-4 w-4">
                                                    <span>A targeted email to you claiming to be from your school principal, mentioning specific details about your classes</span>
                                                </label>
                                                <label class="flex items-center bg-gray-800/50 p-3 rounded-lg hover:bg-gray-800/70 transition cursor-pointer">
                                                    <input type="radio" name="q7" value="d" class="mr-3 h-4 w-4">
                                                    <span>A pop-up message saying your computer has a virus</span>
                                                </label>
                                            </div>
                                            <div class="mt-4 ml-11 hidden question-feedback"></div>
                                        </div>
                                        
                                        <!-- Question 8 (Hard) -->
                                        <div class="bg-gray-900/40 rounded-lg p-6 border border-purple-500/30 shadow-lg" data-question-id="8">
                                            <div class="flex items-start gap-3 mb-4">
                                                <span class="bg-gradient-to-br from-purple-600 to-pink-500 text-white w-8 h-8 rounded-full flex items-center justify-center font-bold flex-shrink-0">8</span>
                                                <h4 class="text-lg font-medium text-white/90">Which of these messages is LEAST likely to be a phishing attempt?</h4>
                                            </div>
                                            <div class="ml-11 space-y-3">
                                                <label class="flex items-center bg-gray-800/50 p-3 rounded-lg hover:bg-gray-800/70 transition cursor-pointer">
                                                    <input type="radio" name="q8" value="a" class="mr-3 h-4 w-4">
                                                    <span>An email from Netflix asking you to update your payment information by clicking a button</span>
                                                </label>
                                                <label class="flex items-center bg-gray-800/50 p-3 rounded-lg hover:bg-gray-800/70 transition cursor-pointer">
                                                    <input type="radio" name="q8" value="b" class="mr-3 h-4 w-4">
                                                    <span>A text message about a package delivery with a shortened link (bit.ly/2x4Yz)</span>
                                                </label>
                                                <label class="flex items-center bg-gray-800/50 p-3 rounded-lg hover:bg-gray-800/70 transition cursor-pointer">
                                                    <input type="radio" name="q8" value="c" class="mr-3 h-4 w-4">
                                                    <span>An email from your school's actual domain with a calendar invitation for a parent-teacher conference</span>
                                                </label>
                                                <label class="flex items-center bg-gray-800/50 p-3 rounded-lg hover:bg-gray-800/70 transition cursor-pointer">
                                                    <input type="radio" name="q8" value="d" class="mr-3 h-4 w-4">
                                                    <span>A message on social media from a "friend" you don't recognize asking for your phone number</span>
                                                </label>
                                            </div>
                                            <div class="mt-4 ml-11 hidden question-feedback"></div>
                                        </div>
                                        
                                        <!-- Question 9 (Hard) -->
                                        <div class="bg-gray-900/40 rounded-lg p-6 border border-purple-500/30 shadow-lg" data-question-id="9">
                                            <div class="flex items-start gap-3 mb-4">
                                                <span class="bg-gradient-to-br from-purple-600 to-pink-500 text-white w-8 h-8 rounded-full flex items-center justify-center font-bold flex-shrink-0">9</span>
                                                <h4 class="text-lg font-medium text-white/90">Which security feature helps identify legitimate emails from companies?</h4>
                                            </div>
                                            <div class="ml-11 space-y-3">
                                                <label class="flex items-center bg-gray-800/50 p-3 rounded-lg hover:bg-gray-800/70 transition cursor-pointer">
                                                    <input type="radio" name="q9" value="a" class="mr-3 h-4 w-4">
                                                    <span>The length of the email</span>
                                                </label>
                                                <label class="flex items-center bg-gray-800/50 p-3 rounded-lg hover:bg-gray-800/70 transition cursor-pointer">
                                                    <input type="radio" name="q9" value="b" class="mr-3 h-4 w-4">
                                                    <span>Email encryption and digital signatures (showing a verified sender)</span>
                                                </label>
                                                <label class="flex items-center bg-gray-800/50 p-3 rounded-lg hover:bg-gray-800/70 transition cursor-pointer">
                                                    <input type="radio" name="q9" value="c" class="mr-3 h-4 w-4">
                                                    <span>Colorful graphics and logos</span>
                                                </label>
                                                <label class="flex items-center bg-gray-800/50 p-3 rounded-lg hover:bg-gray-800/70 transition cursor-pointer">
                                                    <input type="radio" name="q9" value="d" class="mr-3 h-4 w-4">
                                                    <span>The presence of a copyright symbol ©</span>
                                                </label>
                                            </div>
                                            <div class="mt-4 ml-11 hidden question-feedback"></div>
                                        </div>
                                        
                                        <!-- Question 10 (Very Hard) -->
                                        <div class="bg-gray-900/40 rounded-lg p-6 border border-purple-500/30 shadow-lg" data-question-id="10">
                                            <div class="flex items-start gap-3 mb-4">
                                                <span class="bg-gradient-to-br from-purple-600 to-pink-500 text-white w-8 h-8 rounded-full flex items-center justify-center font-bold flex-shrink-0">10</span>
                                                <h4 class="text-lg font-medium text-white/90">You receive an email that appears to be from your friend sharing a Google Doc. Which combination of clues suggests it might be a phishing attack?</h4>
                                            </div>
                                            <div class="ml-11 space-y-3">
                                                <label class="flex items-center bg-gray-800/50 p-3 rounded-lg hover:bg-gray-800/70 transition cursor-pointer">
                                                    <input type="radio" name="q10" value="a" class="mr-3 h-4 w-4">
                                                    <span>The email uses your friend's correct name and comes from their actual email address</span>
                                                </label>
                                                <label class="flex items-center bg-gray-800/50 p-3 rounded-lg hover:bg-gray-800/70 transition cursor-pointer">
                                                    <input type="radio" name="q10" value="b" class="mr-3 h-4 w-4">
                                                    <span>The email is marked as important and the document is something you were expecting</span>
                                                </label>
                                                <label class="flex items-center bg-gray-800/50 p-3 rounded-lg hover:bg-gray-800/70 transition cursor-pointer">
                                                    <input type="radio" name="q10" value="c" class="mr-3 h-4 w-4">
                                                    <span>The email has a generic greeting, the document is unexpected, and hovering over the "Open in Docs" button shows a non-Google URL</span>
                                                </label>
                                                <label class="flex items-center bg-gray-800/50 p-3 rounded-lg hover:bg-gray-800/70 transition cursor-pointer">
                                                    <input type="radio" name="q10" value="d" class="mr-3 h-4 w-4">
                                                    <span>The email was sent during school hours and mentions a class project</span>
                                                </label>
                                            </div>
                                            <div class="mt-4 ml-11 hidden question-feedback"></div>
                                        </div>
                                    </div>
                                    
                                    <div class="mt-8 text-center">
                                        <button id="check-test-answers" class="btn-cyber px-8 py-3 bg-gradient-to-r from-red-600 to-purple-600 hover:from-red-700 hover:to-purple-700 text-white font-bold rounded-full transition-all duration-300 shadow-lg shadow-red-500/20 hover:shadow-red-500/40">
                                            <span class="relative z-10">Submit Answers</span>
                                        </button>
                                    </div>
                                    
                                    <!-- Test Results Modal (Hidden initially) -->
                                    <div id="test-results" class="fixed inset-0 flex items-center justify-center z-50 hidden">
                                        <div class="absolute inset-0 bg-black/80 backdrop-blur-sm"></div>
                                        <div class="relative bg-gradient-to-br from-gray-900 to-purple-900 rounded-xl p-8 max-w-md w-full mx-4 border border-purple-500/50 shadow-2xl transform transition-all">
                                            <button id="close-results" class="absolute top-2 right-2 text-gray-400 hover:text-white">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                                </svg>
                                            </button>
                                            
                                            <div class="text-center">
                                                <h3 class="text-xl font-game text-purple-300 mb-4">Your Test Results</h3>
                                                <div class="mb-6">
                                                    <div class="w-32 h-32 mx-auto relative">
                                                        <svg class="w-full h-full" viewBox="0 0 100 100">
                                                            <circle cx="50" cy="50" r="45" fill="none" stroke="#312e81" stroke-width="10" />
                                                            <circle id="results-circle" cx="50" cy="50" r="45" fill="none" stroke="#8b5cf6" stroke-width="10" 
                                                                stroke-dasharray="283" stroke-dashoffset="283" transform="rotate(-90 50 50)" />
                                                        </svg>
                                                        <div class="absolute inset-0 flex items-center justify-center text-2xl font-bold text-white">
                                                            <span id="results-percentage">0%</span>
                                                        </div>
                                                    </div>
                                                    <p class="text-white mt-2">You got <span id="results-correct">0</span> out of 10 questions correct!</p>
                                                </div>
                                                <div id="results-message" class="mb-6 text-cyan-100 py-3 px-4 rounded-lg bg-cyan-900/30 border border-cyan-500/30"></div>
                                                <button id="complete-test" class="bg-gradient-to-r from-purple-600 to-indigo-600 text-white py-3 px-6 rounded-lg font-bold shadow-lg hover:from-purple-700 hover:to-indigo-700 transition-all">
                                                    Complete Mission
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <form id="phishing-mission-form" action="{{ route('game.submit-mission', ['id' => $mission['id']]) }}" method="POST">
                                @csrf
                                <input type="hidden" name="phishing_stage1_complete" id="phishing_stage1_complete" value="0">
                                <input type="hidden" name="phishing_stage2_complete" id="phishing_stage2_complete" value="0">
                                <input type="hidden" name="phishing_stage3_complete" id="phishing_stage3_complete" value="0">
                                <input type="hidden" name="phishing_stage4_complete" id="phishing_stage4_complete" value="0">
                                <input type="hidden" name="phishing_stage5_complete" id="phishing_stage5_complete" value="0">
                                <input type="hidden" name="phishing_test_score" id="phishing_test_score" value="0">
                                <input type="hidden" name="total_phishing_score" id="total_phishing_score" value="0">
                                <input type="hidden" name="clues" id="clues_hidden" value="">
                                <input type="hidden" name="action" id="action_hidden" value="">
                                
                                <div class="mt-6 text-center">
                                    <button type="submit" id="submit-phishing-mission" class="btn-primary px-8 py-3 hidden" disabled>
                                        Complete Mission
                                    </button>
                                </div>
                            </form>
                            @break
                            
                        @case(2)
                            <h2 class="text-xl font-game mb-4 text-center">Password Strength Challenge</h2>
                            
                            <div class="bg-white/5 backdrop-blur-xl border border-blue-500/30 p-6 rounded-xl shadow-2xl text-white mb-6 relative overflow-hidden">
                                <!-- Futuristic background elements -->
                                <div class="absolute inset-0 bg-gradient-to-br from-blue-900/30 to-purple-900/30"></div>
                                <div class="absolute inset-0">
                                    <div class="grid grid-cols-12 grid-rows-12 gap-2 opacity-10">
                                        @for ($i = 0; $i < 144; $i++)
                                            <div class="h-6 w-full bg-cyan-500/30 rounded"></div>
                                        @endfor
                                    </div>
                                </div>
                                
                                <!-- Animated cybersecurity elements -->
                                <div class="absolute top-0 right-0 h-32 w-32 opacity-20">
                                    <svg viewBox="0 0 100 100" class="animate-spin-slow">
                                        <circle cx="50" cy="50" r="40" stroke="rgba(59, 130, 246, 0.5)" stroke-width="2" fill="none" />
                                        <circle cx="50" cy="50" r="30" stroke="rgba(139, 92, 246, 0.5)" stroke-width="2" fill="none" />
                                        <path d="M50 10 L50 90 M10 50 L90 50" stroke="rgba(236, 72, 153, 0.5)" stroke-width="2" />
                                    </svg>
                                </div>
                                
                                <div class="relative z-10">
                                    <p class="text-center text-xl font-bold mb-4 text-cyan-300">The Key Thief is trying to crack these passwords!</p>
                                    
                                    <!-- Stage navigation -->
                                    <div class="flex justify-center mb-8">
                                        <div class="flex items-center space-x-3 bg-gray-900/50 p-1 rounded-full">
                                            <button id="stage1-btn" class="px-5 py-2 bg-gradient-to-r from-blue-600 to-cyan-600 text-white rounded-full font-bold stage-btn active transition-all duration-300">Stage 1</button>
                                            <button id="stage2-btn" class="px-5 py-2 bg-gray-800/70 text-gray-400 rounded-full font-bold stage-btn transition-all duration-300">Stage 2</button>
                                            <button id="stage3-btn" class="px-5 py-2 bg-gray-800/70 text-gray-400 rounded-full font-bold stage-btn transition-all duration-300">Stage 3</button>
                                            <button id="stage4-btn" class="px-5 py-2 bg-gray-800/70 text-gray-400 rounded-full font-bold stage-btn transition-all duration-300">Stage 4</button>
                                        </div>
                                    </div>
                                    
                                    <!-- Stage 1: Password Categories -->
                                    <div id="stage1" class="stage active">
                                        <p class="text-center mb-6 text-cyan-100">Drag each password to its correct strength category:</p>
                                        
                                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                                            <div class="border-2 border-red-500/50 rounded-lg p-4 bg-gradient-to-b from-red-900/30 to-red-800/10 backdrop-blur-sm">
                                                <h3 class="text-center font-bold mb-3 text-red-400">Weak Passwords</h3>
                                                <div class="min-h-[120px] rounded p-2 password-drop-zone flex flex-col gap-2" data-category="weak">
                                                    <div class="password-item bg-black/40 border border-red-500/30 p-3 mb-2 rounded-lg shadow-lg cursor-grab text-red-300 font-mono transition-transform hover:scale-105 hover:shadow-red-500/20" draggable="true" data-strength="weak">password123</div>
                                                    <div class="password-item bg-black/40 border border-red-500/30 p-3 mb-2 rounded-lg shadow-lg cursor-grab text-red-300 font-mono transition-transform hover:scale-105 hover:shadow-red-500/20" draggable="true" data-strength="weak">qwerty</div>
                                                    <div class="password-item bg-black/40 border border-red-500/30 p-3 rounded-lg shadow-lg cursor-grab text-red-300 font-mono transition-transform hover:scale-105 hover:shadow-red-500/20" draggable="true" data-strength="weak">birthday1990</div>
                                                </div>
                                            </div>
                                            
                                            <div class="border-2 border-yellow-500/50 rounded-lg p-4 bg-gradient-to-b from-yellow-900/30 to-yellow-800/10 backdrop-blur-sm">
                                                <h3 class="text-center font-bold mb-3 text-yellow-400">Medium Passwords</h3>
                                                <div class="min-h-[120px] rounded p-2 password-drop-zone flex flex-col gap-2" data-category="medium">
                                                    <div class="password-item bg-black/40 border border-yellow-500/30 p-3 mb-2 rounded-lg shadow-lg cursor-grab text-yellow-300 font-mono transition-transform hover:scale-105 hover:shadow-yellow-500/20" draggable="true" data-strength="medium">Football2023!</div>
                                                    <div class="password-item bg-black/40 border border-yellow-500/30 p-3 rounded-lg shadow-lg cursor-grab text-yellow-300 font-mono transition-transform hover:scale-105 hover:shadow-yellow-500/20" draggable="true" data-strength="medium">Summer#time</div>
                                                </div>
                                            </div>
                                            
                                            <div class="border-2 border-green-500/50 rounded-lg p-4 bg-gradient-to-b from-green-900/30 to-green-800/10 backdrop-blur-sm">
                                                <h3 class="text-center font-bold mb-3 text-green-400">Strong Passwords</h3>
                                                <div class="min-h-[120px] rounded p-2 password-drop-zone flex flex-col gap-2" data-category="strong">
                                                    <div class="password-item bg-black/40 border border-green-500/30 p-3 mb-2 rounded-lg shadow-lg cursor-grab text-green-300 font-mono transition-transform hover:scale-105 hover:shadow-green-500/20" draggable="true" data-strength="strong">k9$B7vP!zY@2xQ</div>
                                                    <div class="password-item bg-black/40 border border-green-500/30 p-3 rounded-lg shadow-lg cursor-grab text-green-300 font-mono transition-transform hover:scale-105 hover:shadow-green-500/20" draggable="true" data-strength="strong">Elephant-Battery-99!</div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="text-center">
                                            <button id="check-categories" class="btn-cyber px-8 py-3 bg-gradient-to-r from-blue-600 to-cyan-600 hover:from-blue-700 hover:to-cyan-700 text-white font-bold rounded-full transition-all duration-300 shadow-lg shadow-cyan-500/20 hover:shadow-cyan-500/40">
                                                <span class="relative z-10">Check My Answers</span>
                                            </button>
                                            <p id="category-feedback" class="mt-4 py-2 px-4 rounded-lg hidden"></p>
                                        </div>
                                    </div>
                                    
                                    <!-- Stage 2: Password Strength Tester -->
                                    <div id="stage2" class="stage hidden">
                                        <h3 class="font-bold text-xl text-center mb-6 text-cyan-300">Build Your Password Strength</h3>
                                        
                                        <div class="bg-gradient-to-br from-blue-900/30 to-cyan-900/10 border border-blue-500/30 rounded-xl p-6 mb-8 backdrop-blur-md">
                                            <!-- Cartoon Character Assistant -->
                                            <div class="flex items-start space-x-4 mb-6 bg-blue-900/30 p-4 rounded-lg border border-blue-400/20 animate__animated animate__fadeIn">
                                                <div class="flex-shrink-0">
                                                    <div class="w-16 h-16 rounded-full bg-gradient-to-br from-purple-500 to-blue-600 flex items-center justify-center overflow-hidden border-2 border-blue-300/50 shadow-lg">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-10 h-10 text-white">
                                                            <path fill="currentColor" d="M12,2C6.477,2,2,6.477,2,12c0,5.523,4.477,10,10,10s10-4.477,10-10C22,6.477,17.523,2,12,2z M8.5,8C9.328,8,10,8.672,10,9.5 S9.328,11,8.5,11S7,10.328,7,9.5S7.672,8,8.5,8z M17,14.5c0,0.276-0.224,0.5-0.5,0.5h-9C7.224,15,7,14.776,7,14.5v-0.025 c0-2.74,2.238-4.975,4.975-4.975h0.05C14.762,9.5,17,11.735,17,14.475V14.5z M15.5,11c-0.828,0-1.5-0.672-1.5-1.5S14.672,8,15.5,8 S17,8.672,17,9.5S16.328,11,15.5,11z"/>
                                                        </svg>
                                                    </div>
                                                </div>
                                                <div class="flex-1">
                                                    <div class="bg-blue-800/40 p-3 rounded-lg rounded-tl-none relative">
                                                        <div class="absolute -left-2 top-0 w-0 h-0 border-t-8 border-r-8 border-blue-800/40 border-l-transparent"></div>
                                                        <p class="text-cyan-100 text-sm font-medium" id="password-assistant-text">Hi there! I'm KeyGuard! I'll help you create a super strong password. Start typing, and I'll give you tips to make it stronger!</p>
                                                    </div>
                                                    <div class="mt-2 text-xs text-blue-300 font-medium">KeyGuard - Cyber Security Expert</div>
                                                </div>
                                            </div>
                                            
                                            <div class="mb-5">
                                                <label for="password-input" class="block font-bold text-cyan-300 mb-2">Create a password:</label>
                                                <div class="relative">
                                                    <input type="text" id="password-input" class="w-full bg-black/40 border border-blue-500/30 text-white rounded-lg px-4 py-3 font-mono focus:ring-2 focus:ring-cyan-500 focus:border-transparent focus:outline-none transition-all duration-300" placeholder="Type a password">
                                                    <div class="absolute right-3 top-3 text-blue-400">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                                        </svg>
                                                    </div>
                                                </div>
                                                <small class="text-blue-300 italic">We're showing the password for this learning exercise only</small>
                                            </div>
                                            
                                            <div class="mb-6">
                                                <div class="flex justify-between mb-1">
                                                    <span class="text-cyan-100">Password strength:</span>
                                                    <span id="strength-text" class="font-bold text-gray-400">None</span>
                                                </div>
                                                <div class="h-3 bg-gray-800 rounded-full overflow-hidden shadow-inner">
                                                    <div id="strength-meter" class="h-full rounded-full transition-all duration-500 ease-out" style="width: 0%; background-color: #ccc;"></div>
                                                </div>
                                            </div>
                                            
                                            <div class="space-y-4 bg-black/20 rounded-lg p-4 border border-blue-500/20">
                                                <div class="flex items-center">
                                                    <div id="length-check" class="w-6 h-6 mr-3 rounded-full bg-gray-700 flex items-center justify-center text-white transition-colors duration-300">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor" style="display:none">
                                                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                                        </svg>
                                                    </div>
                                                    <span class="text-cyan-100">At least 12 characters long</span>
                                                </div>
                                                <div class="flex items-center">
                                                    <div id="uppercase-check" class="w-6 h-6 mr-3 rounded-full bg-gray-700 flex items-center justify-center text-white transition-colors duration-300">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor" style="display:none">
                                                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                                        </svg>
                                                    </div>
                                                    <span class="text-cyan-100">Contains uppercase letters (A-Z)</span>
                                                </div>
                                                <div class="flex items-center">
                                                    <div id="lowercase-check" class="w-6 h-6 mr-3 rounded-full bg-gray-700 flex items-center justify-center text-white transition-colors duration-300">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor" style="display:none">
                                                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                                        </svg>
                                                    </div>
                                                    <span class="text-cyan-100">Contains lowercase letters (a-z)</span>
                                                </div>
                                                <div class="flex items-center">
                                                    <div id="number-check" class="w-6 h-6 mr-3 rounded-full bg-gray-700 flex items-center justify-center text-white transition-colors duration-300">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor" style="display:none">
                                                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                                        </svg>
                                                    </div>
                                                    <span class="text-cyan-100">Contains numbers (0-9)</span>
                                                </div>
                                                <div class="flex items-center">
                                                    <div id="special-check" class="w-6 h-6 mr-3 rounded-full bg-gray-700 flex items-center justify-center text-white transition-colors duration-300">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor" style="display:none">
                                                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                                        </svg>
                                                    </div>
                                                    <span class="text-cyan-100">Contains special characters (!@#$%^&*)</span>
                                                </div>
                                            </div>
                                            
                                            <div class="mt-6 text-center">
                                                <button id="next-stage-2" class="btn-cyber px-8 py-3 bg-gradient-to-r from-blue-600 to-cyan-600 hover:from-blue-700 hover:to-cyan-700 text-white font-bold rounded-full transition-all duration-300 shadow-lg shadow-cyan-500/20 hover:shadow-cyan-500/40 hidden">
                                                    <span class="relative z-10">Continue to Stage 3</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- Stage 3: Create Memorable Strong Password -->
                                    <div id="stage3" class="stage hidden">
                                        <h3 class="font-bold text-xl text-center mb-6 text-cyan-300">Create a Memorable Strong Password</h3>
                                        
                                        <div class="bg-gradient-to-br from-green-900/30 to-cyan-900/10 border border-green-500/30 rounded-xl p-6 mb-8 backdrop-blur-md">
                                            <!-- Cartoon Character Assistant -->
                                            <div class="flex items-start space-x-4 mb-6 bg-green-900/30 p-4 rounded-lg border border-green-400/20 animate__animated animate__fadeIn">
                                                <div class="flex-shrink-0">
                                                    <div class="w-16 h-16 rounded-full bg-gradient-to-br from-green-500 to-blue-600 flex items-center justify-center overflow-hidden border-2 border-green-300/50 shadow-lg">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-10 h-10 text-white">
                                                            <path fill="currentColor" d="M12,2C6.477,2,2,6.477,2,12c0,5.523,4.477,10,10,10s10-4.477,10-10C22,6.477,17.523,2,12,2z M8.5,8C9.328,8,10,8.672,10,9.5 S9.328,11,8.5,11S7,10.328,7,9.5S7.672,8,8.5,8z M17,14.5c0,0.276-0.224,0.5-0.5,0.5h-9C7.224,15,7,14.776,7,14.5v-0.025 c0-2.74,2.238-4.975,4.975-4.975h0.05C14.762,9.5,17,11.735,17,14.475V14.5z M15.5,11c-0.828,0-1.5-0.672-1.5-1.5S14.672,8,15.5,8 S17,8.672,17,9.5S16.328,11,15.5,11z"/>
                                                        </svg>
                                                    </div>
                                                </div>
                                                <div class="flex-1">
                                                    <div class="bg-green-800/40 p-3 rounded-lg rounded-tl-none relative">
                                                        <div class="absolute -left-2 top-0 w-0 h-0 border-t-8 border-r-8 border-green-800/40 border-l-transparent"></div>
                                                        <p class="text-green-100 text-sm font-medium" id="memorable-assistant-text">Great job getting to this stage! Now let's create a password that's both strong AND easy to remember. Try using the passphrase method below!</p>
                                                    </div>
                                                    <div class="mt-2 text-xs text-green-300 font-medium">KeyGuard - Cyber Security Expert</div>
                                                </div>
                                            </div>
                                        
                                            <p class="mb-5 text-cyan-100">Now that you know what makes a strong password, let's create one that's both strong AND easy to remember!</p>
                                            
                                            <div class="mb-6 bg-black/30 border border-green-500/20 rounded-lg p-5">
                                                <h4 class="font-bold mb-3 text-green-400">Try the passphrase method:</h4>
                                                <ol class="list-decimal pl-5 space-y-3 text-cyan-100">
                                                    <li>Think of 3-4 random words <span class="text-green-400 font-mono">(like "elephant banana rocket")</span></li>
                                                    <li>Add numbers <span class="text-green-400 font-mono">(like "elephant7banana2rocket")</span></li>
                                                    <li>Add special characters <span class="text-green-400 font-mono">(like "elephant7!banana2#rocket")</span></li>
                                                    <li>Add some capital letters <span class="text-green-400 font-mono">(like "Elephant7!Banana2#Rocket")</span></li>
                                                </ol>
                                            </div>
                                            
                                            <div class="mb-5">
                                                <label for="final-password" class="block font-bold text-green-400 mb-2">Your memorable strong password:</label>
                                                <div class="relative">
                                                    <input type="text" id="final-password" class="w-full bg-black/40 border border-green-500/30 text-white rounded-lg px-4 py-3 font-mono focus:ring-2 focus:ring-green-500 focus:border-transparent focus:outline-none transition-all duration-300" placeholder="Create your memorable password">
                                                    <div class="absolute right-3 top-3 text-green-400">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                                        </svg>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="mb-5">
                                                <div class="flex justify-between mb-1">
                                                    <span class="text-cyan-100">Final password strength:</span>
                                                    <span id="final-strength-text" class="font-bold text-gray-400">None</span>
                                                </div>
                                                <div class="h-3 bg-gray-800 rounded-full overflow-hidden shadow-inner">
                                                    <div id="final-strength-meter" class="h-full rounded-full transition-all duration-500 ease-out" style="width: 0%; background-color: #ccc;"></div>
                                                </div>
                                            </div>
                                            
                                            <div id="final-feedback" class="mt-5 p-4 rounded-lg border hidden"></div>
                                            
                                            <div class="mt-6 text-center">
                                                <button id="next-stage-3" class="btn-cyber px-8 py-3 bg-gradient-to-r from-green-600 to-cyan-600 hover:from-green-700 hover:to-cyan-700 text-white font-bold rounded-full transition-all duration-300 shadow-lg shadow-green-500/20 hover:shadow-green-500/40 hidden">
                                                    <span class="relative z-10">Continue to Final Stage</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- Stage 4: Google-style Login Screen -->
                                    <div id="stage4" class="stage hidden">
                                        <h3 class="font-bold text-xl text-center mb-6 text-cyan-300">Test Your Password</h3>
                                        
                                        <div class="max-w-md mx-auto">
                                            <!-- Cartoon Character Assistant -->
                                            <div class="flex items-start space-x-4 mb-6 bg-purple-900/30 p-4 rounded-lg border border-purple-400/20 animate__animated animate__fadeIn">
                                                <div class="flex-shrink-0">
                                                    <div class="w-16 h-16 rounded-full bg-gradient-to-br from-purple-500 to-blue-600 flex items-center justify-center overflow-hidden border-2 border-purple-300/50 shadow-lg animate-pulse-slow">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-10 h-10 text-white">
                                                            <path fill="currentColor" d="M12,2C6.477,2,2,6.477,2,12c0,5.523,4.477,10,10,10s10-4.477,10-10C22,6.477,17.523,2,12,2z M8.5,8C9.328,8,10,8.672,10,9.5 S9.328,11,8.5,11S7,10.328,7,9.5S7.672,8,8.5,8z M17,14.5c0,0.276-0.224,0.5-0.5,0.5h-9C7.224,15,7,14.776,7,14.5v-0.025 c0-2.74,2.238-4.975,4.975-4.975h0.05C14.762,9.5,17,11.735,17,14.475V14.5z M15.5,11c-0.828,0-1.5-0.672-1.5-1.5S14.672,8,15.5,8 S17,8.672,17,9.5S16.328,11,15.5,11z"/>
                                                        </svg>
                                                    </div>
                                                </div>
                                                <div class="flex-1">
                                                    <div class="bg-purple-800/40 p-3 rounded-lg rounded-tl-none relative">
                                                        <div class="absolute -left-2 top-0 w-0 h-0 border-t-8 border-r-8 border-purple-800/40 border-l-transparent"></div>
                                                        <p class="text-purple-100 text-sm font-medium" id="login-assistant-text">Now the final test! Can you remember the strong password you created? I'll need you to type it in exactly the same way to prove you can recall it!</p>
                                                    </div>
                                                    <div class="mt-2 text-xs text-purple-300 font-medium">KeyGuard - Cyber Security Expert</div>
                                                </div>
                                            </div>
                                        
                                            <div class="bg-white rounded-xl p-8 shadow-2xl" id="google-login">
                                                <!-- Google Logo -->
                                                <div class="flex justify-center mb-6">
                                                    <svg viewBox="0 0 75 24" width="75" height="24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                        <g id="qaEJec">
                                                            <path fill="#ea4335" d="M67.954 16.303c-1.33 0-2.278-.608-2.886-1.804l7.967-3.3-.27-.68c-.495-1.33-2.008-3.79-5.102-3.79-3.068 0-5.622 2.41-5.622 5.96 0 3.34 2.53 5.96 5.92 5.96 2.73 0 4.31-1.67 4.97-2.64l-2.03-1.35c-.673.98-1.6 1.64-2.93 1.64zm-.203-7.27c1.04 0 1.92.52 2.21 1.264l-5.32 2.21c-.06-2.3 1.79-3.474 3.12-3.474z"></path>
                                                        </g>
                                                        <g id="YGlOvc">
                                                            <path fill="#34a853" d="M58.193.67h2.564v17.44h-2.564z"></path>
                                                        </g>
                                                        <g id="BWfIk">
                                                            <path fill="#4285f4" d="M54.152 8.066h-.088c-.588-.697-1.716-1.33-3.136-1.33-2.98 0-5.71 2.614-5.71 5.98 0 3.338 2.73 5.933 5.71 5.933 1.42 0 2.548-.64 3.136-1.36h.088v.86c0 2.28-1.217 3.5-3.183 3.5-1.61 0-2.6-1.15-3-2.12l-2.28.94c.65 1.58 2.39 3.52 5.28 3.52 3.06 0 5.66-1.807 5.66-6.206V7.21h-2.48v.858zm-3.006 8.237c-1.804 0-3.318-1.513-3.318-3.588 0-2.1 1.514-3.635 3.318-3.635 1.784 0 3.183 1.534 3.183 3.635 0 2.075-1.4 3.588-3.19 3.588z"></path>
                                                        </g>
                                                        <g id="e6m3fd">
                                                            <path fill="#fbbc05" d="M38.17 6.735c-3.28 0-5.953 2.506-5.953 5.96 0 3.432 2.673 5.96 5.954 5.96 3.29 0 5.96-2.528 5.96-5.96 0-3.46-2.67-5.96-5.95-5.96zm0 9.568c-1.798 0-3.348-1.487-3.348-3.61 0-2.14 1.55-3.608 3.35-3.608s3.348 1.467 3.348 3.61c0 2.116-1.55 3.608-3.35 3.608z"></path>
                                                        </g>
                                                        <g id="vbkDmc">
                                                            <path fill="#ea4335" d="M25.17 6.71c-3.28 0-5.954 2.505-5.954 5.958 0 3.433 2.673 5.96 5.954 5.96 3.282 0 5.955-2.527 5.955-5.96 0-3.453-2.673-5.96-5.955-5.96zm0 9.567c-1.8 0-3.35-1.487-3.35-3.61 0-2.14 1.55-3.608 3.35-3.608s3.35 1.46 3.35 3.6c0 2.12-1.55 3.61-3.35 3.61z"></path>
                                                        </g>
                                                        <g id="idEJde">
                                                            <path fill="#4285f4" d="M14.11 14.182c.722-.723 1.205-1.78 1.387-3.334H9.423V8.373h8.518c.09.452.16 1.07.16 1.664 0 1.903-.52 4.26-2.19 5.934-1.63 1.7-3.71 2.61-6.48 2.61-5.12 0-9.42-4.17-9.42-9.29C0 4.17 4.31 0 9.43 0c2.83 0 4.843 1.108 6.362 2.56L14 4.347c-1.087-1.02-2.56-1.81-4.577-1.81-3.74 0-6.662 3.01-6.662 6.75s2.93 6.75 6.67 6.75c2.43 0 3.81-.972 4.69-1.856z"></path>
                                                        </g>
                                                    </svg>
                                                </div>
                                                
                                                <h2 class="text-2xl font-normal text-center mb-2 text-gray-800">Sign in</h2>
                                                <p class="text-center mb-6 text-gray-600">to continue to Gmail</p>
                                                
                                                <div class="mb-4" id="login-stage-1">
                                                    <div class="mb-5">
                                                        <label for="google-email" class="block text-xs font-medium text-gray-600 mb-1">Email or phone</label>
                                                        <input type="email" id="google-email" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500" value="cyber.explorer@gmail.com" readonly>
                                                    </div>
                                                    
                                                    <div class="text-sm mb-6">
                                                        <span class="text-gray-600">Not your computer? Use Guest mode to sign in privately.</span>
                                                        <a href="#" class="text-blue-600 font-medium ml-1">Learn more</a>
                                                    </div>
                                                    
                                                    <div class="flex justify-between items-center">
                                                        <a href="#" class="text-blue-600 font-medium text-sm">Create account</a>
                                                        <button id="next-login" class="px-6 py-2 bg-blue-500 text-white font-medium rounded hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">Next</button>
                                                    </div>
                                                </div>
                                                
                                                <div class="mb-4 hidden" id="login-stage-2">
                                                    <div class="flex items-center mb-6">
                                                        <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center text-blue-600 mr-3">C</div>
                                                        <div>
                                                            <div class="text-gray-800">cyber.explorer@gmail.com</div>
                                                            <button id="back-to-email" class="text-sm text-gray-600 hover:text-gray-800">
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 inline" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                                                                </svg>
                                                                Change account
                                                            </button>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="mb-5">
                                                        <label for="password-confirm" class="block text-xs font-medium text-gray-600 mb-1">Enter your password</label>
                                                        <input type="password" id="password-confirm" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500">
                                                        <div id="password-error" class="text-red-500 text-sm mt-1 hidden">Wrong password. Try again.</div>
                                                    </div>
                                                    
                                                    <div class="flex items-center mb-5">
                                                        <input type="checkbox" id="show-password" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                                                        <label for="show-password" class="ml-2 block text-sm text-gray-600">Show password</label>
                                                    </div>
                                                    
                                                    <div class="flex justify-between items-center">
                                                        <a href="#" class="text-blue-600 font-medium text-sm">Forgot password?</a>
                                                        <button id="login-submit" class="px-6 py-2 bg-blue-500 text-white font-medium rounded hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">Next</button>
                                                    </div>
                                                </div>
                                                
                                                <div class="hidden text-center py-6" id="login-success">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto text-green-500 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                    </svg>
                                                    <h3 class="text-xl font-medium text-gray-800 mb-2">Login Successful!</h3>
                                                    <p class="text-gray-600 mb-4">You've created and remembered a strong password.</p>
                                                    <button id="complete-mission" class="px-8 py-3 bg-green-500 text-white font-medium rounded-lg hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
                                                        Complete Mission
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <form id="mission-form" action="{{ route('game.submit-mission', ['id' => $mission['id']]) }}" method="POST">
                        @csrf
                        <input type="hidden" name="stage1_complete" id="stage1_complete" value="0">
                        <input type="hidden" name="stage2_complete" id="stage2_complete" value="0">
                        <input type="hidden" name="stage3_complete" id="stage3_complete" value="0">
                        <input type="hidden" name="stage4_complete" id="stage4_complete" value="0">
                        <input type="hidden" name="password_score" id="password_score" value="0">
                        <input type="hidden" name="final_password" id="final_password_hidden" value="">
                        
                        <div class="mt-6 text-center hidden">
                            <button type="submit" id="submit-mission" class="btn-primary px-8 py-3" disabled>
                                Complete Mission
                            </button>
                        </div>
                    </form>
                    @break
                    
                @case(3)
                    <h2 class="text-xl font-game mb-4 text-center">Social Media Mayhem Challenge</h2>
                    
                    @php
                        $completedMissions = session('completed_missions', []);
                        $isMission1Completed = in_array(1, $completedMissions);
                        $isMission2Completed = in_array(2, $completedMissions);
                        $canAccessMission = $isMission1Completed && $isMission2Completed;
                    @endphp
                    
                    @if(!$canAccessMission)
                        <div class="bg-white/5 backdrop-blur-xl border border-red-500/30 p-6 rounded-xl shadow-2xl text-white mb-6 relative overflow-hidden">
                            <div class="flex flex-col items-center justify-center py-12">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-20 w-20 text-red-500 mb-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                                <h3 class="text-xl font-bold mb-4 text-center">Mission Locked!</h3>
                                <p class="text-white/90 text-center mb-6 max-w-xl">
                                    You need to complete both "The Mysterious Email" and "Password Peril" missions before you can access Social Media Mayhem.
                                </p>
                                <div class="grid grid-cols-2 gap-4 w-full max-w-md">
                                    <div class="bg-white/10 p-4 rounded-lg text-center {{ $isMission1Completed ? 'border-green-500' : 'border-red-500' }} border">
                                        <p class="font-bold">The Mysterious Email</p>
                                        @if($isMission1Completed)
                                            <span class="text-green-400">Completed ✓</span>
                                        @else
                                            <span class="text-red-400">Not Completed ✗</span>
                                        @endif
                                    </div>
                                    <div class="bg-white/10 p-4 rounded-lg text-center {{ $isMission2Completed ? 'border-green-500' : 'border-red-500' }} border">
                                        <p class="font-bold">Password Peril</p>
                                        @if($isMission2Completed)
                                            <span class="text-green-400">Completed ✓</span>
                                        @else
                                            <span class="text-red-400">Not Completed ✗</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="mt-8">
                                    <a href="{{ route('game.story') }}" class="px-6 py-3 bg-blue-600 text-white rounded-full font-bold hover:bg-blue-700 transition-all">Return to Story Mode</a>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="bg-white/5 backdrop-blur-xl border border-blue-500/30 p-6 rounded-xl shadow-2xl text-white mb-6 relative overflow-hidden">
                            <!-- Existing mission content here -->
                            <!-- Futuristic background elements -->
                            <div class="absolute inset-0 bg-gradient-to-br from-blue-900/30 to-purple-900/30"></div>
                            <div class="absolute inset-0">
                                <div class="grid grid-cols-12 grid-rows-12 gap-2 opacity-10">
                                    @for ($i = 0; $i < 144; $i++)
                                        <div class="h-6 w-full bg-blue-500/30 rounded"></div>
                                    @endfor
                                </div>
                            </div>
                            
                            <!-- Animated cybersecurity elements -->
                            <div class="absolute top-0 right-0 h-32 w-32 opacity-20">
                                <svg viewBox="0 0 100 100" class="animate-spin-slow">
                                    <circle cx="50" cy="50" r="40" stroke="rgba(59, 130, 246, 0.5)" stroke-width="2" fill="none" />
                                    <circle cx="50" cy="50" r="30" stroke="rgba(139, 92, 246, 0.5)" stroke-width="2" fill="none" />
                                    <path d="M50 10 L50 90 M10 50 L90 50" stroke="rgba(236, 72, 153, 0.5)" stroke-width="2" />
                                </svg>
                            </div>
                            
                            <div class="relative z-10">
                                <!-- Stage navigation -->
                                <div class="flex justify-center mb-8">
                                    <div class="flex items-center space-x-3 bg-gray-900/50 p-1 rounded-full">
                                        <button id="social-stage1-btn" class="px-5 py-2 bg-gradient-to-r from-blue-600 to-purple-600 text-white rounded-full font-bold social-stage-btn active transition-all duration-300">Fake Groups</button>
                                        <button id="social-stage2-btn" class="px-5 py-2 bg-gray-800/70 text-gray-400 rounded-full font-bold social-stage-btn transition-all duration-300">Suspicious Messages</button>
                                        <button id="social-stage3-btn" class="px-5 py-2 bg-gray-800/70 text-gray-400 rounded-full font-bold social-stage-btn transition-all duration-300">Chat Simulation</button>
                                    </div>
                                </div>
                                
                                <!-- Progress indicator -->
                                <div class="w-full max-w-xl mx-auto mb-6">
                                    <div class="bg-gray-700/50 h-2.5 rounded-full">
                                        <div id="progress-bar" class="bg-gradient-to-r from-blue-500 to-purple-600 h-2.5 rounded-full transition-all duration-700" style="width: 33%"></div>
                                    </div>
                                    <div class="flex justify-between text-xs text-gray-300 mt-1">
                                        <span>Start</span>
                                        <span>Progress</span>
                                        <span>Complete</span>
                                    </div>
                                </div>
                                
                                <!-- Cartoon Character Assistant -->
                                <div class="flex items-start mb-6">
                                    <div class="w-3/4 pr-4">
                                        <div class="flex items-start space-x-4 bg-blue-900/30 p-4 rounded-lg border border-blue-400/20">
                                            <div class="flex-shrink-0">
                                                <div class="w-16 h-16 rounded-full bg-gradient-to-br from-blue-500 to-purple-600 flex items-center justify-center overflow-hidden border-2 border-blue-300/50 shadow-lg">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-10 h-10 text-white">
                                                        <path fill="currentColor" d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm4.59-12.42L10 14.17l-2.59-2.58L6 13l4 4 8-8z"/>
                                                    </svg>
                                                </div>
                                            </div>
                                            <div class="flex-1">
                                                <div class="bg-blue-800/40 p-3 rounded-lg rounded-tl-none relative">
                                                    <div class="absolute -left-2 top-0 w-0 h-0 border-t-8 border-r-8 border-blue-800/40 border-l-transparent"></div>
                                                    <p class="text-blue-100 text-sm font-medium" id="social-assistant-text">Hi {{ $player_name }}! I'm SocialShield! I'll help you learn how to spot fake groups and suspicious messages on social media. Let's keep your online social life safe and fun!</p>
                                                </div>
                                                <div class="mt-2 text-xs text-blue-300 font-medium">SocialShield - Social Media Safety Expert</div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="w-1/4 flex justify-center items-start">
                                        <div class="animate-pulse-slow">
                                            <img src="https://cdn-icons-png.flaticon.com/512/2371/2371580.png" alt="SocialShield Character" class="h-32 filter drop-shadow-lg">
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Stage 1: Fake Groups -->
                                <div id="social-stage1" class="social-stage active">
                                    <div class="mb-6">
                                        <h3 class="font-game text-lg mb-4 text-center text-blue-100">Spot the Fake Groups!</h3>
                                        <p class="text-white/90 mb-4">Profile Phantom creates fake groups to trick kids into joining. These groups might ask for personal information or try to download harmful programs to your device. Learn how to spot these fakes!</p>
                                        
                                        <div class="grid grid-cols-2 gap-6 mt-6">
                                            <!-- Real Group Example -->
                                            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                                                <div class="bg-blue-600 p-3 flex items-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                                    </svg>
                                                    <span class="text-white font-bold">Cyber Science Club</span>
                                                    <span class="ml-auto text-white text-xs bg-blue-700 px-2 py-1 rounded">Public Group</span>
                                                </div>
                                                <div class="p-4">
                                                    <p class="text-gray-700 mb-2"><span class="font-bold">Description:</span> A community for students interested in science and technology. We share educational resources, discuss science projects, and organize online meetups.</p>
                                                    <p class="text-gray-700 mb-2"><span class="font-bold">Members:</span> 1,245</p>
                                                    <p class="text-gray-700 mb-2"><span class="font-bold">Created:</span> March 12, 2022</p>
                                                    <p class="text-gray-700"><span class="font-bold">Admins:</span> CyberTeacher, ScienceClub, TechLearning</p>
                                                    <div class="mt-3 pt-3 border-t">
                                                        <p class="text-green-600 font-bold flex items-center">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                                            </svg>
                                                            REAL - This is a legitimate group
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <!-- Fake Group Example -->
                                            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                                                <div class="bg-blue-600 p-3 flex items-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                                    </svg>
                                                    <span class="text-white font-bold">Free Robux Giveaway!!</span>
                                                    <span class="ml-auto text-white text-xs bg-blue-700 px-2 py-1 rounded">Private Group</span>
                                                </div>
                                                <div class="p-4">
                                                    <p class="text-gray-700 mb-2"><span class="font-bold">Description:</span> JOIN NOW!!! Get 10,000 FREE Robux! Limited time offer! Just download our special app and enter your Roblox password to claim your prize!</p>
                                                    <p class="text-gray-700 mb-2"><span class="font-bold">Members:</span> 67,982</p>
                                                    <p class="text-gray-700 mb-2"><span class="font-bold">Created:</span> Yesterday</p>
                                                    <p class="text-gray-700"><span class="font-bold">Admins:</span> FreeRbx_Admin, Robux_Master546</p>
                                                    <div class="mt-3 pt-3 border-t">
                                                        <p class="text-red-600 font-bold flex items-center">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                                                            </svg>
                                                            FAKE - This is a scam group!
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <!-- Additional Image Examples -->
                                        <div class="mt-8">
                                            <h4 class="font-bold text-blue-200 text-lg mb-3">More Examples to Watch Out For:</h4>
                                            <div class="grid grid-cols-2 gap-4">
                                                <div class="bg-white/10 backdrop-blur p-4 rounded-lg">
                                                    <div class="bg-red-500/20 border border-red-500/30 rounded-lg p-3 mb-3">
                                                        <h5 class="text-red-300 font-bold mb-2">⚠️ FAKE GROUP</h5>
                                                        <p class="text-white/90">"FREE V-Bucks Generator - Join Now! 🎮"</p>
                                                    </div>
                                                    <p class="text-white/80 text-sm">These groups claim to have ways to generate free game currency but actually try to steal your login info or download malware.</p>
                                                </div>
                                                
                                                <div class="bg-white/10 backdrop-blur p-4 rounded-lg">
                                                    <div class="bg-red-500/20 border border-red-500/30 rounded-lg p-3 mb-3">
                                                        <h5 class="text-red-300 font-bold mb-2">⚠️ FAKE GROUP</h5>
                                                        <p class="text-white/90">"Secret Minecraft Hack - Unlimited Items! 💎"</p>
                                                    </div>
                                                    <p class="text-white/80 text-sm">Groups offering "hacks" or "cheats" for games often contain malware that can damage your device or steal information.</p>
                                                </div>
                                                
                                                <div class="bg-white/10 backdrop-blur p-4 rounded-lg">
                                                    <div class="bg-red-500/20 border border-red-500/30 rounded-lg p-3 mb-3">
                                                        <h5 class="text-red-300 font-bold mb-2">⚠️ FAKE GROUP</h5>
                                                        <p class="text-white/90">"Kid Models Wanted - Win $5000! 📷"</p>
                                                    </div>
                                                    <p class="text-white/80 text-sm">Groups asking for photos or videos of kids are extremely dangerous. They may be run by people trying to collect inappropriate content.</p>
                                                </div>
                                                
                                                <div class="bg-white/10 backdrop-blur p-4 rounded-lg">
                                                    <div class="bg-red-500/20 border border-red-500/30 rounded-lg p-3 mb-3">
                                                        <h5 class="text-red-300 font-bold mb-2">⚠️ FAKE GROUP</h5>
                                                        <p class="text-white/90">"Friend Finder App - Meet Kids Nearby! 👋"</p>
                                                    </div>
                                                    <p class="text-white/80 text-sm">Groups promoting apps to meet strangers nearby are dangerous. These can be used by adults pretending to be kids.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="mt-8 bg-blue-900/40 p-4 rounded-lg">
                                        <h3 class="font-game text-lg mb-3">Warning Signs of Fake Groups and Suspicious Messages:</h3>
                                        <div class="grid grid-cols-2 gap-6">
                                            <div>
                                                <h4 class="text-blue-300 font-bold mb-2">Fake Groups:</h4>
                                                <ul class="list-disc pl-6 space-y-1 text-white/90">
                                                    <li>Promises of free items, money, or game currency</li>
                                                    <li>Recently created groups with thousands of members</li>
                                                    <li>Asks you to download suspicious files or apps</li>
                                                    <li>Requests personal information or passwords</li>
                                                    <li>Poor grammar and lots of exclamation marks</li>
                                                    <li>Creates urgency with "limited time" offers</li>
                                                </ul>
                                            </div>
                                            <div>
                                                <h4 class="text-blue-300 font-bold mb-2">Messenger Scams:</h4>
                                                <ul class="list-disc pl-6 space-y-1 text-white/90">
                                                    <li>Asking for your parent's credit card details</li>
                                                    <li>Requesting your parent's phone number</li>
                                                    <li>Offering free game currency or items</li>
                                                    <li>Claiming to be from a game company</li>
                                                    <li>Creating urgency or using exciting offers</li>
                                                    <li>Asking you to keep the conversation secret</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="text-center mt-6">
                                        <form action="{{ route('game.submit-mission', $mission['id']) }}" method="POST" class="inline">
                                            @csrf
                                            <input type="hidden" name="social_media_complete" value="1">
                                            <input type="hidden" name="social_media_score" value="5">
                                            <button type="submit" class="px-6 py-3 bg-green-600 text-white rounded-full font-bold hover:bg-green-700 transition-all">Complete Mission</button>
                                        </form>
                                    </div>
                                </div>
                                
                                <!-- JavaScript to handle stage navigation -->
                                <script>
                                    document.addEventListener('DOMContentLoaded', function() {
                                        // Get stage buttons and content divs
                                        const stage1Btn = document.getElementById('social-stage1-btn');
                                        const stage2Btn = document.getElementById('social-stage2-btn');
                                        const stage3Btn = document.getElementById('social-stage3-btn');
                                        const assistantText = document.getElementById('social-assistant-text');
                                        const progressBar = document.getElementById('progress-bar');
                                        
                                        // Get stages
                                        const stage1 = document.getElementById('social-stage1');
                                        const stage2Content = `
                                            <div class="mb-6">
                                                <h3 class="font-game text-lg mb-4 text-center text-blue-100">Beware of Suspicious Messages!</h3>
                                                <p class="text-white/90 mb-4">Profile Phantom also sends tricky messages through social media apps. These messages might ask for your personal information or your parents' information. Let's see some examples:</p>
                                                
                                                <div class="mt-6 space-y-6 animate__animated animate__fadeIn">
                                                    <!-- Message Example 1 -->
                                                    <div class="bg-white rounded-lg shadow-lg overflow-hidden transform hover:scale-105 transition duration-300">
                                                        <div class="bg-purple-600 p-3 flex items-center">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                                                            </svg>
                                                            <span class="text-white font-bold">Message from: GamerPrizes2023</span>
                                                        </div>
                                                        <div class="p-4">
                                                            <div class="bg-gray-100 p-3 rounded-lg mb-3">
                                                                <p class="text-gray-800">Hi there! Congratulations! 🎉 Your game account has been selected to receive 5000 V-Bucks! I just need your dad's credit card number to verify your identity and send the prize. This is totally safe! We're an official partner with the game company!</p>
                                                            </div>
                                                            
                                                            <div class="bg-red-100 p-3 rounded-lg border border-red-300">
                                                                <p class="text-red-800 font-bold mb-2">WARNING SIGNS:</p>
                                                                <ul class="list-disc pl-5 text-red-700 space-y-1">
                                                                    <li>Offers free game currency (V-Bucks)</li>
                                                                    <li>Asks for your parent's credit card information</li>
                                                                    <li>Claims to be an "official partner" but contacts you through a private message</li>
                                                                    <li>Uses urgency and excitement to trick you</li>
                                                                </ul>
                                                                
                                                                <p class="mt-3 text-red-800 font-bold">CORRECT RESPONSE: Block and report this account. NEVER share credit card information.</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <!-- Message Example 2 -->
                                                    <div class="bg-white rounded-lg shadow-lg overflow-hidden transform hover:scale-105 transition duration-300">
                                                        <div class="bg-purple-600 p-3 flex items-center">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                                                            </svg>
                                                            <span class="text-white font-bold">Message from: SchoolProject392</span>
                                                        </div>
                                                        <div class="p-4">
                                                            <div class="bg-gray-100 p-3 rounded-lg mb-3">
                                                                <p class="text-gray-800">Hey, I'm doing a school project and need to call some people for a quick survey. Can you send me your dad's phone number? I need to talk to a parent for permission. It's urgent - due tomorrow! Thanks!</p>
                                                            </div>
                                                            
                                                            <div class="bg-red-100 p-3 rounded-lg border border-red-300">
                                                                <p class="text-red-800 font-bold mb-2">WARNING SIGNS:</p>
                                                                <ul class="list-disc pl-5 text-red-700 space-y-1">
                                                                    <li>Stranger asking for your parent's contact information</li>
                                                                    <li>Creates a sense of urgency ("due tomorrow")</li>
                                                                    <li>Uses a school project as an excuse</li>
                                                                    <li>The account name has random numbers (SchoolProject392)</li>
                                                                </ul>
                                                                
                                                                <p class="mt-3 text-red-800 font-bold">CORRECT RESPONSE: Don't reply or tell them you need to ask your parents first (then tell your parents).</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="mt-8 bg-purple-900/40 p-4 rounded-lg border border-purple-500/30">
                                                <h3 class="font-game text-lg mb-3 text-purple-200">Rules for Safe Messaging:</h3>
                                                <ul class="list-disc pl-6 space-y-2 text-white/90">
                                                    <li>NEVER share personal information with strangers online</li>
                                                    <li>NEVER give out your parents' contact information or credit card details</li>
                                                    <li>Be suspicious of messages offering free prizes or game currency</li>
                                                    <li>Don't respond to messages that create urgency or try to scare you</li>
                                                    <li>Tell a trusted adult if you receive suspicious messages</li>
                                                    <li>Block and report accounts that send inappropriate messages</li>
                                                </ul>
                                            </div>
                                            
                                            <div class="text-center mt-8 space-x-4">
                                                <button id="to-social-stage1" class="px-6 py-3 bg-gray-600 text-white rounded-full font-bold hover:bg-gray-700 transition-all transform hover:scale-105">← Back</button>
                                                <button id="to-social-stage3" class="px-6 py-3 bg-gradient-to-r from-blue-500 to-purple-600 text-white rounded-full font-bold hover:from-blue-600 hover:to-purple-700 transform hover:scale-105 transition-all">Next: Chat Simulation →</button>
                                            </div>
                                        `;
                                        
                                        const stage3Content = `
                                            <div class="mb-6">
                                                <h3 class="font-game text-lg mb-4 text-center text-blue-100">Chat Simulation Test</h3>
                                                <p class="text-white/90 mb-4">Time to test your knowledge! You'll see a suspicious message and need to choose how to respond. Your answer will be evaluated and scored.</p>
                                                
                                                <div class="mt-6 flex justify-center">
                                                    <button id="open-chat-simulator" class="px-6 py-4 bg-gradient-to-r from-blue-600 to-purple-700 text-white rounded-xl font-bold hover:from-blue-700 hover:to-purple-800 transform hover:scale-105 transition-all flex items-center gap-3 relative">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                                                        </svg>
                                                        Start Chat Simulation
                                                        <div class="alert-badge">1</div>
                                                    </button>
                                                </div>
                                                
                                                <!-- Full-page Chat Simulator Overlay -->
                                                <div id="chat-simulator-overlay" class="chat-simulator-overlay">
                                                    <div class="chat-simulator">
                                                        <div class="chat-header">
                                                            <div class="flex items-center gap-3">
                                                                <div class="w-10 h-10 rounded-full bg-white/20 flex items-center justify-center">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                                    </svg>
                                                                </div>
                                                                <div>
                                                                    <div class="font-bold">GamerBuddy428</div>
                                                                    <div class="text-xs text-white/70">Online now</div>
                                                                </div>
                                                            </div>
                                                            <button id="close-chat-simulator" class="bg-white/10 hover:bg-white/20 p-2 rounded-full transition">
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                                                </svg>
                                                            </button>
                                                        </div>
                                                        
                                                        <div class="chat-messages-container" id="fullpage-chat-messages">
                                                            <!-- Initial message -->
                                                            <div class="flex mb-4">
                                                                <div class="flex-shrink-0 mr-3">
                                                                    <div class="w-8 h-8 rounded-full bg-blue-500 flex items-center justify-center text-sm text-white font-bold">
                                                                        GB
                                                                    </div>
                                                                </div>
                                                                <div class="bg-blue-500 text-white p-3 rounded-lg rounded-tl-none max-w-md">
                                                                    <p>Hey there! I'm looking for new friends who like gaming. What's your favorite game?</p>
                                                                    <div class="text-xs text-white/70 text-right mt-1">3:42 PM</div>
                                                                </div>
                                                            </div>
                                                            
                                                            <!-- Your responses will be added here by JavaScript -->
                                                        </div>
                                                        
                                                        <div class="chat-input" id="fullpage-chat-input">
                                                            <p class="font-bold text-gray-700 mb-3">How would you respond?</p>
                                                            <div class="space-y-2">
                                                                <button class="fullpage-response-option w-full text-left p-3 bg-gray-100 hover:bg-gray-200 rounded-md transition transform hover:scale-102 flex justify-between items-center" data-score="1" data-response="I like Minecraft and Roblox. What games do you play?">
                                                                    <span>I like Minecraft and Roblox. What games do you play?</span>
                                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 9l3 3m0 0l-3 3m3-3H8m13 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                                    </svg>
                                                                </button>
                                                                <button class="fullpage-response-option w-full text-left p-3 bg-gray-100 hover:bg-gray-200 rounded-md transition transform hover:scale-102 flex justify-between items-center" data-score="0" data-response="I'm 10 years old and I live in Chicago. I like playing online games after school.">
                                                                    <span>I'm 10 years old and I live in Chicago. I like playing online games after school.</span>
                                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 9l3 3m0 0l-3 3m3-3H8m13 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                                    </svg>
                                                                </button>
                                                                <button class="fullpage-response-option w-full text-left p-3 bg-gray-100 hover:bg-gray-200 rounded-md transition transform hover:scale-102 flex justify-between items-center" data-score="2" data-response="I enjoy gaming too, but I don't chat with people I don't know. Have a nice day!">
                                                                    <span>I enjoy gaming too, but I don't chat with people I don't know. Have a nice day!</span>
                                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 9l3 3m0 0l-3 3m3-3H8m13 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                                    </svg>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <!-- Results section (initially hidden) -->
                                                <div id="chat-results" class="hidden mt-6">
                                                    <div class="bg-blue-100 border border-blue-300 rounded-lg p-4">
                                                        <h4 class="text-lg font-bold text-blue-800 mb-2">Test Results</h4>
                                                        <p class="mb-2">Your score: <span id="final-score" class="font-bold">0</span>/10</p>
                                                        <div class="w-full bg-gray-200 rounded-full h-2.5 mt-2 mb-4">
                                                            <div id="score-progress" class="bg-blue-600 h-2.5 rounded-full transition-all duration-1000" style="width: 0%"></div>
                                                        </div>
                                                        <div id="score-feedback" class="mt-3"></div>
                                                        
                                                        <div class="mt-4 pt-3 border-t border-blue-200">
                                                            <h5 class="font-bold mb-2">Remember these safety tips:</h5>
                                                            <ul class="list-disc pl-5 space-y-1">
                                                                <li>Never share personal information with strangers online</li>
                                                                <li>Never give out your parents' credit card or contact information</li>
                                                                <li>Be suspicious of people asking for personal details</li>
                                                                <li>Tell a trusted adult if someone asks for this information</li>
                                                                <li>Block and report accounts that pressure you to share private information</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="text-center mt-6">
                                                        <form action="{{ route('game.submit-mission', $mission['id']) }}" method="POST" class="inline">
                                                            @csrf
                                                            <input type="hidden" name="social_media_complete" value="1">
                                                            <input type="hidden" id="final-score-input" name="social_media_score" value="0">
                                                            <button type="submit" class="px-8 py-4 bg-green-600 text-white rounded-full font-bold hover:bg-green-700 transition-all transform hover:scale-105 animate-pulse">Complete Mission</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="text-center mt-6 space-x-4">
                                                <button id="to-social-stage2-from-3" class="px-6 py-3 bg-gray-600 text-white rounded-full font-bold hover:bg-gray-700 transition-all transform hover:scale-105">← Back</button>
                                            </div>
                                        `;
                                        
                                        // Set up navigation logic and event listeners
                                        function setupStage2() {
                                            const stage2 = document.createElement('div');
                                            stage2.id = 'social-stage2';
                                            stage2.className = 'social-stage hidden';
                                            stage2.innerHTML = stage2Content;
                                            
                                            if (document.getElementById('social-stage2')) {
                                                document.getElementById('social-stage2').remove();
                                            }
                                            
                                            // Insert after stage1
                                            stage1.insertAdjacentElement('afterend', stage2);
                                            
                                            // Set up event listeners for stage2
                                            document.getElementById('to-social-stage1').addEventListener('click', showStage1);
                                            document.getElementById('to-social-stage3').addEventListener('click', showStage3);
                                        }
                                        
                                        function setupStage3() {
                                            const stage3 = document.createElement('div');
                                            stage3.id = 'social-stage3';
                                            stage3.className = 'social-stage hidden';
                                            stage3.innerHTML = stage3Content;
                                            
                                            if (document.getElementById('social-stage3')) {
                                                document.getElementById('social-stage3').remove();
                                            }
                                            
                                            // Insert after stage2
                                            document.getElementById('social-stage2').insertAdjacentElement('afterend', stage3);
                                            
                                            // Set up event listeners for stage3
                                            document.getElementById('to-social-stage2-from-3').addEventListener('click', showStage2);
                                            
                                            // Set up chat simulation responses
                                            document.querySelectorAll('.response-option').forEach(button => {
                                                button.addEventListener('click', handleFirstResponse);
                                            });
                                            
                                            // Setup full-page chat simulator
                                            const openChatBtn = document.getElementById('open-chat-simulator');
                                            const closeChatBtn = document.getElementById('close-chat-simulator');
                                            const chatOverlay = document.getElementById('chat-simulator-overlay');
                                            
                                            if (openChatBtn) {
                                                openChatBtn.addEventListener('click', function() {
                                                    chatOverlay.classList.add('active');
                                                    document.body.style.overflow = 'hidden'; // Prevent scrolling behind overlay
                                                });
                                            }
                                            
                                            if (closeChatBtn) {
                                                closeChatBtn.addEventListener('click', function() {
                                                    chatOverlay.classList.remove('active');
                                                    document.body.style.overflow = ''; // Re-enable scrolling
                                                    
                                                    // If chat is complete, show the results section
                                                    if (chatStage >= 4) {
                                                        document.getElementById('chat-results').classList.remove('hidden');
                                                    }
                                                });
                                            }
                                            
                                            // Set up fullpage chat responses
                                            document.querySelectorAll('.fullpage-response-option').forEach(button => {
                                                button.addEventListener('click', handleFullpageResponse);
                                            });
                                        }
                                        
                                        // Handle fullpage chat conversation
                                        let chatStage = 1;
                                        let chatScore = 0;
                                        
                                        function handleFullpageResponse() {
                                            const score = parseInt(this.getAttribute('data-score'));
                                            const response = this.getAttribute('data-response');
                                            const chatMessages = document.getElementById('fullpage-chat-messages');
                                            const chatInput = document.getElementById('fullpage-chat-input');
                                            
                                            // Add user's response
                                            const userResponseDiv = document.createElement('div');
                                            userResponseDiv.className = 'flex justify-end mb-4';
                                            userResponseDiv.innerHTML = `
                                                <div class="bg-green-500 text-white p-3 rounded-lg rounded-tr-none max-w-md ml-auto">
                                                    <p>${response}</p>
                                                    <div class="text-xs text-white/70 text-right mt-1">Just now</div>
                                                </div>
                                            `;
                                            chatMessages.appendChild(userResponseDiv);
                                            chatMessages.scrollTop = chatMessages.scrollHeight;
                                            
                                            // Update score
                                            chatScore += score;
                                            
                                            // Show typing indicator
                                            const typingDiv = document.createElement('div');
                                            typingDiv.className = 'flex mb-4 typing-indicator-container';
                                            typingDiv.innerHTML = `
                                                <div class="flex-shrink-0 mr-3">
                                                    <div class="w-8 h-8 rounded-full bg-blue-500 flex items-center justify-center text-sm text-white font-bold">
                                                        GB
                                                    </div>
                                                </div>
                                                <div class="bg-gray-300 p-3 rounded-lg rounded-tl-none max-w-md typing-indicator">
                                                    <span></span>
                                                    <span></span>
                                                    <span></span>
                                                </div>
                                            `;
                                            chatMessages.appendChild(typingDiv);
                                            chatMessages.scrollTop = chatMessages.scrollHeight;
                                            
                                            // Clear input options
                                            chatInput.innerHTML = '';
                                            
                                            // Process next chat stage after delay
                                            setTimeout(() => {
                                                // Remove typing indicator
                                                chatMessages.removeChild(typingDiv);
                                                
                                                // Add attacker's response based on current chat stage
                                                let attackerResponse = '';
                                                let nextOptions = '';
                                                
                                                switch(chatStage) {
                                                    case 1:
                                                        attackerResponse = `
                                                            <div class="flex mb-4">
                                                                <div class="flex-shrink-0 mr-3">
                                                                    <div class="w-8 h-8 rounded-full bg-blue-500 flex items-center justify-center text-sm text-white font-bold">
                                                                        GB
                                                                    </div>
                                                                </div>
                                                                <div class="bg-blue-500 text-white p-3 rounded-lg rounded-tl-none max-w-md">
                                                                    <p>Cool! I play a lot of Fortnite and Minecraft too! I'm actually part of a gaming team that's recruiting new players. We have tournaments with real prizes! What's your username? I can add you.</p>
                                                                    <div class="text-xs text-white/70 text-right mt-1">3:45 PM</div>
                                                                </div>
                                                            </div>
                                                        `;
                                                        
                                                        nextOptions = `
                                                            <p class="font-bold text-gray-700 mb-3">How would you respond?</p>
                                                            <div class="space-y-2">
                                                                <button class="fullpage-response-option w-full text-left p-3 bg-gray-100 hover:bg-gray-200 rounded-md transition transform hover:scale-102 flex justify-between items-center" data-score="1" data-response="My username is GameKid123. What's the name of your team?">
                                                                    <span>My username is GameKid123. What's the name of your team?</span>
                                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 9l3 3m0 0l-3 3m3-3H8m13 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                                    </svg>
                                                                </button>
                                                                <button class="fullpage-response-option w-full text-left p-3 bg-gray-100 hover:bg-gray-200 rounded-md transition transform hover:scale-102 flex justify-between items-center" data-score="2" data-response="I'd need to know more about your team before I share my username. Can you tell me more about these tournaments?">
                                                                    <span>I'd need to know more about your team before I share my username. Can you tell me more about these tournaments?</span>
                                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 9l3 3m0 0l-3 3m3-3H8m13 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                                    </svg>
                                                                </button>
                                                                <button class="fullpage-response-option w-full text-left p-3 bg-gray-100 hover:bg-gray-200 rounded-md transition transform hover:scale-102 flex justify-between items-center" data-score="0" data-response="My username is RobertSmith2012. I play on my dad's computer after school. We live in Washington.">
                                                                    <span>My username is RobertSmith2012. I play on my dad's computer after school. We live in Washington.</span>
                                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 9l3 3m0 0l-3 3m3-3H8m13 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                                    </svg>
                                                                </button>
                                                            </div>
                                                        `;
                                                        break;
                                                        
                                                    case 2:
                                                        attackerResponse = `
                                                            <div class="flex mb-4">
                                                                <div class="flex-shrink-0 mr-3">
                                                                    <div class="w-8 h-8 rounded-full bg-blue-500 flex items-center justify-center text-sm text-white font-bold">
                                                                        GB
                                                                    </div>
                                                                </div>
                                                                <div class="bg-blue-500 text-white p-3 rounded-lg rounded-tl-none max-w-md">
                                                                    <p>We're called ProGamerz Elite. We have 5,000 members and big sponsors! I can help you join, but I need a few details to register you for the next tournament. It has a $500 prize! What's your full name and age?</p>
                                                                    <div class="text-xs text-white/70 text-right mt-1">3:48 PM</div>
                                                                </div>
                                                            </div>
                                                        `;
                                                        
                                                        nextOptions = `
                                                            <p class="font-bold text-gray-700 mb-3">How would you respond?</p>
                                                            <div class="space-y-2">
                                                                <button class="fullpage-response-option w-full text-left p-3 bg-gray-100 hover:bg-gray-200 rounded-md transition transform hover:scale-102 flex justify-between items-center" data-score="0" data-response="My name is Robert Smith and I'm 11 years old. I'm excited to join the tournament!">
                                                                    <span>My name is Robert Smith and I'm 11 years old. I'm excited to join the tournament!</span>
                                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                                                    </svg>
                                                                </button>
                                                                <button class="fullpage-response-option w-full text-left p-3 bg-gray-100 hover:bg-gray-200 rounded-md transition transform hover:scale-102 flex justify-between items-center" data-score="1" data-response="I'd need to know more about the tournament. Can you tell me about the prizes and how the tournament works?">
                                                                    <span>I'd need to know more about the tournament. Can you tell me about the prizes and how the tournament works?</span>
                                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                                                    </svg>
                                                                </button>
                                                                <button class="fullpage-response-option w-full text-left p-3 bg-gray-100 hover:bg-gray-200 rounded-md transition transform hover:scale-102 flex justify-between items-center" data-score="2" data-response="I'm 15 years old and I'm interested in joining. Can you tell me about the age requirements?">
                                                                    <span>I'm 15 years old and I'm interested in joining. Can you tell me about the age requirements?</span>
                                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                                                    </svg>
                                                                </button>
                                                            </div>
                                                        `;
                                                        break;
                                                        
                                                    case 3:
                                                        attackerResponse = `
                                                            <div class="flex mb-4">
                                                                <div class="flex-shrink-0 mr-3">
                                                                    <div class="w-8 h-8 rounded-full bg-blue-500 flex items-center justify-center text-sm text-white font-bold">
                                                                        GB
                                                                    </div>
                                                                </div>
                                                                <div class="bg-blue-500 text-white p-3 rounded-lg rounded-tl-none max-w-md">
                                                                    <p>We're called ProGamerz Elite. We have 5,000 members and big sponsors! I can help you join, but I need a few details to register you for the next tournament. It has a $500 prize! What's your full name and age?</p>
                                                                    <div class="text-xs text-white/70 text-right mt-1">3:48 PM</div>
                                                                </div>
                                                            </div>
                                                        `;
                                                        
                                                        nextOptions = `
                                                            <p class="font-bold text-gray-700 mb-3">How would you respond?</p>
                                                            <div class="space-y-2">
                                                                <button class="fullpage-response-option w-full text-left p-3 bg-gray-100 hover:bg-gray-200 rounded-md transition transform hover:scale-102 flex justify-between items-center" data-score="0" data-response="My name is Robert Smith and I'm 11 years old. I'm excited to join the tournament!">
                                                                    <span>My name is Robert Smith and I'm 11 years old. I'm excited to join the tournament!</span>
                                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                                                    </svg>
                                                                </button>
                                                                <button class="fullpage-response-option w-full text-left p-3 bg-gray-100 hover:bg-gray-200 rounded-md transition transform hover:scale-102 flex justify-between items-center" data-score="1" data-response="I'd need to know more about the tournament. Can you tell me about the prizes and how the tournament works?">
                                                                    <span>I'd need to know more about the tournament. Can you tell me about the prizes and how the tournament works?</span>
                                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                                                    </svg>
                                                                </button>
                                                                <button class="fullpage-response-option w-full text-left p-3 bg-gray-100 hover:bg-gray-200 rounded-md transition transform hover:scale-102 flex justify-between items-center" data-score="2" data-response="I'm 15 years old and I'm interested in joining. Can you tell me about the age requirements?">
                                                                    <span>I'm 15 years old and I'm interested in joining. Can you tell me about the age requirements?</span>
                                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                                                    </svg>
                                                                </button>
                                                            </div>
                                                        `;
                                                        break;
                                                        
                                                    case 4:
                                                        attackerResponse = `
                                                            <div class="flex mb-4">
                                                                <div class="flex-shrink-0 mr-3">
                                                                    <div class="w-8 h-8 rounded-full bg-blue-500 flex items-center justify-center text-sm text-white font-bold">
                                                                        GB
                                                                    </div>
                                                                </div>
                                                                <div class="bg-blue-500 text-white p-3 rounded-lg rounded-tl-none max-w-md">
                                                                    <p>We're called ProGamerz Elite. We have 5,000 members and big sponsors! I can help you join, but I need a few details to register you for the next tournament. It has a $500 prize! What's your full name and age?</p>
                                                                    <div class="text-xs text-white/70 text-right mt-1">3:48 PM</div>
                                                                </div>
                                                            </div>
                                                        `;
                                                        
                                                        nextOptions = `
                                                            <p class="font-bold text-gray-700 mb-3">How would you respond?</p>
                                                            <div class="space-y-2">
                                                                <button class="fullpage-response-option w-full text-left p-3 bg-gray-100 hover:bg-gray-200 rounded-md transition transform hover:scale-102 flex justify-between items-center" data-score="0" data-response="My name is Robert Smith and I'm 11 years old. I'm excited to join the tournament!">
                                                                    <span>My name is Robert Smith and I'm 11 years old. I'm excited to join the tournament!</span>
                                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                                                    </svg>
                                                                </button>
                                                                <button class="fullpage-response-option w-full text-left p-3 bg-gray-100 hover:bg-gray-200 rounded-md transition transform hover:scale-102 flex justify-between items-center" data-score="1" data-response="I'd need to know more about the tournament. Can you tell me about the prizes and how the tournament works?">
                                                                    <span>I'd need to know more about the tournament. Can you tell me about the prizes and how the tournament works?</span>
                                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                                                    </svg>
                                                                </button>
                                                                <button class="fullpage-response-option w-full text-left p-3 bg-gray-100 hover:bg-gray-200 rounded-md transition transform hover:scale-102 flex justify-between items-center" data-score="2" data-response="I'm 15 years old and I'm interested in joining. Can you tell me about the age requirements?">
                                                                    <span>I'm 15 years old and I'm interested in joining. Can you tell me about the age requirements?</span>
                                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                                                    </svg>
                                                                </button>
                                                            </div>
                                                        `;
                                                        break;
                                                }
                                            }
                                        }
                                    });
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<style>
/* Villain animation effects */
@keyframes pulse-slow {
    0% {
        transform: scale(1);
        opacity: 1;
    }
    50% {
        transform: scale(1.05);
        opacity: 0.9;
    }
    100% {
        transform: scale(1);
        opacity: 1;
    }
}

.animate-pulse-slow {
    animation: pulse-slow 3s ease-in-out infinite;
}

@keyframes spotlight {
    0% {
        box-shadow: 0 0 10px 2px rgba(255, 0, 0, 0.3);
    }
    50% {
        box-shadow: 0 0 20px 5px rgba(255, 0, 0, 0.5);
    }
    100% {
        box-shadow: 0 0 10px 2px rgba(255, 0, 0, 0.3);
    }
}

/* Glowing effect for buttons and important elements */
.btn-cyber {
    position: relative;
    overflow: hidden;
}

.btn-cyber:before {
    content: '';
    position: absolute;
    top: -50%;
    left: -50%;
    width: 200%;
    height: 200%;
    background: linear-gradient(
        to bottom right,
        rgba(255, 255, 255, 0) 0%,
        rgba(255, 255, 255, 0.2) 100%
    );
    transform: rotate(45deg);
    z-index: 0;
    transition: all 0.5s ease;
    opacity: 0;
}

.btn-cyber:hover:before {
    opacity: 1;
    animation: shine 1.5s infinite;
}

@keyframes shine {
    0% {
        left: -100%;
        top: -100%;
    }
    100% {
        left: 100%;
        top: 100%;
    }
}
</style>

@endswitch

@endsection

