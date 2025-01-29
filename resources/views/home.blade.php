<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">
    <link href="{{ asset('css/navbar.css') }}" rel="stylesheet">
</head>
<body>
    @include('navbar')
    <main class="home-container">
        
        <section class="hero-section">
            <div class="animated-background">
                <div class="shape shape1"></div>
                <div class="shape shape2"></div>
                <div class="shape shape3"></div>
            </div>
            <div class="hero-content">
                <h1>Welcome to Our Platform</h1>
                <p>Discover amazing content and connect with others</p>
                <div class="hero-buttons">
                @guest
                    <a href='{{ route('login') }}'><button class="btn primary-btn"   >Login</button></a>
                    <a href='{{ route('register')}}'><button class="btn secondary-btn" >Sign Up</button></a>
                @endguest
                @auth
                    <a href='{{ route('dashboard') }}'><button class="btn primary-btn"   >Dashboard</button></a>
                    <a href='{{ route('logout') }}'><button class="btn primary-btn"   >Logout</button></a>
                </div>
                @endauth

            </div>
        </section>


        <section class="categories-section">
            <h2>Themes</h2>
            <div class="categories-grid">
                <div class="category-card">
                    <div class="article-image">
                        <img src="{{'images/net.jpg'}}" alt="Article 3">
                    </div>
                    <h3>IoT</h3>
                </div>
                <div class="category-card">
                    <div class="article-image">
                        <img src="{{'images/it.jpg'}}" alt="Article 3">
                    </div>
                    <h3>IT</h3>
                </div>
                <div class="category-card">
                    <div class="article-image">
                        <img src="{{'images/security.jpg'}}" alt="Article 3">
                    </div>
                    <h3>Security</h3>
                </div>
            </div>
        </section>
    </main>
    
</body>
</html>
