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
        $task = Task::create($request->all());
        return response()->json([
            'message' => 'success',
        ]);
    }

    public function update(Task $task, Request $request)
    {
        dd('taskid' . $task);
        $task->status = $request->status;
        $task->name = $request->name;
        $task->description = $request->description;
        $task->save();

        return response()->json([
            'message' => 'success',
        ]);
    }
}
