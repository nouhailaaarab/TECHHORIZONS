<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/Dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/management.css') }}">
    <link rel="stylesheet" href="{{ asset('css/theme-managers.css') }}">
    <title>Gérer les Responsables des Thèmes</title>
</head>
<body>
    <div class="dashboard-container">
        @include('admin.sidebar')
        <div class="main-content">
            <div class="header">
                <h1>Gérer les Responsables des Thèmes</h1>
            </div>

            <div class="theme-managers-container">
                <div id="themeManagersForm" class="theme-managers-form">
                    @foreach ($themes as $theme)
                    <div class="theme-section">
                        <h2>{{$theme->name}}</h2>
                        <form method="POST" action="{{ route('modify_respo') }}" >
                            @csrf
                            <input type="hidden" name="theme_id" id="theme_id" value="{{$theme->id}}">
                            <div class="manager-selection">
                                <select name="resp_id" class="manager-select">
                                    <option value='none'  disabled>Sélectionner un responsable</option>
                                    <option value='none'  selected>Aucun responsable</option>
                                    @foreach ($resps as $resp )
                                    <option value="{{$resp->id}}" id="{{$resp->id}}" @if($theme->user_id == $resp->id) selected @endif>{{$resp->name}}</option>  
                                    @endforeach
                                </select>

                                <div class="current-manager">
                                    <p>Responsable actuel: <span>@if($theme->user) {{$theme->user->name}} @else Aucun responsable @endif</span></p>
                                </div>
                            </div>
                            <div class="form-actions">
                                <button type="submit" class="save-changes-btn">Modifier</button>
                            </div>
                        </form>
                    </div>
                    @endforeach
                    
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/Dashboard.js') }}"></script>
    <script src="{{ asset('js/theme-managers.js') }}"></script>
</body>
</html>
