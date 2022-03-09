<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ config('app.name', 'Bloggr') }} | Sign In</title>

    <link rel="stylesheet" href="{{ asset('styles/global.css') }}">
    <link rel="stylesheet" href="{{ asset('styles/auth/login.css') }}">
</head>
<body>
    <form action="{{ route('login') }}" method="POST">
        @csrf

        <input id="email" type="email" name="email" required autofocus>
        <input id="password" type="password" name="password" required>
        <input type="submit" value="log in">
    </form>
</body>
</html>