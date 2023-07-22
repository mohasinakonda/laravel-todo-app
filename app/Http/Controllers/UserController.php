<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\User;
use Dotenv\Exception\ValidationException;
use Illuminate\Http\Request;

class UserController extends Controller
{


    public function getUsers()
    {
        $users = Student::find(2);
        return response()->json([
            'status' => true,
            'message' => 'users fetch successfully!',
            'data' => $users
        ]);
    }
    public function store(Request $request)
    {
        try {

            $user = Student::create($request->all());
            return response()->json([
                'status' => true,
                'message' => ' create user',
                'data' => $user
            ]);
        } catch (ValidationException $e) {
            return response()->json([
                'status' => false,
                'message' => 'failed to create user',
                'errors' => $e
            ]);
        }

    }
}