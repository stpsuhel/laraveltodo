<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoRequest;
use App\Models\Todo;

class TodoController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function allTodo(){
        $todos = auth()->user()->todos()->orderBy('completed')->get();
        return view('todos.allTodos', compact('todos'));
    }

    public function createTodo(){
        return view('todos.create');
    }

    public function saveTodo(TodoRequest $request){

        auth()->user()->todos()->create($request->all());
        return redirect()->back()->with('message', 'Todo Saved successfully');
    }

    public function editTodo(Todo $todo){
        return view('todos.edit', compact('todo'));
    }

    public function updateTodo(TodoRequest $request, Todo $todo){
        $todo->update(['title'=>$request->title]);
        return redirect()->back()->with('message', 'Todo Updated successfully');;
    }

    public function completeTodo(Todo $todo){
        if ($todo->completed){
            $todo->update(['completed'=>false]);
            return redirect()->back()->with('message', 'Todo Incompleted successfully');;
        }else{
            $todo->update(['completed'=>true]);
            return redirect()->back()->with('message', 'Todo Completed successfully');;
        }
    }

    public function deleteTodo(Todo $todo){
        $todo->delete();
        return redirect()->back()->with('message', 'Todo Deleted successfully');
    }
}

