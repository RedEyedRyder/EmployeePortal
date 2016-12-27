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
    <link href="{{ config('app.url') }}{{ elixir('css/app.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>

    <header>
        <a href="{{ url('/dashboard') }}" class="brand">FV Employees</a>
        <a href="{{ url('/logout') }}"
            onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();">
            Logout
        </a>
        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
    </header>


    <main>
        <nav class="sidebar">
            <ul class="nav navbar-nav">
                <li><a href="{{ url('/dashboard') }}"><span class="glyphicon glyphicon-th"></span>Dashboard</a></li>
                <li><a href="{{ url('/leave/overview') }}"><span class="glyphicon glyphicon-calendar"></span>Leave Overview</a></li>
                <li><a href="{{ url('/leave/apply') }}"><span class="glyphicon glyphicon-sunglasses"></span>Apply for Leave</a></li>
            </ul>
        </nav>
        <section class="main-section">
            <div class="main-top">
                @yield('content-top')
            </div>
            <div class="main-content">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
            <div class="main-bottom">
                @yield('content-bottom')
            </div>
        </section>
        <aside>
            @yield('aside')
        </aside>
    </main>


    <footer>
        @yield('footer')
    </footer>

    <!-- Scripts -->
    <script src="{{ config('app.url') }}{{ elixir('js/app.js') }}"></script>
</body>
</html>
