<section id="tech-stack" class="py-20 md:py-28 relative bg-gray-50/50 dark:bg-[#12173B]/50 border-t border-gray-200 dark:border-[#2E3A82]/50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Header -->
        <div class="text-center max-w-3xl mx-auto space-y-4 mb-14">
            <div class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full bg-white dark:bg-[#171E4A] border border-gray-300 dark:border-[#2E3A82] text-xs font-mono text-[#1C2459] dark:text-[#F5FF67]">
                <span class="w-2 h-2 rounded-full bg-[#F5FF67]"></span>
                <span>ENGINEERING ECOSYSTEM</span>
            </div>
            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold tracking-tight text-[#1C2459] dark:text-white">
                Battle-tested Technology Matrix
            </h2>
            <p class="text-sm sm:text-base text-gray-600 dark:text-gray-300">
                We select the most robust, high-performance tools in the industry to ensure stability, rapid development velocity, and effortless scaling.
            </p>
        </div>

        <!-- Tech Matrix Tabs & Content Component -->
        <div class="space-y-8">
            <!-- Tabs Bar -->
            <div class="flex flex-wrap justify-center gap-2 font-mono text-xs">
                <button @click="techTab = 'backend'" 
                        :class="techTab === 'backend' ? 'bg-[#F5FF67] text-[#1C2459] font-bold shadow' : 'bg-white dark:bg-[#171E4A] text-gray-700 dark:text-gray-300 hover:text-[#1C2459] dark:hover:text-white border border-gray-200 dark:border-[#2E3A82]'"
                        class="px-4 py-2 rounded-xl transition-all">
                    Backend & Runtimes
                </button>
                <button @click="techTab = 'frontend'" 
                        :class="techTab === 'frontend' ? 'bg-[#F5FF67] text-[#1C2459] font-bold shadow' : 'bg-white dark:bg-[#171E4A] text-gray-700 dark:text-gray-300 hover:text-[#1C2459] dark:hover:text-white border border-gray-200 dark:border-[#2E3A82]'"
                        class="px-4 py-2 rounded-xl transition-all">
                    Frontend & Mobile
                </button>
                <button @click="techTab = 'data'" 
                        :class="techTab === 'data' ? 'bg-[#F5FF67] text-[#1C2459] font-bold shadow' : 'bg-white dark:bg-[#171E4A] text-gray-700 dark:text-gray-300 hover:text-[#1C2459] dark:hover:text-white border border-gray-200 dark:border-[#2E3A82]'"
                        class="px-4 py-2 rounded-xl transition-all">
                    Databases & Cache
                </button>
                <button @click="techTab = 'cloud'" 
                        :class="techTab === 'cloud' ? 'bg-[#F5FF67] text-[#1C2459] font-bold shadow' : 'bg-white dark:bg-[#171E4A] text-gray-700 dark:text-gray-300 hover:text-[#1C2459] dark:hover:text-white border border-gray-200 dark:border-[#2E3A82]'"
                        class="px-4 py-2 rounded-xl transition-all">
                    Cloud & Containers
                </button>
                <button @click="techTab = 'ai'" 
                        :class="techTab === 'ai' ? 'bg-[#F5FF67] text-[#1C2459] font-bold shadow' : 'bg-white dark:bg-[#171E4A] text-gray-700 dark:text-gray-300 hover:text-[#1C2459] dark:hover:text-white border border-gray-200 dark:border-[#2E3A82]'"
                        class="px-4 py-2 rounded-xl transition-all">
                    AI & Automation
                </button>
            </div>

            <!-- Tab 1: Backend -->
            <div x-show="techTab === 'backend'" 
                 x-transition:enter="transition ease-out duration-200"
                 x-transition:enter-start="opacity-0 translate-y-2"
                 x-transition:enter-end="opacity-100 translate-y-0"
                 class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                
                <div class="p-6 rounded-2xl bg-white dark:bg-[#171E4A] border border-gray-200 dark:border-[#2E3A82] space-y-2">
                    <div class="flex items-center justify-between">
                        <span class="font-bold text-base text-[#1C2459] dark:text-white">Laravel 12 Ecosystem</span>
                        <span class="text-[10px] font-mono px-2 py-0.5 rounded bg-emerald-100 dark:bg-emerald-950 text-emerald-700 dark:text-emerald-300">CORE STANDARD</span>
                    </div>
                    <p class="text-xs text-gray-600 dark:text-gray-300">Octane, Horizon, Pulse, Sanctum, Reverb, Inertia for bulletproof architecture.</p>
                </div>

                <div class="p-6 rounded-2xl bg-white dark:bg-[#171E4A] border border-gray-200 dark:border-[#2E3A82] space-y-2">
                    <div class="flex items-center justify-between">
                        <span class="font-bold text-base text-[#1C2459] dark:text-white">PHP 8.4 Engine</span>
                        <span class="text-[10px] font-mono px-2 py-0.5 rounded bg-emerald-100 dark:bg-emerald-950 text-emerald-700 dark:text-emerald-300">CORE STANDARD</span>
                    </div>
                    <p class="text-xs text-gray-600 dark:text-gray-300">Strict typing, property hooks, asymmetric visibility, JIT optimization.</p>
                </div>

                <div class="p-6 rounded-2xl bg-white dark:bg-[#171E4A] border border-gray-200 dark:border-[#2E3A82] space-y-2">
                    <div class="flex items-center justify-between">
                        <span class="font-bold text-base text-[#1C2459] dark:text-white">Go & Micro-Runtimes</span>
                        <span class="text-[10px] font-mono px-2 py-0.5 rounded bg-blue-100 dark:bg-blue-950 text-blue-700 dark:text-blue-300">HIGH CONCURRENCY</span>
                    </div>
                    <p class="text-xs text-gray-600 dark:text-gray-300">For raw packet ingestion, custom proxies, and sub-10ms microservice workers.</p>
                </div>
            </div>

            <!-- Tab 2: Frontend -->
            <div x-show="techTab === 'frontend'" 
                 x-transition:enter="transition ease-out duration-200"
                 x-transition:enter-start="opacity-0 translate-y-2"
                 x-transition:enter-end="opacity-100 translate-y-0"
                 class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                
                <div class="p-6 rounded-2xl bg-white dark:bg-[#171E4A] border border-gray-200 dark:border-[#2E3A82] space-y-2">
                    <div class="flex items-center justify-between">
                        <span class="font-bold text-base text-[#1C2459] dark:text-white">Tailwind CSS v4</span>
                        <span class="text-[10px] font-mono px-2 py-0.5 rounded bg-emerald-100 dark:bg-emerald-950 text-emerald-700 dark:text-emerald-300">DESIGN SYSTEM</span>
                    </div>
                    <p class="text-xs text-gray-600 dark:text-gray-300">Ultra-fast CSS engine with zero runtime overhead and bespoke theme tokens.</p>
                </div>

                <div class="p-6 rounded-2xl bg-white dark:bg-[#171E4A] border border-gray-200 dark:border-[#2E3A82] space-y-2">
                    <div class="flex items-center justify-between">
                        <span class="font-bold text-base text-[#1C2459] dark:text-white">Vue.js 3 & React 19</span>
                        <span class="text-[10px] font-mono px-2 py-0.5 rounded bg-emerald-100 dark:bg-emerald-950 text-emerald-700 dark:text-emerald-300">SPA & HYBRID</span>
                    </div>
                    <p class="text-xs text-gray-600 dark:text-gray-300">Composition API, reactive stores, Server Components, and seamless SSR.</p>
                </div>

                <div class="p-6 rounded-2xl bg-white dark:bg-[#171E4A] border border-gray-200 dark:border-[#2E3A82] space-y-2">
                    <div class="flex items-center justify-between">
                        <span class="font-bold text-base text-[#1C2459] dark:text-white">Flutter & React Native</span>
                        <span class="text-[10px] font-mono px-2 py-0.5 rounded bg-purple-100 dark:bg-purple-950 text-purple-700 dark:text-purple-300">CROSS-PLATFORM</span>
                    </div>
                    <p class="text-xs text-gray-600 dark:text-gray-300">Pixel-perfect iOS and Android applications with offline-first synchronization.</p>
                </div>
            </div>

            <!-- Tab 3: Data -->
            <div x-show="techTab === 'data'" 
                 x-transition:enter="transition ease-out duration-200"
                 x-transition:enter-start="opacity-0 translate-y-2"
                 x-transition:enter-end="opacity-100 translate-y-0"
                 class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                
                <div class="p-6 rounded-2xl bg-white dark:bg-[#171E4A] border border-gray-200 dark:border-[#2E3A82] space-y-2">
                    <div class="flex items-center justify-between">
                        <span class="font-bold text-base text-[#1C2459] dark:text-white">PostgreSQL & PgVector</span>
                        <span class="text-[10px] font-mono px-2 py-0.5 rounded bg-emerald-100 dark:bg-emerald-950 text-emerald-700 dark:text-emerald-300">PRIMARY DATA</span>
                    </div>
                    <p class="text-xs text-gray-600 dark:text-gray-300">Relational integrity, JSONB semi-structured documents, and AI vector recall.</p>
                </div>

                <div class="p-6 rounded-2xl bg-white dark:bg-[#171E4A] border border-gray-200 dark:border-[#2E3A82] space-y-2">
                    <div class="flex items-center justify-between">
                        <span class="font-bold text-base text-[#1C2459] dark:text-white">Redis Cluster</span>
                        <span class="text-[10px] font-mono px-2 py-0.5 rounded bg-emerald-100 dark:bg-emerald-950 text-emerald-700 dark:text-emerald-300">CACHE & STREAMS</span>
                    </div>
                    <p class="text-xs text-gray-600 dark:text-gray-300">Sub-millisecond session caching, pub/sub channels, and atomic rate limiters.</p>
                </div>

                <div class="p-6 rounded-2xl bg-white dark:bg-[#171E4A] border border-gray-200 dark:border-[#2E3A82] space-y-2">
                    <div class="flex items-center justify-between">
                        <span class="font-bold text-base text-[#1C2459] dark:text-white">Meilisearch</span>
                        <span class="text-[10px] font-mono px-2 py-0.5 rounded bg-blue-100 dark:bg-blue-950 text-blue-700 dark:text-blue-300">SEARCH ENGINE</span>
                    </div>
                    <p class="text-xs text-gray-600 dark:text-gray-300">Instant typo-tolerant full-text search with Laravel Scout synchronization.</p>
                </div>
            </div>

            <!-- Tab 4: Cloud -->
            <div x-show="techTab === 'cloud'" 
                 x-transition:enter="transition ease-out duration-200"
                 x-transition:enter-start="opacity-0 translate-y-2"
                 x-transition:enter-end="opacity-100 translate-y-0"
                 class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                
                <div class="p-6 rounded-2xl bg-white dark:bg-[#171E4A] border border-gray-200 dark:border-[#2E3A82] space-y-2">
                    <div class="flex items-center justify-between">
                        <span class="font-bold text-base text-[#1C2459] dark:text-white">AWS & Multi-Cloud</span>
                        <span class="text-[10px] font-mono px-2 py-0.5 rounded bg-emerald-100 dark:bg-emerald-950 text-emerald-700 dark:text-emerald-300">INFRASTRUCTURE</span>
                    </div>
                    <p class="text-xs text-gray-600 dark:text-gray-300">EKS, ECS, S3, RDS Aurora, CloudFront CDN, and Lambda serverless compute.</p>
                </div>

                <div class="p-6 rounded-2xl bg-white dark:bg-[#171E4A] border border-gray-200 dark:border-[#2E3A82] space-y-2">
                    <div class="flex items-center justify-between">
                        <span class="font-bold text-base text-[#1C2459] dark:text-white">Docker & Kubernetes</span>
                        <span class="text-[10px] font-mono px-2 py-0.5 rounded bg-emerald-100 dark:bg-emerald-950 text-emerald-700 dark:text-emerald-300">CONTAINERS</span>
                    </div>
                    <p class="text-xs text-gray-600 dark:text-gray-300">Reproducible development environments and immutable container deployments.</p>
                </div>

                <div class="p-6 rounded-2xl bg-white dark:bg-[#171E4A] border border-gray-200 dark:border-[#2E3A82] space-y-2">
                    <div class="flex items-center justify-between">
                        <span class="font-bold text-base text-[#1C2459] dark:text-white">Terraform (IaC)</span>
                        <span class="text-[10px] font-mono px-2 py-0.5 rounded bg-blue-100 dark:bg-blue-950 text-blue-700 dark:text-blue-300">AUTOMATION</span>
                    </div>
                    <p class="text-xs text-gray-600 dark:text-gray-300">Declarative cloud provisioning with automated state management.</p>
                </div>
            </div>

            <!-- Tab 5: AI -->
            <div x-show="techTab === 'ai'" 
                 x-transition:enter="transition ease-out duration-200"
                 x-transition:enter-start="opacity-0 translate-y-2"
                 x-transition:enter-end="opacity-100 translate-y-0"
                 class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                
                <div class="p-6 rounded-2xl bg-white dark:bg-[#171E4A] border border-gray-200 dark:border-[#2E3A82] space-y-2">
                    <div class="flex items-center justify-between">
                        <span class="font-bold text-base text-[#1C2459] dark:text-white">LLM Agent Pipelines</span>
                        <span class="text-[10px] font-mono px-2 py-0.5 rounded bg-purple-100 dark:bg-purple-950 text-purple-700 dark:text-purple-300">AI WORKFLOWS</span>
                    </div>
                    <p class="text-xs text-gray-600 dark:text-gray-300">Autonomous multi-step tool execution, structured output validation, and guardrails.</p>
                </div>

                <div class="p-6 rounded-2xl bg-white dark:bg-[#171E4A] border border-gray-200 dark:border-[#2E3A82] space-y-2">
                    <div class="flex items-center justify-between">
                        <span class="font-bold text-base text-[#1C2459] dark:text-white">Enterprise RAG</span>
                        <span class="text-[10px] font-mono px-2 py-0.5 rounded bg-purple-100 dark:bg-purple-950 text-purple-700 dark:text-purple-300">SEMANTIC RECALL</span>
                    </div>
                    <p class="text-xs text-gray-600 dark:text-gray-300">Hybrid dense/sparse embeddings, contextual chunking, and verifiable citation systems.</p>
                </div>

                <div class="p-6 rounded-2xl bg-white dark:bg-[#171E4A] border border-gray-200 dark:border-[#2E3A82] space-y-2">
                    <div class="flex items-center justify-between">
                        <span class="font-bold text-base text-[#1C2459] dark:text-white">Python / FastAPI Services</span>
                        <span class="text-[10px] font-mono px-2 py-0.5 rounded bg-emerald-100 dark:bg-emerald-950 text-emerald-700 dark:text-emerald-300">MICRO-SERVICES</span>
                    </div>
                    <p class="text-xs text-gray-600 dark:text-gray-300">Asynchronous inference endpoints integrated into Laravel jobs via gRPC and REST.</p>
                </div>
            </div>

        </div>

    </div>
</section>
