
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
        <div class="nav-item">
            <a class="sidebarlink" href="{{ route('admin_stats') }}">
                <svg class="nav-icon" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path fill="currentColor" d="M3 3h8v8H3V3zm10 0h8v5h-8V3zM3 13h5v8H3v-8zm7 0h8v8h-8v-8z" />
                </svg>
            <span class="nav-text">Dashboard</span>
            </a>
        </div>
        <div class="nav-item">
            <a class="sidebarlink" href="{{ route('magazine_creation') }}">
                <svg class="nav-icon" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path fill="currentColor" d="M4 3h14a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2zm0 2v14h14V5H4zm3 3h8v2H7V8zm0 4h8v2H7v-2z" />
                </svg>
                <span class="nav-text">Articles & magazines</span>
            </a>
        </div>
        <div class="nav-item">
            <a class="sidebarlink" href="{{ route('get_subs') }}">
                <svg class="nav-icon" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path fill="currentColor" d="M16 11a4 4 0 1 0-4-4 4 4 0 0 0 4 4zm-6 1h12a1 1 0 0 1 1 1v1c0 2-3 4-7 4s-7-2-7-4v-1a1 1 0 0 1 1-1zM6 11a3 3 0 1 0-3-3 3 3 0 0 0 3 3zm0 2c-1.67 0-5 0.84-5 2.5V16a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-.5C11 13.84 7.67 13 6 13z" />
                </svg>
            <span class="nav-text">Subscribers</span>
        </a>
        </div>
        <div class="nav-item">
            <a class="sidebarlink" href="{{ route('get_respo') }}">
                <svg class="nav-icon" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path fill="currentColor" d="M9 11a4 4 0 1 1 0-8 4 4 0 0 1 0 8zm6 0a3 3 0 1 1 0-6 3 3 0 0 1 0 6zM6 13c-2.67 0-6 1.34-6 4v3h12v-3c0-2.66-3.33-4-6-4zm12 0c-.84 0-1.65.11-2.42.31.92.85 1.42 1.97 1.42 3.19v2.5H24v-2.5c0-2.21-3.33-3.5-6-3.5z" />
                </svg>
                <span class="nav-text">Responsables</span>
            </a>
        </div>
        <div class="nav-item">
            <a class="sidebarlink" href="{{ route('verify_users') }}">
                <svg class="nav-icon" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path fill="currentColor" d="M4 2h12l4 4v14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2zm0 2v16h14V7h-5V2H4zm4 6h8v2H8v-2zm0 4h6v2H8v-2z" />
                </svg>
            <span class="nav-text">Demandes</span>
            </a>
        </div>
        <div class="nav-item">
            <a class="sidebarlink" href="{{ route('get_magazines') }}">
                <svg class="nav-icon" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path fill="currentColor" d="M12 4c-5 0-9 4-9 8s4 8 9 8 9-4 9-8-4-8-9-8zm0 2c3.87 0 7 3.13 7 6s-3.13 6-7 6-7-3.13-7-6 3.13-6 7-6zm0 2a4 4 0 1 0 0 8 4 4 0 0 0 0-8zm0 2a2 2 0 1 1 0 4 2 2 0 0 1 0-4zM4 3h14a2 2 0 0 1 2 2v5h-2V5H4v14h10v2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2z" />
                </svg>
            <span class="nav-text">Magazines Visibility</span>
            </a>
        </div>
        <div class="nav-item">
            <a class="sidebarlink" href="{{ route('dashboard') }}">
                <svg class="nav-icon" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path fill="currentColor" d="M12 12a5 5 0 1 1 0-10 5 5 0 0 1 0 10zm0 2c-3.33 0-10 1.67-10 5v2h20v-2c0-3.33-6.67-5-10-5z" />
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
