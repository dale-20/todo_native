<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Session;


class TaskController extends Controller
{

    public function index()
    {
        $tasks = Task::withTrashed()->where('user_id', Session::get('user_id'))->get();
        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        $user_id = Session::get('user_id');
        return view('tasks.create', compact('user_id'));
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'user_id' => 'required',
            'title' => 'required'
        ]);

        Task::create($validated);
        return redirect()->route('tasks.index');

    }

    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, Task $task)
    {

        $validated = $request->validate([
            'title' => 'required'
        ]);

        $task->update($validated);
        return redirect()->route('tasks.index');
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index');
    }
}
