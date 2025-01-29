<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/Dashboard.css')}}">
    <title>Profile - Dashboard</title>
</head>
<body>
    <div class="dashboard-container">
        @include('responsable.sidebar')
        <div class="main-content">
            <div class="header">
                <h1>Profile</h1>
            </div>
            <div class="profile-container">
                <div class="profile-card">
                    <div class="profile-header">
                        <h2 class="profile-name">{{$user->name}}</h2>
                    </div>
                    <form class="profile-form" id="profile-form" method="POST" action="{{ route('update_name') }}">
                        @csrf
                        <div class="form-group">
                            <label for="username">Username</label>
                            <div class="input-group">
                                <input name="username" type="text" id="username" value="{{$user->name}}" readonly>
                                <button type="button" class="edit-btn" onclick="toggleEdit('username')">
                                    <svg class="edit-icon" viewBox="0 0 24 24">
                                        <path fill="currentColor" d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04c.39-.39.39-1.02 0-1.41l-2.34-2.34c-.39-.39-1.02-.39-1.41 0l-1.83 1.83 3.75 3.75 1.83-1.83z"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <div class="input-group">
                                <input name="password" type="password" id="password" placeholder="enter the new password" readonly>
                                <button type="button" class="edit-btn" onclick="toggleEdit('password')">
                                    <svg class="edit-icon" viewBox="0 0 24 24">
                                        <path fill="currentColor" d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04c.39-.39.39-1.02 0-1.41l-2.34-2.34c-.39-.39-1.02-.39-1.41 0l-1.83 1.83 3.75 3.75 1.83-1.83z"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="save-btn">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/Dashboard.js') }}"></script>
</body>
</html>
