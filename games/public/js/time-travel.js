/**
 * Cyber Time Travel Animation and Functionality
 */
document.addEventListener('DOMContentLoaded', function() {
    // Button to initiate time travel
    const travelButton = document.getElementById('travel-button');
    if (travelButton) {
        travelButton.addEventListener('click', startTimeTravel);
    }

    // Button to start sequential journey
    const sequentialButton = document.getElementById('sequential-travel');
    if (sequentialButton) {
        sequentialButton.addEventListener('click', function(e) {
            e.preventDefault();
            const attackId = this.getAttribute('data-attack');
            startTimeTravel(null, attackId, true);
        });
    }

    // Attack selection from the timeline
    const attackLinks = document.querySelectorAll('.attack-link');
    attackLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            const attackId = this.getAttribute('data-attack');
            startTimeTravel(null, attackId);
        });
    });

    /**
     * Start the time travel animation
     * @param {Event} e - Click event
     * @param {string} attackId - Optional attack ID to travel to
     * @param {boolean} isSequential - Whether this is a sequential journey
     */
    function startTimeTravel(e, attackId, isSequential = false) {
        // Play sound effect if available
        const soundEffect = new Audio('/sounds/space-spaceTravel.mp3');
        soundEffect.volume = 0.5;
        
        try {
            soundEffect.play().catch(err => {
                console.log('Sound could not be played', err);
            });
        } catch (err) {
            console.log('Sound error:', err);
        }
        
        // Add the active class to start animation
        document.querySelector('.space-background').classList.add('time-travel-active');
        
        // Create warp speed effect
        createWarpEffect();
        
        // After animation completes, redirect to the destination
        setTimeout(() => {
            document.querySelector('.space-background').classList.remove('time-travel-active');
            
            if (attackId) {
                window.location.href = `/game/time-travel/${attackId}`;
            } else {
                // If no specific attack, choose a random one
                const attacks = ['morris-worm', 'i-love-you', 'stuxnet', 'wannacry', 'solarwinds'];
                const randomAttack = attacks[Math.floor(Math.random() * attacks.length)];
                window.location.href = `/game/time-travel/${randomAttack}`;
            }
        }, 3000);
    }
    
    /**
     * Create warp speed particles effect
     */
    function createWarpEffect() {
        // Remove existing warp container if present
        const existingWarp = document.getElementById('warp-container');
        if (existingWarp) {
            existingWarp.remove();
        }
        
        // Create warp container
        const warpContainer = document.createElement('div');
        warpContainer.id = 'warp-container';
        warpContainer.style.position = 'fixed';
        warpContainer.style.top = '0';
        warpContainer.style.left = '0';
        warpContainer.style.width = '100%';
        warpContainer.style.height = '100%';
        warpContainer.style.overflow = 'hidden';
        warpContainer.style.zIndex = '5';
        
        document.body.appendChild(warpContainer);
        
        // Create warp stars
        for (let i = 0; i < 200; i++) {
            createWarpStar(warpContainer);
        }
        
        // Remove warp effect after animation
        setTimeout(() => {
            warpContainer.remove();
        }, 3000);
    }
    
    /**
     * Create a single warp speed star
     * @param {HTMLElement} container - Container element
     */
    function createWarpStar(container) {
        const star = document.createElement('div');
        const size = Math.random() * 3 + 1;
        
        star.style.position = 'absolute';
        star.style.width = `${size}px`;
        star.style.height = `${size}px`;
        star.style.background = `rgba(255, 255, 255, ${Math.random() * 0.5 + 0.5})`;
        star.style.borderRadius = '50%';
        star.style.boxShadow = `0 0 ${size * 2}px ${size}px rgba(65, 105, 225, 0.7)`;
        
        // Start position in the center
        star.style.top = '50%';
        star.style.left = '50%';
        star.style.transform = 'translate(-50%, -50%)';
        
        container.appendChild(star);
        
        // Random angle for travel direction
        const angle = Math.random() * Math.PI * 2;
        const distance = Math.min(window.innerWidth, window.innerHeight) * 0.8;
        
        // Animate the star
        setTimeout(() => {
            star.style.transition = `all ${Math.random() * 2 + 1}s linear`;
            star.style.top = `${50 + Math.sin(angle) * 50}%`;
            star.style.left = `${50 + Math.cos(angle) * 50}%`;
            star.style.opacity = '0';
            star.style.width = `${size * 3}px`;
            star.style.height = `${size * 3}px`;
        }, 10);
    }
    
    // Back button handling for attack detail page
    const backButton = document.getElementById('back-button');
    if (backButton) {
        backButton.addEventListener('click', function(e) {
            e.preventDefault();
            
            // Add travel effect backwards
            document.querySelector('.space-background').classList.add('time-travel-active');
            createWarpEffect();
            
            try {
                const soundEffect = new Audio('/sounds/space-spaceTravel.mp3');
                soundEffect.volume = 0.5;
                soundEffect.play().catch(err => console.log('Sound could not be played', err));
            } catch (err) {
                console.log('Sound error:', err);
            }
            
            setTimeout(() => {
                window.location.href = this.getAttribute('href');
            }, 2000);
        });
    }

    /**
     * Functions for individual attack pages
     */

    // Initialize attack page if we're on one
    const attackPage = document.querySelector('.cyber-attack-detail');
    if (attackPage) {
        initAttackPage();
    }

    function initAttackPage() {
        // Add typewriter effect to attack description
        const description = document.querySelector('.attack-description');
        if (description) {
            const text = description.textContent;
            description.textContent = '';
            let i = 0;
            const typeInterval = setInterval(() => {
                if (i < text.length) {
                    description.textContent += text.charAt(i);
                    i++;
                } else {
                    clearInterval(typeInterval);
                }
            }, 20);
        }

        // Add event listener for "Travel Back" button
        const backButton = document.getElementById('back-button');
        if (backButton) {
            backButton.addEventListener('click', function(e) {
                e.preventDefault();
                
                // Add the time travel animation in reverse
                const spaceBackground = document.querySelector('.space-background');
                spaceBackground.classList.add('time-travel-active');
                
                // Play space travel sound
                const travelSound = new Audio('/sounds/space-spaceTravel.mp3');
                travelSound.volume = 0.5;
                travelSound.play();
                
                // After animation completes, go back to the time travel hub
                setTimeout(() => {
                    window.location.href = '/game/time-travel';
                }, 5000);
            });
        }
    }
}); 