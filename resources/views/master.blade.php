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

        <div id="main-wrap">

            @if ( $errors->any() )

                <div class="ui-notification error">{{ $errors[0] }}</div>

            @endif

            @if ( Session::get( 'notification' ) )

                <div class="ui-notification success">{{ Session::get('notification') }}</div>

            @endif

            <div id="sidebar">

                <header>

                    <div class="title">
                        <h1>Apisserie</h1>
                    </div>

                    <ul>
                        <li class="print">
                            <a href="/print">Print</a>
                        </li>
                        <li class="clear-all">
                            <a href="#">Clear items</a>
                        </li>

                        @if ( Auth::guest() )

                            <li>
                                <a href="auth/login">Login</a>
                            </li>

                        @endif

                    </ul>

                </header>

                @if ( Auth::check() )

                    <footer>

                        <span class="logged-as">
                            <a href="auth/logout">Logout</a>
                        </span>

                    </footer>

                @endif

            </div>

            <main>

                @yield('content')

            </main>

        </div>

        <script src="{{ url('/') }}/js/jquery.2.1.1.min.js"></script>
        <script src="{{ url('/') }}/js/scripts.js"></script>

    </body>
</html>