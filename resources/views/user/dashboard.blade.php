<!DOCTYPE html>
<html>
<head>
    <title>User Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 min-h-screen">
    <div class="min-h-screen bg-gradient-to-br from-slate-50 to-slate-200">
        <nav class="bg-white shadow-lg border-b">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex items-center">
                        <h1 class="text-2xl font-bold text-gray-900">Task Manager</h1>
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
            <div class="text-center mb-12">
                <div class="mx-auto inline-flex h-16 w-16 items-center justify-center rounded-full bg-blue-100">
                    <svg class="h-8 w-8 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                </div>
                <h2 class="mt-6 text-4xl font-extrabold text-gray-900 tracking-tight">Team Member Dashboard</h2>
                <p class="mt-4 text-xl text-gray-600">View and update your assigned tasks</p>
            </div>

            <div class="mb-12">
                <h3 class="text-2xl font-bold text-gray-900 mb-6">Your Assigned Tasks</h3>
                <div class="space-y-6">
                    @forelse ($tasks as $task)
                        <div class="bg-white overflow-hidden shadow-xl rounded-2xl p-8">
                            <div class="flex justify-between items-start">
                                <div class="w-0 flex-1">
                                    <h4 class="text-lg font-bold text-gray-900">{{ $task->title }}</h4>
                                    <p class="mt-2 text-gray-600">{{ $task->description ?? 'No description' }}</p>
                                    <p class="mt-2 text-sm text-gray-500">Project: {{ $task->project->name }}</p>
                                    <p class="mt-1 text-sm text-gray-500">Assigned by: {{ $task->project->creator->name }}</p>
                                    <p class="mt-1 text-sm text-gray-500">Status: {{ $task->completed ? 'Completed' : 'Pending' }}</p>
                                </div>
                                @if (!$task->completed)
                                    <form method="POST" action="{{ route('tasks.update', $task) }}" class="ml-4">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="completed" value="1">
                                        <button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg text-sm font-medium transition duration-200">
                                            Mark Complete
                                        </button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    @empty
                        <p class="text-gray-600">No tasks assigned yet.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</body>
</html>