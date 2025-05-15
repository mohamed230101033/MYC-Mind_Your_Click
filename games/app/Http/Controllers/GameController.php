<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class GameController extends Controller
{
    /**
     * Show the welcome page
     */
    public function welcome()
    {
        // Reset any existing game session if returning to welcome page
        Session::forget(['player_name', 'current_level', 'shield_level', 'badges', 'completed_missions']);
        
        return view('welcome');
    }
    
    /**
     * Start the game with player name
     */
    public function startGame(Request $request)
    {
        $request->validate([
            'player_name' => 'required|string|max:20',
        ]);
        
        // Store player information in session
        Session::put('player_name', $request->player_name);
        Session::put('current_level', 1);
        Session::put('shield_level', 0);
        Session::put('badges', []);
        Session::put('completed_missions', []);
        
        // Redirect to the game dashboard or intro
        return redirect()->route('game.intro');
    }
    
    /**
     * Show the game introduction
     */
    public function intro()
    {
        $playerName = Session::get('player_name');
        
        if (!$playerName) {
            return redirect()->route('welcome')->with('error', 'Please enter your name first!');
        }
        
        return view('game.intro', ['player_name' => $playerName]);
    }
    
    /**
     * Show the story mode hub
     */
    public function storyMode()
    {
        $playerName = Session::get('player_name');
        $currentLevel = Session::get('current_level', 1);
        $completedMissions = Session::get('completed_missions', []);
        
        if (!$playerName) {
            return redirect()->route('welcome')->with('error', 'Please enter your name first!');
        }
        
        return view('game.story', [
            'player_name' => $playerName,
            'current_level' => $currentLevel,
            'completed_missions' => $completedMissions
        ]);
    }
    
    /**
     * Show a specific story mission
     */
    public function mission($id)
    {
        $playerName = Session::get('player_name');
        
        if (!$playerName) {
            return redirect()->route('welcome')->with('error', 'Please enter your name first!');
        }
        
        // Get mission details (in real app, would come from database)
        $missions = $this->getMissions();
        $mission = collect($missions)->firstWhere('id', $id);
        
        if (!$mission) {
            return redirect()->route('game.story')->with('error', 'Mission not found!');
        }
        
        // For Social Media Mayhem (mission 3), check if missions 1 and 2 are completed
        if ((int)$id === 3) {
            $completedMissions = Session::get('completed_missions', []);
            if (!in_array(1, $completedMissions) || !in_array(2, $completedMissions)) {
                return redirect()->route('game.story')
                    ->with('error', 'You need to complete "The Mysterious Email" and "Password Peril" missions first!');
            }
        }
        
        return view('game.mission', [
            'player_name' => $playerName,
            'mission' => $mission
        ]);
    }
    
    /**
     * Handle mission submissions
     */
    public function submitMission(Request $request, $id)
    {
        $playerName = Session::get('player_name');
        
        if (!$playerName) {
            return redirect()->route('welcome')->with('error', 'Please enter your name first!');
        }
        
        // Get mission details
        $missions = $this->getMissions();
        $mission = collect($missions)->firstWhere('id', (int)$id);
        
        if (!$mission) {
            return redirect()->route('game.story')->with('error', 'Mission not found!');
        }
        
        // Handle different mission submissions based on ID
        switch ((int)$id) {
            case 1: // The Mysterious Email
                // Check if we're using the new multi-stage phishing challenge
                if ($request->has('phishing_stage1_complete')) {
                    // Get data from the enhanced phishing challenge
                    $phishingStage1Complete = (bool) $request->input('phishing_stage1_complete', 0);
                    $phishingStage2Complete = (bool) $request->input('phishing_stage2_complete', 0);
                    $phishingStage3Complete = (bool) $request->input('phishing_stage3_complete', 0);
                    $phishingStage4Complete = (bool) $request->input('phishing_stage4_complete', 0);
                    $totalPhishingScore = (int) $request->input('total_phishing_score', 0);
                    
                    // Calculate stage completion and score
                    $stagesCompleted = ($phishingStage1Complete ? 1 : 0) + 
                                      ($phishingStage2Complete ? 1 : 0) + 
                                      ($phishingStage3Complete ? 1 : 0) + 
                                      ($phishingStage4Complete ? 1 : 0);
                    
                    // Maximum possible score is 23 (6 + 5 + 5 + 7)
                    $maxScore = 23;
                    $percentage = ($totalPhishingScore / $maxScore) * 100;
                    
                    // Increase shield level based on score and stages completed
                    $shieldLevel = Session::get('shield_level', 0);
                    $increase = 0;
                    
                    if ($percentage >= 90 && $stagesCompleted >= 4) {
                        $increase = 5; // Excellent - completed all stages with high score
                        $message = "Outstanding! You're a phishing detection expert! You completed all stages with a nearly perfect score!";
                    } elseif ($percentage >= 75 && $stagesCompleted >= 3) {
                        $increase = 4; // Very good - completed most stages with good score
                        $message = "Great job! You've mastered multiple types of phishing detection and scored very well!";
                    } elseif ($percentage >= 60 && $stagesCompleted >= 2) {
                        $increase = 3; // Good - completed at least 2 stages with decent score
                        $message = "Good work! You've learned to spot phishing in different contexts!";
                    } elseif ($percentage >= 40 && $stagesCompleted >= 1) {
                        $increase = 2; // Decent - completed at least basics with okay score
                        $message = "Nice effort! You're learning the basics of phishing detection.";
                    } else {
                        $increase = 1; // Completed something
                        $message = "You've taken your first steps in learning to spot phishing attempts!";
                    }
                    
                    Session::put('shield_level', $shieldLevel + $increase);
                    
                    // Add to completed missions if not already completed
                    $completedMissions = Session::get('completed_missions', []);
                    if (!in_array($id, $completedMissions)) {
                        $completedMissions[] = $id;
                        Session::put('completed_missions', $completedMissions);
                    }
                    
                    // Check if player earned a badge - enhanced badge for multi-stage completion
                    $earnedBadge = false;
                    $newShieldLevel = $shieldLevel + $increase;
                    
                    if (($stagesCompleted >= 4) && !in_array('phishing_master', Session::get('badges', []))) {
                        $badges = Session::get('badges', []);
                        $badges[] = 'phishing_master';
                        Session::put('badges', $badges);
                        $earnedBadge = 'phishing_master';
                    } elseif (($newShieldLevel >= 5) && !in_array('phishing_expert', Session::get('badges', []))) {
                        $badges = Session::get('badges', []);
                        $badges[] = 'phishing_expert';
                        Session::put('badges', $badges);
                        $earnedBadge = 'phishing_expert';
                    }
                    
                    if ($earnedBadge) {
                        return redirect()->route('game.story')
                            ->with('success', $message . ' You earned a new badge!')
                            ->with('badge', $earnedBadge);
                    }
                    
                    return redirect()->route('game.story')
                        ->with('success', $message . ' Shield level increased by ' . $increase . '!');
                }
                
                // Legacy code for the original phishing challenge
                $clues = $request->input('clues', []);
                $action = $request->input('action');
                
                $correctClues = ['sender', 'urgency', 'spelling', 'prize', 'link'];
                $correctAction = 'report';
                
                $score = 0;
                
                // Calculate score based on clues found (1 point each)
                foreach ($correctClues as $clue) {
                    if (in_array($clue, $clues)) {
                        $score++;
                    }
                }
                
                // Add 5 points for the correct action
                if ($action === $correctAction) {
                    $score += 5;
                }
                
                // Maximum score is 10 points
                $maxScore = 10;
                $percentage = ($score / $maxScore) * 100;
                
                // Increase shield level based on score
                $shieldLevel = Session::get('shield_level', 0);
                $increase = 0;
                
                if ($percentage >= 90) {
                    $increase = 3; // Excellent
                    $message = "Excellent work! You spotted all the signs of phishing.";
                } elseif ($percentage >= 70) {
                    $increase = 2; // Good
                    $message = "Good job! You caught most of the phishing clues.";
                } elseif ($percentage >= 50) {
                    $increase = 1; // Okay
                    $message = "Not bad, but you missed some important phishing signs.";
                } else {
                    $increase = 0; // Needs improvement
                    $message = "You need more practice spotting phishing attempts.";
                }
                
                Session::put('shield_level', $shieldLevel + $increase);
                
                // Add to completed missions if not already completed
                $completedMissions = Session::get('completed_missions', []);
                if (!in_array($id, $completedMissions)) {
                    $completedMissions[] = $id;
                    Session::put('completed_missions', $completedMissions);
                }
                
                // Check if player earned a badge
                $earnedBadge = false;
                $newShieldLevel = $shieldLevel + $increase;
                
                if (($newShieldLevel >= 5) && !in_array('phishing_expert', Session::get('badges', []))) {
                    $badges = Session::get('badges', []);
                    $badges[] = 'phishing_expert';
                    Session::put('badges', $badges);
                    $earnedBadge = 'phishing_expert';
                }
                
                if ($earnedBadge) {
                    return redirect()->route('game.story')
                        ->with('success', $message . ' You earned a new badge!')
                        ->with('badge', $earnedBadge);
                }
                
                return redirect()->route('game.story')
                    ->with('success', $message . ' Shield level increased by ' . $increase . '!');
                
            case 2: // Password Peril
                // Get data from form
                $stage1Complete = (bool) $request->input('stage1_complete', 0);
                $stage2Complete = (bool) $request->input('stage2_complete', 0); 
                $stage3Complete = (bool) $request->input('stage3_complete', 0);
                $stage4Complete = (bool) $request->input('stage4_complete', 0);
                $passwordScore = (int) $request->input('password_score', 0);
                $finalPassword = $request->input('final_password', '');
                
                // Calculate overall score
                $score = 0;
                
                // Add points for each completed stage
                if ($stage1Complete) $score += 2;
                if ($stage2Complete) $score += 3;
                if ($stage3Complete) $score += 3;
                if ($stage4Complete) $score += 7; // Google login confirmation gets the most points
                
                // Add bonus points for password strength (0-5)
                $score += min($passwordScore, 5);
                
                // Maximum score is 20 points
                $maxScore = 20;
                $percentage = ($score / $maxScore) * 100;
                
                // Increase shield level based on score
                $shieldLevel = Session::get('shield_level', 0);
                $increase = 0;
                
                if ($percentage >= 90) {
                    $increase = 4; // Excellent
                    $message = "Outstanding! You're a password security master. Your strong, memorable password and successful login prove you know how to protect your accounts.";
                } elseif ($percentage >= 75) {
                    $increase = 3; // Very Good
                    $message = "Great job! You've created a strong password and successfully completed the security verification process.";
                } elseif ($percentage >= 60) {
                    $increase = 2; // Good
                    $message = "Good work! Your password skills are getting stronger, but there's still room for improvement.";
                } elseif ($percentage >= 40) {
                    $increase = 1; // Okay
                    $message = "Not bad, but you need more practice with creating and remembering strong passwords.";
                } else {
                    $increase = 0; // Needs improvement
                    $message = "Keep practicing creating stronger passwords! Remember that your online security depends on good password habits.";
                }
                
                Session::put('shield_level', $shieldLevel + $increase);
                
                // Add to completed missions if not already completed
                $completedMissions = Session::get('completed_missions', []);
                if (!in_array($id, $completedMissions)) {
                    $completedMissions[] = $id;
                    Session::put('completed_missions', $completedMissions);
                }
                
                // Check if player earned a badge
                $earnedBadge = false;
                $newShieldLevel = $shieldLevel + $increase;
                
                if ($stage4Complete && !in_array('password_master', Session::get('badges', []))) {
                    $badges = Session::get('badges', []);
                    $badges[] = 'password_master';
                    Session::put('badges', $badges);
                    $earnedBadge = 'password_master';
                }
                
                if ($earnedBadge) {
                    return redirect()->route('game.story')
                        ->with('success', $message . ' You earned the Password Master badge!')
                        ->with('badge', $earnedBadge);
                }
                
                return redirect()->route('game.story')
                    ->with('success', $message . ' Shield level increased by ' . $increase . '!');
                
            case 3: // Social Media Mayhem
                if ($request->has('social_media_complete')) {
                    // Get the score from the social media challenge
                    $socialMediaScore = (int) $request->input('social_media_score', 0);
                    
                    // Calculate shield level increase based on score
                    $shieldLevel = Session::get('shield_level', 0);
                    $increase = 0;
                    
                    // Maximum score is 5
                    if ($socialMediaScore >= 5) {
                        $increase = 5; // Perfect score
                        $message = "Outstanding! You're a social media safety expert! You've learned how to spot fake groups and avoid sharing personal information.";
                    } elseif ($socialMediaScore >= 4) {
                        $increase = 4; // Excellent score
                        $message = "Great job! You've mastered most of the social media safety skills!";
                    } elseif ($socialMediaScore >= 3) {
                        $increase = 3; // Good score
                        $message = "Good work! You're learning how to stay safe on social media!";
                    } elseif ($socialMediaScore >= 2) {
                        $increase = 2; // Decent score
                        $message = "Nice effort! You're understanding some social media dangers.";
                    } else {
                        $increase = 1; // At least they completed it
                        $message = "You've taken your first steps in learning social media safety!";
                    }
                    
                    Session::put('shield_level', $shieldLevel + $increase);
                    
                    // Add to completed missions if not already completed
                    $completedMissions = Session::get('completed_missions', []);
                    if (!in_array($id, $completedMissions)) {
                        $completedMissions[] = $id;
                        Session::put('completed_missions', $completedMissions);
                    }
                    
                    // Check if player earned a badge
                    $earnedBadge = false;
                    $newShieldLevel = $shieldLevel + $increase;
                    
                    if (($socialMediaScore >= 4) && !in_array('social_expert', Session::get('badges', []))) {
                        $badges = Session::get('badges', []);
                        $badges[] = 'social_expert';
                        Session::put('badges', $badges);
                        $earnedBadge = 'social_expert';
                    }
                    
                    if ($earnedBadge) {
                        return redirect()->route('game.story')
                            ->with('success', $message . ' You earned a new badge!')
                            ->with('badge', $earnedBadge);
                    }
                    
                    return redirect()->route('game.story')
                        ->with('success', $message . ' Shield level increased by ' . $increase . '!');
                }
                
                return redirect()->route('game.story')
                    ->with('error', 'Challenge not completed properly.');
                
            default:
                return redirect()->route('game.story')
                    ->with('success', 'Mission completed!');
        }
    }
    
    /**
     * Show the cyber village
     */
    public function village()
    {
        $playerName = Session::get('player_name');
        
        if (!$playerName) {
            return redirect()->route('welcome')->with('error', 'Please enter your name first!');
        }
        
        $locations = [
            [
                'id' => 'home',
                'name' => 'Home',
                'description' => 'Practice staying safe at home online',
                'icon' => 'home'
            ],
            [
                'id' => 'school',
                'name' => 'School',
                'description' => 'Learn about digital safety at school',
                'icon' => 'academic-cap'
            ],
            [
                'id' => 'game-shop',
                'name' => 'Game Shop',
                'description' => 'Spot scams in online game stores',
                'icon' => 'puzzle-piece'
            ],
            [
                'id' => 'social-park',
                'name' => 'Social Park',
                'description' => 'Navigate social media dangers safely',
                'icon' => 'users'
            ]
        ];
        
        return view('game.village', [
            'player_name' => $playerName,
            'locations' => $locations
        ]);
    }
    
    /**
     * Show the fake vs real challenge mode
     */
    public function challenge()
    {
        $playerName = Session::get('player_name');
        
        if (!$playerName) {
            return redirect()->route('welcome')->with('error', 'Please enter your name first!');
        }
        
        // Get a random challenge
        $challenges = $this->getChallenges();
        $challenge = $challenges[array_rand($challenges)];
        
        return view('game.challenge', [
            'player_name' => $playerName,
            'challenge' => $challenge
        ]);
    }
    
    /**
     * Handle challenge submission
     */
    public function submitChallenge(Request $request)
    {
        $request->validate([
            'challenge_id' => 'required|integer',
            'answer' => 'required|string',
        ]);
        
        $challenges = $this->getChallenges();
        $challenge = collect($challenges)->firstWhere('id', $request->challenge_id);
        
        if (!$challenge) {
            return redirect()->route('game.challenge')->with('error', 'Challenge not found!');
        }
        
        $isCorrect = $request->answer === $challenge['correct_answer'];
        
        if ($isCorrect) {
            // Increase shield level
            $shieldLevel = Session::get('shield_level', 0);
            Session::put('shield_level', $shieldLevel + 1);
            
            // Check if player earned a badge
            if (($shieldLevel + 1) % 5 === 0) {
                $badges = Session::get('badges', []);
                $badges[] = 'level_' . (($shieldLevel + 1) / 5);
                Session::put('badges', $badges);
                
                return redirect()->route('game.challenge')
                    ->with('success', 'Correct! You earned a new badge!')
                    ->with('badge', 'level_' . (($shieldLevel + 1) / 5));
            }
            
            return redirect()->route('game.challenge')
                ->with('success', 'Correct! Your cyber shield got stronger!');
        }
        
        return redirect()->route('game.challenge')
            ->with('error', 'That\'s not right. Try again!')
            ->with('explanation', $challenge['explanation']);
    }
    
    /**
     * Show the Cyber Time Travel page
     */
    public function timeTravel()
    {
        $playerName = Session::get('player_name');
        
        return view('game.time-travel', [
            'player_name' => $playerName,
            'cyberAttacks' => $this->getCyberAttacks()
        ]);
    }
    
    /**
     * Show details for a specific cyber attack
     */
    public function timeTravelAttack($attack)
    {
        $playerName = Session::get('player_name');
        $cyberAttacks = $this->getCyberAttacks();
        
        $attackDetails = collect($cyberAttacks)->firstWhere('id', $attack);
        
        if (!$attackDetails) {
            return redirect()->route('game.time-travel')->with('error', 'This cyber attack is not in our records.');
        }
        
        // Get the chronological order of attacks
        $attackOrder = ['morris-worm', 'i-love-you', 'stuxnet', 'wannacry', 'solarwinds'];
        
        // Find current attack index
        $currentIndex = array_search($attack, $attackOrder);
        
        // Get previous and next attack IDs
        $previousAttack = ($currentIndex > 0) ? $attackOrder[$currentIndex - 1] : null;
        $nextAttack = ($currentIndex < count($attackOrder) - 1) ? $attackOrder[$currentIndex + 1] : null;
        
        return view('game.time-travel-attack', [
            'player_name' => $playerName,
            'attack' => $attackDetails,
            'previousAttack' => $previousAttack,
            'nextAttack' => $nextAttack
        ]);
    }
    
    /**
     * Get all missions data (this would normally come from a database)
     */
    private function getMissions()
    {
        return [
            [
                'id' => 1,
                'title' => 'The Mysterious Email',
                'villain' => 'Captain Clickbait',
                'description' => 'Captain Clickbait is sending strange emails with tempting offers. Can you spot the tricks?',
                'level' => 1,
                'difficulty' => 'Easy'
            ],
            [
                'id' => 2,
                'title' => 'Password Peril',
                'villain' => 'The Key Thief',
                'description' => 'The Key Thief wants to crack your passwords! Learn how to create strong passwords.',
                'level' => 1,
                'difficulty' => 'Easy'
            ],
            [
                'id' => 3,
                'title' => 'Social Media Mayhem',
                'villain' => 'Profile Phantom',
                'description' => 'Profile Phantom is creating fake accounts to trick kids. Can you spot the fakes?',
                'level' => 2,
                'difficulty' => 'Medium'
            ],
            [
                'id' => 4,
                'title' => 'The App Trap',
                'villain' => 'Data Gobbler',
                'description' => 'Data Gobbler creates apps that collect too much information. Learn what to watch out for!',
                'level' => 2,
                'difficulty' => 'Medium'
            ],
            [
                'id' => 5,
                'title' => 'Website Wonderland',
                'villain' => 'The URL Impersonator',
                'description' => 'The URL Impersonator creates fake websites that look real. Can you tell the difference?',
                'level' => 3,
                'difficulty' => 'Hard'
            ],
        ];
    }
    
    /**
     * Get all challenges data (this would normally come from a database)
     */
    private function getChallenges()
    {
        return [
            [
                'id' => 1,
                'title' => 'Spot the Phishing Email',
                'description' => 'Which of these emails is trying to trick you?',
                'fake_content' => 'URGENT: Your account will be deleted! Click here to login immediately: secure-account-verify.com',
                'real_content' => 'Your monthly newsletter from Kids Science Magazine. Check out our dinosaur facts!',
                'correct_answer' => 'fake',
                'explanation' => 'The fake email creates urgency and fear, has a suspicious link, and doesn\'t address you by name.'
            ],
            [
                'id' => 2,
                'title' => 'Secure Website?',
                'description' => 'Which website address (URL) is safer to visit?',
                'fake_content' => 'http://amazom.com/games-sale',
                'real_content' => 'https://amazon.com/games',
                'correct_answer' => 'real',
                'explanation' => 'The real URL has "https" (secure) and the correct spelling of Amazon. The fake one misspelled Amazon (amazom) and uses "http" which is less secure.'
            ],
            [
                'id' => 3,
                'title' => 'App Permissions',
                'description' => 'Which app request seems suspicious?',
                'fake_content' => 'This flashlight app needs access to your contacts, location, and camera',
                'real_content' => 'This drawing app needs access to storage and camera',
                'correct_answer' => 'fake',
                'explanation' => 'A flashlight app should only need access to your camera flash. It doesn\'t need your contacts or location to work properly.'
            ],
        ];
    }
    
    /**
     * Get cyber attacks data for time travel feature.
     */
    private function getCyberAttacks()
    {
        return [
            'morris-worm' => [
                'id' => 'morris-worm',
                'name' => 'Morris Worm',
                'date' => 'November 2, 1988',
                'image' => 'images/cyber-attacks/morris-worm.jpg',
                'description' => '<p>The Morris Worm was one of the first recognized computer worms distributed via the Internet, and the first to gain significant attention. It was written by Robert Tappan Morris, a student at Cornell University.</p><p>The worm exploited vulnerabilities in UNIX sendmail, finger, and rsh/rexec, as well as weak passwords. It was originally designed to gauge the size of the internet by infecting UNIX systems and asking them to report back. However, a design flaw caused the worm to replicate uncontrollably, causing denial of service attacks.</p>',
                'impact' => '<p>The Morris Worm infected approximately 6,000 computers (about 10% of the internet at that time). It caused computers to slow down to the point of being unusable, effectively shutting down much of the internet for several days.</p><p>It is estimated to have caused between $100,000 and $10 million in damages due to lost access to the internet and the cost of eradicating the worm. The incident led to the formation of the Computer Emergency Response Team (CERT), which is still active today in coordinating responses to large-scale cyber threats.</p>',
                'protection' => '<p>To protect against similar attacks today:</p><ul><li>Keep systems up-to-date with security patches</li><li>Use strong passwords</li><li>Implement network segmentation</li><li>Deploy intrusion detection systems</li><li>Use firewalls to filter network traffic</li></ul>',
                'created_by' => 'Robert Tappan Morris, a Cornell University graduate student',
                'target' => 'UNIX systems connected to the early internet',
                'damage' => 'An estimated $100,000-$10 million in system downtime and cleanup',
                'method' => 'Exploited vulnerabilities in sendmail, finger, and rsh/rexec',
                'significance' => 'First major internet worm; led to creation of CERT',
                'threat_level' => 'High',
                'quiz' => [
                    'question' => 'What was unique about the Morris Worm compared to modern malware?',
                    'options' => [
                        'It was designed to steal financial information',
                        'It was not intended to cause damage but a flaw caused it to spread uncontrollably',
                        'It targeted military infrastructure specifically',
                        'It was created by a nation-state actor'
                    ],
                    'correct_answer' => 1
                ]
            ],
            'i-love-you' => [
                'id' => 'i-love-you',
                'name' => 'ILOVEYOU Virus',
                'date' => 'May 4, 2000',
                'image' => 'images/cyber-attacks/i-love-you.jpg',
                'description' => '<p>The ILOVEYOU virus, also known as the "Love Bug," was a computer worm that attacked tens of millions of Windows computers when it was first released. It started spreading as an email message with the subject line "ILOVEYOU" and an attachment named "LOVE-LETTER-FOR-YOU.TXT.vbs".</p><p>When the attachment was opened, the malicious VBScript code would send copies of itself to all contacts in the victim\'s Microsoft Outlook address book and make harmful changes to the victim\'s system, including overwriting image files.</p>',
                'impact' => '<p>The ILOVEYOU virus infected over 50 million computers worldwide in just 10 days. It caused an estimated $5.5-8.7 billion in damages. It essentially brought email systems around the world to a halt as companies and governments shut down their email to prevent infection.</p><p>Notable organizations affected included the British Parliament, the Pentagon, and even major corporations like Ford Motor Company. The incident highlighted how vulnerable systems were to social engineering attacks, as users readily opened the attachment thinking it was from someone they knew.</p>',
                'protection' => '<p>To protect against similar attacks today:</p><ul><li>Never open email attachments from unknown senders</li><li>Be suspicious of unexpected attachments, even from known senders</li><li>Use up-to-date antivirus software</li><li>Disable automatic script execution in email clients</li><li>Apply user awareness training to recognize phishing attempts</li></ul>',
                'created_by' => 'Onel de Guzman, a computer science student from the Philippines',
                'target' => 'Windows computers with Microsoft Outlook',
                'damage' => 'An estimated $5.5-8.7 billion in damages',
                'method' => 'Email attachment with malicious VBScript that self-replicated',
                'significance' => 'One of the most damaging and widespread computer viruses in history',
                'threat_level' => 'Severe',
                'quiz' => [
                    'question' => 'What file extension did the ILOVEYOU virus use to trick users?',
                    'options' => [
                        '.exe',
                        '.doc',
                        '.vbs',
                        '.zip'
                    ],
                    'correct_answer' => 2
                ]
            ],
            'stuxnet' => [
                'id' => 'stuxnet',
                'name' => 'Stuxnet',
                'date' => 'June 2010',
                'image' => 'images/cyber-attacks/stuxnet.jpg',
                'description' => '<p>Stuxnet was one of the first computer malware programs known to target industrial control systems, specifically those used in Iran\'s uranium enrichment facilities. It was a highly sophisticated computer worm believed to have been created by the United States and Israel.</p><p>The malware specifically targeted Siemens SCADA systems and programmable logic controllers (PLCs). It exploited multiple zero-day vulnerabilities and used stolen digital certificates to appear legitimate. Once Stuxnet infected a system, it would look for specific industrial control hardware connected to centrifuge motors.</p>',
                'impact' => '<p>Stuxnet is believed to have destroyed nearly one-fifth of Iran\'s nuclear centrifuges by causing them to spin out of control while displaying normal operational data to monitoring systems. This physical destruction of equipment by malware was unprecedented.</p><p>Beyond the immediate damage, Stuxnet marked a new era in cyber warfare. It demonstrated that cyber attacks could cause real-world physical damage to critical infrastructure. The code itself has since been studied and repurposed by other threat actors, increasing the risk to industrial systems worldwide.</p>',
                'protection' => '<p>To protect against similar attacks today:</p><ul><li>Implement air-gapped networks for critical systems</li><li>Use application whitelisting on industrial control systems</li><li>Deploy specialized industrial control system security monitoring</li><li>Regularly audit physical access to control systems</li><li>Establish robust change management procedures</li></ul>',
                'created_by' => 'Believed to be a joint effort between the United States and Israel',
                'target' => 'Iran\'s nuclear program, specifically uranium enrichment centrifuges',
                'damage' => 'Destroyed approximately 1,000 IR-1 centrifuges at Natanz nuclear facility',
                'method' => 'Zero-day exploits, stolen digital certificates, and targeting of PLCs',
                'significance' => 'First known malware to cause physical destruction; changed cyber warfare',
                'threat_level' => 'Critical',
                'quiz' => [
                    'question' => 'What made Stuxnet fundamentally different from previous malware?',
                    'options' => [
                        'It was the first malware to use encryption',
                        'It was designed to cause physical damage to equipment',
                        'It was the first malware to spread via email',
                        'It was the first malware to target Windows systems'
                    ],
                    'correct_answer' => 1
                ]
            ],
            'wannacry' => [
                'id' => 'wannacry',
                'name' => 'WannaCry Ransomware',
                'date' => 'May 12, 2017',
                'image' => 'images/cyber-attacks/wannacry.jpg',
                'description' => '<p>WannaCry was a worldwide ransomware attack that targeted computers running Microsoft Windows by encrypting data and demanding ransom payments in Bitcoin cryptocurrency. The attack began on May 12, 2017, and within a day had infected more than 230,000 computers in over 150 countries.</p><p>The ransomware exploited the EternalBlue vulnerability in Microsoft\'s Server Message Block (SMB) protocol. This exploit had been discovered and developed by the U.S. National Security Agency (NSA) but was leaked by a group called The Shadow Brokers a month before the attack.</p>',
                'impact' => '<p>WannaCry infected over 230,000 computers across 150 countries. Major organizations affected included the National Health Service (NHS) in the UK, FedEx, Telefónica, and many others. The estimated damages ranged from hundreds of millions to billions of dollars.</p><p>The attack was particularly impactful on healthcare systems, with the NHS having to cancel appointments and surgeries. It highlighted the critical importance of timely security patching, as Microsoft had released a patch for the EternalBlue vulnerability two months before the attack, but many organizations had not applied it.</p>',
                'protection' => '<p>To protect against similar attacks today:</p><ul><li>Keep operating systems and software up-to-date with security patches</li><li>Maintain regular, air-gapped backups of critical data</li><li>Implement network segmentation to prevent lateral movement</li><li>Deploy ransomware-specific protection tools</li><li>Conduct regular security awareness training for all staff</li></ul>',
                'created_by' => 'Lazarus Group, believed to be linked to North Korea',
                'target' => 'Windows systems vulnerable to the EternalBlue exploit',
                'damage' => 'Estimated damages of $4-8 billion globally',
                'method' => 'Exploitation of EternalBlue vulnerability in SMB protocol',
                'significance' => 'Largest ransomware attack at the time; changed how organizations view patching',
                'threat_level' => 'Critical',
                'quiz' => [
                    'question' => 'Which vulnerability did WannaCry exploit?',
                    'options' => [
                        'Heartbleed',
                        'EternalBlue',
                        'Shellshock',
                        'Meltdown'
                    ],
                    'correct_answer' => 1
                ]
            ],
            'solarwinds' => [
                'id' => 'solarwinds',
                'name' => 'SolarWinds Supply Chain Attack',
                'date' => 'December 2020',
                'image' => 'images/cyber-attacks/solarwinds.jpg',
                'description' => '<p>The SolarWinds attack was a sophisticated supply chain attack that inserted malicious code into SolarWinds\' Orion software system. The attackers gained access to SolarWinds\' build system and inserted malware (SUNBURST) into Orion software updates that were distributed to thousands of customers between March and June 2020.</p><p>When organizations installed these legitimate-seeming updates, they unknowingly installed a backdoor that allowed the attackers to access their systems. The attack was particularly sophisticated, using advanced evasion techniques and carefully targeting specific high-value victims for additional exploitation.</p>',
                'impact' => '<p>Around 18,000 organizations installed the compromised updates, including many U.S. government agencies such as the Treasury Department, Department of Homeland Security, and the Pentagon. Also affected were major companies like Microsoft, Cisco, and FireEye (which first discovered the breach).</p><p>The attack gave the perpetrators access to sensitive government and corporate networks for up to nine months before discovery. The full extent of data exfiltration may never be known, but the breach is considered one of the most significant cyber espionage campaigns ever conducted against the United States.</p>',
                'protection' => '<p>To protect against similar supply chain attacks today:</p><ul><li>Implement a zero-trust security model</li><li>Verify the integrity of software updates</li><li>Monitor network traffic for unusual patterns</li><li>Enforce principle of least privilege for all accounts</li><li>Conduct security assessments of third-party vendors</li></ul>',
                'created_by' => 'APT29 (Cozy Bear), believed to be Russian intelligence (SVR)',
                'target' => 'Government agencies and major corporations via SolarWinds Orion software',
                'damage' => 'Billions in remediation costs and untold intelligence value to attackers',
                'method' => 'Supply chain attack via trojanized software updates',
                'significance' => 'Demonstrated vulnerability of software supply chains; changed security practices',
                'threat_level' => 'Critical',
                'quiz' => [
                    'question' => 'What made the SolarWinds attack particularly dangerous?',
                    'options' => [
                        'It encrypted all victim data like ransomware',
                        'It was delivered through legitimate software updates from a trusted vendor',
                        'It targeted home users primarily',
                        'It spread automatically between networks without human intervention'
                    ],
                    'correct_answer' => 1
                ]
            ]
        ];
    }
} 