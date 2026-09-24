<!-- Project Case Study Modal Overlay -->
<div x-show="selectedProject" 
     x-cloak
     class="fixed inset-0 z-50 overflow-y-auto"
     aria-labelledby="modal-title" role="dialog" aria-modal="true">
    
    <!-- Backdrop with blur -->
    <div x-show="selectedProject"
         x-transition:enter="ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="fixed inset-0 bg-black/80 backdrop-blur-sm transition-opacity"
         @click="selectedProject = null"></div>

    <div class="flex min-h-full items-center justify-center p-4 sm:p-6 text-center">
        <div x-show="selectedProject"
             x-transition:enter="ease-out duration-300"
             x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
             x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
             x-transition:leave="ease-in duration-200"
             x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
             x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
             class="relative transform overflow-hidden rounded-2xl bg-white dark:bg-[#171E4A] border-2 border-gray-200 dark:border-[#2E3A82] text-left shadow-2xl transition-all w-full max-w-4xl p-6 sm:p-8">
            
            <!-- Close Button -->
            <button @click="selectedProject = null" 
                    class="absolute top-4 right-4 text-gray-400 hover:text-white p-2 rounded-lg bg-gray-100 dark:bg-[#12173B] border border-gray-200 dark:border-[#2E3A82]">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>

            <template x-if="selectedProject">
                <div class="space-y-6">
                    <!-- Modal Header -->
                    <div class="space-y-2 pr-10">
                        <div class="flex flex-wrap items-center gap-2">
                            <span class="px-2.5 py-1 rounded text-[11px] font-mono font-bold uppercase tracking-wider bg-[#1C2459] text-[#F5FF67] border border-[#2E3A82]"
                                  x-text="selectedProject.category.toUpperCase()"></span>
                            <span x-show="selectedProject.industry"
                                  class="px-2.5 py-1 rounded text-[11px] font-mono font-bold uppercase tracking-wider bg-[#F5FF67]/20 text-[#1C2459] dark:text-[#F5FF67] border border-[#F5FF67]/40"
                                  x-text="selectedProject.industry"></span>
                            <span class="text-xs font-mono text-gray-500 dark:text-gray-400"
                                  x-text="'Client: ' + selectedProject.client_name"></span>
                        </div>
                        <h2 class="text-2xl sm:text-3xl font-extrabold text-[#1C2459] dark:text-white"
                            x-text="selectedProject.title"></h2>
                        <p class="text-sm font-mono text-gray-500 dark:text-[#A5B4FC]"
                           x-text="selectedProject.tagline"></p>
                    </div>

                    <!-- Automatic Screenshots Slider Component inside Modal -->
                    <template x-if="selectedProject.screenshots && selectedProject.screenshots.length > 0">
                        <div x-data="{
                                slideIdx: 0,
                                slideTimer: null,
                                isPaused: false,
                                init() {
                                    this.startSlideShow();
                                },
                                startSlideShow() {
                                    if (this.slideTimer) clearInterval(this.slideTimer);
                                    this.slideTimer = setInterval(() => {
                                        if (!this.isPaused && selectedProject && selectedProject.screenshots) {
                                            this.slideIdx = (this.slideIdx + 1) % selectedProject.screenshots.length;
                                        }
                                    }, 3000);
                                }
                             }"
                             @mouseenter="isPaused = true"
                             @mouseleave="isPaused = false"
                             class="relative w-full h-56 sm:h-72 overflow-hidden rounded-xl bg-gray-950 border border-gray-200 dark:border-[#2E3A82] group">
                            
                            <template x-for="(shot, index) in selectedProject.screenshots" :key="index">
                                <div x-show="slideIdx === index"
                                     x-transition:enter="transition ease-out duration-400"
                                     x-transition:enter-start="opacity-0 scale-95"
                                     x-transition:enter-end="opacity-100 scale-100"
                                     x-transition:leave="transition ease-in duration-200"
                                     x-transition:leave-start="opacity-100 scale-100"
                                     x-transition:leave-end="opacity-0 scale-95"
                                     class="absolute inset-0 w-full h-full">
                                    <img :src="shot" :alt="selectedProject.title" class="w-full h-full object-cover">
                                </div>
                            </template>

                            <!-- Slider Controls -->
                            <template x-if="selectedProject.screenshots.length > 1">
                                <div>
                                    <button @click.stop="slideIdx = (slideIdx - 1 + selectedProject.screenshots.length) % selectedProject.screenshots.length"
                                            class="absolute left-3 top-1/2 -translate-y-1/2 p-2 rounded-lg bg-black/60 text-white hover:bg-[#F5FF67] hover:text-[#1C2459] border border-white/20 opacity-0 group-hover:opacity-100 transition-all duration-200">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                                    </button>

                                    <button @click.stop="slideIdx = (slideIdx + 1) % selectedProject.screenshots.length"
                                            class="absolute right-3 top-1/2 -translate-y-1/2 p-2 rounded-lg bg-black/60 text-white hover:bg-[#F5FF67] hover:text-[#1C2459] border border-white/20 opacity-0 group-hover:opacity-100 transition-all duration-200">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                                    </button>

                                    <div class="absolute bottom-3 right-3 px-2 py-0.5 rounded text-[10px] font-mono bg-black/80 text-[#F5FF67] border border-[#2E3A82] backdrop-blur-sm">
                                        <span x-text="(slideIdx + 1) + ' / ' + selectedProject.screenshots.length + ' Screenshots (Auto)'"></span>
                                    </div>

                                    <div class="absolute bottom-3 left-1/2 -translate-x-1/2 flex items-center gap-1.5 bg-black/50 px-2 py-1 rounded-full backdrop-blur-sm">
                                        <template x-for="(s, sIdx) in selectedProject.screenshots" :key="sIdx">
                                            <button @click.stop="slideIdx = sIdx"
                                                    :class="slideIdx === sIdx ? 'bg-[#F5FF67] w-4' : 'bg-white/50 w-1.5'"
                                                    class="h-1.5 rounded-full transition-all duration-300"></button>
                                        </template>
                                    </div>
                                </div>
                            </template>
                        </div>
                    </template>

                    <!-- Metrics Highlights Bar -->
                    <template x-if="selectedProject.metrics && selectedProject.metrics.length">
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-3 p-4 rounded-xl bg-gray-50 dark:bg-[#12173B] border border-gray-200 dark:border-[#2E3A82]">
                            <template x-for="metric in selectedProject.metrics" :key="metric.id">
                                <div class="text-center sm:text-left">
                                    <div class="text-xl font-bold font-mono text-[#1C2459] dark:text-[#F5FF67]" x-text="metric.value"></div>
                                    <div class="text-xs text-gray-500 dark:text-gray-400" x-text="metric.label"></div>
                                </div>
                            </template>
                        </div>
                    </template>

                    <!-- Challenge & Solution Breakdown -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-sm">
                        <div class="p-5 rounded-xl bg-gray-50 dark:bg-[#12173B]/80 border border-gray-200 dark:border-[#2E3A82]/60 space-y-2">
                            <div class="flex items-center gap-2 text-xs font-mono font-bold text-red-500 dark:text-red-400 uppercase tracking-wider">
                                <span>⚠️ The Challenge</span>
                            </div>
                            <p class="text-gray-700 dark:text-gray-300 leading-relaxed text-xs sm:text-sm" x-text="selectedProject.challenge"></p>
                        </div>

                        <div class="p-5 rounded-xl bg-gray-50 dark:bg-[#12173B]/80 border border-gray-200 dark:border-[#2E3A82]/60 space-y-2">
                            <div class="flex items-center gap-2 text-xs font-mono font-bold text-emerald-500 dark:text-emerald-400 uppercase tracking-wider">
                                <span>⚡ The DevTZ Architecture</span>
                            </div>
                            <p class="text-gray-700 dark:text-gray-300 leading-relaxed text-xs sm:text-sm" x-text="selectedProject.solution"></p>
                        </div>
                    </div>

                    <!-- Business Impact / Outcome -->
                    <template x-if="selectedProject.outcome">
                        <div class="p-5 rounded-xl bg-emerald-500/10 dark:bg-emerald-500/15 border border-emerald-500/25 text-emerald-800 dark:text-emerald-300 space-y-1.5">
                            <div class="flex items-center gap-2 text-xs font-mono font-bold uppercase tracking-wider text-emerald-600 dark:text-emerald-400">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/></svg>
                                <span>Business Impact & Measurable Outcome</span>
                            </div>
                            <p class="text-xs sm:text-sm font-semibold leading-relaxed text-emerald-900 dark:text-emerald-200" x-text="selectedProject.outcome"></p>
                        </div>
                    </template>

                    <!-- Tech Stack Implemented -->
                    <div class="space-y-2">
                        <div class="text-xs font-mono uppercase tracking-wider text-gray-500 dark:text-gray-400">Production Tech Stack</div>
                        <div class="flex flex-wrap gap-2">
                            <template x-for="tech in selectedProject.tech_stack" :key="tech">
                                <span class="px-3 py-1 rounded-lg text-xs font-mono bg-gray-100 dark:bg-[#1C2459] text-[#1C2459] dark:text-white border border-gray-300 dark:border-[#2E3A82]"
                                      x-text="tech"></span>
                            </template>
                        </div>
                    </div>

                    <!-- Modal Actions Bottom -->
                    <div class="pt-4 border-t border-gray-200 dark:border-[#2E3A82] flex flex-wrap items-center justify-between gap-4">
                        <div class="flex items-center gap-3">
                            <template x-if="selectedProject.live_url">
                                <a :href="selectedProject.live_url" target="_blank" rel="noopener"
                                   class="inline-flex items-center gap-1.5 px-4 py-2 text-xs font-mono font-semibold text-[#1C2459] bg-[#F5FF67] hover:bg-[#E2EC48] rounded-lg">
                                    <span>Live Demonstration</span>
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                                </a>
                            </template>
                            <template x-if="selectedProject.github_url">
                                <a :href="selectedProject.github_url" target="_blank" rel="noopener"
                                   class="inline-flex items-center gap-1.5 px-4 py-2 text-xs font-mono font-semibold text-gray-700 dark:text-gray-200 bg-gray-100 dark:bg-[#12173B] border border-gray-300 dark:border-[#2E3A82] rounded-lg">
                                    <span>Source Specs</span>
                                </a>
                            </template>
                        </div>

                        <button @click="selectedProject = null; document.getElementById('contact').scrollIntoView({ behavior: 'smooth' })"
                                class="inline-flex items-center gap-1.5 text-xs font-mono font-bold text-[#1C2459] dark:text-[#F5FF67] hover:underline">
                            <span>Request Similar Architecture Scope →</span>
                        </button>
                    </div>
                </div>
            </template>
        </div>
    </div>
</div>

