<?php

namespace App\Http\Controllers\Todo;

use App\Http\Controllers\Controller;
use App\Http\Requests\Todo\TodoRequest;
use App\Models\Team;
use App\Models\Todo;
use App\Notifications\Tasks\CreateTaskNotification;
use App\Notifications\Tasks\MarkTaskAsDoneNotification;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index(Team $id)
    {
        if ($id->manager_id != auth()->id()){
            abort(401);
        }
        $todos = $id->todos->where('done' , '=', false)->all();
        return view('pages.Teams.Todo.todos', compact('todos', 'id'));
    }

    public function create(Team $id)
    {
        if ($id->manager_id != auth()->id()){
            abort(401);
        }
        return view('pages.Teams.Todo.new', compact('id'));
    }

    public function store(TodoRequest $request, Team $id)
    {
        try {
            Todo::create([
                'team_id' => $id->id,
                'task' => $request->task
            ]);
            auth()->user()->notify(new CreateTaskNotification($id->name, $id->manager->fullname));
            return redirect()->route('teams.todo.show', $id->id)->with('success', 'Your Task Created Successfully');
        }catch (\Exception $exception){
            return redirect()->route('teams.todo.show', $id->id)->with('toast_error', $exception->getMessage());

        }
    }

    public function markAsDone(Team $id, Todo $todo)
    {
        try {
            $todo->update([
                'done' => true,
                'done_at' => Carbon::now()
            ]);
            auth()->user()->notify(new MarkTaskAsDoneNotification($todo->task, $id->name));
            return back()->with('success', 'Your Task Is Done now');
        }catch (\Exception $exception){
            return back()->with('toast_error', $exception->getMessage());
        }
    }

    public function succeed(Team $id)
    {
        if ($id->manager_id != auth()->id()){
            abort(401);
        }
        $todos = $id->todos->where('done' , '=', true)->all();
        return view('pages.Teams.Todo.succeed', compact('todos', 'id'));
    }

    public function destroy(Team $id, Todo $todo)
    {
        if ($id->manager_id != auth()->id()){
            abort(401);
        }
        try {
            $todo->delete();
            return back()->with('success', 'Your Task Is Deleted Successfully');
        }catch (\Exception $exception){
            return back()->with('toast_error', $exception->getMessage());
        }
    }
}
