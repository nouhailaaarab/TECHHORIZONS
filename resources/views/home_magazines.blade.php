<!-- magazines_page.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/Dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/abonne.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <title>Magazines</title>
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
                <h1>Magazines</h1>
            </div>
            <br>
            
            <div class="categories-grid">

                @forelse($public_magazines as $magazine)
                    @auth
                        <a href="{{ route('get_magazine', ['id' => $magazine->id]) }}"
                           class="category-card articlepath {{ Auth::user()->rule == 'just_created' ? 'disabled' : '' }}">
                    @else
                        <a href="{{ route('login') }}" class="category-card articlepath">
                    @endauth
                        <div class="article-image">
                            <img src="{{ asset('images/article.png') }}" alt="Magazine Cover">
                        </div>
                        <div class="article-content">
                            <h3>Numeroº {{ $magazine->N_magazine }}</h3>
                            <h5>{{ $magazine->articles->count() }} articles</h5>
                        </div>
                    </a>
                @empty
                    @if(!Auth::check() || count($private_magazines) == 0)
                        <div class="no-content">
                            <p>No magazines found.</p>
                        </div>
                    @endif
                @endforelse

                @auth
                    @if(Auth::user()->rule != 'just_created')
                        @foreach($private_magazines as $magazine)
                            <a href="{{ route('get_magazine', ['id' => $magazine->id]) }} "
                               class="category-card articlepath ">
                                <div class="article-image">
                                    <img src="{{ asset('images/article.png') }}" alt="Magazine Cover">
                                </div>
                                <div class="article-content">
                                    <h3>Numeroº {{ $magazine->N_magazine }}</h3>
                                    <h5>{{ $magazine->articles->count() }} articles</h5>
                                </div>
                            </a>
                        @endforeach
                    @endif
                @endauth
            </div>
        </div>
    </div>

    <script src="{{ asset('js/Dashboard.js') }}"></script>
</body>
</html>
