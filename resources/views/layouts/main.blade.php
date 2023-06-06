<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Larabook | @yield('title')</title>
    <link rel="shortcut icon" href="{{ asset('img/favicon.png') }}" type="image/x-icon">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.0/dist/jquery.min.js"></script>
</head>
<body>
    @include('layouts.partials.navbar')
    <div class="p-4 lg:px-28 lg:py-16 mt-24">
        @yield('content')
    </div>
    <div class="mt-16">
        @include('layouts.partials.footer')
    </div>
</body>
</html>
