<?php

use App\Http\Controllers\Condition;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/todos', [TodoController::class, 'index']);
Route::post('/todos', [TodoController::class, 'store']);
Route::post('/todos/{id}', [TodoController::class, 'update']);
Route::get('/details', [TodoController::class, 'details']);
Route::delete('/todo/{id}', [TodoController::class, 'delete']);


Route::get('/users', [UserController::class, 'getUsers']);
Route::post('/create-user', [UserController::class, 'store']);
Route::get('/condition', [Condition::class, 'index']);
Route::post('/get-status', [Condition::class, 'getStatus'])->name('get-status');