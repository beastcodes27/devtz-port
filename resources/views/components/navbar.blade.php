<header class="sticky top-0 z-40 w-full backdrop-blur-md bg-white/85 dark:bg-[#1C2459]/90 border-b border-gray-200 dark:border-[#2E3A82] transition-colors duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-20">
            <!-- Brand Logo -->
            <a href="/" class="flex items-center gap-3 group">
                <div class="w-10 h-10 rounded-lg bg-[#1C2459] dark:bg-[#12173B] border-2 border-[#F5FF67] flex items-center justify-center text-[#F5FF67] font-mono font-bold text-xl shadow-[0_0_15px_rgba(245,255,103,0.3)] group-hover:scale-105 transition-transform duration-200">
                    &lt;/&gt;
                </div>
                <div class="flex flex-col">
                    <div class="flex items-center gap-1.5">
                        <span class="font-bold text-2xl tracking-tight text-[#1C2459] dark:text-white font-mono">Dev<span class="text-[#1C2459] dark:text-[#F5FF67] bg-[#F5FF67] dark:bg-transparent px-1.5 py-0.5 rounded dark:px-0">TZ</span></span>
                        <span class="inline-block w-2 h-2 rounded-full bg-[#F5FF67] animate-pulse"></span>
                    </div>
                    <span class="text-[10px] uppercase font-mono tracking-widest text-gray-500 dark:text-gray-400">Software Studio</span>
                </div>
            </a>

            <!-- Desktop Navigation Links -->
            <nav class="hidden md:flex items-center gap-7 text-sm font-medium">
                <a href="#services" class="text-gray-700 dark:text-gray-300 hover:text-[#1C2459] dark:hover:text-[#F5FF67] transition-colors duration-150">Services</a>
                <a href="#projects" class="text-gray-700 dark:text-gray-300 hover:text-[#1C2459] dark:hover:text-[#F5FF67] transition-colors duration-150">Case Studies</a>
                <a href="#process" class="text-gray-700 dark:text-gray-300 hover:text-[#1C2459] dark:hover:text-[#F5FF67] transition-colors duration-150">Process</a>
                <a href="#about" class="text-gray-700 dark:text-gray-300 hover:text-[#1C2459] dark:hover:text-[#F5FF67] transition-colors duration-150">About Us</a>
                <a href="#contact" class="text-gray-700 dark:text-gray-300 hover:text-[#1C2459] dark:hover:text-[#F5FF67] transition-colors duration-150">Contact</a>
            </nav>

            <!-- Actions Right (Terminal, Theme Toggle, CTA) -->
            <div class="hidden lg:flex items-center gap-4">
                <!-- CLI Terminal Button -->
                <button @click="toggleTerminal()" 
                        title="Toggle CLI Terminal (Ctrl+K)"
                        class="flex items-center gap-2 px-3 py-1.5 rounded-lg text-xs font-mono bg-gray-100 dark:bg-[#12173B] text-[#1C2459] dark:text-[#F5FF67] border border-gray-300 dark:border-[#2E3A82] hover:border-[#F5FF67] transition-all">
                    <svg class="w-3.5 h-3.5 text-[#F5FF67] bg-[#1C2459] p-0.5 rounded" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l3 3-3 3m5 0h3M5 20h14a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                    <span>CLI</span>
                    <kbd class="px-1.5 py-0.5 text-[10px] bg-white dark:bg-[#1C2459] border border-gray-300 dark:border-[#2E3A82] rounded text-gray-500 dark:text-gray-400">⌘K</kbd>
                </button>

                <!-- Theme Switcher -->
                <button @click="toggleTheme()" 
                        aria-label="Toggle Color Theme"
                        class="p-2.5 rounded-lg bg-gray-100 dark:bg-[#12173B] text-gray-700 dark:text-[#F5FF67] border border-gray-300 dark:border-[#2E3A82] hover:scale-105 transition-all">
                    <!-- Sun icon for light mode -->
                    <svg x-show="!darkMode" class="w-4 h-4 text-[#1C2459]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                    <!-- Moon icon for dark mode -->
                    <svg x-show="darkMode" class="w-4 h-4 text-[#F5FF67]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"/></svg>
                </button>

                <!-- CTA Button -->
                <a href="#contact" 
                   class="relative inline-flex items-center justify-center px-5 py-2.5 text-sm font-semibold font-mono tracking-wide text-[#1C2459] bg-[#F5FF67] hover:bg-[#E2EC48] rounded-lg shadow-[0_0_15px_rgba(245,255,103,0.3)] hover:shadow-[0_0_22px_rgba(245,255,103,0.5)] transition-all transform hover:-translate-y-0.5">
                    <span>Get a Quote</span>
                    <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                </a>
            </div>

            <!-- Mobile Menu Toggle Button -->
            <div class="flex items-center gap-2 md:hidden">
                <button @click="toggleTheme()" class="p-2 rounded-lg bg-gray-100 dark:bg-[#12173B] text-gray-700 dark:text-[#F5FF67] border border-gray-300 dark:border-[#2E3A82]">
                    <svg x-show="!darkMode" class="w-4 h-4 text-[#1C2459]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                    <svg x-show="darkMode" class="w-4 h-4 text-[#F5FF67]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"/></svg>
                </button>
                <button @click="mobileMenuOpen = !mobileMenuOpen" class="p-2 rounded-lg bg-gray-100 dark:bg-[#12173B] text-gray-700 dark:text-gray-200">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Navigation Drawer -->
    <div x-show="mobileMenuOpen" 
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 -translate-y-4"
         x-transition:enter-end="opacity-100 translate-y-0"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100 translate-y-0"
         x-transition:leave-end="opacity-0 -translate-y-4"
         class="md:hidden border-b border-gray-200 dark:border-[#2E3A82] bg-white dark:bg-[#12173B] px-6 py-5 space-y-4 shadow-xl">
        <nav class="flex flex-col space-y-3 font-medium text-sm">
            <a @click="mobileMenuOpen = false" href="#services" class="text-gray-700 dark:text-gray-300 hover:text-[#1C2459] dark:hover:text-[#F5FF67]">Services</a>
            <a @click="mobileMenuOpen = false" href="#projects" class="text-gray-700 dark:text-gray-300 hover:text-[#1C2459] dark:hover:text-[#F5FF67]">Case Studies</a>
            <a @click="mobileMenuOpen = false" href="#process" class="text-gray-700 dark:text-gray-300 hover:text-[#1C2459] dark:hover:text-[#F5FF67]">Process</a>
            <a @click="mobileMenuOpen = false" href="#about" class="text-gray-700 dark:text-gray-300 hover:text-[#1C2459] dark:hover:text-[#F5FF67]">About Us</a>
            <a @click="mobileMenuOpen = false" href="#contact" class="text-gray-700 dark:text-gray-300 hover:text-[#1C2459] dark:hover:text-[#F5FF67]">Contact</a>
        </nav>
        <div class="pt-3 border-t border-gray-200 dark:border-[#2E3A82] flex flex-col gap-3">
            <button @click="mobileMenuOpen = false; toggleTerminal()" class="flex items-center justify-center gap-2 w-full py-2.5 rounded-lg bg-gray-100 dark:bg-[#1C2459] border border-gray-300 dark:border-[#2E3A82] text-xs font-mono text-[#1C2459] dark:text-[#F5FF67]">
                <span>Open Terminal CLI</span>
            </button>
            <a @click="mobileMenuOpen = false" href="#contact" class="flex items-center justify-center w-full py-3 text-sm font-semibold font-mono text-[#1C2459] bg-[#F5FF67] hover:bg-[#E2EC48] rounded-lg shadow-md transition-all">
                Get a Quote
            </a>
        </div>
    </div>
</header>
