<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the tasks.
     * Fetches all tasks from the database and returns the index view.
     */
    public function index()
    {
        $tasks = Task::all(); // Fetch all tasks from the database
        return view('tasks.index', compact('tasks')); // Pass tasks to the view
    }

    /**
     * Show the form for creating a new task.
     * Returns the task creation form view.
     */
    public function create()
    {
        return view('tasks.create'); // Show the task creation form
    }

    /**
     * Store a newly created task in the database.
     * Validates the request data and saves a new task record.
     */
    public function store(Request $request)
    {
        // Validate incoming request data
        $validated = $request->validate([
            'title' => 'required|string|max:255', // Title is required
            'description' => 'nullable|string',   // Description is optional and must be a string
        ]);

        // Create a new task using mass assignment
        Task::create($validated);

        // Redirect back to the task list with a success message
        return redirect()->route('tasks.index')->with('success', 'Task created successfully.');
    }

    /**
     * Show the form for editing the specified task.
     * Fetches a task and returns the edit view with the task data.
     */
    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task')); // Pass the task to the edit view
    }

    /**
     * Update the specified task in the database.
     * Validates request data and updates the task record.
     */
    public function update(Request $request, Task $task)
    {
        // Validate incoming rquest data
        $validated = $request->validate([
            'title' => 'required|string|max:255', // Title is required and must be a string
            'description' => 'nullable|string',   // Description is optional
            'is_completed' => 'nullable|boolean', // Completion status can be a boolean
        ]);

        // Update the task with the validated data and handle the checkbox correctly
        $task->update([
            'title' => $validated['title'],                                   // Always update the title
            'description' => $validated['description'],                       // Always update the description
            'is_completed' => $request->has('is_completed') ? true : false    // Set true if checkbox is checked
        ]);

        // Redirect to the task list with a success message
        return redirect()->route('tasks.index')->with('success', 'Task updated successfully.');
    }

    /**
     * Remove the specified task from the database.
     * Deletes the task and redirects back to the task list.
     */
    public function destroy(Task $task)
    {
        $task->delete(); // Delete the specified task from the database 
        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully.');
    }
}
