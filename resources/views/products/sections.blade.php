@extends('master')



@section('scripts')

    <script src="{{ url('/') }}/js/scripts.min.js"></script>

@stop



@section('menu')

    <ul>
        <li class="print">
            <a href="{{ url('print') }}">Print</a>
        </li>
        <li class="clear-all">
            <a href="#">Clear items</a>
        </li>
        <li>
            <a href="{{ url('products') }}">Hide Sections</a>
        </li>
        <li>
            <a href="{{ url('products/edit') }}">Edit</a>
        </li>
    </ul>

@stop



@section('content')

    <main class="products-index sections">

        <div id="sections">

            <div class="title">
                <h2>Sections</h2>
            </div>

            <ul>

                @foreach ( $sections as $section )

                    <li class="{{ $slug && $section->slug === $slug ? 'selected' : '' }}">
                        <a href="{{ url('products/sections/' . $section->slug ) }}">{{ $section->name }}</a>
                    </li>

                @endforeach

            </ul>

        </div>

        <div id="products" class="column {{ Session::get('notification') || $errors->any() ? 'ui-notify' : '' }}">

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

                                @foreach ( $sections as $section )

                                    <option value="{{ $section->id }}">{{ $section->name }}</option>

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
                                            <div class="note">
                                                <input type="text">
                                            </div>
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
