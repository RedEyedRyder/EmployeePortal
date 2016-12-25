<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('pageTitle') &nbsp;|&nbsp; {{ config('app.name') }}</title>

    <!-- Styles -->
    <link href="{{ config('app.url') }}{{ elixir('css/guest.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>

    <main>
        <div class="container-fluid">
            @yield('content')
        </div>
    </main>

    <footer>
        @yield('footer')
    </footer>

    <!-- Scripts -->
    <script src="{{ config('app.url') }}{{ elixir('js/guest.js') }}"></script>
</body>
</html>
