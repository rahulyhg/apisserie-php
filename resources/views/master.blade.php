<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>A'pisserie</title>

    <link href="{{ url('/') }}/css/style.css" rel="stylesheet">
  </head>
  <body>
		
		@yield('content')
    @yield('print')

	  <script src="{{ url('/') }}/js/jquery.2.1.1.min.js"></script>
    <script src="{{ url('/') }}/js/scripts.min.js"></script>

  </body>
</html>