@extends('master')

@section('content')

@if ( Auth::check() )

    <div class="top">

        <div class="form">

            <h2>Add an item</h2>

            {!! Form::open([ 'url' => 'products/create' ]) !!}

                {!! Form::text( 'name' ) !!}
                {!! Form::select( 'section_id', $indexedSections ) !!}
                {!! Form::button( 'Add item', [ 'type' => 'submit' ] ) !!}

            {!! Form::close() !!}

        </div>

    </div>

@endif

@if ( $errors->any() )

    <div class="ui-notification error">

        @foreach ( $errors->all() as $error )

            {{ $error }}

        @endforeach

    </div>

@endif

<div id="products">

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

</div>

@stop
