<!-- Blog Article Reader Modal -->
<div x-show="selectedArticle" 
     x-cloak
     class="fixed inset-0 z-50 overflow-y-auto"
     aria-labelledby="article-modal-title" role="dialog" aria-modal="true">
    
    <!-- Backdrop -->
    <div x-show="selectedArticle"
         x-transition:enter="ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="fixed inset-0 bg-black/80 backdrop-blur-sm transition-opacity"
         @click="selectedArticle = null"></div>

    <div class="flex min-h-full items-center justify-center p-4 sm:p-6 text-center">
        <div x-show="selectedArticle"
             x-transition:enter="ease-out duration-300"
             x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
             x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
             x-transition:leave="ease-in duration-200"
             x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
             x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
             class="relative transform overflow-hidden rounded-2xl bg-white dark:bg-[#171E4A] border-2 border-gray-200 dark:border-[#2E3A82] text-left shadow-2xl transition-all w-full max-w-3xl p-6 sm:p-8">
            
            <!-- Close Button -->
            <button @click="selectedArticle = null" 
                    class="absolute top-4 right-4 text-gray-400 hover:text-white p-2 rounded-lg bg-gray-100 dark:bg-[#12173B] border border-gray-200 dark:border-[#2E3A82]">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>

            <template x-if="selectedArticle">
                <div class="space-y-6">
                    <!-- Header -->
                    <div class="space-y-2 pr-10">
                        <div class="flex flex-wrap items-center gap-2">
                            <span class="px-2.5 py-1 rounded text-[11px] font-mono font-bold uppercase tracking-wider bg-[#1C2459] text-[#F5FF67] border border-[#2E3A82]"
                                  x-text="selectedArticle.category"></span>
                            <span class="text-xs font-mono text-gray-500 dark:text-gray-400"
                                  x-text="selectedArticle.read_time_minutes + ' min read'"></span>
                        </div>
                        <h2 class="text-2xl sm:text-3xl font-extrabold text-[#1C2459] dark:text-white"
                            x-text="selectedArticle.title"></h2>
                        <div class="text-xs font-mono text-gray-500 dark:text-[#A5B4FC]">
                            <span x-text="'By ' + selectedArticle.author + ' (' + selectedArticle.author_role + ')'"></span>
                        </div>
                    </div>

                    <!-- Article Body Content -->
                    <div class="prose prose-sm sm:prose dark:prose-invert max-w-none text-gray-700 dark:text-gray-200 leading-relaxed space-y-4 pt-4 border-t border-gray-100 dark:border-[#2E3A82]/60 font-sans">
                        <p class="text-base font-medium text-gray-900 dark:text-white leading-relaxed" x-text="selectedArticle.summary"></p>
                        <div class="p-5 rounded-xl bg-gray-50 dark:bg-[#12173B] border border-gray-200 dark:border-[#2E3A82] text-sm leading-relaxed" x-text="selectedArticle.content"></div>
                    </div>

                    <!-- Tags -->
                    <div class="space-y-2 pt-2">
                        <div class="flex flex-wrap gap-2">
                            <template x-for="tag in selectedArticle.tags" :key="tag">
                                <span class="px-2.5 py-1 rounded-md text-xs font-mono bg-gray-100 dark:bg-[#12173B] text-gray-700 dark:text-gray-300 border border-gray-200 dark:border-[#2E3A82]"
                                      x-text="'#' + tag"></span>
                            </template>
                        </div>
                    </div>

                    <!-- Modal Actions -->
                    <div class="pt-4 border-t border-gray-200 dark:border-[#2E3A82] flex items-center justify-between">
                        <button @click="selectedArticle = null" 
                                class="px-4 py-2 text-xs font-mono font-semibold rounded-lg bg-gray-100 dark:bg-[#12173B] text-gray-700 dark:text-white border border-gray-300 dark:border-[#2E3A82]">
                            Back to Insights
                        </button>
                        <a href="#contact" @click="selectedArticle = null" 
                           class="inline-flex items-center gap-1.5 px-4 py-2 text-xs font-mono font-bold text-[#1C2459] bg-[#F5FF67] hover:bg-[#E2EC48] rounded-lg shadow">
                            <span>Consult With Our Architects →</span>
                        </a>
                    </div>
                </div>
            </template>
        </div>
    </div>
</div>
