@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <h1>View To-Do Item</h1>

                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title"><strong>Title:</strong> {{ $todoList->title }}</h5>
                                <p class="card-text"><strong>Description:</strong> {{ $todoList->description }}</p>
                            </div>
                        </div>

                        <a href="{{ route('todo-lists.edit', $todoList) }}" class="btn btn-primary">Edit</a>

                        <form action="{{ route('todo-lists.destroy', $todoList) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
