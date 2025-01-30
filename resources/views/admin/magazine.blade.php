<!-- published-articles.html -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/Dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/management.css') }}">
    <link rel="stylesheet" href="{{ asset('css/published.css') }}">
    <title>Gestion des Articles Publiés</title>
</head>
<body>
    <div class="dashboard-container">
        @include('admin.sidebar')
        <div class="main-content">
            <div class="header">
                <h1>Gestion des Articles des magazines</h1>
                <button class="filter-btn" onclick="toggleFilters()">
                    <svg class="nav-icon" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M3 17v2h6v-2H3zM3 5v2h10V5H3zm10 16v-2h8v-2h-8v-2h-2v6h2zM7 9v2H3v2h4v2h2V9H7zm14 4v-2H11v2h10zm-6-4h2V7h4V5h-4V3h-2v6z"/>
                    </svg>
                    Filtres
                </button>
            </div>

            <div class="filters-panel" id="filtersPanel">
                <div class="filter-group">
                    <label>Statut:</label>
                    <select id="statusFilter">
                        <option value="all">Tous</option>
                        <option value="assigned">Assigné à un magazine</option>
                        <option value="unassigned">Non assigné</option>
                    </select>
                </div>
            </div>

            <div class="published-articles-container">
                <div class="articles-list">
                    @foreach ($articles as $article)
                    <div class="article-card">
                        <div class="article-content">
                            <div class="article-header">
                                <h3>{{$article->title}}</h3>
                                <span class="status unassigned">Non assigné</span>
                            </div>
                            <p class="article-preview">{{Str::limit($article->content,30)}}</p>
                            <div class="article-metadata">
                                <p class="article-author">Par: {{$article->user->name}}</p>
                                <p class="article-date">Publié le: {{$article->created_at}}</p>
                            </div>
                        </div>
                        <div class="magazine-assignment">
                            <div class="assignment-form">
                                <form action="{{route('create_magazine')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="article_id" value="{{$article->id}}">
                                <div class="form-group">
                                    <label>Numéro du Magazine:</label>
                                    <input type="number" class="magazine-number" min="1" name="numero">
                                </div>
                                <div class="form-group">
                                    <label>Visibilité:</label>
                                    <div class="visibility-toggle">
                                        <input type="radio" id="public1" name="privacy" value=1>
                                        <label for="public1">Public</label>
                                        <input type="radio" id="private1" name="privacy" value=0>
                                        <label for="private1">Privé</label>
                                    </div>
                                </div>
                                <button class="assign-btn">Assigner</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endforeach

                    @foreach ($not_articles as $article)
                    <!-- Example of an assigned article -->
                    <div class="article-card assigned">
                        <div class="article-content">
                            <div class="article-header">
                                <h3>{{$article->title}}</h3>
                                <span class="status assigned">Numeroº {{$article->magazine->N_magazine}}</span>
                            </div>
                            <p class="article-preview">{{Str::limit($article->content,30)}}</p>
                            <div class="article-metadata">
                                <p class="article-author">Par: {{$article->user->name}}</p>
                                <p class="article-date">Publié le: {{$article->created_at}}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/Dashboard.js') }}"></script>
    <script src="{{ asset('js/published.js') }}"></script>
</body>
</html>
