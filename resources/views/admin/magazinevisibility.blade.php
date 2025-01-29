
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/Dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/management.css') }}">
    <link rel="stylesheet" href="{{ asset('css/magazine-privacy.css') }}">
    <title>Gestion de la Visibilité des Magazines</title>
</head>
<body>
    <div class="dashboard-container">
        @include('admin.sidebar')
        <div class="main-content">
            <div class="header">
                <h1>Visibilité des Magazines</h1>
            </div>

            <div class="magazines-container">
                <div class="magazines-grid">
                    @foreach ($magazines as $magazine)
                    <form action="{{route('modify_magazines')}}" method="Post">
                    <input type="hidden" name="magazines_id" value="{{$magazine->id}}">
                    @csrf
                    <div class="magazine-card">
                        <div class="magazine-info">
                            <h3>Magazine #{{$magazine->N_magazine}}</h3>
                            <p class="publication-date">Publié le: {{$magazine->created_at}}</p>
                        </div>
                        <div class="privacy-controls">
                            <select class="privacy-select" name="privacy">
                                <option value=1 @if($magazine->privacy == 1) selected @endif>Public</option>
                                <option value=0 @if($magazine->privacy == 0) selected @endif>Privé</option>
                            </select>
                            <button class="save-privacy-btn">Enregistrer</button>
                        </div>
                    </div>
                    </form>
                    @endforeach



                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/Dashboard.js') }}"></script>
    <script src="{{ asset('js/magazine-privacy.js') }}"></script>
</body>
</html>
