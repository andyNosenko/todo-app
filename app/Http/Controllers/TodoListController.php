<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TodoList;
use App\Models\User;

class TodoListController extends Controller
{
    public function index()
    {
        $todoLists = auth()->user()->todoLists;
        return view('todo-lists.index', compact('todoLists'));
    }

    public function create()
    {
        return view('todo-lists.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
        ]);

        auth()->user()->todoLists()->create($request->all());

        return redirect()->route('todo-lists.index')
            ->with('success', 'Todo List created successfully.');
    }

    public function show(TodoList $todoList)
    {
        return view('todo-lists.show', compact('todoList'));
    }

    public function edit(TodoList $todoList)
    {
        return view('todo-lists.edit', compact('todoList'));
    }

    public function update(Request $request, TodoList $todoList)
    {
        $request->validate([
            'title' => 'required',
        ]);

        $todoList->update($request->all());

        return redirect()->route('todo-lists.index')
            ->with('success', 'Todo List updated successfully.');
    }

    public function destroy(TodoList $todoList)
    {
        $todoList->delete();

        return redirect()->route('todo-lists.index')
            ->with('success', 'Todo List deleted successfully.');
    }
}
