<?php

namespace App\Observers;

use App\Activity;
use App\Task;

class TaskObserver
{

    /**
     * Handle the task "created" event.
     *
     * @param  \App\Task  $task
     * @return void
     */
    public function created(Task $task)
    {
        $task->project->recordActivity( 'task_created');
    }

    /**
     * Handle the task "updated" event.
     *
     * @param  \App\Task  $task
     * @return void
     */
    public function updated(Task $task)
    {
        if (isset($task->getChanges()['completed'])) {
            $task->project->recordActivity( 'task_completed');
        } else {
            $task->project->recordActivity( 'task_updated');
        }

//        if ($task->completed == 1) {
//            $this->recordActivity( 'task_completed');
//        } else {
//
//            dd($task->getChanges());
//            $this->recordActivity( 'task_updated');
//        }
    }

    /**
     * Handle the task "deleted" event.
     *
     * @param  \App\Task  $task
     * @return void
     */
    public function deleted(Task $task)
    {
        //
    }

    /**
     * Handle the task "restored" event.
     *
     * @param  \App\Task  $task
     * @return void
     */
    public function restored(Task $task)
    {
        //
    }

    /**
     * Handle the task "force deleted" event.
     *
     * @param  \App\Task  $task
     * @return void
     */
    public function forceDeleted(Task $task)
    {
        //
    }
}