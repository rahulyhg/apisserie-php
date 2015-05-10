@extends('master')

@section('scripts')

<script src="{{ url('/') }}/js/scripts.min.js"></script>

@stop

@section('content')

<?php

$notify = '';

if ( Session::get('notification') || $errors->any() )
{
    $notify = 'ui-notify';
}


?>

<main class="products-index">

    <div id="products" class="column {{ $notify }}">

        @if ( $errors->any() )

            <div class="ui-notification error">{{ $errors->first() }}</div>

        @endif

        @if ( Session::get( 'notification' ) )

            <div class="ui-notification success">{{ Session::get('notification') }}</div>

        @endif

        <div class="inner">

            <div class="top">

                <div class="form">

                    {!! Form::open([ 'url' => 'products/create', 'id' => 'addProductForm' ]) !!}

                        {!! Form::text( 'name', null, [ 'required', 'placeholder' => 'Add product' ] ) !!}

                        <select name="section_id" required>

                            <option value="" disabled selected>
                                Choose...
                            </option>

                            @foreach ( $sections as $id => $name )

                                <option value="{{ $id }}">{{ $name }}</option>

                            @endforeach

                        </select>

                        <button type="submit" class="btn">
                            Add
                        </button>

                    {!! Form::close() !!}

                </div>
            </div>

            <div class="list">

                @foreach ( $products as $letter => $products )

                    <ul class="group">

                        <li>

                            <h2>{{ $letter }}</h2>

                            <ul class="products">

                                @foreach ( $products as $product )

                                    <li data-pid="{{ $product->id }}" class="product">
                                        <div class="remove"></div>
                                        <span class="name">
                                            {{ $product->name }}
                                        </span>
                                        {{-- <span class="section">
                                            ({{ $sections[$product->section_id] }})
                                        </span> --}}
                                    </li>

                                @endforeach

                            </ul>

                        </li>

                    </ul>

                @endforeach

            </div>
        </div>


        <iframe src="{{ url('/print') }}" frameborder="0" id="print-frame"></iframe>

    </div>

</main>

@stop
