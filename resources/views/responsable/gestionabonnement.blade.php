<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/Dashboard.css')}}">
    <link rel="stylesheet" href="{{asset('css/management.css')}}">
    <title>Gérer les Abonnements</title>
</head>
<body>
    <div class="dashboard-container">

        @include('responsable.sidebar')
        <div class="main-content">
            <div class="header">
                <h1>Gérer les Abonnements</h1>
            </div>
            <div class="users-container">
                <div class="users-grid">
                    @foreach ($subs as $sub)
                    <form action="{{ route('delete_theme_subs',$sub->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <div class="user-card">
                            <div class="user-info">
                                <h3>{{$sub->user->name}}</h3>
                                <p>Email: {{$sub->user->email}}</p>
                                <p>Date: {{$sub->created_at}}</p>
                                <button class="delete-btn">Supprimer</button>
                            </div>
                        </div>
                    </form>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <script src="{{asset('js/Dashboard.js')}}"></script>
    <script src="{{asset('js/management.js')}}"></script>
</body>
</html>
