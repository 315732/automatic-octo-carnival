<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * This method defines the structure of the "tasks" table in the database.
     */
    public function up(): void
    {
        // Create the 'tasks' table
        Schema::create('tasks', function (Blueprint $table) {

            // Auto-incrementing primary key column (id)
            $table->id();

            // Column for storing the task title, required (string with default length 255)
            $table->string('title');

            // Column for task description, optional (nullable text field)
            $table->text('description')->nullable();

            // Column for storing whether the task is completed or not (boolean with default value false)
            $table->boolean('is_completed')->default(false);
            
            // Timestamps for created_at and updated_at (automatically managed by laravel)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
