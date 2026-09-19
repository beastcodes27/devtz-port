<section class="py-20 md:py-28 relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Header -->
        <div class="text-center max-w-3xl mx-auto space-y-4 mb-14">
            <div class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full bg-white dark:bg-[#12173B] border border-gray-300 dark:border-[#2E3A82] text-xs font-mono text-[#1C2459] dark:text-[#F5FF67]">
                <span class="w-2 h-2 rounded-full bg-[#F5FF67]"></span>
                <span>ENGINEERING TRUST</span>
            </div>
            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold tracking-tight text-[#1C2459] dark:text-white">
                What CTOs & Founders say about us.
            </h2>
            <p class="text-sm sm:text-base text-gray-600 dark:text-gray-300">
                Direct feedback from tech leaders who partnered with DevTZ to architect, scale, and rescue critical software systems.
            </p>
        </div>

        <!-- Testimonials Cards Grid -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($testimonials as $testimonial)
                <div class="relative rounded-2xl bg-white dark:bg-[#171E4A] border border-gray-200 dark:border-[#2E3A82] p-8 flex flex-col justify-between hover:border-[#F5FF67] dark:hover:border-[#F5FF67] transition-all duration-300 shadow-sm hover:shadow-[0_10px_30px_rgba(28,36,89,0.12)] dark:hover:shadow-[0_0_25px_rgba(245,255,103,0.12)]">
                    
                    <div>
                        <!-- Stars -->
                        <div class="flex items-center gap-1 mb-6 text-[#F5FF67] bg-[#1C2459] px-2.5 py-1 rounded-md inline-flex border border-[#2E3A82]">
                            @for($i = 0; $i < $testimonial->rating; $i++)
                                <svg class="w-4 h-4 fill-current text-[#F5FF67]" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                            @endfor
                        </div>

                        <!-- Quote -->
                        <p class="text-sm text-gray-700 dark:text-gray-200 leading-relaxed italic mb-6">
                            "{{ $testimonial->quote }}"
                        </p>
                    </div>

                    <!-- Client Info & Avatar -->
                    <div class="flex items-center gap-3.5 pt-4 border-t border-gray-100 dark:border-[#2E3A82]/60">
                        <img src="{{ $testimonial->avatar_url }}" 
                             alt="{{ $testimonial->client_name }}" 
                             class="w-11 h-11 rounded-full object-cover border-2 border-[#F5FF67]">
                        <div class="flex-1 min-w-0">
                            <h4 class="text-sm font-bold text-[#1C2459] dark:text-white truncate">
                                {{ $testimonial->client_name }}
                            </h4>
                            <p class="text-xs text-gray-500 dark:text-gray-400 truncate">
                                {{ $testimonial->client_role }} • <span class="text-[#1C2459] dark:text-[#F5FF67]">{{ $testimonial->company }}</span>
                            </p>
                        </div>
                    </div>

                </div>
            @endforeach
        </div>

    </div>
</section>
