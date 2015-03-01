@extends('master')

@section('content')

	{!! Form::open([ 'url' => 'products' ]) !!}

		{!! Form::text( 'name', null, [ 'placeholder' => "Name" ]) !!}
		{!! Form::submit() !!}

	{!! Form::close() !!}

@stop