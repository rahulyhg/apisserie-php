@extends('basic')


@section('content')

@if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div id="login">

    <h1>Apisserie</h1>

    {!! Form::open([ 'url' => '/auth/login' ]) !!}

        <div class="field">
            {!! Form::email('email') !!}
        </div>

        <div class="field">
            {!! Form::password('password') !!}
        </div>

        <div class="field">
            {!! Form::checkbox('remember') !!}
            Remember me
        </div>

        <div class="action">
            {!! Form::button( 'Login', [ 'type' => 'submit' ] ) !!}
        </div>

    {!! Form::close() !!}

</div>

@stop