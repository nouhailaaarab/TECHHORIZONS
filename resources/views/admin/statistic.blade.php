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
        @include('admin.sidebar')
        <div class="main-content">
            <div class="header">
                <h1>Dashboard</h1>
            </div>
            
            <div class="statistic">
                <div class="statistic-item">
                    <i>
                    <svg class="nav-icon" viewBox="0 0 24 24">
  <path fill="currentColor" d="M6 2H18C18.55 2 19 2.45 19 3V21C19 21.55 18.55 22 18 22H6C5.45 22 5 21.55 5 21V3C5 2.45 5.45 2 6 2ZM6 0C4.9 0 4 0.9 4 2V22C4 23.1 4.9 24 6 24H18C19.1 24 20 23.1 20 22V2C20 0.9 19.1 0 18 0H6ZM8 4H16V6H8V4ZM8 8H16V10H8V8ZM8 12H16V14H8V12ZM8 16H16V18H8V16ZM8 20H16V22H8V20Z"/>
</svg>

                    </i>
                    <h2>Articles</h2>
                    <p>{{$articles_count}}</p>
                </div>
                <div class="statistic-item">
                    <i>
                     <svg class="nav-icon" viewBox="0 0 24 24">
                      <path fill="currentColor" d="M6 2C5.45 2 5 2.45 5 3V21C5 21.55 5.45 22 6 22H18C18.55 22 19 21.55 19 21V3C19 2.45 18.55 2 18 2H6ZM6 4H18V20H6V4ZM7 6H17V18H7V6Z"/>
                     </svg>

                    </i>
                    <h2>Magazines</h2>
                    <p>{{$magazines_count}}</p>
                </div>
                <div class="statistic-item">
                    <i>
                    <svg class="nav-icon" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                        </svg>
                    </i>
                    <h2>users</h2>
                    <p>{{$users_count}}</p>
                </div>
            </div>
        </div>
    </div>
    {{ asset('js/Dashboard.js') }}
</body>
</html>
