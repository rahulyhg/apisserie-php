@extends('master')

@section('content')

  <div id="screen" class="admin">

    <header id="main-header">
      <h1>A'pisserie</h1>
      <ul>
        <li class="print">
          <span>Print</span>
        </li>
        <li class="clear-all">
          <span>Clear items</span>
        </li>
      </ul>
    </header>

    <main>

      @if ( $errors->any() )

        <div class="ui-notification error">

          @foreach ( $errors->all() as $error )

            {{ $error }}
        
          @endforeach 

        </div>

      @endif

      <section class="section">

        <ul>

          @foreach ( $products as $product )

            <li class="product" data-pid="{{ $product->id }}">
              <div>
                <span class="name">
                  {{ $product->name }}
                </span>
                <input type="text">
                <div class="remove"></div>
              </div>
            </li>

          @endforeach

        </ul>

      </section>

    </main>

  </div>

@stop

@section('print')
@if(0)
  <!-- Print -->

  <div id="print">

    <?php foreach ( $data as $sid => $products ) : ?>

      <section data-sid="<?php echo $sid ?>">
        <h1><?php echo $names['sections'][$sid] ?></h1>
        
        <ul>

          <?php foreach ( $products as $pid ) : ?>

            <li data-pid="<?php echo $pid ?>">
                <img src="<?php echo URL ?>/public/img/checkbox.svg">
                <span>
                  <?php echo $names['products'][$pid] ?>
                </span>
            </li>

          <?php endforeach ?>

        </ul>
      </section>

    <?php endforeach ?>

  </div>
@endif
@stop