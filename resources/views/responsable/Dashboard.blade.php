<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/Dashboard.css') }}">
    <title>Dashboard</title>
</head>
<body>
    <div class="dashboard-container">
        <div class="sidebar" id="sidebar">
            <div class="logo-section">
                <img src="./assets/Crunchyroll_logo_2018_vertical.png" alt="Logo" class="logo-img">
                <span class="logo-text">Horizon</span>
            </div>
            <button class="toggle-btn" onclick="toggleSidebar()">☰</button>

            <nav class="nav-menu">
                <div class="nav-item active">
                    <svg class="nav-icon" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M3 13h8V3H3v10zm0 8h8v-6H3v6zm10 0h8V11h-8v10zm0-18v6h8V3h-8z"/>
                    </svg>
                    <span class="nav-text">Dashboard</span>
                </div>
                <div class="nav-item">
                    <svg class="nav-icon" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                    </svg>
                    <span class="nav-text">Profile</span>
                </div>
                <div class="nav-item">
                    <svg class="nav-icon" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 16H5V5h14v14z"/>
                    </svg>
                    <span class="nav-text">Projects</span>
                </div>
                <div class="nav-item">
                    <svg class="nav-icon" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 14H4V8l8 5 8-5v10zm-8-7L4 6h16l-8 5z"/>
                    </svg>
                    <span class="nav-text">Messages</span>
                </div>
                <div class="nav-item">
                    <svg class="nav-icon" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M19.43 12.98c.04-.32.07-.64.07-.98s-.03-.66-.07-.98l2.11-1.65c.19-.15.24-.42.12-.64l-2-3.46c-.12-.22-.39-.3-.61-.22l-2.49 1c-.52-.4-1.08-.73-1.69-.98l-.38-2.65C14.46 2.18 14.25 2 14 2h-4c-.25 0-.46.18-.49.42l-.38 2.65c-.61.25-1.17.59-1.69.98l-2.49-1c-.23-.09-.49 0-.61.22l-2 3.46c-.13.22-.07.49.12.64l2.11 1.65c-.04.32-.07.65-.07.98s.03.66.07.98l-2.11 1.65c-.19.15-.24.42-.12.64l2 3.46c.12.22.39.3.61.22l2.49-1c.52.4 1.08.73 1.69.98l.38 2.65c.03.24.24.42.49.42h4c.25 0 .46-.18.49-.42l.38-2.65c.61-.25 1.17-.59 1.69-.98l2.49 1c.23.09.49 0 .61-.22l2-3.46c.12-.22.07-.49-.12-.64l-2.11-1.65zM12 15.5c-1.93 0-3.5-1.57-3.5-3.5s1.57-3.5 3.5-3.5 3.5 1.57 3.5 3.5-1.57 3.5-3.5 3.5z"/>
                    </svg>
                    <span class="nav-text">Settings</span>
                </div>
            </nav>
        </div>
        <div class="main-content">
            <div class="header">
                <h1>Dashboard</h1>
            </div>
            <!-- Add your main content here -->
            <div class="statistic">
                <div class="statistic-item">
                    <i>
                        <svg class="nav-icon" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M3 13h8V3H3v10zm0 8h8v-6H3v6zm10 0h8V11h-8v10zm0-18v6h8V3h-8z"/>
                        </svg>
                    </i>
                    <h2>Articles</h2>
                    <p>12</p>
                </div>
                <div class="statistic-item">
                    <i>
                        <svg class="nav-icon" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                        </svg>
                    </i>
                    <h2>Projects</h2>
                    <p>4</p>
                </div>
                <div class="statistic-item">
                    <i>
                        <svg class="nav-icon" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 16H5V5h14v14z"/>
                        </svg>
                    </i>
                    <h2>Messages</h2>
                    <p>24</p>
                </div>
            </div>
        </div>
    </div>
    {{ asset('js/Dashboard.js') }}
</body>
</html>
