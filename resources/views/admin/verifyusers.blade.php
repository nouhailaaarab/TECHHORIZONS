
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/Dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/management.css') }}">
    <link rel="stylesheet" href="{{ asset('css/verification.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Demandes de Vérification</title>
</head>
<body>
    <div class="dashboard-container">
        @include('admin.sidebar')

        <div class="main-content">
            <div class="header">
                <h1>Demandes de Vérification</h1>
            </div>

            <div class="verification-container">
                <div class="verification-list">
                    @foreach ($users as $user)
                    <form action="{{route('accept_user')}}" method="POST">
                    @csrf
                    <input type="hidden" name="user_id" value="{{$user->id}}">
                    <div class="verification-card">
                        <div class="user-details">
                            <div class="user-info">
                                <h3>{{$user->name}}</h3>
                                <p>{{$user->email}}</p>
                                <p class="request-date">Demande soumise le: {{$user->created_at}}</p>
                            </div>
                        </div>
                        <div class="verification-actions">
                            <button class="verify-btn">Vérifier</button>
                        </div>
                    </div>
                    </form>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/Dashboard.js') }}"></script>
    <script src="{{ asset('js/verification.js') }}"></script>
</body>
</html>
