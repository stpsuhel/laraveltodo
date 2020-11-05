<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/todos', [TodoController::class, 'allTodo'])->name('todos');
Route::get('/todos/create', [TodoController::class, 'createTodo'])->name('create-todo');
Route::post('/todos/create', [TodoController::class, 'saveTodo'])->name('save-todo');
Route::get('/todos/{todo}/edit', [TodoController::class, 'editTodo'])->name('edit-todo');
Route::put('/todos/{todo}/edit', [TodoController::class, 'updateTodo'])->name('update-todo');
Route::delete('/todos/{todo}/delete', [TodoController::class, 'deleteTodo'])->name('delete-todo');

//Route::resource('todos', TodoController::class);
Route::put('/todos/{todo}/complete', [TodoController::class, 'completeTodo'])->name('complete-todo');
