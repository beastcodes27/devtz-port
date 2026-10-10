@extends('layouts.app')

@section('content')
<div class="min-h-[80vh] flex items-center justify-center py-16 px-4 sm:px-6 lg:px-8 relative overflow-hidden">
    <!-- Cyberpunk Accent Background Glows -->
    <div class="absolute top-1/4 left-1/2 -translate-x-1/2 w-96 h-96 bg-[#F5FF67]/10 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute bottom-10 right-10 w-80 h-80 bg-[#1C2459] rounded-full blur-2xl pointer-events-none"></div>

    <div class="max-w-md w-full space-y-8 bg-white dark:bg-[#12173B] p-8 md:p-10 rounded-3xl border-2 border-gray-200 dark:border-[#2E3A82] shadow-2xl relative z-10">
        
        <!-- Header -->
        <div class="text-center space-y-3">
            <div class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full bg-gray-100 dark:bg-[#1C2459] border border-gray-300 dark:border-[#2E3A82] text-xs font-mono text-[#1C2459] dark:text-[#F5FF67]">
                <span class="w-2 h-2 rounded-full bg-[#F5FF67] animate-pulse"></span>
                <span>SYSTEM ADMINISTRATION LOG IN</span>
            </div>
            <h2 class="text-3xl font-extrabold text-[#1C2459] dark:text-white tracking-tight font-mono">
                Dev<span class="text-[#F5FF67]">TZ</span> Control Panel
            </h2>
            <p class="text-xs text-gray-500 dark:text-gray-400">
                Authenticate with your administrator credentials to manage portfolio projects, client inquiries, and platform settings.
            </p>
        </div>

        <!-- Login Form -->
        <form class="mt-8 space-y-6" action="{{ route('login.post') }}" method="POST">
            @csrf

            @if(session('error'))
                <div class="p-4 rounded-xl bg-red-500/10 border border-red-500/30 text-red-600 dark:text-red-400 text-xs font-mono flex items-center gap-2">
                    <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    <span>{{ session('error') }}</span>
                </div>
            @endif

            <div class="space-y-4 text-xs font-mono">
                <!-- Email Field -->
                <div>
                    <label for="email" class="block font-semibold text-gray-700 dark:text-gray-300 mb-1.5 uppercase tracking-wider">
                        Admin Email Address
                    </label>
                    <div class="relative">
                        <input id="email" name="email" type="email" autocomplete="email" required
                               class="w-full px-4 py-3 rounded-xl bg-gray-50 dark:bg-[#1C2459] border border-gray-300 dark:border-[#2E3A82] text-gray-900 dark:text-white placeholder-gray-400 focus:outline-none focus:border-[#F5FF67] focus:ring-1 focus:ring-[#F5FF67] transition-all"
                               placeholder="admin@devtz.site" value="admin@devtz.site">
                    </div>
                </div>

                <!-- Password Field -->
                <div>
                    <label for="password" class="block font-semibold text-gray-700 dark:text-gray-300 mb-1.5 uppercase tracking-wider">
                        Secure Password
                    </label>
                    <div class="relative">
                        <input id="password" name="password" type="password" autocomplete="current-password" required
                               class="w-full px-4 py-3 rounded-xl bg-gray-50 dark:bg-[#1C2459] border border-gray-300 dark:border-[#2E3A82] text-gray-900 dark:text-white placeholder-gray-400 focus:outline-none focus:border-[#F5FF67] focus:ring-1 focus:ring-[#F5FF67] transition-all"
                               placeholder="••••••••••••">
                    </div>
                </div>
            </div>

            <!-- Remember Me & Forgot Password -->
            <div class="flex items-center justify-between text-xs font-mono">
                <label class="flex items-center gap-2 text-gray-600 dark:text-gray-300 cursor-pointer">
                    <input type="checkbox" name="remember" class="w-4 h-4 rounded border-gray-300 dark:border-[#2E3A82] text-[#1C2459] focus:ring-[#F5FF67]">
                    <span>Remember session</span>
                </label>
                <a href="#contact" class="text-gray-500 hover:text-[#F5FF67] transition-colors">Contact Root Admin</a>
            </div>

            <!-- Submit Button -->
            <div>
                <button type="submit"
                        class="w-full flex items-center justify-center py-3.5 px-4 rounded-xl text-sm font-mono font-bold text-[#1C2459] bg-[#F5FF67] hover:bg-[#E2EC48] shadow-[0_0_20px_rgba(245,255,103,0.3)] hover:shadow-[0_0_25px_rgba(245,255,103,0.5)] transition-all transform hover:-translate-y-0.5">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/></svg>
                    <span>Authorize & Log In</span>
                </button>
            </div>
        </form>

        <!-- Access Info Footer -->
        <div class="pt-4 border-t border-gray-200 dark:border-[#2E3A82]/50 text-center text-[11px] font-mono text-gray-500 dark:text-gray-400">
            <span>DevTZ Infrastructure Security Gateway • Port 8000</span>
        </div>

    </div>
</div>
@endsection

