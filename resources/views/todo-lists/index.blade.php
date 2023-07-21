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


                        <h1>To-Do Lists</h1>

                        <a href="{{ route('todo-lists.create') }}">Create New To-Do List</a>

                        @if (count($todoLists) > 0)
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($todoLists as $todoList)
                                    <tr>
                                        <td>{{ $todoList->title }}</td>
                                        <td>{{ $todoList->description }}</td>
                                        <td>
                                            <a href="{{ route('todo-lists.show', $todoList) }}"
                                               class="btn btn-primary">View</a>
                                            <a href="{{ route('todo-lists.edit', $todoList) }}"
                                               class="btn btn-success">Edit</a>
                                            <form action="{{ route('todo-lists.destroy', $todoList) }}" method="POST"
                                                  class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @else
                            <p class="alert alert-info">No to-do lists found.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
