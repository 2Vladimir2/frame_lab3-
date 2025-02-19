<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <header>
        <h1>To-Do App</h1>
        <nav>
            <a href="{{ route('home') }}">Главная</a>
            <a href="{{ route('about') }}">О нас</a>
            <a href="{{ route('tasks.index') }}">Список задач</a>
            <a href="{{ route('tasks.create') }}">Создать задачу</a>
        </nav>
    </header>
    <main>
        @yield('content')
    </main>
</body>
</html>
