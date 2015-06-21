<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Apisserie</title>

    <link href="{{ url('/') }}/css/print.css" rel="stylesheet">
  </head>
  <body>

    <!-- Print -->

    <div id="print">

      <?php foreach ( $products as $section_id => $products ) : ?>

        <div data-sid="{{ $section_id }}" class="section">
          <h1>{{ $sections->where( 'id', $section_id, false )->first()->name }}</h1>

          <ul>

            <?php foreach ( $products as $product ) : ?>

              <li data-pid="{{ $product->id }}" class="product">
                  <span>
                    [ ] {{ $product->name }}
                    <span class="note"></span>
                  </span>
              </li>

            <?php endforeach ?>

          </ul>
        </div>

      <?php endforeach ?>

    </div>

    <script src="{{ url('/') }}/js/jquery.2.1.1.min.js"></script>
    <script src="{{ url('/') }}/js/print.min.js"></script>

  </body>
</html>
