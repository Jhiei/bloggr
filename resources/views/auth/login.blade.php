<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ config('app.name', 'Bloggr') }} | Sign In</title>

    <link rel="stylesheet" href="{{ asset('styles/global.css') }}">
    <link rel="stylesheet" href="{{ asset('styles/auth/login.css') }}">
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
            <form action="{{ route('login') }}" method="POST" class="main-body-sign-in-form">
                @csrf

                <div class="sign-in-form-input-field">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" required>
                </div>

                <div class="sign-in-form-input-field">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" required>
                </div>

                <div class="sign-in-form-input-field">
                    <input type="submit" value="Sign In">
                </div>
            </form>
        </div>
        <footer class="sign-in-footer">

        </footer>
    </main>
</body>
</html>