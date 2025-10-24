<!DOCTYPE html>
<html>
<head>
    <title>Manager Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-r from-emerald-500 to-teal-600 min-h-screen">
    <div class="min-h-screen bg-gradient-to-br from-emerald-50 to-teal-100">
        <nav class="bg-white shadow-2xl border-b-4 border-emerald-500">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-20">
                    <div class="flex items-center">
                        <h1 class="text-3xl font-black bg-gradient-to-r from-emerald-600 to-teal-600 bg-clip-text text-transparent">
                            Task Manager Pro
                        </h1>
                    </div>
                    <div class="flex items-center space-x-4">
                        <span class="text-gray-700 font-bold bg-emerald-100 px-3 py-1 rounded-full text-sm">
                            👑 Manager: {{ auth()->user()->name }}
                        </span>
                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <button type="submit" class="bg-gradient-to-r from-red-500 to-red-600 hover:from-red-600 hover:to-red-700 text-white px-6 py-2 rounded-xl text-sm font-bold shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </nav>

        <div class="max-w-7xl mx-auto py-16 px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <div class="mx-auto inline-flex h-20 w-20 items-center justify-center rounded-2xl bg-gradient-to-r from-emerald-500 to-teal-500 shadow-2xl">
                    <svg class="h-10 w-10 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-4.32a12.083 12.083 0 01.7 6.4 12.76 12.76 0 01-9.528 8.32 12.52 12.52 0 01-3.39-2.175A12.176 12.176 0 013 12c0-1.355.08-2.683.21-4z" />
                    </svg>
                </div>
                <h2 class="mt-8 text-5xl font-black text-gray-900 tracking-tight">Manager Control Center</h2>
                <p class="mt-6 text-2xl text-gray-600 font-semibold">Create projects • Assign tasks • Lead your team</p>
            </div>

            <!-- Project Creation Link -->
            <div class="mb-12 text-center">
                <a href="{{ route('projects.create') }}" class="inline-flex items-center py-4 px-8 bg-gradient-to-r from-emerald-500 to-teal-600 hover:from-emerald-600 hover:to-teal-700 text-white font-bold text-lg rounded-2xl shadow-2xl hover:shadow-3xl transform hover:-translate-y-1 transition-all duration-300">
                    <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    Create New Project
                </a>
            </div>

            <!-- Projects Section -->
            <div class="mb-16">
                <h3 class="text-2xl font-bold text-gray-900 mb-6">Your Projects and Tasks</h3>
                @forelse ($projects as $project)
                    <div class="mb-8 bg-white/80 backdrop-blur-xl shadow-2xl rounded-3xl p-8 border border-white/50">
                        <h4 class="text-xl font-bold text-gray-900 mb-4">{{ $project->name }}</h4>
                        <p class="text-gray-600 mb-4">{{ $project->description ?? 'No description' }}</p>
                        <a href="{{ route('projects.tasks.index', $project) }}" class="inline-block text-emerald-500 hover:text-emerald-600 font-medium mb-4">View All Tasks</a>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            @forelse ($project->tasks as $task)
                                <div class="p-4 bg-white rounded-2xl shadow">
                                    <p class="font-medium text-gray-900">{{ $task->title }}</p>
                                    <p class="text-sm text-gray-600">{{ $task->description ?? 'No description' }}</p>
                                    <p class="text-sm text-gray-500">Assigned to: {{ $task->assignee->name }}</p>
                                    <p class="text-sm text-gray-500">Status: {{ $task->completed ? 'Completed' : 'Pending' }}</p>
                                </div>
                            @empty
                                <p class="text-gray-600">No tasks in this project.</p>
                            @endforelse
                        </div>
                    </div>
                @empty
                    <p class="text-gray-600">No projects created yet.</p>
                @endforelse
            </div>

            <!-- Users Section -->
            <div>
                <h3 class="text-2xl font-bold text-gray-900 mb-6">Team Members</h3>
                <div class="bg-white/80 backdrop-blur-xl shadow-2xl rounded-3xl p-8 border border-white/50">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @forelse ($users as $user)
                            <div class="flex items-center p-4 bg-white rounded-2xl shadow hover:shadow-lg transition duration-300">
                                <div class="flex-shrink-0 w-12 h-12 bg-gradient-to-r from-emerald-400 to-teal-500 rounded-full flex items-center justify-center">
                                    <span class="text-white font-bold">{{ strtoupper(substr($user->name, 0, 1)) }}</span>
                                </div>
                                <div class="ml-4">
                                    <p class="text-lg font-medium text-gray-900">{{ $user->name }}</p>
                                    <p class="text-sm text-gray-500">{{ $user->role === 'manager' ? '👑 Manager' : '👤 Team Member' }}</p>
                                    <p class="text-sm text-gray-500">Email: {{ $user->email }}</p>
                                </div>
                            </div>
                        @empty
                            <p class="text-gray-600">No users found.</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>