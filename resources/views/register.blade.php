@extends('app')

@section('content')
    <h2><b>Register</b></h2>


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
        {!! Form::label('password_confirmation', 'Confirm Password: ') !!}
        {!! Form::text('password_confirmation',null,['class'=>'form-control']) !!}
    </div>

    <?php
    echo '<input type="hidden" name="_token" value="' . csrf_token() . '"><p>' . captcha_img() . '</p>' . '<p><input class="form-control" type="text" name="captcha"></p>';
    ?>

    <div class="form-group">
        {!! Form::submit('Register',['class'=>'btn btn-primary form-control']) !!}
    </div>

    {!! Form::close() !!}

    <br/>
    {{--<strong><a href="">Register</a>|<a href="">Forgot Password</a><strong>--}}

@stop