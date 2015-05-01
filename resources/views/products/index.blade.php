@extends('master')

@section('content')

<div id="column-2">

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
                    <a href="#">{{ $name }}</a>
                </li>

            @endforeach

        </ul>

    </nav>

</div>


<div id="column-3">

    <div class="list">

        <div class="top">

            <div class="form">

                {!! Form::open([ 'url' => 'products/create' ]) !!}

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

                    <button type="submit"></button>

                {!! Form::close() !!}

            </div>
        </div>

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
