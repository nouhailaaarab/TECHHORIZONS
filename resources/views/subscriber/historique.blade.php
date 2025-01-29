<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/Dashboard.css')}}">
    <link rel="stylesheet" href="{{asset('css/abonne.css')}}">
    <title>History</title>
</head>
<body>
    <div class="dashboard-container">
        @include('subscriber.sidebar')
        <div class="main-content">
            <div class="header">
                <h1>History</h1>
            </div>
            <div class="history-list" id="historyList">
                @foreach ($visites as $visite)
                <div class="history-item">
                    <a href="{{ route('get_article', $visite->article->id) }}" class="title">{{$visite->article->title}}</a>

                    <div class="timestamp">{{$visite->created_at}}</div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <script src="{{asset('js/Dashboard.js')}}"></script>
</body>
</html>
