<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoRequest;
use App\Http\Resources\TodoResource;
use App\Models\Todo;
use Dotenv\Exception\ValidationException;
use Illuminate\Http\Request;

// use Symfony\Component\HttpFoundation\Request;


class TodoController extends Controller
{
    public function index()
    {

        $todo = Todo::all();
        return response()->json([
            "success" => true,
            'message' => 'todo list are find',
            'data' => $todo
        ]);

    }
    public function store(Request $request)
    {
        try {
            $todo = Todo::create($request->all());
            return response()->json([
                'status' => true,
                'message' => 'todo created successfully!',
                'data' => null
            ]);

        } catch (ValidationException $e) {

        }

        session()->flash('success', 'todo created successfully!');

    }

    public function edit(Request $request, $id)
    {
        try {
            $request->validate([
                'name' => 'required',
                'description' => 'required'
            ]);
            Todo::table('todos')->where('id', $id)->update([

            ]);

            session()->flash('success', 'todo updated successfully!');

        } catch (ValidationException $e) {
        }
    }

    public function delete($id)
    {
        Todo::table('todos')->where('id', $id)->delete();
        session()->flash('success', 'todo deleted successfully!');
    }



}