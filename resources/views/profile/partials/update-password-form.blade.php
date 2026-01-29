<section>
    <header>
        <h2 class="text-xl font-black text-slate-900 tracking-tight">
            {{ __('Update Password') }}
        </h2>

        <p class="mt-2 text-sm text-slate-500 font-medium">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-8 space-y-6">
        @csrf
        @method('put')

        <div class="space-y-2">
            <label class="block text-xs font-black text-slate-500 uppercase tracking-widest pl-1">Current Password</label>
            <input id="update_password_current_password" name="current_password" type="password" autocomplete="current-password"
                   class="w-full px-5 py-3 bg-slate-50 border-0 rounded-2xl focus:ring-2 focus:ring-[#066c5f] font-semibold text-slate-900">
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>

        <div class="space-y-2">
            <label class="block text-xs font-black text-slate-500 uppercase tracking-widest pl-1">New Password</label>
            <input id="update_password_password" name="password" type="password" autocomplete="new-password"
                   class="w-full px-5 py-3 bg-slate-50 border-0 rounded-2xl focus:ring-2 focus:ring-[#066c5f] font-semibold text-slate-900">
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>

        <div class="space-y-2">
            <label class="block text-xs font-black text-slate-500 uppercase tracking-widest pl-1">Confirm Password</label>
            <input id="update_password_password_confirmation" name="password_confirmation" type="password" autocomplete="new-password"
                   class="w-full px-5 py-3 bg-slate-50 border-0 rounded-2xl focus:ring-2 focus:ring-[#066c5f] font-semibold text-slate-900">
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4 pt-4">
            <button type="submit" class="px-8 py-3 bg-[#066c5f] text-white rounded-xl font-black uppercase tracking-widest text-sm shadow-lg shadow-[#066c5f]/20 hover:bg-[#F77F1E] transition-all">
                {{ __('Update Password') }}
            </button>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm font-bold text-emerald-600"
                >{{ __('Password changed.') }}</p>
            @endif
        </div>
    </form>
</section>
