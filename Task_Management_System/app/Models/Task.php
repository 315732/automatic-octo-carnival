<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    // Specify the model attributes that can be mass assigned
    protected $fillable = [
        'title',             // The title of the task
        'description',       // The description of the task
        'is_completed',      // Indicates whether the task is completed (true/false)
    ];

}
