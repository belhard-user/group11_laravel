<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Главная страница')</title>
    <link rel="stylesheet" href="/css/style.css">
    @stack('css')

</head>
<body>
<h1>С новым годом</h1>
<div class="container">
    @yield('content')
</div>
</body>
</html>