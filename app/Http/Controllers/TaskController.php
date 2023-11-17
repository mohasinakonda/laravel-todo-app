<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        return response()->json([
            'message' => "success",
            "data" => $tasks
        ]);
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            "name" => "required|max:255|unique:tasks",
            "description" => 'required',
            "long_description" => 'required'
        ]);
        $task = new Task;
        $task->name = $data['name'];
        $task->description = $data['description'];
        $task->long_description = $data['long_description'];
        $task->save();
        return redirect()->route('task.show', ['id' => $task->id]);
    }

    public function update(Task $task, Request $request)
    {
        $task->status = $request->status;
        $task->name = $request->name;
        $task->description = $request->description;
        $task->save();

        return response()->json([
            'message' => 'success',
        ]);
    }
}
