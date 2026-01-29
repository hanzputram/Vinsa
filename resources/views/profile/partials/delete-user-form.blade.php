<section class="space-y-6">
    <header>
        <h2 class="text-xl font-black text-rose-600 tracking-tight italic">
            {{ __('Danger Zone') }}
        </h2>

        <p class="mt-2 text-sm text-slate-500 font-medium">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please download any data or information that you wish to retain before proceeding.') }}
        </p>
    </header>

    <button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
        class="px-8 py-3 bg-rose-600 text-white rounded-xl font-black uppercase tracking-widest text-sm shadow-lg shadow-rose-600/20 hover:bg-rose-700 transition-all"
    >{{ __('Delete Account') }}</button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-8">
            @csrf
            @method('delete')

            <h2 class="text-2xl font-black text-slate-900 tracking-tight mb-4">
                {{ __('Final Confirmation') }}
            </h2>

            <p class="text-sm text-slate-500 font-medium leading-relaxed mb-8">
                {{ __('Are you absolutely sure? This action is irreversible. All data associated with this account will be purged from the system. Please enter your password to authorize this request.') }}
            </p>

            <div class="space-y-2">
                <input id="password" name="password" type="password" 
                       placeholder="{{ __('Account Password') }}"
                       class="w-full px-5 py-3 bg-slate-50 border-0 rounded-2xl focus:ring-2 focus:ring-rose-500 font-semibold text-slate-900">
                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="mt-8 flex justify-end gap-3">
                <button type="button" x-on:click="$dispatch('close')" 
                        class="px-8 py-3 bg-slate-100 text-slate-600 rounded-xl font-bold uppercase tracking-widest text-xs hover:bg-slate-200 transition-all">
                    {{ __('Cancel') }}
                </button>

                <button type="submit" class="px-8 py-3 bg-rose-600 text-white rounded-xl font-black uppercase tracking-widest text-xs shadow-lg shadow-rose-600/20 hover:bg-rose-700 transition-all">
                    {{ __('Confirm Deletion') }}
                </button>
            </div>
        </form>
    </x-modal>
</section>
