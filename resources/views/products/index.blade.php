@extends('master')

@section('content')

@if ( Auth::check() )

    {!! Form::open([ 'url' => 'products/create' ]) !!}

        {!! Form::text( 'name' ) !!}
        {!! Form::select( 'section_id', $indexedSections ) !!}
        {!! Form::submit() !!}

    {!! Form::close() !!}

@endif

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

@stop
