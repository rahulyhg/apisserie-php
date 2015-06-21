@extends('master')



@section('menu')

    <ul>
        <li>
            <a href="{{ url( locale() . '/' . Lang::get('routes.products.index') ) }}">{{ Lang::get('ui.back') }}</a>
        </li>
    </ul>

@stop


@section('scripts')

    <script src="{{ url('/') }}/js/edit.min.js"></script>

@stop


@section('content')

    <main class="products-edit">

        <div id="products" class="column {{ Session::get('notification') || $errors->any() ? 'ui-notify' : '' }}">

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

                        <li data-pid="{{ $product->id }}" class="product {{ Session::get('productId') === $product->id ? 'invalid' : '' }}">

                            {!! Form::open([ 'url' => locale() . '/products/update', 'class' => 'UpdateProductForm' ]) !!}

                                {!! Form::hidden( 'id', $product->id ) !!}

                                {!! Form::text( 'name', Session::get('productId') === $product->id ? Session::get('productName') : $product->name, [ 'class' => 'name', 'required' ] ) !!}

                                <select name="section_id" required>

                                    <option value="" disabled selected>
                                        {{ Lang::get('ui.choose') }}...
                                    </option>

                                    @foreach ( $sections as $section )

                                        <option value="{{ $section->id }}" {{ $section->id == $product->section_id ? 'selected' : '' }}>
                                            {{ $section->name }}
                                        </option>

                                    @endforeach

                                </select>

                                <button type="submit" class="btn">
                                    {{ Lang::get('ui.save') }}
                                </button>

                            {!! Form::close() !!}

                            {!! Form::open([ 'url' => locale() . '/products/delete/' . $product->id, 'method' => 'DELETE', 'class' => 'DeleteProductForm' ]) !!}

                                <button type="submit" class="btn">
                                    <span class="warning">{{ Lang::get('ui.deleteConfirmation') }}</span>
                                    <span class="default">{{ Lang::get('ui.delete') }}</span>
                                </button>

                            {!! Form::close() !!}

                        </li>

                    @endforeach

                </div>
            </div>


            <iframe src="{{ url('print') }}" frameborder="0" id="print-frame"></iframe>

        </div>

    </main>

@stop
