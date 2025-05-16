@extends('layouts.app')

@section('content')
<div class="bg-gradient-to-b from-primary-600 to-primary-900 py-16 text-white">
    <div class="container mx-auto px-4 max-w-4xl">
        <div class="game-card bg-white/10 backdrop-blur-md border border-white/20 p-8 rounded-2xl shadow-xl">
            <div class="flex items-center mb-8">
                <div class="cyber-shield relative w-16 h-16 flex items-center justify-center mr-4 bg-gradient-to-br from-primary-50 to-primary-100 rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-10 h-10 text-primary-600">
                        <path fill-rule="evenodd" d="M12.516 2.17a.75.75 0 00-1.032 0 11.209 11.209 0 01-7.877 3.08.75.75 0 00-.722.515A12.74 12.74 0 002.25 9.75c0 5.942 4.064 10.933 9.563 12.348a.75.75 0 00.674 0c5.499-1.415 9.563-6.406 9.563-12.348 0-1.39-.223-2.73-.635-3.985a.75.75 0 00-.722-.516l-.143.001c-2.996 0-5.717-1.17-7.734-3.08zm3.094 8.016a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z" clip-rule="evenodd" />
                    </svg>
                </div>
                <div>
                    <h1 class="text-3xl font-game">Welcome, {{ $player_name }}!</h1>
                    <p class="text-xl">Your cybersecurity adventure begins now!</p>
                </div>
            </div>
            
            <div class="mb-8 prose prose-lg prose-invert max-w-none">
                <p>Hi there, {{ $player_name }}! I'm <span class="font-game text-secondary-300">Circuit</span>, your AI guide to the digital world!</p>
                
                <p>The internet can be an amazing place, but it's also filled with tricksters who want to steal information or fool people. They use sneaky tricks called <strong>phishing</strong> and <strong>social engineering</strong>.</p>
                
                <p>Together, we'll learn how to:</p>
                
                <ul class="list-disc pl-6 space-y-2">
                    <li>Spot fake emails, messages, and websites</li>
                    <li>Create strong passwords that are hard to hack</li>
                    <li>Know when someone online isn't who they say they are</li>
                    <li>Keep your personal information safe from digital tricksters</li>
                </ul>
                
                <p>Ready to build your <span class="font-game text-primary-300">Cyber Shield</span> and collect badges as you master new skills?</p>
            </div>
            
            <div class="mt-8 flex flex-col md:flex-row gap-4 justify-center">
                <a href="{{ route('game.story') }}" class="btn-primary text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 mr-2">
                        <path fill-rule="evenodd" d="M6.32 2.577a49.255 49.255 0 0111.36 0c1.497.174 2.57 1.46 2.57 2.93V21a.75.75 0 01-1.085.67L12 18.089l-7.165 3.583A.75.75 0 013.75 21V5.507c0-1.47 1.073-2.756 2.57-2.93z" clip-rule="evenodd" />
                    </svg>
                    Start Story Mode
                </a>
                
                <a href="{{ route('game.village') }}" class="btn-secondary text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 mr-2">
                        <path d="M11.584 2.376a.75.75 0 01.832 0l9 6a.75.75 0 11-.832 1.248L12 3.901 3.416 9.624a.75.75 0 01-.832-1.248l9-6z" />
                        <path fill-rule="evenodd" d="M20.25 10.332v9.918H21a.75.75 0 010 1.5H3a.75.75 0 010-1.5h.75v-9.918a.75.75 0 01.634-.74A49.109 49.109 0 0112 9c2.59 0 5.134.202 7.616.592a.75.75 0 01.634.74zm-7.5 2.418a.75.75 0 00-1.5 0v6.75a.75.75 0 001.5 0v-6.75zm3-.75a.75.75 0 01.75.75v6.75a.75.75 0 01-1.5 0v-6.75a.75.75 0 01.75-.75zM9 12.75a.75.75 0 00-1.5 0v6.75a.75.75 0 001.5 0v-6.75z" clip-rule="evenodd" />
                        <path d="M12 7.875a1.125 1.125 0 100-2.25 1.125 1.125 0 000 2.25z" />
                    </svg>
                    Explore Cyber Village
                </a>
                
                <a href="{{ route('game.truth-detective') }}" class="btn-success text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 mr-2">
                        <path d="M11.625 16.5a1.875 1.875 0 100-3.75 1.875 1.875 0 000 3.75z" />
                        <path fill-rule="evenodd" d="M5.625 1.5H9a3.75 3.75 0 013.75 3.75v1.875c0 1.036.84 1.875 1.875 1.875H16.5a3.75 3.75 0 013.75 3.75v7.875c0 1.035-.84 1.875-1.875 1.875H5.625a1.875 1.875 0 01-1.875-1.875V3.375c0-1.036.84-1.875 1.875-1.875zm6 16.5c.66 0 1.277-.19 1.797-.518l1.048 1.048a.75.75 0 001.06-1.06l-1.047-1.048A3.375 3.375 0 1011.625 18z" clip-rule="evenodd" />
                    </svg>
                    Become a Truth Detective
                </a>
            </div>
        </div>
        
        <!-- Character introduction -->
        <div class="mt-12 grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="game-card bg-white/10 backdrop-blur-md border border-white/20 p-6 rounded-2xl shadow-xl">
                <h2 class="text-xl font-game mb-4 text-center">Your AI Helper: Circuit</h2>
                <div class="flex items-center justify-center mb-4">
                    <div class="w-24 h-24 rounded-full bg-secondary-100 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-16 h-16 text-secondary-600">
                            <path d="M16.5 7.5h-9v9h9v-9z" />
                            <path fill-rule="evenodd" d="M8.25 2.25A.75.75 0 019 3v.75h2.25V3a.75.75 0 011.5 0v.75H15V3a.75.75 0 011.5 0v.75h.75a3 3 0 013 3v.75H21A.75.75 0 0121 9h-.75v2.25H21a.75.75 0 010 1.5h-.75V15H21a.75.75 0 010 1.5h-.75v.75a3 3 0 01-3 3h-.75V21a.75.75 0 01-1.5 0v-.75h-2.25V21a.75.75 0 01-1.5 0v-.75H9V21a.75.75 0 01-1.5 0v-.75h-.75a3 3 0 01-3-3v-.75H3A.75.75 0 013 15h.75v-2.25H3a.75.75 0 010-1.5h.75V9H3a.75.75 0 010-1.5h.75v-.75a3 3 0 013-3h.75V3a.75.75 0 01.75-.75zM6 6.75A.75.75 0 016.75 6h10.5a.75.75 0 01.75.75v10.5a.75.75 0 01-.75.75H6.75a.75.75 0 01-.75-.75V6.75z" clip-rule="evenodd" />
                        </svg>
                    </div>
                </div>
                <p class="text-center">Circuit will help you learn about online safety and give you tips when you face challenges.</p>
            </div>
            
            <div class="game-card bg-white/10 backdrop-blur-md border border-white/20 p-6 rounded-2xl shadow-xl">
                <h2 class="text-xl font-game mb-4 text-center">The Trickster: Captain Clickbait</h2>
                <div class="flex items-center justify-center mb-4">
                    <div class="w-24 h-24 rounded-full bg-danger-100 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-16 h-16 text-danger-600">
                            <path fill-rule="evenodd" d="M9.401 3.003c1.155-2 4.043-2 5.197 0l7.355 12.748c1.154 2-.29 4.5-2.599 4.5H4.645c-2.309 0-3.752-2.5-2.598-4.5L9.4 3.003zM12 8.25a.75.75 0 01.75.75v3.75a.75.75 0 01-1.5 0V9a.75.75 0 01.75-.75zm0 8.25a.75.75 0 100-1.5.75.75 0 000 1.5z" clip-rule="evenodd" />
                        </svg>
                    </div>
                </div>
                <p class="text-center">Captain Clickbait creates tricky emails and fake websites to fool people. You'll learn to see through his tricks!</p>
            </div>
        </div>
    </div>
</div>
@endsection 
