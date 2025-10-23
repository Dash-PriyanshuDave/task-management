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

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="group bg-white/80 backdrop-blur-xl overflow-hidden shadow-2xl rounded-3xl p-10 border border-white/50 hover:shadow-3xl transition-all duration-500 hover:-translate-y-2">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 p-4 bg-gradient-to-r from-emerald-400 to-teal-500 rounded-2xl group-hover:rotate-12 transition-transform duration-500">
                            <svg class="h-10 w-10 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 100 4m0-4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 100 4m0-4v2m0-6V4" />
                            </svg>
                        </div>
                        <div class="ml-6 w-0 flex-1">
                            <dl>
                                <dt class="text-lg font-bold text-gray-500 truncate">Projects Created</dt>
                                <dd class="text-4xl font-black text-gray-900">0</dd>
                            </dl>
                        </div>
                    </div>
                </div>
                <!-- Add more stats cards similarly -->
            </div>
        </div>
    </div>
</body>
</html>