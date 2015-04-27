<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Apisserie</title>

        <link href='http://fonts.googleapis.com/css?family=Boogaloo' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
        <link href="{{ url('/') }}/css/style.css" rel="stylesheet">
    </head>
    <body>

        <header id="main-header">

            <h1>Apisserie</h1>

            <ul>
                <li class="print">
                    <a href="/print">Print</a>
                </li>
                <li class="clear-all">
                    <span>Clear items</span>
                </li>

                @if ( Auth::guest() )

                    <li>
                        <a href="auth/login">Login</a>
                    </li>

                @endif

            </ul>

            @if ( Auth::check() )

                Logged in as {{ Auth::user()->name }}

            @endif

        </header>

        <main>

            @yield('content')

        </main>

        <script src="{{ url('/') }}/js/jquery.2.1.1.min.js"></script>
        <script src="{{ url('/') }}/js/scripts.js"></script>

    </body>
</html>