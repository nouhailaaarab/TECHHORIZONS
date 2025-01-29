<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/Dashboard.css')}}">
    <title>Dashboard</title>
</head>
<body>
    <div class="dashboard-container">
        @include('responsable.sidebar')
        <div class="main-content">
            <div class="header">
                <h1>Dashboard</h1>
            </div>
            <div class="statistic">
                <div class="statistic-item">
                    <i>
                        <svg class="nav-icon" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M3 13h8V3H3v10zm0 8h8v-6H3v6zm10 0h8V11h-8v10zm0-18v6h8V3h-8z"/>
                        </svg>
                    </i>
                    <h2>Published articles</h2>
                    <p>{{$articles_count}}</p>
                </div>
                <div class="statistic-item">
                    <i>
                        <svg class="nav-icon" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                        </svg>
                    </i>
                    <h2>Subscribers</h2>
                    <p>{{$subs_count}}</p>
                </div>
                <div class="statistic-item">
                    <i>
                    `   <svg class="nav-icon" viewBox="0 0 24 24"> 
                            <path fill="currentColor" d="M4 2h12l4 4v14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2zm0 2v16h14V7h-5V2H4zm4 6h8v2H8v-2zm0 4h6v2H8v-2z"/>
                        </svg>
                    </i>
                    <h2> Pending articles</h2>
                    <p>{{$pending_articles_count}}</</p>
                </div>
            </div>
        </div>
    </div>
    <script src="{{asset('js/Dashboard.js')}}"></script>
</body>
</html>
