<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">
</head>
<body>
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
                    <a href=''><button class="btn primary-btn"  >Login</button></a>
                    <a href=''><button class="btn secondary-btn" >Sign Up</button></a>
                </div>
            </div>
        </section>


        <section class="articles-section">
            <h2>Latest Articles</h2>
            <div class="articles-grid">
                <article class="article-card">
                    <div class="article-image">
                        <img src="{{'images/Crunchyroll_logo_2018_vertical.png'}}" alt="Article 1">
                    </div>
                    <div class="article-content">
                        <h3>Article Title 1</h3>
                        <p>Brief description of the article goes here...</p>
                    </div>
                </article>
                <article class="article-card">
                    <div class="article-image">
                        <img src="{{'images/Crunchyroll_logo_2018_vertical.png'}}" alt="Article 3">
                    </div>
                    <div class="article-content">
                        <h3>Article Title 3</h3>
                        <p>Brief description of the article goes here...</p>
                    </div>
                </article>
                <article class="article-card">
                    <div class="article-image">
                        <img src="{{'images/Crunchyroll_logo_2018_vertical.png'}}" alt="Article 3">
                    </div>
                    <div class="article-content">
                        <h3>Article Title 3</h3>
                        <p>Brief description of the article goes here...</p>
                    </div>
                </article>
            </div>
        </section>


        <section class="categories-section">
            <h2>Categories</h2>
            <div class="categories-grid">
                <div class="category-card">
                    <div class="article-image">
                        <img src="{{'images/Crunchyroll_logo_2018_vertical.png'}}" alt="Article 3">
                    </div>
                    <h3>Design</h3>
                </div>
                <div class="category-card">
                    <div class="article-image">
                        <img src="{{'images/Crunchyroll_logo_2018_vertical.png'}}" alt="Article 3">
                    </div>
                    <h3>Technology</h3>
                </div>
                <div class="category-card">
                    <div class="article-image">
                        <img src="{{'images/Crunchyroll_logo_2018_vertical.png'}}" alt="Article 3">
                    </div>
                    <h3>Mobile</h3>
                </div>
            </div>
        </section>
    </main>
    <script src="{{ asset('js/home.js') }}"></script>
</body>
</html>
