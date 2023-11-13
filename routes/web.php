<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TaskController2;
use App\Models\Task;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::post('/create-todo', [TaskController::class, 'store']);
Route::put('/todo/{id}', [TaskController2::class, 'update']);
Route::get('/dashboard', function () {
    $todos = Task::latest()->orderBy('created_at', 'desc')->get();
    return view('dashboard', ['todos' => $todos]);
});

Route::get('tasks', function () {
    return view('practice', [
        'tasks' => Task::latest()->orderBy('status', 'desc')->get()
    ]);
})->name('tasks.index');
Route::get('task/{id}', function ($id) {
    $task = \App\Models\Task::findOrFail($id)->first();
    // if (!$task) {
    //     return abort(\Illuminate\Http\Response::HTTP_NOT_FOUND);
    // }
    return view('show', [
        'task' => $task
    ]);
})->name('task.show');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
