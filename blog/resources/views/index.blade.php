@extends('app')

@section('content')
    <h2><b>Log in</b></h2>


    {!! Form::open() !!}

    @if($errors->any())
        @foreach ($errors->all() as $error)
            <h4><strong style="color: red;">{{$error}}</strong></h4>
        @endforeach
    @endif


    <div class="form-group">
        {!! Form::label('email', 'Email Address') !!}
        {!! Form::text('email',Input::old('email'),['class'=>'form-control']) !!}
        <hr/>
    </div>
    <div class="form-group">
        {!! Form::label('password', 'Password: ') !!}
        {!! Form::text('password',null,['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Login',['class'=>'btn btn-primary form-control']) !!}
    </div>

    {!! Form::close() !!}

    <br />

    <strong><a href="/register">Register</a>|<a href="/forgotpassword">Forgot Password</a><strong>

@stop