<!-- articles_page.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/Dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/abonne.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <title>Articles</title>
</head>
<body>
    <div class="dashboard-container">
        @auth
            @if(Auth::user()->rule == 'Subscriber')
                @include('subscriber.sidebar')
            @elseif(Auth::user()->rule == 'Admin')
                @include('admin.sidebar')
            @elseif(Auth::user()->rule == 'Responsable')
                @include('responsable.sidebar')
            @endif
        @else
            <div class="sidebar" id="sidebar">
                <div class="logo-section">
                    <img src="{{ asset('images/HTLogo.png') }}" alt="Logo" class="logo-img">
                </div>
                <button class="toggle-btn" onclick="toggleSidebar()">☰</button>
                <nav class="nav-menu">
                    <div class="nav-item">
                        <a class="sidebarlink" href="{{ route('home') }}">
                            <svg class="nav-icon" viewBox="0 0 24 24">
                                <path fill="currentColor" d="M3 13h8V3H3v10zm0 8h8v-6H3v6zm10 0h8V11h-8v10zm0-18v6h8V3h-8z"/>
                            </svg>
                            <span class="nav-text">Accueil</span>
                        </a>
                    </div>
                    <div class="nav-item">
                        <a class="sidebarlink" href="{{ route('login') }}">
                            <svg class="nav-icon" viewBox="0 0 24 24">
                                <path fill="currentColor" d="M3 13h8V3H3v10zm0 8h8v-6H3v6zm10 0h8V11h-8v10zm0-18v6h8V3h-8z"/>
                            </svg>
                            <span class="nav-text">Login</span>
                        </a>
                    </div>
                </nav>
            </div>
        @endauth

        <div class="main-content">
            <div class="header">
                <a href="{{ route('home') }}" class="back-link">
                    <svg class="nav-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M15 18l-6-6 6-6"/>
                    </svg>
                </a>
                <h1>Articles</h1>

            </div>
            <br>
            <div class="categories-grid">
                @forelse($articles as $article)
                    <a href="{{ route('get_article', ['id' => $article->id]) }}"
                        class="category-card {{ (!Auth::check() && $article->privacy == 0) ? 'disabled' : '' }} articlepath">
                        <div class="article-image">
                            <img src="{{ asset('images/background.jpg') }}" alt="Article Image">
                        </div>
                        <div class="article-content">
                            <h3>{{ $article->title }}</h3>
                            @if($article->description)
                                <p>{{ Str::limit($article->description, 100) }}</p>
                            @endif
                            @if($article->privacy == 0)
                                <div class="privacy-badge">
                                    <span>Subscribers Only</span>
                                </div>
                            @endif
                            <div class="article-meta">
                                <span class="theme-tag">{{ $article->theme->name ?? 'General' }}</span>
                            </div>
                        </div>
                    </a>
                @empty
                    <div class="no-content">
                        <p>No articles found.</p>
                    </div>
                @endforelse
                @auth
                @foreach ($prvt_articles as $prv)
                    <a href="{{ route('get_article', ['id' => $prv->id]) }}"
                        class="category-card articlepath">
                        <div class="article-image">
                            <img src="{{ asset('images/article.png') }}" alt="Article Image">
                        </div>
                        <div class="article-content">
                            <h3>{{ $prv->title }}</h3>
                            @if($prv->description)
                                <p>{{ Str::limit($prv->description, 100) }}</p>
                            @endif
                            @if($prv->privacy == 'private')
                                <div class="privacy-badge">
                                    <span>Subscribers Only</span>
                                </div>
                            @endif
                            <div class="article-meta">
                                <span class="theme-tag">{{ $prv->theme->name ?? 'General' }}</span>
                            </div>
                        </div>
                    </a>
                @endforeach
                @endauth
            </div>
        </div>
    </div>

    <script src="{{ asset('js/Dashboard.js') }}"></script>
</body>
</html>
