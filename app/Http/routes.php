<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
 * http://localhost/Laravel/quickstart/public/index.php (or run project)
 * Login: gammerz@hotmail.co.uk or david.gamlin@tiscali.co.uk
*/

use App\Task;
use Illuminate\Http\Request;

// Basic Task List: https://laravel.com/docs/5.2/quickstart

/**
 * Display all tasks.
 */

/*
Route::get('/', function () {
    $tasks = Task::orderBy('created_at', 'asc')->get();

    return view('tasks', [
        'tasks' => $tasks
    ]);
});

*/

/**
 * Add a new task.
 */
// Note validation is different to controller version in intermediate list tutorial
// https://laravel.com/docs/5.2/quickstart-intermediate#validation
// because controllers have built-in error message session updating and redirection.
/*
Route::post('/task', function (Request $request) {
    $validator = Validator::make($request->all(),[
        'name' => 'required|max:255'
    ]);
    if ($validator->fails()) {
        return redirect('/')
            ->withInput()
            ->withErrors($validator);
    }

    $task = new Task();
    $task->name = $request->name;
    $task->save();

    return redirect('/');
});

*/

/**
 * Delete an existing task.
 */

/*
Route::delete('task/{task}', function(Task $task) {
    $task->delete();

    return redirect('/');
});
*/

// https://laravel.com/docs/5.2/quickstart-intermediate

Route::get('/tasks', 'TaskController@index');
Route::post('/task', 'TaskController@store');
Route::delete('/task/{task}', 'TaskController@destroy');
Route::get('/task/{task}', 'TaskController@amend');
Route::put('/task/{task}', 'TaskController@update');

// Added automatically by running 'php artisan make:auth'.
// Authentication routes.
Route::auth();

Route::get('/home', 'HomeController@index');
Route::get('/', 'TaskController@index');
