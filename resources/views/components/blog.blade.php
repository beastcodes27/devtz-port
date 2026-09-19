<section id="blog" class="py-20 md:py-28 relative bg-gray-50/50 dark:bg-[#12173B]/50 border-t border-gray-200 dark:border-[#2E3A82]/50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Header -->
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 gap-6">
            <div class="space-y-3">
                <div class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full bg-white dark:bg-[#171E4A] border border-gray-300 dark:border-[#2E3A82] text-xs font-mono text-[#1C2459] dark:text-[#F5FF67]">
                    <span class="w-2 h-2 rounded-full bg-[#F5FF67]"></span>
                    <span>ENGINEERING RADAR</span>
                </div>
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold tracking-tight text-[#1C2459] dark:text-white">
                    Insights from the front lines.
                </h2>
                <p class="text-sm sm:text-base text-gray-600 dark:text-gray-300 max-w-xl">
                    Architectural deep dives, high-concurrency benchmarks, and real-world postmortems from our engineering leads.
                </p>
            </div>
        </div>

        <!-- Articles Grid -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($articles as $article)
                <article class="group rounded-2xl bg-white dark:bg-[#171E4A] border border-gray-200 dark:border-[#2E3A82] overflow-hidden flex flex-col justify-between hover:border-[#F5FF67] dark:hover:border-[#F5FF67] transition-all duration-300 hover:-translate-y-1.5 shadow-sm hover:shadow-[0_10px_30px_rgba(28,36,89,0.15)] dark:hover:shadow-[0_0_25px_rgba(245,255,103,0.15)]">
                    
                    <!-- Top Cover Image -->
                    <div class="relative h-44 w-full overflow-hidden bg-gray-900">
                        <img src="{{ $article->cover_image }}" 
                             alt="{{ $article->title }}" 
                             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500 opacity-90">
                        <div class="absolute top-3 left-3">
                            <span class="px-2.5 py-1 rounded-md text-[10px] font-mono font-bold uppercase tracking-wider bg-[#1C2459]/90 text-[#F5FF67] border border-[#2E3A82] backdrop-blur-sm">
                                {{ $article->category }}
                            </span>
                        </div>
                        <div class="absolute top-3 right-3">
                            <span class="px-2 py-0.5 rounded text-[10px] font-mono bg-black/60 text-white backdrop-blur-sm">
                                {{ $article->read_time_minutes }} min read
                            </span>
                        </div>
                    </div>

                    <!-- Article Body -->
                    <div class="p-6 flex-1 flex flex-col justify-between space-y-4">
                        <div>
                            <div class="text-[11px] font-mono text-gray-400 mb-1">
                                {{ $article->published_at ? $article->published_at->format('M d, Y') : 'Recent' }}
                            </div>
                            <h3 class="text-lg font-bold text-[#1C2459] dark:text-white group-hover:text-[#1C2459] dark:group-hover:text-[#F5FF67] transition-colors leading-snug mb-2">
                                {{ $article->title }}
                            </h3>
                            <p class="text-xs text-gray-600 dark:text-gray-300 line-clamp-3 leading-relaxed">
                                {{ $article->summary }}
                            </p>
                        </div>

                        <!-- Footer / Author & CTA -->
                        <div class="pt-4 border-t border-gray-100 dark:border-[#2E3A82]/60 flex items-center justify-between">
                            <div class="text-xs font-mono">
                                <span class="font-bold text-[#1C2459] dark:text-white">{{ $article->author }}</span>
                                <span class="text-[10px] block text-gray-500 dark:text-gray-400">{{ $article->author_role }}</span>
                            </div>

                            <button type="button"
                                    @click="openArticleModal({{ json_encode($article) }})" 
                                    class="inline-flex items-center gap-1 text-xs font-mono font-bold text-[#1C2459] dark:text-[#F5FF67] hover:underline">
                                <span>Read Deep-Dive</span>
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                            </button>
                        </div>
                    </div>

                </article>
            @endforeach
        </div>

    </div>
</section>
