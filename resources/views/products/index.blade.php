@extends('master')



@section('scripts')

    <script src="{{ url('/') }}/js/scripts.min.js"></script>

@stop



@section('menu')

    <ul>
        <li class="print">
            <a href="{{ url( locale() . '/' . Lang::get('routes.print') ) }}">
                {{ Lang::get('ui.sidebar.print') }}
            </a>
        </li>
        <li class="clear-all">
            <a href="#">{{ Lang::get('ui.sidebar.clear') }}</a>
        </li>
        <li>
            <a href="{{ url( locale() . '/' . Lang::get('routes.products.sections') ) }}">
                {{ Lang::get('ui.sidebar.showSections') }}
            </a>
        </li>
        <li>
            <a href="{{ url( locale() . '/' . Lang::get('routes.products.edit') ) }}">
                {{ Lang::get('ui.sidebar.edit') }}
            </a>
        </li>
    </ul>

@stop



@section('content')

    <main class="products-index">

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

                        {!! Form::open([ 'url' => locale() . '/products/create', 'id' => 'addProductForm' ]) !!}

                            {!! Form::text( 'name', null, [ 'required', 'placeholder' => Lang::get('ui.addProduct') ] ) !!}

                            <select name="section_id" required>

                                <option value="" disabled selected>
                                    {{ Lang::get('ui.choose') }}
                                </option>

                                @foreach ( $sections as $section )

                                    <option value="{{ $section->id }}">{{ $section->name }}</option>

                                @endforeach

                            </select>

                            <button type="submit" class="btn">
                                {{ Lang::get('ui.add') }}
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
