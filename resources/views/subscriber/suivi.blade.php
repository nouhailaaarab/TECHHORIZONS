<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/Dashboard.css')}}">
    <link rel="stylesheet" href="{{asset('css/abonne.css')}}">
    <title>My Articles</title>
</head>
<body>
    <div class="dashboard-container">
        @include('subscriber.sidebar')
        <div class="main-content">
            <div class="header">
                <h1>My Articles</h1>
            </div>
            <div class="articles-container">
                <table class="articles-table">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Date</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody id="articlesBody">
                        @foreach ($articles as $article)
                        <tr>
                            <td>{{$article->title}}</td>
                            <td>{{$article->created_at}}</td>
                            <td><strong>{{$article->status}}</strong></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/Dashboard.js') }}"></script>
    <script src="{{ asset('js/suivi.js') }}"></script>
</body>
</html>
