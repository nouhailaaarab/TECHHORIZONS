<div class="sidebar" id="sidebar">
    <button class="toggle-btn" onclick="toggleSidebar()">☰</button>
    <div class="logo-section">
        <img src="{{asset('images/HTLogo.png')}}" alt="Logo" class="logo-img">
        <span class="logo-text">HorizonTech</span>
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
        <div class="nav-item active">
            <a class="sidebarlink" href="{{ route('dashboard') }}">
                <svg class="nav-icon" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path fill="currentColor" d="M12 12a5 5 0 1 1 0-10 5 5 0 0 1 0 10zm0 2c-3.33 0-10 1.67-10 5v2h20v-2c0-3.33-6.67-5-10-5z" />
                </svg>
                <span class="nav-text">Profile</span>
            </a>
        </div>
        <div class="nav-item">
            <a class="sidebarlink" href="{{ route('get_themes') }}">
                <svg class="nav-icon" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path fill="currentColor" d="M3 2h18a1 1 0 0 1 1 1v18a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3a1 1 0 0 1 1-1zm9 13a4 4 0 1 0 0-8 4 4 0 0 0 0 8zm0 2c-3.33 0-10 1.67-10 5v2h20v-2c0-3.33-6.67-5-10-5z" />
                </svg>
                <span class="nav-text">Themes</span>
            </a>
        </div>
        <div class="nav-item">
            <a class="sidebarlink" href="{{ route('article_creation') }}">
                <svg class="nav-icon" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path fill="currentColor" d="M3 17.25V21h3.75l11-11-3.75-3.75-11 11zm2.92-.92l9.83-9.83 1.84 1.84-9.83 9.83H5.92v-1.84zm12.71-8.88l-1.06-1.06 1.65-1.65a1 1 0 0 1 1.41 0l1.65 1.65a1 1 0 0 1 0 1.41l-1.65 1.65-1.06-1.06z" />
                </svg>
                <span class="nav-text">Article creation</span>
            </a>
        </div>
        <div class="nav-item">
            <a class="sidebarlink" href="{{ route('get_articles') }}">
                <svg class="nav-icon" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path fill="currentColor" d="M12 2a10 10 0 1 0 10 10A10 10 0 0 0 12 2zm0 2a8 8 0 1 1-8 8 8 8 0 0 1 8-8zm0 3a1 1 0 0 1 1 1v4.59l2.29 2.3a1 1 0 1 1-1.42 1.42l-2.58-2.59A1 1 0 0 1 11 11V6a1 1 0 0 1 1-1z" />
                </svg>
                <span class="nav-text">Tracking </span>
            </a>
        </div>
        <div class="nav-item">
            <a class="sidebarlink" href="{{ route('get_history') }}">
                <svg class="nav-icon" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path fill="currentColor" d="M12 2a10 10 0 1 0 10 10A10 10 0 0 0 12 2zm1 11h4a1 1 0 0 0 0-2h-3V7a1 1 0 0 0-2 0v5a1 1 0 0 0 1 1zm-1-9a8 8 0 1 1-8 8 8 8 0 0 1 8-8z" />
                </svg>
                <span class="nav-text">history</span>
            </a>
        </div>
        <div class="nav-item logout-item">
            <a class="sidebarlink" href="{{ route('logout') }}">
                <svg class="nav-icon" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M17 7l-1.41 1.41L18.17 11H8v2h10.17l-2.58 2.58L17 17l5-5zM4 5h8V3H4c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h8v-2H4V5z"></path>
                </svg>
                <span class="nav-text">logout</span>
            </a>
        </div>
    </nav>
</div>
