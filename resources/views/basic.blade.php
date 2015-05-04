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

                <div class="ui-notification error">

                    @foreach ( $errors->all() as $error )

                        {{ $error }}

                    @endforeach

                </div>

            @endif

            <main class="login">

                @yield('content')

            </main>

        </div>

    </body>
</html>