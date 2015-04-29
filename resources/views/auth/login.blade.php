@extends('basic')


@section('content')

<div id="login">

    <h1>Apisserie</h1>

    {!! Form::open([ 'url' => '/auth/login' ]) !!}

        {!! Form::hidden( 'email', 'gougoune@petate.com' ) !!}

        <div class="field">
            {!! Form::password( 'password', [ 'required' ]) !!}
        </div>
@if(0)
        <div class="field">
            {!! Form::checkbox('remember') !!}
            Remember me
        </div>
@endif
        <div class="action">
            {!! Form::button( 'Login', [ 'type' => 'submit' ] ) !!}
        </div>

    {!! Form::close() !!}

</div>

@stop