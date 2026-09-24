@extends('layouts.app')

@section('content')
<div class="min-h-[85vh] flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8 relative overflow-hidden">
    <!-- Ambient Cyber Glows -->
    <div class="absolute top-1/3 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[500px] h-[300px] bg-[#F5FF67]/10 dark:bg-[#F5FF67]/8 blur-[100px] rounded-full pointer-events-none"></div>

    <div class="max-w-md w-full space-y-8 relative z-10" x-data="{ showPassword: false }">
        
        <!-- Header -->
        <div class="text-center space-y-3">
            <div class="inline-flex items-center justify-center w-14 h-14 rounded-2xl bg-[#1C2459] border-2 border-[#F5FF67] shadow-[0_0_25px_rgba(245,255,103,0.35)] text-[#F5FF67] font-mono text-2xl font-bold mb-2">
                &lt;/&gt;
            </div>
            <h1 class="text-3xl font-extrabold tracking-tight text-[#1C2459] dark:text-white font-mono">
                Mission Control
            </h1>
            <p class="text-xs font-mono text-gray-500 dark:text-[#A5B4FC]">
                DevTZ Internal Team Authentication Node
            </p>
        </div>

        <!-- Login Card -->
        <div class="p-8 rounded-2xl bg-white dark:bg-[#171E4A] border-2 border-gray-200 dark:border-[#2E3A82] shadow-2xl space-y-6">
            
            @if ($errors->any())
                <div class="p-4 rounded-xl bg-red-500/10 border border-red-500/30 text-red-600 dark:text-red-400 text-xs font-mono">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif


            <form action="{{ route('login.post') }}" method="POST" class="space-y-5">
                @csrf

                <!-- Email Input -->
                <div class="space-y-1.5">
                    <label class="block text-xs font-mono text-gray-700 dark:text-gray-300 font-semibold" for="email">
                        Team Email Address
                    </label>
                    <div class="relative">
                        <input type="email" name="email" id="email" required autofocus
                               value="{{ old('email') }}"
                               placeholder="architect@devtz.com"
                               class="w-full px-4 py-3 rounded-xl bg-gray-50 dark:bg-[#12173B] border border-gray-300 dark:border-[#2E3A82] text-sm text-gray-900 dark:text-white placeholder-gray-400 focus:outline-none focus:border-[#F5FF67] transition-all">
                    </div>
                </div>

                <!-- Password Input -->
                <div class="space-y-1.5">
                    <div class="flex items-center justify-between">
                        <label class="block text-xs font-mono text-gray-700 dark:text-gray-300 font-semibold" for="password">
                            Access Security Key
                        </label>
                        <button type="button" @click="showPassword = !showPassword" class="text-[11px] font-mono text-gray-500 dark:text-gray-400 hover:text-[#1C2459] dark:hover:text-[#F5FF67]">
                            <span x-text="showPassword ? 'Hide Key' : 'Reveal Key'"></span>
                        </button>
                    </div>
                    <div class="relative">
                        <input :type="showPassword ? 'text' : 'password'" name="password" id="password" required
                               placeholder="••••••••••••"
                               class="w-full px-4 py-3 rounded-xl bg-gray-50 dark:bg-[#12173B] border border-gray-300 dark:border-[#2E3A82] text-sm text-gray-900 dark:text-white placeholder-gray-400 focus:outline-none focus:border-[#F5FF67] transition-all">
                    </div>
                </div>

                <!-- Remember Me -->
                <div class="flex items-center justify-between">
                    <label class="flex items-center gap-2 text-xs font-mono text-gray-700 dark:text-gray-300 cursor-pointer">
                        <input type="checkbox" name="remember" class="rounded text-[#1C2459] focus:ring-[#F5FF67] dark:bg-[#1C2459] border-gray-300 dark:border-[#2E3A82]">
                        <span>Keep node session active</span>
                    </label>
                </div>

                <!-- Submit Button -->
                <button type="submit"
                        class="w-full py-3.5 px-4 text-xs font-mono font-bold uppercase tracking-wider text-[#1C2459] bg-[#F5FF67] hover:bg-[#E2EC48] rounded-xl shadow-[0_0_20px_rgba(245,255,103,0.35)] hover:shadow-[0_0_30px_rgba(245,255,103,0.6)] transform hover:-translate-y-0.5 transition-all">
                    Authenticate Session ⚡
                </button>
            </form>

            <div class="text-center pt-2">
                <a href="{{ route('portfolio.index') }}" class="text-xs font-mono text-gray-500 dark:text-gray-400 hover:text-[#1C2459] dark:hover:text-[#F5FF67] inline-flex items-center gap-1">
                    <span>← Return to Public Portfolio</span>
                </a>
            </div>

        </div>

    </div>
</div>
@endsection
