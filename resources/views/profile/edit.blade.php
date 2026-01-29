<x-app-layout>
    <div class="p-6 md:p-10 space-y-10">
        <!-- Header Section -->
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-6">
            <div>
                <h1 class="text-3xl font-black text-slate-900 tracking-tight">Security & Profile</h1>
                <p class="text-slate-500 font-medium tracking-tight">Manage your account settings and preferences</p>
            </div>
        </div>

        <div class="space-y-8">
            <!-- Update Profile Information -->
            <div class="bg-white rounded-[2.5rem] p-8 md:p-10 border border-slate-200 shadow-sm">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <!-- Update Password -->
            <div class="bg-white rounded-[2.5rem] p-8 md:p-10 border border-slate-200 shadow-sm">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <!-- Delete User -->
            <div class="bg-rose-50/30 rounded-[2.5rem] p-8 md:p-10 border border-rose-100 shadow-sm">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
