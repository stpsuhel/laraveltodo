@extends('todos.main')

@section('section')
<div class="container my-4 p-4 w-50 border">
    <div class="border-bottom border-dark justify-content-between">
        <div class="align-content-between row">
            <div class="ml-3">
                <h1 class="m-2">All Todo List</h1>
            </div>
            <div class="ml-auto mr-4">
                <a class="btn btn-outline-dark mt-3" href="{{ route('create-todo') }}" role="button">Create Todo</a>
            </div>
        </div>
        <div class="py-2">
            @include('layouts.message')
        </div>
    </div>

    <div class="mt-4">
        <ul class="m-3">
            @foreach($todos as $todo)
                <li class="border-bottom p-3 list-unstyled">
                    <div class="row">
                        <div class="col-2">
                            @if($todo->completed)
                                <span class="fas fa-check text-primary" style="cursor: pointer"
                                      onclick="event.preventDefault();document.getElementById('todo-complete-{{ $todo->id }}').submit()" ></span>
                                <form class="hide" id="todo-complete-{{ $todo->id }}" method="post" action="{{ route('complete-todo', $todo->id) }}">
                                    @csrf
                                    @method('put')
                                </form>
                            @else
                                <span class="fas fa-check text-black-50" style="cursor: pointer"
                                      onclick="event.preventDefault();document.getElementById('todo-complete-{{ $todo->id }}').submit()"></span>
                                <form class="hide" id="todo-complete-{{ $todo->id }}" method="post" action="{{ route('complete-todo', $todo->id) }}">
                                    @csrf
                                    @method('put')
                                </form>
                            @endif
                        </div>
                        <div class="col-6">
                            @if($todo->completed)
                                <h5><del>{{ $todo->title }}</del></h5>
                            @else
                                <h5>{{ $todo->title }}</h5>
                            @endif
                        </div>
                        <div class="col-2">
                            @if($todo->completed)
                                <a class="btn btn-outline-dark px-3 disabled" href="{{ route('edit-todo', $todo->id) }}" role="button">Edit</a>
                            @else
                                <a class="btn btn-outline-dark px-3" href="{{ route('edit-todo', $todo->id) }}" role="button">Edit</a>
                            @endif
                        </div>
                        <div class="col-2">
                            <span class="btn btn-outline-danger px-3" style="cursor: pointer" role="button"
                                  onclick="event.preventDefault();
                                  if (confirm('Are you really want to delete?')){
                                      document.getElementById('todo-delete-{{ $todo->id }}').submit()
                                  }">Delete</span>
                            <form class="hide" id="todo-delete-{{ $todo->id }}" method="post" action="{{ route('delete-todo', $todo->id) }}">
                                @csrf
                                @method('delete')
                            </form>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>

</div>
@endsection
