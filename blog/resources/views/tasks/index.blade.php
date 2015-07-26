@extends('app')

@section('content')
<div>Tasks: {{$tasks}}</div>
<br />
    @foreach($tasks as $task)
        <a href="/tasks/{{$task->id}}">{{$task->title}} / {{$task->duration}}</a>
        <hr>

    @endforeach
@stop