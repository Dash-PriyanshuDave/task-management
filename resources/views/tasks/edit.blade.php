<!DOCTYPE html>
<html>
<head>
    <title>Edit Task - {{ $task->title }}</title>
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
            <div class="bg-white shadow-xl rounded-2xl p-8 max-w-lg mx-auto">
                <h2 class="text-3xl font-bold text-gray-900 mb-6">Edit Task: {{ $task->title }}</h2>
                
                <form method="POST" action="{{ route('tasks.update', $task) }}" class="space-y-6">
                    @csrf
                    @method('PUT')
                    <div>
                        <label for="title" class="block text-sm font-bold text-gray-700 mb-2">Task Title</label>
                        <input id="title" name="title" type="text" required 
                               class="w-full px-5 py-4 bg-white border border-gray-300 rounded-2xl text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-emerald-400 focus:border-transparent transition-all duration-300 @error('title') ring-2 ring-red-400 @enderror"
                               value="{{ $task->title }}">
                        @error('title')
                            <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="description" class="block text-sm font-bold text-gray-700 mb-2">Description</label>
                        <textarea id="description" name="description" rows="4"
                                  class="w-full px-5 py-4 bg-white border border-gray-300 rounded-2xl text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-emerald-400 focus:border-transparent transition-all duration-300 @error('description') ring-2 ring-red-400 @enderror"
                                  >{{ $task->description }}</textarea>
                        @error('description')
                            <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="assigned_to" class="block text-sm font-bold text-gray-700 mb-2">Assign To</label>
                        <select id="assigned_to" name="assigned_to" required 
                                class="w-full px-5 py-4 bg-white border border-gray-300 rounded-2xl text-gray-900 focus:outline-none focus:ring-2 focus:ring-emerald-400 focus:border-transparent transition-all duration-300 appearance-none">
                            <option value="">Select Team Member</option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}" {{ $task->assigned_to == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                            @endforeach
                        </select>
                        @error('assigned_to')
                            <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex items-center">
                        <input id="completed" name="completed" type="checkbox" {{ $task->completed ? 'checked' : '' }} 
                               class="h-4 w-4 text-emerald-600 focus:ring-emerald-500 border-gray-300 rounded">
                        <label for="completed" class="ml-2 block text-sm text-gray-900">Mark as Completed</label>
                    </div>
                    <div>
                        <button type="submit" 
                                class="w-full flex justify-center items-center py-4 px-6 border-0 rounded-2xl text-lg font-bold text-white bg-gradient-to-r from-emerald-500 to-teal-600 hover:from-emerald-600 hover:to-teal-700 focus:outline-none focus:ring-4 focus:ring-emerald-500/50 shadow-2xl hover:shadow-3xl transform hover:-translate-y-1 transition-all duration-300">
                            Update Task
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>