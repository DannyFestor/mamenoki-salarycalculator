<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet"/>


    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased">
<div class="text-sky-600 text-2xl font-bold">給与計算ソフト</div>
<ul>
    <li>
        <a href="{{ route('login') }}">Login</a>
    </li>
    <li>
        <a href="{{ route('logout') }}">Logout</a>
    </li>
</ul>
</body>
</html>
