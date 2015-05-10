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

            <div id="sidebar" class="column">

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
                    </ul>

                </header>

                <footer>

                    <p>
                        <a href="auth/logout">Logout</a>
                    </p>

                    <p>
                        Icon made by <a href="http://www.freepik.com" title="Freepik">Freepik</a> from <a href="http://www.flaticon.com" title="Flaticon">Flaticon</a> is licensed under <a href="http://creativecommons.org/licenses/by/3.0/" title="Creative Commons BY 3.0">CC BY 3.0</a>
                    </p>

                </footer>

            </div>

            @yield('content')

        </div>

        <script src="{{ url('/') }}/js/jquery.2.1.1.min.js"></script>

        @yield('scripts')

    </body>
</html>