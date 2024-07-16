<?php

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::orderBy('priority')->get();
        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'priority' => 'required|integer',
        ]);

        Task::create([
            'name' => $validatedData['name'],
            'priority' => $validatedData['priority'],
        ]);

        return redirect()->route('tasks.index')->with('success', 'Task created successfully.');
    }

    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, Task $task)
    {
        // Validate of the data that we want to resquet
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'priority' => 'required|integer',
        ]);


        $task->update([
            'name' => $validatedData['name'],
            'priority' => $validatedData['priority'],
        ]);

        return redirect()->route('tasks.index')->with('success', 'Task updated successfully.');
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index');
    }

    public function reorder(Request $request)
    {
        $priorities = $request->input('priorities');
        foreach ($priorities as $index => $id) {
            Task::where('id', $id)->update(['priority' => $index + 1]);
        }
        return response()->json(['status' => 'success']);
    }
}