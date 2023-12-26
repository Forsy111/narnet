<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Нарушениям.НЕТ</title>

    <!-- Scripts -->
    @vite(['resources/css/app.css'])
</head>
<body>
    @include('layout.navigation')
    <div class="content">
    @yield('content')
    </div>
</body>
</html>