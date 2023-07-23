<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Condition extends Controller
{
    public function index()
    {

        return view('condition', ['status' => 'active']);
    }

    public function getStatus(Request $request)
    {
        $status = $request->input('status');
        if ($status === 'active') {
            $status = 'not-active';
        } else {
            $status = 'active';
        }


        return view('condition', ['status' => $status]);
    }
}