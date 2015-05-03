@extends('master')

@section('disabled')

<div id="sections" class="column">

    <nav>

        <div class="title">
            <h1>Sections</h1>
        </div>

        <ul>

            <li class="active">
                <a href="#">All</a>
            </li>

            @foreach ( $sections as $id => $name )

                <li>
                    <a href="{{ url('/') . '/sections/' . $name }}">{{ $name }}</a>
                </li>

            @endforeach

        </ul>

    </nav>

</div>

@stop

@section('content')

<?php

$notify = '';

if ( Session::get('notification') || $errors->any() )
{
    $notify = 'ui-notify';
}


?>

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

                    <fieldset>

                        {!! Form::text( 'name', null, [ 'required', 'placeholder' => 'Add product' ] ) !!}

                        <select name="section_id" required>

                            <option value="" disabled selected>
                                Choose...
                            </option>

                            @foreach ( $sections as $id => $name )

                                <option value="{{ $id }}">{{ $name }}</option>

                            @endforeach

                        </select>

                    </fieldset>

                    <button type="submit">
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

@stop
