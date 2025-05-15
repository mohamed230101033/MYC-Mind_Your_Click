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
} 