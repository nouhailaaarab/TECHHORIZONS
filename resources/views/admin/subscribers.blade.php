
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/Dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/management.css') }}">
    <link rel="stylesheet" href="{{ asset('css/subscribers.css') }}">
    <title>Gérer les Abonnements</title>
</head>
<body>
    <div class="dashboard-container">
        @include('admin.sidebar')
        <div class="main-content">
            <div class="header">
                <h1>Gérer les Abonnements</h1>
                <div class="header-actions">
                    <div class="search-box">
                        <input type="text" placeholder="Rechercher un abonné..." id="searchSubscriber">
                        <svg class="search-icon" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/>
                        </svg>
                    </div>
                </div>
            </div>

            <div class="subscribers-container">
                <div class="subscribers-grid">
                    @foreach ($subs as $sub )

                     <div class="subscriber-card">
                            <form action="{{ route('delete_subs') }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="sub_id" value="{{$sub->id}}">
                                <div class="subscriber-info">
                                    <h3>{{$sub->user->name}}</h3>
                                    <p>Email: {{$sub->user->email}}</p>
                                    <p>Subscribed at : {{$sub->created_at}}</p>
                                    <p>theme : {{$sub->theme->name}}</p>
                                    <button class="delete-subscriber-btn" type="submit">Supprimer l'abonnement</button>
                                </div>
                            </form>
                    </div>

                    @endforeach

                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/Dashboard.js') }}"></script>
    <script src="{{ asset('js/subscribers.js') }}"></script>
</body>
</html>
