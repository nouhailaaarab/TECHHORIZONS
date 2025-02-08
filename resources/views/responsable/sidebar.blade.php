
<div class="sidebar" id="sidebar">
    <button class="toggle-btn" onclick="toggleSidebar()">☰</button>
    <div class="logo-section">
        <img src="{{asset('images/HTLogo.png')}}"  alt="Logo" class="logo-img">
        <span class="logo-text">TechHorizon</span>
    </div>
    <nav class="nav-menu">
        <div class="nav-item">
            <a class="sidebarlink" href="{{ route('home') }}">
                <svg class="nav-icon" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path fill="currentColor" d="M12 3l9 8h-3v8h-4v-5h-4v5H6v-8H3l9-8z" />
                </svg>
                <span class="nav-text">Accueil</span>
            </a>
        </div>
        <div class="nav-item">
            <a class="sidebarlink" href="{{ route('respo_stats') }}">
                <svg class="nav-icon" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path fill="currentColor" d="M3 3h8v8H3V3zm10 0h8v5h-8V3zM3 13h5v8H3v-8zm7 0h8v8h-8v-8z" />
                </svg>
            <span class="nav-text">Dashboard</span>
            </a>
        </div>
        <div class="nav-item">
            <a class="sidebarlink" href="{{ route('get_theme_subs') }}">
                <svg class="nav-icon" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path fill="currentColor" d="M16 11a4 4 0 1 0-4-4 4 4 0 0 0 4 4zm-6 1h12a1 1 0 0 1 1 1v1c0 2-3 4-7 4s-7-2-7-4v-1a1 1 0 0 1 1-1zM6 11a3 3 0 1 0-3-3 3 3 0 0 0 3 3zm0 2c-1.67 0-5 0.84-5 2.5V16a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-.5C11 13.84 7.67 13 6 13z" />
                </svg>
            <span class="nav-text">subscribers</span>
            </a>
        </div>
        <div class="nav-item">
            <a class="sidebarlink" href="{{ route('get_theme_articles') }}">
                <svg class="nav-icon" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path fill="currentColor" d="M6 2a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8l-6-6H6zm7 1.5L18.5 9H13V3.5zM6 20V4h6v6h6v10H6z" />
                </svg>
            <span class="nav-text">Articles</</span>
            </a>
        </div>
        <div class="nav-item">
            <a class="sidebarlink" href="{{ route('dashboard') }}">
                <svg class="nav-icon" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path fill="currentColor" d="M12 12a5 5 0 1 0-5-5 5 5 0 0 0 5 5zm0 2c-3.33 0-10 1.67-10 5v2h20v-2c0-3.33-6.67-5-10-5z" />
                </svg>
                <span class="nav-text">Profile</span>
            </a>
        </div>
        <div class="nav-item">
            <a class="sidebarlink" href="{{ route('logout') }}">
                <svg class="nav-icon" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M17 7l-1.41 1.41L18.17 11H8v2h10.17l-2.58 2.58L17 17l5-5zM4 5h8V3H4c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h8v-2H4V5z"></path>
                </svg>
                <span class="nav-text">logout</span>
            </a>
        </div>
    </nav>
</div>
