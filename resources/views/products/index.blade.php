@extends('master')

@section('content')

<div class="top">

    <div class="form">

        <h2>Add an item</h2>

        {!! Form::open([ 'url' => 'products/create' ]) !!}

            {!! Form::text( 'name', null, [ 'required' ] ) !!}

            <select name="section_id" required>

                <option value="" disabled selected>
                    Choose...
                </option>

                @foreach ( $sections as $id => $name )

                    <option value="{{ $id }}">{{ $name }}</option>

                @endforeach

            </select>

            {!! Form::button( 'Add item', [ 'type' => 'submit' ] ) !!}

        {!! Form::close() !!}

    </div>

</div>

<div id="products">

    <div class="nav">

        <ul>

            <li class="active">
                <a href="#">All</a>
            </li>

            @foreach ( $sections as $id => $name )

                <li>
                    <a href="#">{{ $name }}</a>
                </li>

            @endforeach

        </ul>

    </div>

    <div class="list">

        <ul>

            @foreach ( $products as $product )

                <li data-pid="{{ $product->id }}">
                    <div>
                        <span class="name">
                            {{ $product->name }}
                        </span>
                        <span class="section">
                            ({{ $sections[$product->section_id] }})
                        </span>
                        <div class="remove"></div>
                    </div>
                </li>

            @endforeach

        </ul>

    </div>

</div>

@stop
