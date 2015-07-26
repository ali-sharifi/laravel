@extends('app')

@section('content')
    <h2>Reset Your Password</h2>
    <p>Type your email address in the text box below. A new password will be sent to your email address.</p>

    {!! Form::open() !!}

    <div class="form-group">
        {!! Form::label('emailAddress', 'Email Address') !!}
        {!! Form::text('emailAddress: ',null,['class'=>'form-control']) !!}
        <hr/>
    </div>

    <div class="form-group">
        {!! Form::submit('Email New Password',['class'=>'btn btn-primary form-control']) !!}
    </div>

    {!! Form::close() !!}

    <br/>

@stop