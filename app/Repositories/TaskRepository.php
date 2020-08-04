<?php

/**
 * Description of TaskRepository
 *
 * @author David
 */

namespace App\Repositories;

use App\User;
use App\Task;

class TaskRepository
{
    /**
     *
     * Get all of the tasks for a given user.
     *
     * @param User $user
     * @return Collection
     */
    public function forUser(User $user)
    {
        return $user->tasks()
            ->orderBy('created_at', 'asc')
            ->get();
    }

    /**
     *
     * Get task for a given user and task (to check task belongs to user).
     *
     * @param User $user
     * @param Task $task
     * @return Task
     */
    public function taskForUser(User $user, Task $task) {
        return $user->tasks()
            ->where('id', $task->id)
            ->firstOrFail();
    }
}