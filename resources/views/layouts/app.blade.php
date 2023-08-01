<!DOCTYPE html>
<html>
<head>
    <title>@yield('title', 'Weather App')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/weather.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container">
        @yield('content')
    </div>
    <!-- Add common JS scripts here -->
</body>
</html>
