<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ asset('img/favicon.png') }}"/>
    <title>Admin | @yield('title')</title>
    <script src="https://kit.fontawesome.com/572104c9c2.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.0/dist/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>


    @include('admin.layouts.partials.sidebar')



    <div class="main-content">
        @yield('content')
    </div>

</body>

<script type="text/javascript">
    // hide alert after 5 seconds
    setTimeout(function() {
        $('#alert').fadeOut('fast');
    }, 5000); // <-- time in milliseconds


    </script>
</html>
