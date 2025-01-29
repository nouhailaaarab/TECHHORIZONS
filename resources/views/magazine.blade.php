<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/Dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <title>Article View</title>
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
            <a href="{{ route('magazines') }}" class="back-link">
                <svg class="nav-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M15 18l-6-6 6-6"/>
                </svg>
            </a>
            <h1>N# {{ $magazine->N_magazine }}</h1>
            </div>
            <div class="magazine-container">
            <br>
            <div id="magazineContent" class="magazine-content">
                <p>Created at :{!! nl2br(e($magazine->created_at)) !!}</p>
            </div>
            </div>
            <div class="articles-section">
                <h2>Articles in this Magazine</h2>
                <div class="articles-grid">
                    @foreach($articles as $item)
                        <div class="article-card">
                            <div class="article-content">
                                <img src="{{asset('images/article.png')}}" alt="Article thumbnail" class="article-image" style="width: 100%; height: 200px; object-fit: cover; border-radius: 8px; margin-bottom: 12px;">
                                <h3 class="article-title">{{ $item[0]->title }}</h3>
                                <p class="article-excerpt">{{ Str::limit($item[0]->content, 100) }}</p>
                                <div class="article-meta">
                                    <span class="article-rating">Rating: {{ $item[1] }}</span>
                                    <a href="{{ route('get_article', $item[0]->id) }}" class="read-more-btn">Read More</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>


    <script src="{{ asset('js/Dashboard.js') }}"></script>

</body>
</html>
