<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Mission Control') — DevTZ Admin CMS</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@300;400;500;600;700&family=Space+Grotesk:wght@300;400;500;600;700&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Tailwind CSS & App Styling -->
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

    <!-- Alpine.js & Lucide -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.8/dist/cdn.min.js"></script>
    <script src="https://unpkg.com/lucide@latest"></script>

    <script>
        if (localStorage.getItem('devtz-theme') === 'light') {
            document.documentElement.classList.remove('dark');
        } else {
            document.documentElement.classList.add('dark');
        }
    </script>
</head>
<body class="bg-[#FFFFFF] text-[#1C2459] dark:bg-[#12173B] dark:text-gray-100 min-h-screen font-sans transition-colors duration-300 selection:bg-[#F5FF67] selection:text-[#1C2459]"
      x-data="{ 
          darkMode: localStorage.getItem('devtz-theme') !== 'light',
          sidebarOpen: false,
          toggleTheme() {
              this.darkMode = !this.darkMode;
              if (this.darkMode) {
                  document.documentElement.classList.add('dark');
                  localStorage.setItem('devtz-theme', 'dark');
              } else {
                  document.documentElement.classList.remove('dark');
                  localStorage.setItem('devtz-theme', 'light');
              }
          }
      }">

    <div class="flex h-screen overflow-hidden">
        
        <!-- Sidebar Navigation -->
        <aside class="hidden lg:flex flex-col w-64 bg-white dark:bg-[#171E4A] border-r border-gray-200 dark:border-[#2E3A82] select-none transition-colors duration-300">
            <!-- Brand -->
            <div class="h-20 flex items-center px-6 border-b border-gray-200 dark:border-[#2E3A82]">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3">
                    <div class="w-9 h-9 rounded-lg bg-[#1C2459] border-2 border-[#F5FF67] flex items-center justify-center text-[#F5FF67] font-mono font-bold">
                        &lt;/&gt;
                    </div>
                    <div>
                        <span class="font-bold text-xl font-mono text-[#1C2459] dark:text-white">Dev<span class="text-[#F5FF67] bg-[#1C2459] px-1 py-0.5 rounded">TZ</span></span>
                        <span class="block text-[9px] uppercase font-mono tracking-widest text-gray-500 dark:text-gray-400">Mission Control</span>
                    </div>
                </a>
            </div>

            <!-- Nav Links -->
            <nav class="flex-1 px-4 py-6 space-y-1.5 font-mono text-xs overflow-y-auto">
                <a href="{{ route('admin.dashboard') }}" 
                   class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl font-bold transition-all {{ request()->routeIs('admin.dashboard') ? 'bg-[#F5FF67] text-[#1C2459] shadow-[0_0_15px_rgba(245,255,103,0.3)]' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-[#1C2459]' }}">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/></svg>
                    <span>Dashboard</span>
                </a>

                <a href="{{ route('admin.projects.index') }}" 
                   class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl font-bold transition-all {{ request()->routeIs('admin.projects.*') ? 'bg-[#F5FF67] text-[#1C2459] shadow-[0_0_15px_rgba(245,255,103,0.3)]' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-[#1C2459]' }}">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
                    <span>Portfolio Projects</span>
                </a>

                <a href="{{ route('admin.inquiries.index') }}" 
                   class="flex items-center justify-between px-3.5 py-2.5 rounded-xl font-bold transition-all {{ request()->routeIs('admin.inquiries.*') ? 'bg-[#F5FF67] text-[#1C2459] shadow-[0_0_15px_rgba(245,255,103,0.3)]' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-[#1C2459]' }}">
                    <div class="flex items-center gap-3">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        <span>Client Inquiries</span>
                    </div>
                    @php
                        $newInquiriesCount = \App\Models\ContactInquiry::where('status', 'new')->count();
                    @endphp
                    @if($newInquiriesCount > 0)
                        <span class="px-1.5 py-0.5 text-[10px] rounded-full bg-red-500 text-white font-bold">{{ $newInquiriesCount }}</span>
                    @endif
                </a>

                <a href="{{ route('admin.articles.index') }}" 
                   class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl font-bold transition-all {{ request()->routeIs('admin.articles.*') ? 'bg-[#F5FF67] text-[#1C2459] shadow-[0_0_15px_rgba(245,255,103,0.3)]' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-[#1C2459]' }}">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg>
                    <span>Radar Articles</span>
                </a>

                <a href="{{ route('admin.subscribers.index') }}" 
                   class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl font-bold transition-all {{ request()->routeIs('admin.subscribers.*') ? 'bg-[#F5FF67] text-[#1C2459] shadow-[0_0_15px_rgba(245,255,103,0.3)]' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-[#1C2459]' }}">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                    <span>Subscribers</span>
                </a>

                <div class="pt-6 border-t border-gray-200 dark:border-[#2E3A82]/60 mt-6">
                    <a href="{{ route('portfolio.index') }}" target="_blank"
                       class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-gray-500 dark:text-gray-400 hover:text-[#1C2459] dark:hover:text-[#F5FF67] hover:bg-gray-100 dark:hover:bg-[#1C2459] transition-all">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                        <span>View Live Site</span>
                    </a>
                </div>
            </nav>

            <!-- User session footer -->
            <div class="p-4 border-t border-gray-200 dark:border-[#2E3A82] flex items-center justify-between">
                <div class="flex items-center gap-2.5">
                    <div class="w-8 h-8 rounded-full bg-[#F5FF67] text-[#1C2459] font-bold font-mono flex items-center justify-center text-xs">
                        {{ strtoupper(substr(Auth::user()->name ?? 'A', 0, 1)) }}
                    </div>
                    <div class="min-w-0">
                        <div class="text-xs font-bold font-mono text-[#1C2459] dark:text-white truncate">{{ Auth::user()->name ?? 'DevTZ Admin' }}</div>
                        <div class="text-[10px] text-gray-500 dark:text-gray-400 truncate">{{ Auth::user()->email ?? 'admin@devtz.com' }}</div>
                    </div>
                </div>

                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" title="Logout" class="text-gray-400 hover:text-red-500 p-1.5 rounded-lg hover:bg-gray-100 dark:hover:bg-[#1C2459]">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                    </button>
                </form>
            </div>
        </aside>

        <!-- Main Wrapper -->
        <div class="flex-1 flex flex-col min-w-0 overflow-hidden">
            
            <!-- Top Bar -->
            <header class="h-20 bg-white/80 dark:bg-[#171E4A]/90 backdrop-blur-md border-b border-gray-200 dark:border-[#2E3A82] flex items-center justify-between px-6 z-30">
                <div class="flex items-center gap-4">
                    <button @click="sidebarOpen = !sidebarOpen" class="lg:hidden p-2 rounded-lg bg-gray-100 dark:bg-[#12173B]">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                    </button>
                    <h1 class="text-lg font-bold font-mono text-[#1C2459] dark:text-white">@yield('title', 'Mission Control')</h1>
                </div>

                <div class="flex items-center gap-3">
                    <button @click="toggleTheme()" 
                            class="p-2 rounded-lg bg-gray-100 dark:bg-[#12173B] text-gray-700 dark:text-[#F5FF67] border border-gray-300 dark:border-[#2E3A82]">
                        <svg x-show="!darkMode" class="w-4 h-4 text-[#1C2459]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                        <svg x-show="darkMode" class="w-4 h-4 text-[#F5FF67]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"/></svg>
                    </button>
                </div>
            </header>

            <!-- Main Page Content -->
            <main class="flex-1 overflow-y-auto p-6 md:p-8 bg-gray-50 dark:bg-[#12173B] bg-cyber-grid">
                @if(session('success'))
                    <div class="mb-6 p-4 rounded-xl bg-emerald-500/15 border border-emerald-500/40 text-emerald-700 dark:text-emerald-300 text-xs font-mono flex items-center justify-between">
                        <div class="flex items-center gap-2">
                            <span class="w-2 h-2 rounded-full bg-emerald-400 animate-ping"></span>
                            <span>{{ session('success') }}</span>
                        </div>
                    </div>
                @endif

                @yield('content')
            </main>

        </div>

    </div>

</body>
</html>
