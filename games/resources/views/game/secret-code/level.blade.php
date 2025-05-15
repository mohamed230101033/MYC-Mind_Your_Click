@extends('layouts.app')

@section('content')
<div class="bg-gradient-to-b from-blue-600 via-blue-700 to-blue-800 min-h-screen py-12 px-4">
    <div class="container mx-auto max-w-4xl">
        <!-- Header -->
        <div class="bg-white/10 backdrop-blur-md border border-white/20 p-6 rounded-2xl shadow-xl text-white mb-8">
            <div class="flex items-center justify-between mb-4">
                <div class="flex items-center">
                    <a href="{{ route('game.secret-code') }}" class="mr-4 text-white/80 hover:text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                            <path fill-rule="evenodd" d="M7.72 12.53a.75.75 0 010-1.06l7.5-7.5a.75.75 0 111.06 1.06L9.31 12l6.97 6.97a.75.75 0 11-1.06 1.06l-7.5-7.5z" clip-rule="evenodd" />
                        </svg>
                    </a>
                    <h1 class="text-3xl font-game">{{ $scenario['title'] }}</h1>
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
                <p class="text-lg">{{ $scenario['description'] }}</p>
            </div>
        </div>

        <!-- Challenge Content -->
        <div class="bg-white/10 backdrop-blur-md border border-white/20 p-6 rounded-2xl shadow-xl text-white mb-8">
            <div class="mb-8">
                <h2 class="text-2xl font-game mb-4">Encrypted Message:</h2>
                <div class="bg-white/5 p-4 rounded-xl border border-white/10 font-mono text-lg break-all">
                    {{ $scenario['message'] }}
                </div>
            </div>

            @if($scenario['type'] === 'symbol' && isset($scenario['key']))
            <div class="mb-8">
                <h3 class="text-xl font-game mb-2">Symbol Key:</h3>
                <div class="grid grid-cols-3 sm:grid-cols-5 gap-4">
                    @foreach($scenario['key'] as $symbol => $letter)
                    <div class="bg-white/5 p-2 rounded-lg border border-white/10 text-center">
                        <span class="text-xl">{{ $symbol }}</span>
                        <span class="text-sm text-white/70">=</span>
                        <span class="text-xl">{{ $letter }}</span>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif

            <div class="mb-6">
                <h3 class="text-xl font-game mb-2">Hint:</h3>
                <p class="text-white/90">{{ $scenario['hint'] }}</p>
            </div>

            <form action="{{ route('game.secret-code.submit-level', $level) }}" method="POST">
                @csrf
                <div class="space-y-4">
                    <label class="block">
                        <span class="text-lg font-game">Your Answer:</span>
                        <textarea name="answer" rows="3" 
                                class="mt-2 w-full bg-white/5 border border-white/10 rounded-xl p-4 text-white placeholder-white/50 focus:ring-2 focus:ring-secondary-500 focus:border-transparent"
                                placeholder="Type your decoded message here..."></textarea>
                    </label>

                    <div class="flex justify-end">
                        <button type="submit" 
                                class="bg-secondary-500 hover:bg-secondary-600 text-white font-game py-3 px-6 rounded-xl transition transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-secondary-500 focus:ring-offset-2 focus:ring-offset-purple-800">
                            Submit Answer
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <!-- Tools -->
        <div class="bg-white/10 backdrop-blur-md border border-white/20 p-6 rounded-2xl shadow-xl text-white">
            <h2 class="text-2xl font-game mb-4">Decoding Tools</h2>
            
            @if($scenario['type'] === 'caesar')
            <div class="space-y-4">
                <h3 class="text-lg font-game">Caesar Cipher Shift Tool:</h3>
                <div class="flex flex-wrap gap-2">
                    @for($i = 1; $i <= 25; $i++)
                    <button onclick="shiftText({{ $i }})" 
                            class="bg-white/5 hover:bg-white/10 border border-white/10 rounded-lg px-3 py-1 text-sm transition">
                        Shift {{ $i }}
                    </button>
                    @endfor
                </div>
            </div>
            @endif

            @if($scenario['type'] === 'reverse')
            <div class="space-y-4">
                <h3 class="text-lg font-game">Text Reversal Tool:</h3>
                <button onclick="reverseText()" 
                        class="bg-white/5 hover:bg-white/10 border border-white/10 rounded-lg px-4 py-2 transition">
                    Reverse Text
                </button>
            </div>
            @endif
        </div>
    </div>
</div>

@if($scenario['type'] === 'caesar')
<script>
function shiftText(shift) {
    const text = '{{ $scenario['message'] }}';
    let result = '';
    
    for (let i = 0; i < text.length; i++) {
        let char = text[i];
        if (char.match(/[a-z]/i)) {
            const code = text.charCodeAt(i);
            if (code >= 65 && code <= 90) {
                char = String.fromCharCode(((code - 65 - shift + 26) % 26) + 65);
            } else if (code >= 97 && code <= 122) {
                char = String.fromCharCode(((code - 97 - shift + 26) % 26) + 97);
            }
        }
        result += char;
    }
    
    document.querySelector('textarea[name="answer"]').value = result;
}
</script>
@endif

@if($scenario['type'] === 'reverse')
<script>
function reverseText() {
    const text = '{{ $scenario['message'] }}';
    const reversed = text.split('').reverse().join('');
    document.querySelector('textarea[name="answer"]').value = reversed;
}
</script>
@endif
@endsection
