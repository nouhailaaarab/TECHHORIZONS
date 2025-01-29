<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login/Register</title>
    <link href="{{ asset('css/loginregister.css') }}" rel="stylesheet">
</head>
<body>
    <div class="auth-container">
        <div class="auth-header">
            <div class="auth-tab active" data-tab="login">Login</div>
            <div class="auth-tab" data-tab="register">Register</div>
        </div>

        <div class="auth-forms">
            <form id="login-form" class="auth-form active" method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                    <label for="login-email">Email</label>
                    <input type="email" id="login-email" name="email" required>
                    <span class="error"></span>
                </div>
                <div class="form-group">
                    <label for="login-password">Password</label>
                    <input type="password" id="login-password" name="password" required>
                    <span class="error"></span>
                </div>
                <button type="submit" class="submit-btn">Login</button>

                <div class="social-login">
                    <!-- Add your social login buttons here if needed -->
                </div>
            </form>

            <form id="register-form" class="auth-form" method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-group">
                    <label for="register-name">Name</label>
                    <input type="text" id="register-name" name="name" required>
                    <span class="error"></span>
                </div>
                <div class="form-group">
                    <label for="register-email">Email</label>
                    <input type="email" id="register-email" name="email" required>
                    <span class="error"></span>
                </div>
                <div class="form-group">
                    <label for="register-password">Password</label>
                    <input type="password" id="register-password" name="password" required>
                    <span class="error"></span>
                </div>
                <div class="form-group">
                    <label for="register-password-confirm">Confirm Password</label>
                    <input type="password" id="register-password-confirm" name="password_confirmation" required>
                    <span class="error"></span>
                </div>
                <button type="submit" class="submit-btn">Register</button>
            </form>
        </div>
    </div>
    <script src="{{ asset('js/loginregister.js') }}"></script>
</body>
</html>
