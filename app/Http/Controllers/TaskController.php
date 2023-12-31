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

    public function update($id, Request $request)
    {

        $data = $request->validate([
            "name" => 'required',
            "description" => "required",
            "long_description" => "required"
        ]);
        $task = Task::findOrFail($id);
        if ($request['status'] === 'on') {

            $task->status = 1;
        } else {
            $task->status = 0;

        }
        $task->name = $data['name'];
        $task->description = $data['description'];
        $task->long_description = $data['long_description'];
        $task->save();
        return response([
            'status' => 'success'
        ]);
        // return redirect()->route('task.show', ['id' => $task->id]);
    }

    public function destroy($id)
    {

        $task = Task::where('id', $id)->delete();
        return redirect()->route('dashboard');
    }
}
