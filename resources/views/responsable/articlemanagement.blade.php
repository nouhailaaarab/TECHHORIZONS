<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/Dashboard.css')}}">
    <link rel="stylesheet" href="{{asset('css/management.css')}}">
    <title>Gestion des Articles</title>
</head>
<body>
    <div class="dashboard-container">

        @include('responsable.sidebar')
        <div class="main-content">
            <div class="header">
                <h1>Gestion des Articles</h1>
            </div>
            <div class="articles-container">
                <div class="articles-list">
                    @foreach ($articles as $article)
                    <div class="article-card">
                        <div class="article-content">
                            <h3>{{$article->title}}</h3>
                            <p class="article-preview">{{Str::limit($article->content,50)}}</p>
                            <p class="article-author">Par: {{$article->user->name}}</p>
                            <p class="article-date">Soumis le: {{$article->created_at}}</p>
                        </div>
                        <div class="article-actions">
                            <form action="{{ route('update_theme_articles',$article->id) }}" method="POST">
                            @csrf
                            <button style="background-color: rgb(4, 184, 255)" type="submit" class="publish-btn" value="reccomanded" name="action">Reccomander</button>
                            </form>
                            <form action="{{ route('update_theme_articles',$article->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="publish-btn" value="accepted" name="action">Publier</button>
                            </form>
                            <form action="{{ route('update_theme_articles',$article->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="reject-btn" value="rejected" name="action">Refuser</button>
                            </form>

                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
    <script src="{{asset('js/Dashboard.js')}}"></script>
    <script src="{{asset('js/management.js')}}"></script>
</body>
</html>
