<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'DevTZ Software') }} — Engineering Next-Gen Digital Products</title>
    <meta name="description" content="DevTZ is a premier software engineering studio specializing in bespoke web applications, enterprise cloud architectures, mobile apps, and AI systems.">
    <meta name="keywords" content="DevTZ, Software Development, Laravel, Cloud Engineering, Web Apps, Mobile Development, AI Integration, Custom Software">
    
    <!-- Open Graph / Meta -->
    <meta property="og:type" content="website">
    <meta property="og:title" content="DevTZ Software — Engineering Next-Gen Digital Products">
    <meta property="og:description" content="Architecting high-performance web applications, scalable cloud infrastructure, and intelligent software systems.">
    <meta property="og:image" content="/images/devtz-og.png">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@300;400;500;600;700&family=Space+Grotesk:wght@300;400;500;600;700&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Tailwind CSS v4 & App Styling -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        'lemon-glitch': '#F5FF67',
                        'lemon-glitch-hover': '#E2EC48',
                        'lemon-glitch-dim': 'rgba(245, 255, 103, 0.12)',
                        'blueberry': {
                            'void': '#1C2459',
                            'dark': '#12173B',
                            'surface': '#171E4A',
                            'card': '#202963',
                            'border': '#2E3A82',
                            'glow': 'rgba(28, 36, 89, 0.6)'
                        }
                    },
                    fontFamily: {
                        sans: ['"Space Grotesk"', '"Inter"', 'sans-serif'],
                        mono: ['"JetBrains Mono"', 'monospace']
                    }
                }
            }
        }
    </script>
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">

    <!-- Alpine.js & Lucide Icons -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.8/dist/cdn.min.js"></script>
    <script src="https://unpkg.com/lucide@latest"></script>

    <!-- Theme Initialization Script (Prevents FOUC) -->
    <script>
        if (localStorage.getItem('devtz-theme') === 'light' || (!('devtz-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: light)').matches && false)) {
            document.documentElement.classList.remove('dark');
        } else {
            document.documentElement.classList.add('dark');
        }
    </script>
</head>
<body class="bg-[#FFFFFF] text-[#1C2459] dark:bg-[#1C2459] dark:text-gray-100 min-h-screen font-sans transition-colors duration-300 selection:bg-[#F5FF67] selection:text-[#1C2459] bg-cyber-grid"
      x-data="devtzApp()"
      @keydown.window.escape="closeAllModals()"
      @keydown.window.ctrl.k.prevent="toggleTerminal()">

    <!-- Main Navigation Header -->
    @include('components.navbar')

    <!-- Main Content Slot -->
    <main id="main-content" class="relative z-10">
        @yield('content')
    </main>

    <!-- Global Footer -->
    @include('components.footer')

    <!-- Interactive Developer CLI Terminal (Easter Egg) -->
    @include('components.terminal-modal')

    <!-- Global Flash Notification Toast -->
    @if(session('success'))
        <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 6000)" 
             class="fixed bottom-6 right-6 z-50 flex items-center gap-3 bg-[#12173B] text-white border-2 border-[#F5FF67] px-5 py-4 rounded-xl shadow-2xl transition-all duration-300 transform translate-y-0">
            <span class="w-3 h-3 rounded-full bg-[#F5FF67] animate-ping"></span>
            <span class="text-sm font-mono text-[#F5FF67] font-semibold">{{ session('success') }}</span>
            <button @click="show = false" class="text-gray-400 hover:text-white ml-2 text-lg">&times;</button>
        </div>
    @endif

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            if (window.lucide) {
                lucide.createIcons();
            }
        });
    </script>
</body>
</html>
