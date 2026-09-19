<section id="projects" class="py-20 md:py-28 relative bg-gray-50/50 dark:bg-[#12173B]/50 border-t border-gray-200 dark:border-[#2E3A82]/50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Section Header -->
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 gap-6">
            <div class="space-y-3">
                <div class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full bg-white dark:bg-[#171E4A] border border-gray-300 dark:border-[#2E3A82] text-xs font-mono text-[#1C2459] dark:text-[#F5FF67]">
                    <span class="w-2 h-2 rounded-full bg-[#F5FF67]"></span>
                    <span>PROVEN CASE STUDIES</span>
                </div>
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold tracking-tight text-[#1C2459] dark:text-white">
                    Selected work that scales.
                </h2>
                <p class="text-sm sm:text-base text-gray-600 dark:text-gray-300 max-w-xl">
                    Real architectural challenges solved with precision engineering. Click any project to inspect the full technical breakdown and metrics.
                </p>
            </div>

            <!-- Category Filter Tabs -->
            <div class="flex flex-wrap gap-2 p-1.5 rounded-xl bg-white dark:bg-[#171E4A] border border-gray-200 dark:border-[#2E3A82] self-start md:self-auto font-mono text-xs shadow-sm">
                <button @click="projectCategory = 'all'" 
                        :class="projectCategory === 'all' ? 'bg-[#F5FF67] text-[#1C2459] font-bold shadow' : 'text-gray-600 dark:text-gray-300 hover:text-[#1C2459] dark:hover:text-white'"
                        class="px-3.5 py-1.5 rounded-lg transition-all">
                    All Work
                </button>
                <button @click="projectCategory = 'web'" 
                        :class="projectCategory === 'web' ? 'bg-[#F5FF67] text-[#1C2459] font-bold shadow' : 'text-gray-600 dark:text-gray-300 hover:text-[#1C2459] dark:hover:text-white'"
                        class="px-3.5 py-1.5 rounded-lg transition-all">
                    Web Apps
                </button>
                <button @click="projectCategory = 'mobile'" 
                        :class="projectCategory === 'mobile' ? 'bg-[#F5FF67] text-[#1C2459] font-bold shadow' : 'text-gray-600 dark:text-gray-300 hover:text-[#1C2459] dark:hover:text-white'"
                        class="px-3.5 py-1.5 rounded-lg transition-all">
                    Mobile
                </button>
                <button @click="projectCategory = 'cloud'" 
                        :class="projectCategory === 'cloud' ? 'bg-[#F5FF67] text-[#1C2459] font-bold shadow' : 'text-gray-600 dark:text-gray-300 hover:text-[#1C2459] dark:hover:text-white'"
                        class="px-3.5 py-1.5 rounded-lg transition-all">
                    Cloud & DevOps
                </button>
                <button @click="projectCategory = 'ai'" 
                        :class="projectCategory === 'ai' ? 'bg-[#F5FF67] text-[#1C2459] font-bold shadow' : 'text-gray-600 dark:text-gray-300 hover:text-[#1C2459] dark:hover:text-white'"
                        class="px-3.5 py-1.5 rounded-lg transition-all">
                    AI & Data
                </button>
            </div>
        </div>

        <!-- Projects Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($projects as $project)
                <div x-show="projectCategory === 'all' || projectCategory === '{{ $project->category }}'"
                     x-transition:enter="transition ease-out duration-300 transform"
                     x-transition:enter-start="opacity-0 scale-95"
                     x-transition:enter-end="opacity-100 scale-100"
                     class="group rounded-2xl bg-white dark:bg-[#171E4A] border border-gray-200 dark:border-[#2E3A82] overflow-hidden flex flex-col justify-between hover:border-[#F5FF67] dark:hover:border-[#F5FF67] transition-all duration-300 hover:-translate-y-1.5 shadow-sm hover:shadow-[0_15px_35px_rgba(28,36,89,0.18)] dark:hover:shadow-[0_0_30px_rgba(245,255,103,0.18)]">
                    
                    <!-- Card Top Image / Media Banner -->
                    <div class="relative h-48 sm:h-52 w-full overflow-hidden bg-gray-900">
                        <img src="{{ $project->banner_image }}" 
                             alt="{{ $project->title }}" 
                             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500 opacity-85 group-hover:opacity-100">
                        
                        <!-- Top Category Pill & Client Tag -->
                        <div class="absolute top-3 left-3 flex items-center gap-2">
                            <span class="px-2.5 py-1 rounded-md text-[10px] font-mono font-bold uppercase tracking-wider bg-[#1C2459]/90 text-[#F5FF67] border border-[#2E3A82] backdrop-blur-sm">
                                {{ strtoupper($project->category) }}
                            </span>
                        </div>
                        <div class="absolute top-3 right-3">
                            <span class="px-2 py-0.5 rounded text-[10px] font-mono bg-black/60 text-white backdrop-blur-sm">
                                {{ $project->client_name }}
                            </span>
                        </div>
                    </div>

                    <!-- Card Body -->
                    <div class="p-6 flex-1 flex flex-col justify-between space-y-4">
                        <div>
                            <h3 class="text-lg font-bold text-[#1C2459] dark:text-white group-hover:text-[#1C2459] dark:group-hover:text-[#F5FF67] transition-colors leading-snug mb-2">
                                {{ $project->title }}
                            </h3>
                            <p class="text-xs text-gray-600 dark:text-gray-300 line-clamp-2 leading-relaxed">
                                {{ $project->summary }}
                            </p>
                        </div>

                        <!-- Key Performance Metrics Preview -->
                        @if($project->metrics->count() > 0)
                            <div class="grid grid-cols-2 gap-2 pt-3 border-t border-gray-100 dark:border-[#2E3A82]/60">
                                @foreach($project->metrics->take(2) as $metric)
                                    <div class="p-2 rounded-lg bg-gray-50 dark:bg-[#12173B] border border-gray-200 dark:border-[#2E3A82]/50">
                                        <div class="text-sm font-bold font-mono text-[#1C2459] dark:text-[#F5FF67]">{{ $metric->value }}</div>
                                        <div class="text-[10px] text-gray-500 dark:text-gray-400 truncate">{{ $metric->label }}</div>
                                    </div>
                                @endforeach
                            </div>
                        @endif

                        <!-- Tech Stack Tags & Open Modal CTA -->
                        <div class="pt-3 border-t border-gray-100 dark:border-[#2E3A82]/60 flex items-center justify-between">
                            <div class="flex flex-wrap gap-1">
                                @foreach(array_slice($project->tech_stack ?? [], 0, 3) as $tech)
                                    <span class="text-[10px] font-mono px-1.5 py-0.5 rounded bg-gray-100 dark:bg-[#12173B] text-gray-600 dark:text-gray-300">
                                        {{ $tech }}
                                    </span>
                                @endforeach
                            </div>

                            <button type="button"
                                    @click="openProjectModal({{ json_encode($project->load('metrics')) }})" 
                                    class="inline-flex items-center gap-1 text-xs font-mono font-bold text-[#1C2459] dark:text-[#F5FF67] hover:underline">
                                <span>Inspect Case</span>
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                            </button>
                        </div>
                    </div>

                </div>
            @endforeach
        </div>

    </div>
</section>
