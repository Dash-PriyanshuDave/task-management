<?php

namespace App\Http\Controllers;

use App\Http\Resources\TaskResource;
use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class TaskController extends Controller
{
    use AuthorizesRequests;

    public function index(Project $project)
    {
        $this->authorize('viewAny', Task::class);

        $tasks = $project->tasks()->with('assignee')->get();
        return view('tasks.index', compact('project', 'tasks'));
        // For API: return TaskResource::collection($tasks);
    }

    public function create(Project $project)
    {
        $this->authorize('create', Task::class);

        $users = User::where('role', 'user')->get(); // For assigning tasks
        return view('tasks.create', compact('project', 'users'));
    }

    public function store(Request $request, Project $project)
    {
        $this->authorize('create', Task::class);

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'assigned_to' => 'required|exists:users,id',
        ]);

        $project->tasks()->create([
            'title' => $request->title,
            'description' => $request->description,
            'assigned_to' => $request->assigned_to,
        ]);

        return redirect()->route('projects.tasks.index', $project)->with('success', 'Task created!');
    }

    public function edit(Task $task)
    {
        $this->authorize('update', $task);

        $users = User::where('role', 'user')->get();
        return view('tasks.edit', compact('task', 'users'));
    }

    public function update(Request $request, Task $task)
    {
        $this->authorize('update', $task);

        $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
            'assigned_to' => 'sometimes|required|exists:users,id',
            'completed' => 'sometimes|boolean',
        ]);

        $task->update($request->all());

        return redirect()->back()->with('success', 'Task updated!');
    }

    public function destroy(Task $task)
    {
        $this->authorize('delete', $task);
        $task->delete();
        return redirect()->back()->with('success', 'Task deleted!');
    }
}
