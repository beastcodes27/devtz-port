<section id="about" class="py-20 md:py-28 relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            <!-- Left Narrative -->
            <div class="lg:col-span-6 space-y-6">
                <div class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full bg-white dark:bg-[#12173B] border border-gray-300 dark:border-[#2E3A82] text-xs font-mono text-[#1C2459] dark:text-[#F5FF67]">
                    <span class="w-2 h-2 rounded-full bg-[#F5FF67]"></span>
                    <span>THE DEVTZ PHILOSOPHY</span>
                </div>

                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold tracking-tight text-[#1C2459] dark:text-white leading-tight">
                    We engineer software that outlives hype cycles.
                </h2>

                <p class="text-base text-gray-600 dark:text-gray-300 leading-relaxed">
                    Founded on the conviction that high-performing software stems from rigorous architectural design, disciplined clean code practices, and uncompromising focus on speed.
                </p>

                <p class="text-sm text-gray-600 dark:text-gray-400 leading-relaxed">
                    At DevTZ, we do not ship bloated templates or fragile shortcuts. Every database query, every asynchronous job queue, and every frontend interaction is calibrated for sub-millisecond responsiveness and long-term maintainability.
                </p>

                <!-- Core Pillars -->
                <div class="space-y-3 pt-2">
                    <div class="flex items-start gap-3">
                        <div class="w-6 h-6 rounded-md bg-[#1C2459] text-[#F5FF67] flex items-center justify-center font-mono text-xs font-bold shrink-0">01</div>
                        <div>
                            <h4 class="text-sm font-bold text-[#1C2459] dark:text-white">Deterministic Reliability</h4>
                            <p class="text-xs text-gray-500 dark:text-gray-400">Strict automated test coverage, static analysis, and zero-compromise CI/CD.</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-3">
                        <div class="w-6 h-6 rounded-md bg-[#1C2459] text-[#F5FF67] flex items-center justify-center font-mono text-xs font-bold shrink-0">02</div>
                        <div>
                            <h4 class="text-sm font-bold text-[#1C2459] dark:text-white">High Concurrency by Design</h4>
                            <p class="text-xs text-gray-500 dark:text-gray-400">Laravel Octane, Swoole, and Redis caching topologies designed for tens of thousands of concurrent users.</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-3">
                        <div class="w-6 h-6 rounded-md bg-[#1C2459] text-[#F5FF67] flex items-center justify-center font-mono text-xs font-bold shrink-0">03</div>
                        <div>
                            <h4 class="text-sm font-bold text-[#1C2459] dark:text-white">Applied Intelligence</h4>
                            <p class="text-xs text-gray-500 dark:text-gray-400">Deep integration of vector databases, LLM agents, and semantic search directly in operational workflows.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Metrics Grid -->
            <div class="lg:col-span-6">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    @foreach($stats as $stat)
                        <div class="p-6 rounded-2xl bg-white dark:bg-[#171E4A] border border-gray-200 dark:border-[#2E3A82] hover:border-[#F5FF67] dark:hover:border-[#F5FF67] transition-all duration-300 shadow-sm hover:shadow-lg">
                            <div class="text-3xl sm:text-4xl font-extrabold font-mono text-[#1C2459] dark:text-[#F5FF67] mb-2">
                                {{ $stat->value }}
                            </div>
                            <div class="text-sm font-bold text-[#1C2459] dark:text-white mb-1">
                                {{ $stat->label }}
                            </div>
                            <div class="text-xs text-gray-500 dark:text-gray-400 leading-snug">
                                {{ $stat->subtext }}
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

    </div>
</section>
