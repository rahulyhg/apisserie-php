@extends('master')

@section('content')

  {!! Form::open([ 'url' => 'sections/create' ]) !!}

    {!! Form::text( 'name', null, [ 'placeholder' => "Name", 'autofocus' ]) !!}
    {!! Form::submit() !!}

  {!! Form::close() !!}

  <ul>

    @foreach ( $sections as $section )
      
      <li>
        {{ $section->name }}
      </li>

    @endforeach

  </ul>

@stop