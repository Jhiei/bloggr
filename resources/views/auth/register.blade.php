<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ config('app.name', 'Bloggr') }} | Sign Up</title>

    <link rel="stylesheet" href="{{ asset('styles/global.css') }}">
    <link rel="stylesheet" href="{{ asset('styles/auth/register.css') }}">
    <link rel="icon" href="{{ asset('images/fav.png') }}">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</head>
<body>
    <main class="main-body">
        <div class="main-body-img">
            <img src="{{ asset('images/sign-in-img.svg') }}" alt="image with a blue background with book and pen">
        </div>
        <div class="main-body-form">
            <div class="main-body-logo">
                <img src="{{ asset('images/logo.svg') }}" alt="bloggr logo">
            </div>
            <form action="{{ route('register') }}" method="POST" class="main-body-sign-up-form">
                @csrf

                <div class="sign-up-form-split">
                    <div class="sign-up-form-input-field">
                        <label for="fname">First Name</label>
                        <input type="text" name="fname" id="fname" required>
                    </div>
    
                    <div class="sign-up-form-input-field">
                        <label for="lname">Last Name</label>
                        <input type="text" name="lname" id="lname" required>
                    </div>
                </div>

                <div class="sign-up-form-input-field">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" required>
                </div>

                <div class="sign-up-form-input-field">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" required>
                </div>

                <div class="sign-up-form-input-field">
                    <label for="user_type">User Type</label>
                    <select name="user_type" id="user_type">
                        <option value="" selected></option>
                        <option value="Individual">Individual</option>
                        <option value="Company">Company</option>
                    </select>
                </div>

                <div class="sign-up-form-input-field">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" required>
                </div>

                <div class="sign-up-form-input-field">
                    <label for="confirm_password">Confirm Password</label>
                    <input type="password" name="confirm_password" id="confirm_password" required>
                </div>

                <div class="sign-up-form-input-field">
                    <input type="submit" value="Sign Up">
                </div>
            </form>
            @if($errors->any())
            <h4 class="main-body-register-error">{{$errors->first()}}</h4>
            @endif
            <div class="main-body-login">
                <p class="main-body-login-link">Already have an account? <a href="{{ route('login') }}">Sign in</a></p>
            </div>
        </div>
    </main>

    <script src="{{ asset('js/auth/form-labels.js') }}"></script>
</body>
</html>