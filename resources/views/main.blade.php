<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Главная страница')</title>
    <link rel="stylesheet" href="/css/style.css">
    @stack('css')

</head>
<body>
<div class="container">
    @yield('content')
</div>
</body>
</html>