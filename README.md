# 🛡️ MYC: Mind Your Click

[![Laravel](https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)](https://laravel.com)
[![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)](https://php.net)
[![Tailwind CSS](https://img.shields.io/badge/Tailwind_CSS-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white)](https://tailwindcss.com)
[![JavaScript](https://img.shields.io/badge/JavaScript-F7DF1E?style=for-the-badge&logo=javascript&logoColor=black)](https://developer.mozilla.org/en-US/docs/Web/JavaScript)

**An interactive educational cybersecurity game for children aged 7-13**

MYC (Mind Your Click) is a comprehensive web-based educational platform designed to teach children about cybersecurity, phishing awareness, and safe online practices through gamification, storytelling, and interactive challenges.

<p align="center">
  <img src="games/public/images/shield-logo.svg" alt="MYC Logo" width="200">
</p>

## 🌟 Key Features

### 🎮 **Multi-Game Learning Platform**
- **Story Mode**: Episodic missions featuring cybersecurity villains and challenges
- **Truth Detective**: Case-based learning with real-world scenario investigations
- **Cyber Time Travel**: Explore famous cyber attacks throughout history
- **Secret Code Decoder**: Learn encryption and decryption fundamentals
- **Interactive Village Hub**: Multiple virtual learning environments

### 🤖 **AI-Powered Learning Assistant**
- **Circuit**: Friendly AI guide providing personalized tips and guidance
- Dynamic feedback system adapting to player progress
- Interactive speech bubbles with contextual cybersecurity advice

### 🏆 **Comprehensive Reward System**
- **Cyber Shield**: Visual progress tracking system
- **Achievement Badges**: Unlockable rewards for completing challenges
- **Trust Points**: Scoring system for Truth Detective cases
- Session-based progress tracking

### 🎯 **Educational Mission Types**

#### 1. **The Mysterious Email Challenge**
- **Villain**: Captain Clickbait
- **Focus**: Phishing email identification
- **Stages**: Multi-stage challenges covering email analysis, link safety, and reporting
- **Skills**: Email authentication, suspicious link detection, social engineering awareness

#### 2. **Password Peril**
- **Villain**: The Key Thief
- **Focus**: Password security and creation
- **Stages**: Password categorization, strength testing, memorable creation, practical login
- **Skills**: Strong password creation, password manager usage, security best practices

#### 3. **Social Media Mayhem**
- **Villain**: Profile Phantom
- **Focus**: Social media safety and fake profile detection
- **Stages**: Fake content identification, hacker maze game, chat safety simulation
- **Skills**: Profile verification, privacy settings, safe communication

### 🕵️ **Truth Detective Cases**
- **Rookie Level**: Basic scam identification for beginners
- **Agent Level**: Intermediate social engineering detection
- **Investigator Level**: Advanced threat analysis
- **Real-world scenarios**: Scholarship scams, fake news detection, impersonation attempts

### ⏰ **Cyber Time Travel**
- Interactive exploration of major cyber attacks:
  - Morris Worm (1988)
  - ILOVEYOU Virus (2000)
  - Stuxnet (2010)
  - WannaCry Ransomware (2017)
  - SolarWinds Attack (2020)
- Educational quizzes and historical context
- Space-themed interface with animations

### 🔐 **Secret Code Academy**
- **Reverse Code**: Learn basic decryption by reading backwards
- **Caesar's Secret**: Master letter-shifting ciphers
- **Symbol Cipher**: Decode symbol-to-letter translations
- Progressive difficulty system

## 🛠️ Technologies Used

### **Backend**
- **Laravel 11**: PHP framework for robust web application development
- **PHP 8.1+**: Server-side scripting and game logic
- **Session Management**: Player progress and state tracking

### **Frontend**
- **Tailwind CSS 4.1.6**: Modern utility-first CSS framework
- **JavaScript (ES6+)**: Interactive game mechanics and animations
- **GSAP 3.13.0**: Advanced animations and transitions
- **Animate.css**: CSS animation library

### **Development Tools**
- **Vite 6.2.4**: Fast build tool and development server
- **Laravel Vite Plugin**: Asset bundling and hot reload
- **Composer**: PHP dependency management
- **NPM**: JavaScript package management

### **Database & Storage**
- **SQLite**: Development database
- **MySQL**: Production database support
- **File-based Sessions**: Game progress storage

## 🚀 Getting Started

### **Prerequisites**
- PHP 8.1 or higher
- Composer (PHP dependency manager)
- Node.js 16+ and NPM
- SQLite or MySQL database

### **Installation**

1. **Clone the repository**
   ```powershell
   git clone https://github.com/your-username/MYC-Mind_Your_Click.git
   cd MYC-Mind_Your_Click/games
   ```

2. **Install PHP dependencies**
   ```powershell
   composer install
   ```

3. **Install JavaScript dependencies**
   ```powershell
   npm install
   ```

4. **Environment setup**
   ```powershell
   Copy-Item .env.example .env
   php artisan key:generate
   ```

5. **Configure database**
   Edit the `.env` file with your database credentials:
   ```env
   DB_CONNECTION=sqlite
   DB_DATABASE=/absolute/path/to/database.sqlite
   ```

6. **Run database migrations**
   ```powershell
   php artisan migrate
   ```

7. **Build frontend assets**
   ```powershell
   npm run build
   # or for development with hot reload:
   npm run dev
   ```

8. **Start the development server**
   ```powershell
   php artisan serve
   ```

9. **Access the application**
   Open your browser and navigate to `http://localhost:8000`

## 📁 Project Structure

```
MYC-Mind_Your_Click/
├── games/                              # Main Laravel application
│   ├── app/
│   │   └── Http/
│   │       └── Controllers/
│   │           └── GameController.php  # Main game logic
│   ├── resources/
│   │   ├── views/                      # Blade templates
│   │   │   └── game/                   # Game-specific views
│   │   ├── css/                        # Stylesheets
│   │   └── js/                         # JavaScript files
│   ├── public/
│   │   ├── images/                     # Game assets and graphics
│   │   ├── audio/                      # Sound effects and music
│   │   ├── css/                        # Compiled stylesheets
│   │   └── js/                         # Game interaction scripts
│   ├── routes/
│   │   └── web.php                     # Application routes
│   ├── database/
│   │   └── migrations/                 # Database schema
│   ├── composer.json                   # PHP dependencies
│   ├── package.json                    # JavaScript dependencies
│   └── vite.config.js                  # Build configuration
├── package.json                        # Root dependencies (GSAP)
├── README.md                           # This file
└── end.txt                             # Project documentation
```

## 🎯 Educational Goals

### **Primary Learning Objectives**
- **Phishing Awareness**: Identify suspicious emails and fake websites
- **Password Security**: Create strong, memorable passwords
- **Social Media Safety**: Recognize fake profiles and scams
- **Critical Thinking**: Evaluate online content for authenticity
- **Digital Literacy**: Understand basic cybersecurity concepts

### **Age-Appropriate Learning**
- **7-9 years**: Basic concepts with visual learning and simple interactions
- **10-11 years**: Intermediate challenges with practical scenarios
- **12-13 years**: Advanced topics with real-world applications

### **Skill Development**
- Pattern recognition in cyber threats
- Safe online communication practices
- Personal information protection
- Incident reporting procedures
- Digital citizenship awareness

## 🎮 Gameplay Features

### **Interactive Elements**
- **Drag-and-drop interfaces** for password strength testing
- **Point-and-click investigations** for Truth Detective cases
- **Arcade-style mini-games** with cybersecurity themes
- **Real-time feedback** on player decisions
- **Progressive difficulty** based on performance

### **Character System**
- **Circuit**: AI companion providing guidance and tips
- **Villain Characters**: Each mission features unique antagonists
  - Captain Clickbait (phishing emails)
  - The Key Thief (password attacks)
  - Profile Phantom (social media deception)
  - Data Gobbler (privacy violations)
  - URL Impersonator (fake websites)

### **Progress Tracking**
- **Session-based progression** preserving player state
- **Visual progress indicators** showing completion status
- **Achievement system** recognizing learning milestones
- **Adaptive content** based on previous performance

## 🛡️ Cybersecurity Topics Covered

### **Email Security**
- Sender verification techniques
- Link analysis and URL inspection
- Attachment safety protocols
- Phishing red flags identification
- Proper reporting procedures

### **Password Management**
- Password strength assessment
- Memorable password creation techniques
- Two-factor authentication awareness
- Password manager usage
- Account security best practices

### **Social Media Safety**
- Profile authenticity verification
- Privacy settings management
- Safe communication guidelines
- Stranger danger online
- Information sharing boundaries

### **General Online Safety**
- Website credibility assessment
- Software download safety
- Public Wi-Fi precautions
- Digital footprint awareness
- Incident response procedures

## 🌐 Browser Compatibility

- **Chrome** 90+ (Recommended)
- **Firefox** 88+
- **Safari** 14+
- **Edge** 90+
- **Mobile browsers** (iOS Safari, Chrome Mobile)

## 📱 Responsive Design

The application is fully responsive and optimized for:
- **Desktop computers** (1920x1080 and above)
- **Laptops** (1366x768 and above)
- **Tablets** (768px and above)
- **Mobile devices** (320px and above)

## 🎨 Asset Attribution

The game uses various educational assets including:
- **Icons**: Flaticon and custom SVG graphics
- **Sounds**: Educational sound effects for feedback
- **Images**: Cybersecurity-themed illustrations
- **Animations**: GSAP-powered smooth transitions

Detailed attribution information can be found in:
- `public/images/README.md`
- `public/sounds/README.md`

## 🤝 Contributing

### **Development Guidelines**
1. Follow Laravel coding standards
2. Maintain educational content accuracy
3. Ensure age-appropriate language and concepts
4. Test across multiple browsers and devices
5. Preserve existing game progress functionality

### **Content Contributions**
- Educational scenario suggestions
- Age-appropriate challenge ideas
- Cybersecurity best practice updates
- Accessibility improvements
- Translation support

## 📄 License

This project is licensed under the **MIT License** - see the LICENSE file for details.

## 🙏 Acknowledgments

- **Cybersecurity Professionals**: Content validation and expert guidance
- **Educational Specialists**: Age-appropriate learning methodology
- **Child Safety Advocates**: Online safety awareness promotion
- **Open Source Community**: Framework and library contributions
- **EUI Hackathon**: Platform for innovative educational solutions

## 📞 Support

For questions, issues, or contributions:
- **Documentation**: Check existing README files in subdirectories
- **Issues**: Create GitHub issues for bug reports or feature requests
- **Educational Feedback**: Contact for content accuracy or appropriateness concerns

---

**Empowering the next generation with cybersecurity awareness through engaging, interactive learning experiences.**

*"Teaching children to Mind Their Click, one game at a time."*
