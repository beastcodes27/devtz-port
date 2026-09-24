<footer class="bg-gray-50 dark:bg-[#12173B] border-t border-gray-200 dark:border-[#2E3A82] transition-colors duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-10">
            <!-- Brand & Mission -->
            <div class="lg:col-span-2 space-y-4">
                <a href="/" class="flex items-center gap-3">
                    <div class="w-9 h-9 rounded-lg bg-[#1C2459] border-2 border-[#F5FF67] flex items-center justify-center text-[#F5FF67] font-mono font-bold">
                        &lt;/&gt;
                    </div>
                    <span class="font-bold text-2xl font-mono text-[#1C2459] dark:text-white">Dev<span class="text-[#F5FF67] bg-[#1C2459] px-1.5 py-0.5 rounded">TZ</span></span>
                </a>
                <p class="text-sm text-gray-600 dark:text-gray-400 max-w-sm leading-relaxed">
                    DevTZ is a high-velocity software engineering partner building scalable web platforms, mission-critical cloud backends, and AI workflows for venture-backed startups and enterprises.
                </p>
                <!-- Operational Status Indicator -->
                <div class="inline-flex items-center gap-2.5 px-3 py-1.5 rounded-full bg-emerald-50 dark:bg-emerald-950/40 border border-emerald-300 dark:border-emerald-800 text-xs font-mono text-emerald-800 dark:text-emerald-300">
                    <span class="relative flex h-2.5 w-2.5">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2.5 w-2.5 bg-emerald-500"></span>
                    </span>
                    <span>Systems Operational — 99.99% Uptime</span>
                </div>
            </div>

            <!-- Solutions Links -->
            <div class="space-y-3">
                <h4 class="text-xs font-mono uppercase tracking-wider text-[#1C2459] dark:text-[#F5FF67] font-semibold">Solutions</h4>
                <ul class="space-y-2 text-sm text-gray-600 dark:text-gray-400">
                    <li><a href="#services" class="hover:text-[#1C2459] dark:hover:text-white transition-colors">Custom Web Apps</a></li>
                    <li><a href="#services" class="hover:text-[#1C2459] dark:hover:text-white transition-colors">Cloud & Microservices</a></li>
                    <li><a href="#services" class="hover:text-[#1C2459] dark:hover:text-white transition-colors">Mobile Platforms</a></li>
                    <li><a href="#services" class="hover:text-[#1C2459] dark:hover:text-white transition-colors">AI & Automations</a></li>
                    <li><a href="#services" class="hover:text-[#1C2459] dark:hover:text-white transition-colors">DevOps & CI/CD</a></li>
                </ul>
            </div>

            <!-- Quick Navigation -->
            <div class="space-y-3">
                <h4 class="text-xs font-mono uppercase tracking-wider text-[#1C2459] dark:text-[#F5FF67] font-semibold">Explore</h4>
                <ul class="space-y-2 text-sm text-gray-600 dark:text-gray-400">
                    <li><a href="#projects" class="hover:text-[#1C2459] dark:hover:text-white transition-colors">Projects</a></li>
                    <li><a href="#team" class="hover:text-[#1C2459] dark:hover:text-white transition-colors">Core Team</a></li>
                    <li><a href="#tech-stack" class="hover:text-[#1C2459] dark:hover:text-white transition-colors">Technology Matrix</a></li>
                    <li><a href="#cost-estimator" class="hover:text-[#1C2459] dark:hover:text-white transition-colors">Project Estimator</a></li>
                    <li><a href="#about" class="hover:text-[#1C2459] dark:hover:text-white transition-colors">About Us</a></li>
                </ul>
            </div>

            <!-- Newsletter & Dispatch -->
            <div class="space-y-4">
                <h4 class="text-xs font-mono uppercase tracking-wider text-[#1C2459] dark:text-[#F5FF67] font-semibold">Engineering Radar</h4>
                <p class="text-xs text-gray-600 dark:text-gray-400">Subscribe for deep-dives on architecture, Laravel optimizations, and cloud scaling.</p>
                <form action="/newsletter/subscribe" method="POST" class="space-y-2">
                    @csrf
                    <div class="relative">
                        <input type="email" name="email" required placeholder="eng-lead@company.com" 
                               class="w-full px-3.5 py-2 text-xs rounded-lg bg-white dark:bg-[#1C2459] border border-gray-300 dark:border-[#2E3A82] text-gray-900 dark:text-white placeholder-gray-400 focus:outline-none focus:border-[#F5FF67]">
                    </div>
                    <button type="submit" class="w-full py-2 px-3 text-xs font-mono font-semibold text-[#1C2459] bg-[#F5FF67] hover:bg-[#E2EC48] rounded-lg transition-colors">
                        Subscribe to Radar
                    </button>
                </form>
            </div>
        </div>

        <!-- Bottom Bar -->
        <div class="mt-14 pt-8 border-t border-gray-200 dark:border-[#2E3A82]/60 flex flex-col sm:flex-row items-center justify-between gap-4 text-xs text-gray-500 dark:text-gray-400 font-mono">
            <div>
                © {{ date('Y') }} DevTZ Software Inc. All rights reserved.
            </div>
            <div class="flex items-center gap-6">
                <a href="#terms" class="hover:underline">Privacy Policy</a>
                <a href="#privacy" class="hover:underline">Terms</a>
                <a href="{{ route('login') }}" class="text-[#1C2459] dark:text-[#F5FF67] font-bold hover:underline flex items-center gap-1">
                    <span>⚡ Team Portal</span>
                </a>
                <span class="text-[#F5FF67] bg-[#1C2459] px-2 py-0.5 rounded border border-[#2E3A82]">#1C2459 / #F5FF67</span>
            </div>
        </div>
    </div>
</footer>

