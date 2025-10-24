<x-auth-card title="Create Account" :subtitle="'Join our team today'">
    <form method="POST" action="{{ route('register') }}" class="space-y-6">
        @csrf
        <div class="space-y-5">
            <div>
                <label for="name" class="block text-sm font-bold text-white/90 mb-2">Full Name</label>
                <input id="name" name="name" type="text" required 
                       class="w-full px-5 py-4 bg-black border border-white/30 rounded-2xl text-white placeholder-white/60 backdrop-blur-sm focus:outline-none focus:ring-2 focus:ring-emerald-400 focus:border-transparent transition-all duration-300 @error('name') ring-2 ring-red-400 @enderror"
                       placeholder="John Doe" value="{{ old('name') }}">
                @error('name')
                    <p class="mt-2 text-sm text-red-300">{{ $message }}</p>
                @enderror
            </div>
            
            <div>
                <label for="email" class="block text-sm font-bold text-white/90 mb-2">Email Address</label>
                <input id="email" name="email" type="email" required 
                       class="w-full px-5 py-4 bg-black border border-white/30 rounded-2xl text-white placeholder-white/60 backdrop-blur-sm focus:outline-none focus:ring-2 focus:ring-emerald-400 focus:border-transparent transition-all duration-300 @error('email') ring-2 ring-red-400 @enderror"
                       placeholder="john@example.com" value="{{ old('email') }}">
                @error('email')
                    <p class="mt-2 text-sm text-red-300">{{ $message }}</p>
                @enderror
            </div>
            
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label for="password" class="block text-sm font-bold text-white/90 mb-2">Password</label>
                    <input id="password" name="password" type="password" required 
                           class="w-full px-5 py-4 bg-black border border-white/30 rounded-2xl text-white placeholder-white/60 backdrop-blur-sm focus:outline-none focus:ring-2 focus:ring-emerald-400 focus:border-transparent transition-all duration-300 @error('password') ring-2 ring-red-400 @enderror"
                           placeholder="••••••••">
                    @error('password')
                        <p class="mt-2 text-sm text-red-300">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="password_confirmation" class="block text-sm font-bold text-white/90 mb-2">Confirm</label>
                    <input id="password_confirmation" name="password_confirmation" type="password" required 
                           class="w-full px-5 py-4 bg-black border border-white/30 rounded-2xl text-white placeholder-white/60 backdrop-blur-sm focus:outline-none focus:ring-2 focus:ring-emerald-400 focus:border-transparent transition-all duration-300">
                </div>
            </div>
            
            <div> 
                <label for="role" class="block text-sm font-bold text-white/90 mb-2">Role</label>
                <select id="role" name="role" required 
                        class="w-full px-5 py-4 bg-black border border-white/30 rounded-2xl text-white backdrop-blur-sm focus:outline-none focus:ring-2 focus:ring-emerald-400 focus:border-transparent transition-all duration-300 appearance-none">
                    <option value="">Select your role</option>
                    <option value="manager" {{ old('role') == 'manager' ? 'selected' : '' }}>👑 Manager</option>
                    <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>👤 Team Member</option>
                </select>
                @error('role')
                    <p class="mt-2 text-sm text-red-300">{{ $message }}</p>
                @enderror
            </div>
        </div>
        
        <button type="submit" 
                class="group relative w-full flex justify-center items-center py-5 px-6 border-0 rounded-2xl text-lg font-bold text-white bg-gradient-to-r from-emerald-500 to-teal-600 hover:from-emerald-600 hover:to-teal-700 focus:outline-none focus:ring-4 focus:ring-emerald-500/50 shadow-2xl hover:shadow-3xl transform hover:-translate-y-1 transition-all duration-300 overflow-hidden">
            <span class="relative z-10">Create Account</span>
            <div class="absolute inset-0 bg-gradient-to-r from-white/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
        </button>
    </form>
    
    <div class="text-center pt-6 border-t border-white/20">
        <a href="{{ route('login') }}" class="inline-flex items-center font-bold text-blue-200 hover:text-white transition-all duration-300 transform hover:scale-105">
            Already have an account? 
            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
        </a>
    </div>
</x-auth-card>  