<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use \App\Task;

class TaskController extends Controller
{
    //

    public function index()
    {
        $tasks = Task::all();
        //return $tasks;
        //return view('task.index',compact('tasks'));
        return view('tasks.index', compact('tasks'));
        //return view('welcome');
    }

    public function  show($id)
    {
        $task=Task::findOrFail($id);
        //dd($task);
        //return $task;
        return view('tasks.show',compact('task'));
    }

}
