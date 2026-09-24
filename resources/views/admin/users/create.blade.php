@extends('layouts.admin')

@section('title', 'Register New Admin')

@section('content')
<div class="max-w-2xl mx-auto space-y-6 font-mono text-xs" x-data="{ showPassword: false }">
    
    <!-- Top Header -->
    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-2xl font-bold text-[#1C2459] dark:text-white">Register New Admin Operator</h2>
            <p class="text-gray-500 dark:text-gray-400">Grant full mission control access to a trusted team member.</p>
        </div>
        <a href="{{ route('admin.users.index') }}" class="text-gray-500 hover:text-[#1C2459] dark:hover:text-[#F5FF67] transition-colors">
            ← Back to Operators
        </a>
    </div>

    <!-- Error Callout -->
    @if ($errors->any())
        <div class="p-4 rounded-xl bg-red-500/10 border border-red-500/30 text-red-600 dark:text-red-400 text-xs font-mono">
            <div class="font-bold mb-1">Please correct the following:</div>
            <ul class="list-disc list-inside space-y-0.5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Create Admin Form -->
    <form action="{{ route('admin.users.store') }}" method="POST" class="p-8 rounded-2xl bg-white dark:bg-[#171E4A] border border-gray-200 dark:border-[#2E3A82] space-y-6 shadow-sm">
        @csrf

        <!-- Name Input -->
        <div class="space-y-1.5">
            <label class="block font-bold text-gray-700 dark:text-gray-200" for="name">
                Full Name *
            </label>
            <input type="text" name="name" id="name" required autofocus value="{{ old('name') }}"
                   placeholder="e.g. Alex Vance"
                   class="w-full px-4 py-2.5 rounded-xl bg-gray-50 dark:bg-[#12173B] border border-gray-300 dark:border-[#2E3A82] text-gray-900 dark:text-white placeholder-gray-400 focus:outline-none focus:border-[#F5FF67] transition-all">
        </div>

        <!-- Email Input -->
        <div class="space-y-1.5">
            <label class="block font-bold text-gray-700 dark:text-gray-200" for="email">
                Operator Email Address *
            </label>
            <input type="email" name="email" id="email" required value="{{ old('email') }}"
                   placeholder="operator@devtz.com"
                   autocomplete="off"
                   class="w-full px-4 py-2.5 rounded-xl bg-gray-50 dark:bg-[#12173B] border border-gray-300 dark:border-[#2E3A82] text-gray-900 dark:text-white placeholder-gray-400 focus:outline-none focus:border-[#F5FF67] transition-all">
        </div>

        <!-- Password Inputs Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
            <div class="space-y-1.5">
                <div class="flex items-center justify-between">
                    <label class="block font-bold text-gray-700 dark:text-gray-200" for="password">
                        Access Key (Password) *
                    </label>
                    <button type="button" @click="showPassword = !showPassword" class="text-[10px] text-gray-400 hover:text-[#1C2459] dark:hover:text-[#F5FF67]">
                        <span x-text="showPassword ? 'Hide' : 'Reveal'"></span>
                    </button>
                </div>
                <input :type="showPassword ? 'text' : 'password'" name="password" id="password" required minlength="6"
                       placeholder="••••••••••••"
                       autocomplete="new-password"
                       class="w-full px-4 py-2.5 rounded-xl bg-gray-50 dark:bg-[#12173B] border border-gray-300 dark:border-[#2E3A82] text-gray-900 dark:text-white placeholder-gray-400 focus:outline-none focus:border-[#F5FF67] transition-all">
            </div>

            <div class="space-y-1.5">
                <label class="block font-bold text-gray-700 dark:text-gray-200" for="password_confirmation">
                    Confirm Access Key *
                </label>
                <input :type="showPassword ? 'text' : 'password'" name="password_confirmation" id="password_confirmation" required minlength="6"
                       placeholder="••••••••••••"
                       autocomplete="new-password"
                       class="w-full px-4 py-2.5 rounded-xl bg-gray-50 dark:bg-[#12173B] border border-gray-300 dark:border-[#2E3A82] text-gray-900 dark:text-white placeholder-gray-400 focus:outline-none focus:border-[#F5FF67] transition-all">
            </div>
        </div>

        <!-- Security Note -->
        <div class="p-3.5 rounded-xl bg-gray-50 dark:bg-[#12173B] border border-gray-200 dark:border-[#2E3A82] text-gray-500 dark:text-gray-400 text-[11px] flex items-start gap-2">
            <svg class="w-4 h-4 text-[#F5FF67] shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            <span>Newly created administrators will have immediate authorization to manage projects, inquiries, engineering radar articles, and team users.</span>
        </div>

        <!-- Form Actions -->
        <div class="flex items-center justify-end gap-3 pt-4 border-t border-gray-200 dark:border-[#2E3A82]">
            <a href="{{ route('admin.users.index') }}" 
               class="px-4 py-2.5 rounded-xl border border-gray-300 dark:border-[#2E3A82] text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-[#12173B] transition-all font-bold">
                Cancel
            </a>
            <button type="submit" 
                    class="px-6 py-2.5 rounded-xl bg-[#F5FF67] hover:bg-[#E2EC48] text-[#1C2459] font-bold shadow-[0_0_15px_rgba(245,255,103,0.3)] transition-all flex items-center gap-2">
                <span>Create Admin Account</span>
                <span>⚡</span>
            </button>
        </div>

    </form>

</div>
@endsection
