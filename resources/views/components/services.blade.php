<section id="services" class="py-20 md:py-28 relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Section Header -->
        <div class="text-center max-w-3xl mx-auto space-y-4 mb-16">
            <div class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full bg-white dark:bg-[#12173B] border border-gray-300 dark:border-[#2E3A82] text-xs font-mono text-[#1C2459] dark:text-[#F5FF67]">
                <span class="w-2 h-2 rounded-full bg-[#F5FF67]"></span>
                <span>ENGINEERING CAPABILITIES</span>
            </div>
            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold tracking-tight text-[#1C2459] dark:text-white">
                Engineered for extreme performance & scale.
            </h2>
            <p class="text-base text-gray-600 dark:text-gray-300">
                We replace bloated processes with pure engineering excellence. From bespoke web apps to AI-augmented backends, explore what we build for high-growth tech companies.
            </p>
        </div>

        <!-- Services Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($services as $service)
                <div class="group relative rounded-2xl bg-white dark:bg-[#171E4A] border border-gray-200 dark:border-[#2E3A82] p-8 hover:border-[#F5FF67] dark:hover:border-[#F5FF67] transition-all duration-300 hover:-translate-y-1.5 shadow-sm hover:shadow-[0_10px_30px_rgba(28,36,89,0.15)] dark:hover:shadow-[0_0_30px_rgba(245,255,103,0.15)] flex flex-col justify-between">
                    
                    <!-- Top Icon & Order -->
                    <div>
                        <div class="flex items-center justify-between mb-6">
                            <div class="w-12 h-12 rounded-xl bg-gray-100 dark:bg-[#12173B] border border-gray-200 dark:border-[#2E3A82] text-[#1C2459] dark:text-[#F5FF67] flex items-center justify-center group-hover:bg-[#F5FF67] group-hover:text-[#1C2459] transition-all duration-300">
                                @if($service->icon === 'globe')
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"/></svg>
                                @elseif($service->icon === 'cloud')
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 00-9.78 2.096A4.001 4.001 0 003 15z"/></svg>
                                @elseif($service->icon === 'smartphone')
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"/></svg>
                                @elseif($service->icon === 'database')
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4m0 5c0 2.21-3.582 4-8 4s-8-1.79-8-4"/></svg>
                                @elseif($service->icon === 'layout')
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"/></svg>
                                @elseif($service->icon === 'cpu')
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z"/></svg>
                                @elseif($service->icon === 'network')
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l3 3-3 3m5 0h3M5 20h14a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                @else
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                                @endif
                            </div>
                            <span class="text-xs font-mono text-gray-400 dark:text-gray-500">0{{ $service->order }} // SERVICE</span>
                        </div>

                        <!-- Title & Tagline -->
                        <h3 class="text-xl font-bold text-[#1C2459] dark:text-white mb-2 group-hover:text-[#1C2459] dark:group-hover:text-[#F5FF67] transition-colors">
                            {{ $service->title }}
                        </h3>
                        <p class="text-xs font-mono text-gray-500 dark:text-[#A5B4FC] mb-4">
                            {{ $service->tagline }}
                        </p>
                        <p class="text-sm text-gray-600 dark:text-gray-300 leading-relaxed mb-6">
                            {{ $service->description }}
                        </p>

                        <!-- Key Deliverables Bullet Points -->
                        <div class="space-y-2.5 mb-6 pt-4 border-t border-gray-100 dark:border-[#2E3A82]/60">
                            <div class="text-[11px] font-mono font-bold uppercase tracking-wider text-gray-500 dark:text-[#A5B4FC] mb-2 flex items-center gap-1.5">
                                <span class="w-1.5 h-1.5 rounded-full bg-[#F5FF67]"></span>
                                <span>Key Deliverables</span>
                            </div>
                            @php
                                $deliverablesList = !empty($service->deliverables) ? $service->deliverables : $service->features;
                            @endphp
                            @foreach($deliverablesList as $deliverable)
                                <div class="flex items-start gap-2 text-xs text-gray-700 dark:text-gray-300">
                                    <svg class="w-3.5 h-3.5 text-[#1C2459] dark:text-[#F5FF67] shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                                    <span class="leading-relaxed">{{ $deliverable }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Tech Stack Badges & Link -->
                    <div class="pt-4 border-t border-gray-100 dark:border-[#2E3A82]/60">
                        <div class="flex flex-wrap gap-1.5 mb-4">
                            @foreach($service->tech_stack as $tech)
                                <span class="px-2 py-0.5 rounded text-[11px] font-mono bg-gray-100 dark:bg-[#12173B] text-gray-700 dark:text-gray-300 border border-gray-200 dark:border-[#2E3A82]">
                                    {{ $tech }}
                                </span>
                            @endforeach
                        </div>
                        <a href="#contact" class="inline-flex items-center text-xs font-mono font-bold text-[#1C2459] dark:text-[#F5FF67] group-hover:translate-x-1 transition-transform gap-1.5">
                            <span>Request Architecture Scope</span>
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                        </a>
                    </div>

                </div>
            @endforeach
        </div>
    </div>
</section>
