<?php

namespace App\Listeners;

use App\Events\TaskCreated;
use App\Jobs\SendTaskCreationNotification;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotifyTaskCreation implements ShouldQueue
{
    public function handle(TaskCreated $event): void
    {
        SendTaskCreationNotification::dispatch($event->task);
    }
}