<?php

namespace App\Policies;

use App\User;
use App\Task;
use Illuminate\Auth\Access\HandlesAuthorization;

class TaskPolicy
{
    use HandlesAuthorization;

    /**
     * Determine if given user can delete given task.
     *
     *
     * @param User $user
     * @param Task $task
     * @return bool
     */
    public function destroy(User $user, Task $task)
    {
        return $user->id === $task->user_id;
    }

    /**
     * Determine if given user can amend given task.
     *
     *
     * @param User $user
     * @param Task $task
     * @return bool
     */
    public function amend(User $user, Task $task)
    {
        return $user->id === $task->user_id;
    }

    /**
     * Determine if given user can update given task.
     *
     *
     * @param User $user
     * @param Task $task
     * @return bool
     */
    public function update(User $user, Task $task)
    {
        return $user->id === $task->user_id;
    }
}
