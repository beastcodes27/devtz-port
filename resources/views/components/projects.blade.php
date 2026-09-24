<section id="projects" class="py-20 md:py-28 relative bg-gray-50/50 dark:bg-[#12173B]/50 border-t border-gray-200 dark:border-[#2E3A82]/50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Section Header -->
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 gap-6">
            <div class="space-y-3">
                <div class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full bg-white dark:bg-[#171E4A] border border-gray-300 dark:border-[#2E3A82] text-xs font-mono text-[#1C2459] dark:text-[#F5FF67]">
                    <span class="w-2 h-2 rounded-full bg-[#F5FF67]"></span>
                    <span>FEATURED PROJECTS</span>
                </div>
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold tracking-tight text-[#1C2459] dark:text-white">
                    Production systems built for scale.
                </h2>
                <p class="text-sm sm:text-base text-gray-600 dark:text-gray-300 max-w-xl">
                    Explore real-world software platforms engineered with precision. Inspect live demonstrations, uploaded screenshot galleries, and technical architecture breakdowns.
                </p>
            </div>

            <!-- Category Filter Tabs -->
            <div class="flex flex-wrap gap-2 p-1.5 rounded-xl bg-white dark:bg-[#171E4A] border border-gray-200 dark:border-[#2E3A82] self-start md:self-auto font-mono text-xs shadow-sm">
                <button @click="projectCategory = 'all'" 
                        :class="projectCategory === 'all' ? 'bg-[#F5FF67] text-[#1C2459] font-bold shadow-[0_0_12px_rgba(245,255,103,0.3)]' : 'text-gray-600 dark:text-gray-300 hover:text-[#1C2459] dark:hover:text-white hover:bg-gray-100 dark:hover:bg-[#12173B]/80'"
                        class="px-3.5 py-1.5 rounded-lg transition-all duration-200">
                    All Projects
                </button>
                <button @click="projectCategory = 'web'" 
                        :class="projectCategory === 'web' ? 'bg-[#F5FF67] text-[#1C2459] font-bold shadow-[0_0_12px_rgba(245,255,103,0.3)]' : 'text-gray-600 dark:text-gray-300 hover:text-[#1C2459] dark:hover:text-white hover:bg-gray-100 dark:hover:bg-[#12173B]/80'"
                        class="px-3.5 py-1.5 rounded-lg transition-all duration-200">
                    Web Apps
                </button>
                <button @click="projectCategory = 'mobile'" 
                        :class="projectCategory === 'mobile' ? 'bg-[#F5FF67] text-[#1C2459] font-bold shadow-[0_0_12px_rgba(245,255,103,0.3)]' : 'text-gray-600 dark:text-gray-300 hover:text-[#1C2459] dark:hover:text-white hover:bg-gray-100 dark:hover:bg-[#12173B]/80'"
                        class="px-3.5 py-1.5 rounded-lg transition-all duration-200">
                    Mobile
                </button>
                <button @click="projectCategory = 'cloud'" 
                        :class="projectCategory === 'cloud' ? 'bg-[#F5FF67] text-[#1C2459] font-bold shadow-[0_0_12px_rgba(245,255,103,0.3)]' : 'text-gray-600 dark:text-gray-300 hover:text-[#1C2459] dark:hover:text-white hover:bg-gray-100 dark:hover:bg-[#12173B]/80'"
                        class="px-3.5 py-1.5 rounded-lg transition-all duration-200">
                    Cloud & Systems
                </button>
                <button @click="projectCategory = 'ai'" 
                        :class="projectCategory === 'ai' ? 'bg-[#F5FF67] text-[#1C2459] font-bold shadow-[0_0_12px_rgba(245,255,103,0.3)]' : 'text-gray-600 dark:text-gray-300 hover:text-[#1C2459] dark:hover:text-white hover:bg-gray-100 dark:hover:bg-[#12173B]/80'"
                        class="px-3.5 py-1.5 rounded-lg transition-all duration-200">
                    AI & Modernization
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
                     class="group relative rounded-2xl bg-white dark:bg-[#171E4A] border border-gray-200 dark:border-[#2E3A82] overflow-hidden flex flex-col justify-between hover:border-[#F5FF67] dark:hover:border-[#F5FF67] transition-all duration-300 hover:-translate-y-1.5 shadow-sm hover:shadow-[0_15px_35px_rgba(28,36,89,0.18)] dark:hover:shadow-[0_0_30px_rgba(245,255,103,0.18)]">
                    
                    <!-- Top Accent Highlight -->
                    <div class="h-0.5 w-full bg-gradient-to-r from-transparent via-[#F5FF67] to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>

                    <!-- Project Screenshots Gallery / Media Slider -->
                    @if(!empty($project->screenshots) && count($project->screenshots) > 1)
                        <div class="relative h-48 w-full overflow-hidden bg-gray-900 border-b border-gray-100 dark:border-[#2E3A82]/50">
                            @include('components.image-slider', [
                                'images' => $project->screenshots,
                                'title' => $project->title,
                                'aspect' => 'h-48'
                            ])
                        </div>
                    @elseif(!empty($project->banner_image))
                        <div class="relative h-48 w-full overflow-hidden bg-gray-900 border-b border-gray-100 dark:border-[#2E3A82]/50">
                            <img src="{{ $project->banner_image }}" alt="{{ $project->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500 opacity-90 group-hover:opacity-100">
                        </div>
                    @endif

                    <!-- Card Header: Industry, Client, Project Name -->
                    <div class="p-6 pb-4 border-b border-gray-100 dark:border-[#2E3A82]/50 bg-gray-50/60 dark:bg-[#141A42]/60">
                        <div class="flex items-center justify-between gap-2 mb-3">
                            <span class="inline-flex items-center px-2.5 py-1 rounded-md text-[10px] font-mono font-bold uppercase tracking-wider bg-[#F5FF67]/20 text-[#1C2459] dark:text-[#F5FF67] border border-[#F5FF67]/40 shadow-xs">
                                {{ $project->industry ?? (strtoupper($project->category) . ' SYSTEM') }}
                            </span>
                            <span class="text-[11px] font-mono text-gray-500 dark:text-gray-400">
                                {{ $project->client_name }}
                            </span>
                        </div>
                        <h3 class="text-lg font-bold text-[#1C2459] dark:text-white group-hover:text-[#1C2459] dark:group-hover:text-[#F5FF67] transition-colors leading-snug">
                            {{ $project->title }}
                        </h3>
                        @if($project->tagline)
                            <p class="text-xs text-gray-600 dark:text-gray-300 mt-1 font-mono line-clamp-1">
                                {{ $project->tagline }}
                            </p>
                        @endif
                    </div>

                    <!-- Card Body: Description, Tech Stack, Outcome Impact -->
                    <div class="p-6 pt-4 flex-1 flex flex-col justify-between space-y-4">
                        <div class="space-y-3.5">
                            <!-- Project Description -->
                            <div class="space-y-1">
                                <span class="text-[10px] font-mono font-bold uppercase tracking-wider text-[#1C2459] dark:text-[#F5FF67] flex items-center gap-1.5">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                    <span>Project Description</span>
                                </span>
                                <p class="text-xs text-gray-700 dark:text-gray-300 leading-relaxed line-clamp-3">
                                    {{ $project->description ?: $project->summary }}
                                </p>
                            </div>

                            <!-- Challenge Preview -->
                            @if(!empty($project->challenge))
                                <div class="rounded-xl p-3 bg-red-500/5 dark:bg-red-500/10 border border-red-500/15">
                                    <div class="flex items-center gap-1.5 text-[10px] font-mono font-bold uppercase tracking-wider text-rose-600 dark:text-rose-400 mb-1">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
                                        <span>Challenge</span>
                                    </div>
                                    <p class="text-xs text-gray-700 dark:text-gray-300 leading-relaxed line-clamp-2">
                                        {{ $project->challenge }}
                                    </p>
                                </div>
                            @endif

                            <!-- Tech Stack Badges -->
                            <div>
                                <div class="text-[10px] font-mono uppercase tracking-wider text-gray-500 dark:text-gray-400 mb-1.5">Tech Stack</div>
                                <div class="flex flex-wrap gap-1.5">
                                    @foreach(array_slice($project->tech_stack ?? [], 0, 5) as $tech)
                                        <span class="text-[10px] font-mono px-2 py-0.5 rounded-md bg-gray-100 dark:bg-[#12173B] text-gray-700 dark:text-gray-200 border border-gray-200 dark:border-[#2E3A82]">
                                            {{ $tech }}
                                        </span>
                                    @endforeach
                                </div>
                            </div>

                            <!-- Business Impact / Outcome -->
                            @if(!empty($project->outcome))
                                <div class="rounded-xl p-3 bg-emerald-500/10 dark:bg-emerald-500/15 border border-emerald-500/20 text-emerald-800 dark:text-emerald-300">
                                    <div class="flex items-center gap-1.5 text-[10px] font-mono font-bold uppercase tracking-wider text-emerald-700 dark:text-emerald-400 mb-1">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/></svg>
                                        <span>Business Impact / Outcome</span>
                                    </div>
                                    <div class="text-xs font-semibold leading-relaxed">
                                        {{ $project->outcome }}
                                    </div>
                                </div>
                            @endif
                        </div>

                        <!-- Action Links: View Project Details / Live Demo Link -->
                        <div class="pt-4 border-t border-gray-100 dark:border-[#2E3A82]/60 flex items-center justify-between gap-3">
                            <button type="button"
                                    @click="openProjectModal({{ json_encode($project->relationLoaded('metrics') ? $project : $project->load('metrics')) }})" 
                                    class="inline-flex items-center gap-1.5 px-4 py-2 rounded-lg text-xs font-mono font-bold text-[#1C2459] bg-[#F5FF67] hover:bg-[#E2EC48] transition-all transform hover:-translate-y-0.5 shadow-sm hover:shadow-[0_0_15px_rgba(245,255,103,0.35)]">
                                <span>View Project</span>
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                            </button>

                            @if(!empty($project->live_url))
                                <a href="{{ $project->live_url }}" 
                                   target="_blank" 
                                   rel="noopener"
                                   class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg text-xs font-mono font-medium text-gray-700 dark:text-gray-200 bg-gray-100 dark:bg-[#12173B] border border-gray-200 dark:border-[#2E3A82] hover:border-[#F5FF67] dark:hover:border-[#F5FF67] hover:text-[#1C2459] dark:hover:text-[#F5FF67] transition-all">
                                    <span>Live Demo</span>
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                                </a>
                            @endif
                        </div>
                    </div>

                </div>
            @endforeach
        </div>

    </div>
</section>
