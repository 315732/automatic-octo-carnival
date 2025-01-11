<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

// When a user visits the root URL, redirect them to the tasks index page
Route::get('/', function () { return redirect()->route('tasks.index'); });

// Automatically register all CRUD routes for tasks using the TaskController
Route::resource('tasks', TaskController::class);