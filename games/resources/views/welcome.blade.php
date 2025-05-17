<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Mind Your Click - Cybersecurity Game for Kids</title>
        
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@400;500;600;700&family=Fredoka:wght@300;400;500;600;700&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
        
        <!-- Tailwind CSS -->
        <script src="https://cdn.tailwindcss.com"></script>
        
        <style>
            :root {
                --hero-blue: #1a91ff;
                --hero-green: #00d68f;
                --hero-purple: #9164fa;
                --hero-orange: #ff901a;
                --hero-pink: #ff5a8a;
                --light-bg: #f0f5ff;
            }
            
            body {
                font-family: 'Fredoka', sans-serif;
                background-color: var(--light-bg);
                color: #2d3748;
                overflow-x: hidden;
            }
            
            /* Cartoon-style panel */
            .hero-panel {
                background-color: white;
                border-radius: 24px;
                box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
                position: relative;
                overflow: hidden;
                z-index: 10;
            }
            
            .hero-panel::before {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                height: 8px;
                background: linear-gradient(90deg, var(--hero-blue), var(--hero-purple), var(--hero-green));
                z-index: 5;
            }
            
            /* Digital world background elements */
            .digital-item {
                position: absolute;
                z-index: 1;
                filter: drop-shadow(0 4px 8px rgba(0, 0, 0, 0.1));
                animation: float 6s ease-in-out infinite;
            }
            
            @keyframes float {
                0%, 100% { transform: translateY(0) rotate(0deg); }
                50% { transform: translateY(-20px) rotate(5deg); }
            }
            
            /* Typing animation cursor */
            .typing::after {
                content: '|';
                animation: cursor 1s infinite step-end;
            }
            
            @keyframes cursor {
                0%, 100% { opacity: 1; }
                50% { opacity: 0; }
            }
            
            /* Button styles */
            .hero-button {
                background: linear-gradient(to right, var(--hero-green), var(--hero-blue));
                color: white;
                font-weight: 600;
                padding: 0.75rem 1.5rem;
                border-radius: 50px;
                box-shadow: 0 8px 15px rgba(26, 145, 255, 0.3);
                transition: all 0.3s ease;
                position: relative;
                overflow: hidden;
                font-size: 1.2rem;
                transform-style: preserve-3d;
                transform: perspective(1000px);
            }
            
            .hero-button:hover {
                transform: translateY(-5px) scale(1.05);
                box-shadow: 0 12px 20px rgba(26, 145, 255, 0.4);
            }
            
            .hero-button:active {
                transform: translateY(2px);
            }
            
            /* Input field styling */
            .hero-input {
                background-color: #f0f5ff;
                border: 3px solid #d2e1ff;
                border-radius: 50px;
                padding: 0.75rem 1.5rem;
                font-size: 1.2rem;
                font-weight: 500;
                color: #4a5568;
                transition: all 0.3s ease;
                width: 100%;
                text-align: center;
                box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.05);
            }
            
            .hero-input:focus {
                outline: none;
                border-color: var(--hero-blue);
                box-shadow: 0 0 0 3px rgba(26, 145, 255, 0.3), inset 0 2px 4px rgba(0, 0, 0, 0.05);
            }
            
            /* Bouncing animation */
            .bounce {
                animation: bounce 2s ease infinite;
            }
            
            @keyframes bounce {
                0%, 100% { transform: translateY(0); }
                50% { transform: translateY(-15px); }
            }
            
            /* Wiggle animation */
            .wiggle {
                animation: wiggle 2.5s ease-in-out infinite;
            }
            
            @keyframes wiggle {
                0%, 100% { transform: rotate(0deg); }
                25% { transform: rotate(-5deg); }
                75% { transform: rotate(5deg); }
            }
            
            /* Spin animation */
            .spin-slow {
                animation: spin 8s linear infinite;
            }
            
            @keyframes spin {
                from { transform: rotate(0deg); }
                to { transform: rotate(360deg); }
            }
            
            /* Pulse animation */
            .pulse {
                animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
            }
            
            @keyframes pulse {
                0%, 100% { opacity: 1; transform: scale(1); }
                50% { opacity: 0.8; transform: scale(1.05); }
            }
            
            /* Loading animation */
            .loading-bar {
                height: 10px;
                border-radius: 5px;
                background: linear-gradient(90deg, var(--hero-blue), var(--hero-purple));
                width: 0%;
                animation: loadingAnim 2s ease-in-out forwards;
            }
            
            @keyframes loadingAnim {
                0% { width: 0%; }
                100% { width: 100%; }
            }
            
            /* Binary rain effect */
            .binary-rain {
                position: absolute;
                top: -20px;
                color: rgba(26, 145, 255, 0.1);
                font-family: monospace;
                font-size: 14px;
                animation: rain 10s linear infinite;
                z-index: -1;
            }
            
            @keyframes rain {
                0% { transform: translateY(-20px); }
                100% { transform: translateY(800px); }
            }
        </style>
    </head>
    <body>
        <!-- Digital world background elements -->
        <div class="digital-item" style="top: 15%; left: 10%; animation-delay: 0s;">
            <img src="https://cdn-icons-png.flaticon.com/512/2313/2313448.png" alt="Shield" class="w-16 h-16 bounce">
        </div>
        <div class="digital-item" style="top: 70%; left: 80%; animation-delay: 1s;">
            <img src="https://cdn-icons-png.flaticon.com/512/2313/2313470.png" alt="Lock" class="w-24 h-24 wiggle">
        </div>
        <div class="digital-item" style="top: 20%; left: 85%; animation-delay: 2s;">
            <img src="https://cdn-icons-png.flaticon.com/512/2313/2313459.png" alt="Cloud" class="w-20 h-20 pulse">
        </div>
        <div class="digital-item" style="top: 75%; left: 15%; animation-delay: 1.5s;">
            <img src="https://cdn-icons-png.flaticon.com/512/2313/2313491.png" alt="Wifi" class="w-16 h-16 pulse">
        </div>
        <div class="digital-item" style="top: 40%; left: 5%; animation-delay: 0.5s;">
            <img src="https://cdn-icons-png.flaticon.com/512/2313/2313604.png" alt="Gear" class="w-14 h-14 spin-slow">
        </div>
        
        <!-- Binary rain -->
        <div class="binary-rain" style="left: 10%;">10110101</div>
        <div class="binary-rain" style="left: 30%; animation-delay: 2s;">01001010</div>
        <div class="binary-rain" style="left: 60%; animation-delay: 4s;">11010010</div>
        <div class="binary-rain" style="left: 85%; animation-delay: 1s;">01101001</div>
        
        <!-- Main container -->
        <div class="min-h-screen flex items-center justify-center p-6">
            <div class="max-w-4xl w-full">
                <!-- Hero panel -->
                <div class="hero-panel p-10">
                    <!-- Header with logo -->
                    <div class="flex justify-center mb-8">
                        <div class="relative">
                            <div class="bg-gradient-to-r from-blue-500 to-purple-500 rounded-full w-24 h-24 flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" class="w-14 h-14 text-white">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                            </div>
                            <div class="absolute -right-2 -top-2 bg-yellow-400 rounded-full w-10 h-10 flex items-center justify-center text-white text-xl font-bold pulse">
                                !
                            </div>
                        </div>
                    </div>
                    
                    <!-- Title -->
                    <div class="text-center mb-8">
                        <h1 class="text-4xl md:text-5xl font-bold mb-2 bg-gradient-to-r from-blue-600 via-purple-500 to-green-500 text-transparent bg-clip-text">
                            🛡️ Cyber Hero HQ 🖥️
                        </h1>
                        <p class="text-xl text-gray-600">Your First Mission Awaits!</p>
                    </div>
                    
                    <!-- Character and welcome message -->
                    <div class="grid grid-cols-1 md:grid-cols-5 gap-6 mb-8">
                        <!-- Character -->
                        <div class="md:col-span-2 flex justify-center">
                            <div class="relative">
                                <img src="https://cdn-icons-png.flaticon.com/512/4616/4616099.png" alt="Cyber Mentor" class="w-40 h-40 wiggle">
                                <div id="speech-bubble" class="absolute -top-16 -right-8 bg-gray-100 rounded-lg p-3 hidden">
                                    <p class="text-sm font-medium">Great name! Let's go!</p>
                                    <div class="absolute bottom-0 right-6 transform translate-y-1/2 rotate-45 w-4 h-4 bg-gray-100"></div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Welcome message -->
                        <div class="md:col-span-3">
                            <div class="bg-blue-100 rounded-lg p-6 border-2 border-blue-200 relative">
                                <div class="absolute left-0 top-1/2 transform -translate-x-1/2 -translate-y-1/2 rotate-45 w-4 h-4 bg-blue-100 border-l-2 border-b-2 border-blue-200"></div>
                                <h2 id="typing-text" class="text-xl font-bold text-blue-700 typing mb-2"></h2>
                                <p id="subtitle" class="text-blue-600"></p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Name input form -->
                    <form action="{{ route('start-game') }}" method="POST" class="space-y-6 max-w-md mx-auto">
                        @csrf
                        <div class="space-y-3">
                            <label class="block text-center text-xl font-semibold text-purple-600">
                                🕶️ Your Secret Hero Alias:
                            </label>
                            <input type="text" name="player_name" required
                                class="hero-input"
                                placeholder="Enter your hero name..."
                                autocomplete="off">
                        </div>
                        
                        <div class="text-center">
                            <button type="submit" id="start-button" class="hero-button">
                                🎯 Start Your First Mission! 🚀
                            </button>
                        </div>
                        
                        <!-- Loading bar (hidden initially) -->
                        <div id="loading-container" class="mt-4 hidden">
                            <p id="loading-text" class="text-sm text-center text-blue-600 mb-2">Encrypting fun...</p>
                            <div class="bg-blue-100 rounded-full overflow-hidden">
                                <div class="loading-bar"></div>
                            </div>
                        </div>
                    </form>
                </div>
                
                <!-- Footer note -->
                <p class="text-center text-sm text-blue-500 mt-4">
                    Protecting the internet, one click at a time! 🌐
                </p>
            </div>
        </div>
        
        <!-- Scripts -->
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Welcome typing animation
                const welcomeText = "👋 Hi there, young defender!";
                const subtitleText = "What's your Cyber Hero Name? We need your help to defend the internet from cyber villains!";
                const typingElement = document.getElementById('typing-text');
                const subtitleElement = document.getElementById('subtitle');
                
                // Loading messages
                const loadingMessages = [
                    "Encrypting fun...",
                    "Scanning for online villains...",
                    "Powering up shields...",
                    "Preparing cyber mission...",
                    "Activating hero powers..."
                ];
                
                // Function to simulate typing
                function typeText(element, text, i = 0, callback) {
                    if (i < text.length) {
                        element.innerHTML = text.substring(0, i + 1);
                        setTimeout(() => typeText(element, text, i + 1, callback), 50);
                    } else if (typeof callback === 'function') {
                        // Add a slight delay before starting the callback
                        setTimeout(callback, 300);
                    }
                }
                
                // Start typing the welcome text
                typeText(typingElement, welcomeText, 0, function() {
                    // When welcome text is done, type the subtitle
                    typeText(subtitleElement, subtitleText);
                    
                    // Remove the cursor from the welcome text
                    typingElement.classList.remove('typing');
                });
                
                // Focus on the input field after animation
                setTimeout(() => {
                    document.querySelector('input[name="player_name"]').focus();
                }, 2000);
                
                // Handle form submission with animation
                document.querySelector('form').addEventListener('submit', function(e) {
                    e.preventDefault();
                    
                    const nameInput = document.querySelector('input[name="player_name"]');
                    
                    if (nameInput.value.trim() !== '') {
                        // Show speech bubble
                        document.getElementById('speech-bubble').classList.remove('hidden');
                        
                        // Show loading animation
                        document.getElementById('loading-container').classList.remove('hidden');
                        
                        // Cycle through loading messages
                        let messageIndex = 0;
                        const messageElement = document.getElementById('loading-text');
                        
                        const messageInterval = setInterval(() => {
                            messageIndex = (messageIndex + 1) % loadingMessages.length;
                            messageElement.textContent = loadingMessages[messageIndex];
                        }, 800);
                        
                        // Submit the form after a delay
                        setTimeout(() => {
                            clearInterval(messageInterval);
                            this.submit();
                        }, 3000);
                    }
                });
                
                // Add sound effect to button (if supported)
                const button = document.getElementById('start-button');
                
                button.addEventListener('click', function() {
                    if (window.AudioContext || window.webkitAudioContext) {
                        const AudioContext = window.AudioContext || window.webkitAudioContext;
                        const context = new AudioContext();
                        const oscillator = context.createOscillator();
                        const gainNode = context.createGain();
                        
                        oscillator.type = 'sine';
                        oscillator.frequency.value = 440;
                        gainNode.gain.setValueAtTime(0.1, context.currentTime);
                        gainNode.gain.exponentialRampToValueAtTime(0.001, context.currentTime + 0.5);
                        
                        oscillator.connect(gainNode);
                        gainNode.connect(context.destination);
                        
                        oscillator.start();
                        oscillator.stop(context.currentTime + 0.5);
                    }
                });
            });
        </script>
    </body>
</html>
