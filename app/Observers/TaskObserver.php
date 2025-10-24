<?php

namespace App\Observers;

use App\Events\TaskCreated;
use App\Models\Task;
use Illuminate\Support\Facades\Log;

class TaskObserver
{
    public function created(Task $task): void
    {
        Log::info('Task created: ' . $task->title);
        event(new TaskCreated($task));
    }
}