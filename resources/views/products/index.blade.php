@extends('master')

@section('content')

	<ul>

    @foreach ( $products as $product )
      
      <li>
        {{ $product->name }}
      </li>

    @endforeach

  </ul>

@stop