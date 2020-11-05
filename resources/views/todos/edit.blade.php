@extends('todos.main')

@section('section')

<div class="container my-4 p-4 w-50 border">
    <div class="border-bottom border-dark justify-content-between">
        <h1 class="m-2">Create Todo List</h1>
        @include('layouts.message')
    </div>
    <form class="pt-4" action="{{ route('update-todo', $todo->id) }}" method="post">
        @csrf
        @method('put')
        <div class="row p-2">
            <div class="col-9">
                <input type="text" class="form-control" name="title" value="{{ $todo->title }}" placeholder="Todo Title">
            </div>
            <div class="col-3">
                <input type="submit" class="form-control btn btn-primary rounded-pill" value="Update">
            </div>
        </div>
    </form>
    <div class="row">
        <div class="m-auto p-3">
            <a class="btn btn-outline-dark mt-3 px-4" href="{{ route('todos') }}" role="button">Back</a>
        </div>
    </div>
</div>

@endsection
