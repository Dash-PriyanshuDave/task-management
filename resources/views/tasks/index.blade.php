<!DOCTYPE html>
<html>
<head>
    <title>Tasks - {{ $project->name }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-gray-100 to-gray-200 min-h-screen">
    <div class="min-h-screen">
        <nav class="bg-white shadow-lg border-b">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex items-center">
                        <h1 class="text-2xl font-bold text-gray-900"><a href="{{ route('dashboard') }}">Task Manager</a></h1>
                    </div>
                    <div class="flex items-center space-x-4">
                        <span class="text-gray-700 font-medium">Welcome, {{ auth()->user()->name }}!</span>
                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg text-sm font-medium transition duration-200">
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </nav>

        <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center mb-8">
                <div class="flex items-center space-x-4">
                    <a href="{{ route('projects.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg text-sm font-medium transition duration-200">
                        Back to Projects
                    </a>
                    <h2 class="text-3xl font-bold text-gray-900">Tasks for {{ $project->name }}</h2>
                </div>
                <a href="{{ route('projects.tasks.create', $project) }}" class="bg-emerald-500 hover:bg-emerald-600 text-white px-6 py-3 rounded-lg font-medium transition duration-300 shadow hover:shadow-lg">
                    Add Task
                </a>
            </div>

            @if (session('success'))
                <div class="bg-emerald-100 border border-emerald-400 text-emerald-700 px-4 py-3 rounded-lg mb-6">
                    {{ session('success') }}
                </div>
            @endif

            <div class="space-y-6">
                @forelse ($tasks as $task)
                    <div class="bg-white shadow-xl rounded-2xl p-6 hover:shadow-2xl transition duration-300">
                        <div class="flex justify-between items-start">
                            <div class="w-0 flex-1">
                                <h3 class="text-xl font-bold text-gray-900">{{ $task->title }}</h3>
                                <p class="mt-2 text-gray-600">{{ $task->description ?? 'No description' }}</p>
                                <p class="mt-2 text-sm text-gray-500">Assigned to: {{ $task->assignee->name }}</p>
                                <p class="mt-2 text-sm text-gray-500">Status: {{ $task->completed ? 'Completed' : 'Pending' }}</p>
                            </div>
                            <div class="flex space-x-2">
                                @can('update', $task)
                                    <a href="{{ route('tasks.edit', $task) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-lg text-sm font-medium transition duration-200">
                                        Edit
                                    </a>
                                    <form method="POST" action="{{ route('tasks.update', $task) }}" class="inline">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="completed" value="{{ $task->completed ? '0' : '1' }}">
                                        <button type="submit" class="bg-{{ $task->completed ? 'red' : 'green' }}-500 hover:bg-{{ $task->completed ? 'red' : 'green' }}-600 text-white px-4 py-2 rounded-lg text-sm font-medium transition duration-200">
                                            {{ $task->completed ? 'Cancel' : 'Complete' }}
                                        </button>
                                    </form>
                                @endcan
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-gray-600">No tasks yet.</p>
                @endforelse
            </div>
        </div>
    </div>
</body>
</html>