<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Apisserie</title>

        <link href='http://fonts.googleapis.com/css?family=Boogaloo' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
        <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    </head>
    <body>

        <div id="main-wrap">

            <div id="sidebar" class="column">

                <header>

                    <div class="title">
                        <h1>Apisserie</h1>
                    </div>

                    @yield('menu')

                </header>

                <footer>

                    <p>
                        <a href="auth/logout">{{ Lang::get('ui.logout') }}</a>
                        -
                        <a href="{{ altLocaleURL() }}">{{ altLocaleName() }}</a>
                    </p>

                    <p>
                        <strong>{{ Lang::get('ui.credits') }} :</strong>
                        <a href="http://www.freepik.com" title="Freepik">Freepik</a>
                    </p>

                </footer>

            </div>

            @yield('content')

        </div>

        <script src="{{ asset('js/jquery.2.1.1.min.js') }}"></script>

        @yield('scripts')

    </body>
</html>