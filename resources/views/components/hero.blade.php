<section class="relative overflow-hidden pt-12 pb-20 md:pt-20 md:pb-28 border-b border-gray-200 dark:border-[#2E3A82]/50">
    <!-- Cyber ambient background glows -->
    <div class="absolute top-1/4 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[600px] h-[350px] bg-[#F5FF67]/10 dark:bg-[#F5FF67]/8 blur-[120px] rounded-full pointer-events-none"></div>
    <div class="absolute top-10 right-10 w-[300px] h-[300px] bg-[#1C2459]/20 dark:bg-[#1C2459] blur-[90px] rounded-full pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            
            <!-- Left Hero Content -->
            <div class="lg:col-span-7 space-y-7 text-center lg:text-left">
                <!-- Status Badge -->
                <div class="inline-flex items-center gap-2.5 px-3.5 py-1.5 rounded-full bg-white dark:bg-[#12173B] border border-gray-300 dark:border-[#2E3A82] text-xs font-mono shadow-sm">
                    <span class="w-2 h-2 rounded-full bg-[#F5FF67] animate-ping"></span>
                    <span class="text-gray-700 dark:text-gray-300">DevTZ Core Engine</span>
                    <span class="text-gray-400">|</span>
                    <span class="text-[#1C2459] dark:text-[#F5FF67] font-semibold">Available for New Projects</span>
                </div>

                <!-- Main Heading -->
                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold tracking-tight leading-[1.1] text-[#1C2459] dark:text-white">
                    Transforming businesses through <br class="hidden sm:inline">
                    <span class="relative inline-block mt-2">
                        <span class="relative z-10 px-3 py-1 text-[#1C2459] bg-[#F5FF67] rounded-md shadow-[0_0_20px_rgba(245,255,103,0.4)]">enterprise-grade</span>
                    </span>
                    digital solutions.
                </h1>

                <!-- Subheading -->
                <p class="text-base sm:text-lg text-gray-600 dark:text-gray-300 max-w-2xl mx-auto lg:mx-0 leading-relaxed">
                    We architect, build, and scale bespoke web applications, high-throughput cloud APIs, and automated AI pipelines for founders and enterprise engineering teams.
                </p>

                <!-- CTA Actions -->
                <div class="flex flex-wrap items-center justify-center lg:justify-start gap-4 pt-2">
                    <a href="#contact" 
                       class="inline-flex items-center justify-center px-7 py-3.5 text-sm font-bold font-mono text-[#1C2459] bg-[#F5FF67] hover:bg-[#E2EC48] rounded-xl shadow-[0_0_20px_rgba(245,255,103,0.35)] hover:shadow-[0_0_30px_rgba(245,255,103,0.6)] transform hover:-translate-y-0.5 transition-all">
                        <span>Deploy Your Vision</span>
                        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
                    </a>

                    <a href="#projects" 
                       class="inline-flex items-center justify-center px-6 py-3.5 text-sm font-semibold font-mono text-[#1C2459] dark:text-white bg-white dark:bg-[#12173B] border border-gray-300 dark:border-[#2E3A82] hover:border-[#F5FF67] dark:hover:border-[#F5FF67] rounded-xl transition-all shadow-sm">
                        <svg class="w-4 h-4 mr-2 text-[#F5FF67] bg-[#1C2459] p-0.5 rounded" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
                        <span>View Portfolio</span>
                    </a>

                    <button @click="toggleTerminal()" 
                            class="inline-flex items-center gap-2 px-4 py-3.5 text-xs font-mono text-gray-700 dark:text-[#F5FF67] bg-gray-100 dark:bg-[#171E4A] hover:bg-gray-200 dark:hover:bg-[#202963] border border-gray-300 dark:border-[#2E3A82] rounded-xl transition-all">
                        <span>$ devtz --cli</span>
                    </button>
                </div>

                <!-- Stats summary micro-bar -->
                <div class="pt-6 border-t border-gray-200 dark:border-[#2E3A82]/50 grid grid-cols-3 gap-4 max-w-lg mx-auto lg:mx-0 text-left">
                    <div>
                        <div class="text-2xl font-bold font-mono text-[#1C2459] dark:text-[#F5FF67]">99.99%</div>
                        <div class="text-xs text-gray-500 dark:text-gray-400">Production SLA</div>
                    </div>
                    <div>
                        <div class="text-2xl font-bold font-mono text-[#1C2459] dark:text-[#F5FF67]">40+</div>
                        <div class="text-xs text-gray-500 dark:text-gray-400">Shipped Products</div>
                    </div>
                    <div>
                        <div class="text-2xl font-bold font-mono text-[#1C2459] dark:text-[#F5FF67]">&lt; 35ms</div>
                        <div class="text-xs text-gray-500 dark:text-gray-400">Avg API Latency</div>
                    </div>
                </div>
            </div>

            <!-- Right Interactive Cyber Graphic / Terminal Visual -->
            <div class="lg:col-span-5">
                <div class="relative rounded-2xl bg-white dark:bg-[#12173B] border-2 border-gray-200 dark:border-[#2E3A82] shadow-2xl overflow-hidden hover:border-[#F5FF67] transition-all duration-300">
                    <!-- Window Header -->
                    <div class="flex items-center justify-between px-4 py-3 bg-gray-100 dark:bg-[#0E122F] border-b border-gray-200 dark:border-[#2E3A82]">
                        <div class="flex items-center gap-2">
                            <span class="w-3 h-3 rounded-full bg-red-500/80"></span>
                            <span class="w-3 h-3 rounded-full bg-yellow-500/80"></span>
                            <span class="w-3 h-3 rounded-full bg-emerald-500/80"></span>
                        </div>
                        <div class="text-xs font-mono text-gray-500 dark:text-gray-400 flex items-center gap-1.5">
                            <span class="w-1.5 h-1.5 rounded-full bg-[#F5FF67]"></span>
                            <span>DevTZ-Cluster-Node // prod-01</span>
                        </div>
                        <div class="text-[10px] font-mono text-gray-400">PHP 8.4 • LV12</div>
                    </div>

                    <!-- Code & Pipeline Window Content -->
                    <div class="p-5 font-mono text-xs space-y-3 bg-gray-900 text-gray-200 dark:bg-[#12173B]">
                        <div class="flex items-center justify-between text-gray-400 text-[11px] pb-2 border-b border-gray-800 dark:border-[#2E3A82]/60">
                            <span>// Architecture pipeline initialized</span>
                            <span class="text-[#F5FF67] bg-[#1C2459] px-2 py-0.5 rounded text-[10px]">LIVE BENCHMARK</span>
                        </div>
                        
                        <div class="text-emerald-400 flex items-center gap-2">
                            <span class="text-gray-500">&gt;</span> 
                            <span>composer create-project devtz/enterprise-core</span>
                        </div>
                        
                        <div class="text-gray-400 pl-4 space-y-1 text-[11px]">
                            <div><span class="text-[#F5FF67]">✓</span> Optimized Laravel 12 HTTP Kernel</div>
                            <div><span class="text-[#F5FF67]">✓</span> Microservices Redis Message Bus</div>
                            <div><span class="text-[#F5FF67]">✓</span> High-Concurrency Postgres Replicas</div>
                            <div><span class="text-[#F5FF67]">✓</span> Automated Zero-Downtime CI/CD</div>
                        </div>

                        <!-- Live Pipeline Status Card -->
                        <div class="mt-4 p-3 rounded-lg bg-[#1C2459] border border-[#2E3A82] space-y-2">
                            <div class="flex items-center justify-between text-[11px]">
                                <span class="text-[#F5FF67] font-semibold flex items-center gap-1">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                                    DevTZ Realtime Engine
                                </span>
                                <span class="text-emerald-300">Active (2,450 req/s)</span>
                            </div>
                            <!-- Live Progress bar -->
                            <div class="w-full bg-[#12173B] rounded-full h-1.5 overflow-hidden">
                                <div class="bg-[#F5FF67] h-1.5 rounded-full w-4/5 animate-pulse"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
