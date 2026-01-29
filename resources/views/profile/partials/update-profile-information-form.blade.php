<section>
    <header>
        <h2 class="text-xl font-black text-slate-900 tracking-tight">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-2 text-sm text-slate-500 font-medium">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-8 space-y-6">
        @csrf
        @method('patch')

        <div class="space-y-2">
            <label class="block text-xs font-black text-slate-500 uppercase tracking-widest pl-1">Name</label>
            <input id="name" name="name" type="text" 
                   value="{{ old('name', $user->name) }}" required autofocus autocomplete="name"
                   class="w-full px-5 py-3 bg-slate-50 border-0 rounded-2xl focus:ring-2 focus:ring-[#066c5f] font-semibold text-slate-900">
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div class="space-y-2">
            <label class="block text-xs font-black text-slate-500 uppercase tracking-widest pl-1">Email</label>
            <input id="email" name="email" type="email" 
                   value="{{ old('email', $user->email) }}" required autocomplete="username"
                   class="w-full px-5 py-3 bg-slate-50 border-0 rounded-2xl focus:ring-2 focus:ring-[#066c5f] font-semibold text-slate-900">
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div class="mt-4 p-4 bg-amber-50 rounded-2xl border border-amber-100">
                    <p class="text-xs font-bold text-amber-800 flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" /></svg>
                        Your email address is unverified.
                    </p>

                    <button form="send-verification" class="mt-2 text-xs font-black text-[#066c5f] hover:text-[#088a7a] uppercase tracking-widest underline decoration-2 underline-offset-4">
                        {{ __('Re-send verification email') }}
                    </button>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-3 font-bold text-xs text-emerald-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4 pt-4">
            <button type="submit" class="px-8 py-3 bg-[#066c5f] text-white rounded-xl font-black uppercase tracking-widest text-sm shadow-lg shadow-[#066c5f]/20 hover:bg-[#F77F1E] transition-all">
                {{ __('Save Changes') }}
            </button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm font-bold text-emerald-600"
                >{{ __('Saved successfully.') }}</p>
            @endif
        </div>
    </form>
</section>
