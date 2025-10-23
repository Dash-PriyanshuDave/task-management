<x-auth-card title="Sign in to your account" :subtitle="'Enter your details to continue'">
    @if (session('success'))
        <div class="bg-gradient-to-r from-emerald-400/20 to-teal-400/20 border border-emerald-400/50 backdrop-blur-sm text-emerald-100 px-6 py-4 rounded-2xl mb-8 shadow-xl">
            <div class="flex items-center">
                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                </svg>
                {{ session('success') }}
            </div>
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}" class="space-y-6">
        @csrf
        <div class="space-y-5">
            <div class="relative">
                <label for="email" class="block text-sm font-bold text-white/90 mb-2">Email Address</label>
                <div class="relative">
                    <input id="email" name="email" type="email" required 
                           class="w-full px-5 py-4 bg-white/20 border border-white/30 rounded-2xl text-white placeholder-white/60 backdrop-blur-sm focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent transition-all duration-300 @error('email') ring-2 ring-red-400 @enderror"
                           placeholder="your@email.com" value="{{ old('email') }}">
                    <div class="absolute inset-y-0 right-4 flex items-center pointer-events-none">
                        <svg class="w-5 h-5 text-white/50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.27 7.27c.883.883 2.317.883 3.2 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                    </div>
                </div>
                @error('email')
                    <p class="mt-2 text-sm text-red-300">{{ $message }}</p>
                @enderror
            </div>
            
            <div class="relative">
                <label for="password" class="block text-sm font-bold text-white/90 mb-2">Password</label>
                <div class="relative">
                    <input id="password" name="password" type="password" required 
                           class="w-full px-5 py-4 bg-white/20 border border-white/30 rounded-2xl text-white placeholder-white/60 backdrop-blur-sm focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent transition-all duration-300 @error('password') ring-2 ring-red-400 @enderror"
                           placeholder="••••••••">
                    <div class="absolute inset-y-0 right-4 flex items-center">
                        <svg class="w-5 h-5 text-white/50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                        </svg>
                    </div>
                </div>
                @error('password')
                    <p class="mt-2 text-sm text-red-300">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <button type="submit" 
                class="group relative w-full flex justify-center items-center py-5 px-6 border-0 rounded-2xl text-lg font-bold text-white bg-gradient-to-r from-blue-500 to-purple-600 hover:from-blue-600 hover:to-purple-700 focus:outline-none focus:ring-4 focus:ring-blue-500/50 shadow-2xl hover:shadow-3xl transform hover:-translate-y-1 transition-all duration-300 overflow-hidden">
            <span class="relative z-10">Sign In</span>
            <div class="absolute inset-0 bg-gradient-to-r from-white/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
        </button>
    </form>

    <div class="text-center pt-6 border-t border-white/20">
        <a href="{{ route('register') }}" class="inline-flex items-center font-bold text-blue-200 hover:text-white transition-all duration-300 transform hover:scale-105">
            Don't have an account? 
            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
            </svg>
        </a>
    </div>
</x-auth-card>