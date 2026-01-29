<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-6" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-6">
        @csrf

        <!-- Email Address -->
        <div class="space-y-2">
            <label for="email" class="block text-xs font-black text-slate-500 uppercase tracking-widest pl-1">Email Address</label>
            <div class="relative group">
                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                    <svg class="w-5 h-5 text-slate-400 group-focus-within:text-[#066c5f] transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.206" /></svg>
                </div>
                <input id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username"
                    class="w-full pl-12 pr-4 py-4 bg-slate-50 border-0 rounded-2xl focus:ring-2 focus:ring-[#066c5f] font-bold placeholder-slate-400 transition-all shadow-inner" 
                    placeholder="admin@vinsa.com">
            </div>
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="space-y-2">
            <div class="flex items-center justify-between pl-1">
                <label for="password" class="block text-xs font-black text-slate-500 uppercase tracking-widest">Security Pin</label>
                @if (Route::has('password.request'))
                    <a class="text-[10px] font-bold text-[#F77F1E] hover:text-[#066c5f] uppercase tracking-wider transition-colors" href="{{ route('password.request') }}">
                        Recovery?
                    </a>
                @endif
            </div>
            <div class="relative group">
                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                    <svg class="w-5 h-5 text-slate-400 group-focus-within:text-[#066c5f] transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" /></svg>
                </div>
                <input id="password" type="password" name="password" required autocomplete="current-password"
                    class="w-full pl-12 pr-4 py-4 bg-slate-50 border-0 rounded-2xl focus:ring-2 focus:ring-[#066c5f] font-bold placeholder-slate-400 transition-all shadow-inner" 
                    placeholder="••••••••">
            </div>
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="flex items-center pl-1">
            <label for="remember_me" class="inline-flex items-center cursor-pointer group">
                <div class="relative">
                    <input id="remember_me" type="checkbox" name="remember" class="sr-only peer">
                    <div class="w-10 h-5 bg-slate-200 rounded-full peer peer-checked:bg-[#066c5f] transition-colors after:content-[''] after:absolute after:top-1 after:left-1 after:bg-white after:rounded-full after:h-3 after:w-3 after:transition-all peer-checked:after:translate-x-5"></div>
                </div>
                <span class="ms-3 text-[11px] font-black text-slate-500 uppercase tracking-widest group-hover:text-slate-900 transition-colors">Remember Session</span>
            </label>
        </div>

        <button type="submit" class="w-full py-5 bg-[#066c5f] text-white rounded-[1.5rem] font-black uppercase tracking-[0.2em] shadow-lg shadow-[#066c5f]/30 hover:scale-[1.02] active:scale-95 transition-all flex items-center justify-center gap-3">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" /></svg>
            Unlock Access
        </button>
    </form>
</x-guest-layout>
