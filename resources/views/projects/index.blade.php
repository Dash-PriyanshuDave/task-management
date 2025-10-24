<!DOCTYPE html>
<html>
<head>
    <title>Projects</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-gray-100 to-gray-200 min-h-screen">
    <div class="min-h-screen">
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
            <div class="flex justify-between items-center mb-8">
                <h2 class="text-3xl font-bold text-gray-900">Projects</h2>
                @can('create', App\Models\Project::class)
                    <a href="{{ route('projects.create') }}" class="bg-emerald-500 hover:bg-emerald-600 text-white px-6 py-3 rounded-lg font-medium transition duration-300 shadow hover:shadow-lg">
                        New Project
                    </a>
                @endcan
                <a href="{{ route('dashboard') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg text-sm font-medium transition duration-200">
                        Back to dashboard
                </a>
            </div>

            @if (session('success'))
                <div class="bg-emerald-100 border border-emerald-400 text-emerald-700 px-4 py-3 rounded-lg mb-6">
                    {{ session('success') }}
                </div>
            @endif

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse ($projects as $project)
                    <div class="bg-white shadow-xl rounded-2xl p-6 hover:shadow-2xl transition duration-300">
                        <h3 class="text-xl font-bold text-gray-900">{{ $project->name }}</h3>
                        <p class="mt-2 text-gray-600">{{ $project->description ?? 'No description' }}</p>
                        <p class="mt-2 text-sm text-gray-500">Created by: {{ $project->creator->name }}</p>
                        <div class="mt-4 flex space-x-2">
                            <a href="{{ route('projects.tasks.index', $project) }}" class="text-blue-500 hover:text-blue-600 font-medium">View Tasks</a>
                            @can('update', $project)
                                <a href="{{ route('projects.edit', $project) }}" class="text-yellow-500 hover:text-yellow-600 font-medium">Edit</a>
                            @endcan
                            @can('delete', $project)
                                <form action="{{ route('projects.destroy', $project) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-600 font-medium" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            @endcan
                        </div>
                    </div>
                @empty
                    <p class="text-gray-600">No projects yet.</p>
                @endforelse
            </div>
        </div>
    </div>
</body>
</html>