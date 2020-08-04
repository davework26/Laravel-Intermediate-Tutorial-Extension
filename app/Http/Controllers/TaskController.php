<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\TaskRepository;
use App\Task;

class TaskController extends Controller
{
    /**
     *
     * Task repository instance.
     *
     * @var TaskRepository
     */
    protected $tasks;

    public function __construct(TaskRepository $tasks)
    {
        $this->middleware('auth');
        $this->tasks = $tasks;
    }

    /**
     * Display a list of all the user's tasks.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
//        $tasks = $request->user()->tasks()->orderBy('created_at', 'asc')->get();
//
//        return view('tasks.index', [
//            'tasks' => $tasks,
//        ]);

        // Use a reusable repository instead (model access moved out of controller).
        return view('tasks.index', [
            'tasks' => $this->tasks->forUser($request->user()),
        ]);
        
    }

    /**
     *
     * Create task for the logged on user if valid then display tasks.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $this->validateTask($request);

        $request->user()->tasks()->create([
            'name' => $request->name,
        ]);

        return redirect('/tasks');
    }

    /**
     *
     * Destroy the given task if authorised then display remaining tasks.
     *
     * @param \App\Http\Controllers\Task $task
     * @return Response
     */
    public function destroy(Task $task)
    {
        $this->authorize('destroy', $task);

        $task->delete();

        return redirect('/tasks');
    }

    /**
     *
     * Display the task to amend.
     *
     * @param Request $request
     * @param Task $task
     * @return Response
     */
    public function amend(Request $request, Task $task)
    {
        $this->authorize('amend', $task);

        return view('tasks.amend', [
//            'task' => $task,
            'task' => $this->tasks->taskForUser($request->user(), $task),
        ]);

    }

    /**
     *
     * Update task if authorised and valid then display updated tasks.
     *
     * @param Request $request
     * @param Task $task
     * @return RedirectResponse
     */
    public function update(Request $request, Task $task)
    {
        $this->authorize('update', $task);
        $this->validateTask($request);

        $task->update([
            'name' => $request->name,
        ]);

        return redirect('/tasks');
    }

    /**
     *
     * Validate task.
     *
     * @param Request $request
     */
    private function validateTask(Request $request) {
        $this->validate($request, [
            'name' => 'required|max:255',
        ]);
    }
}
