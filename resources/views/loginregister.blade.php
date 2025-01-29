<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login / Register</title>
    <link rel="stylesheet" href="{{ asset('css/loginregister.css') }}">
</head>
<body>
    <div class="auth-container">
        <div class="auth-header">
            <div class="auth-tab active" data-tab="login">Login</div>
            <div class="auth-tab" data-tab="register">Register</div>
        </div>
        <div class="auth-forms">
            <form class="auth-form active" id="login-form">
                <div class="form-group">
                    <label for="login-email">Email</label>
                    <input type="email" id="login-email" name="email" required>
                    <span class="error">Please enter a valid email</span>
                </div>
                <div class="form-group">
                    <label for="login-password">Password</label>
                    <input type="password" id="login-password" name="password" required>
                    <span class="error">Password must be at least 6 characters</span>
                </div>
                <button type="submit" class="submit-btn">Login</button>
            </form>
            <form class="auth-form" id="register-form">
                <div class="form-group">
                    <label for="register-name">Full Name</label>
                    <input type="text" id="register-name" name="name" required>
                    <span class="error">Please enter your name</span>
                </div>
                <div class="form-group">
                    <label for="register-email">Email</label>
                    <input type="email" id="register-email" name="email" required>
                    <span class="error">Please enter a valid email</span>
                </div>
                <div class="form-group">
                    <label for="register-password">Password</label>
                    <input type="password" id="register-password" name="password" required>
                    <span class="error">Password must be at least 6 characters</span>
                </div>
                <div class="form-group">
                    <label for="register-confirm">Confirm Password</label>
                    <input type="password" id="register-confirm" name="confirm-password" required>
                    <span class="error">Passwords do not match</span>
                </div>
                <button type="submit" class="submit-btn">Register</button>
            </form>
        </div>
    </div>
    <script src="{{asset('js/loginregister')}}"></script>
</body>
</html>
