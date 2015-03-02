@extends('master')

@section('content')

  {!! Form::open([ 'url' => 'products' ]) !!}

    {!! Form::text( 'name', null, [ 'placeholder' => "Name", 'autofocus' ]) !!}
    {!! Form::submit() !!}

  {!! Form::close() !!}

  <ul>

    @foreach ( $products as $product )
      
      <li>
        {{ $product->name }}
      </li>

    @endforeach

  </ul>

@stop