@extends('master')

@section('content')

<?php

$notify = '';

if ( Session::get('notification') || $errors->any() )
{
    $notify = 'ui-notify';
}


?>


<main class="products-edit">

    <div id="products" class="column {{ $notify }}">

        @if ( $errors->any() )

            <div class="ui-notification error">{{ $errors->first() }}</div>

        @endif

        @if ( Session::get( 'notification' ) )

            <div class="ui-notification success">{{ Session::get('notification') }}</div>

        @endif

        <div class="inner">

            <div class="top"></div>

            <div class="list">

                @foreach ( $products as $product )

                    <li data-pid="{{ $product->id }}" class="product">

                        {!! Form::text( 'name', $product->name, [ 'class' => 'name' ] ) !!}

                        <select name="section_id" required>

                            <option value="" disabled selected>
                                Choose...
                            </option>

                            @foreach ( $sections as $id => $name )

                                <option value="{{ $id }}" {{ $id == $product->section_id ? 'selected' : '' }}>
                                    {{ $name }}
                                </option>

                            @endforeach

                        </select>

                        <button type="submit" class="btn">
                            Save
                        </button>
                        {{-- <span class="section">
                            ({{ $sections[$product->section_id] }})
                        </span> --}}
                    </li>

                @endforeach

            </div>
        </div>


        <iframe src="{{ url('/print') }}" frameborder="0" id="print-frame"></iframe>

    </div>

</main>

@stop
