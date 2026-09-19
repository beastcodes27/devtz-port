@props(['images' => [], 'title' => 'Project Screenshot', 'aspect' => 'h-52 sm:h-72'])

@php
    $imageList = !empty($images) ? (is_array($images) ? $images : json_decode($images, true)) : [];
@endphp

@if(count($imageList) > 1)
    <div x-data="{
            current: 0,
            total: {{ count($imageList) }},
            interval: null,
            autoplay: true,
            init() {
                this.startTimer();
            },
            startTimer() {
                if (this.interval) clearInterval(this.interval);
                this.interval = setInterval(() => {
                    if (this.autoplay) {
                        this.next();
                    }
                }, 3500);
            },
            next() {
                this.current = (this.current + 1) % this.total;
            },
            prev() {
                this.current = (this.current - 1 + this.total) % this.total;
            }
         }"
         @mouseenter="autoplay = false"
         @mouseleave="autoplay = true"
         class="relative w-full {{ $aspect }} overflow-hidden rounded-xl bg-gray-950 border border-gray-200 dark:border-[#2E3A82] group select-none">
        
        <!-- Image Slides -->
        @foreach($imageList as $idx => $img)
            <div x-show="current === {{ $idx }}"
                 x-transition:enter="transition ease-out duration-500"
                 x-transition:enter-start="opacity-0 scale-95"
                 x-transition:enter-end="opacity-100 scale-100"
                 x-transition:leave="transition ease-in duration-300"
                 x-transition:leave-start="opacity-100 scale-100"
                 x-transition:leave-end="opacity-0 scale-95"
                 class="absolute inset-0 w-full h-full">
                <img src="{{ $img }}" alt="{{ $title }} Screenshot {{ $idx + 1 }}" class="w-full h-full object-cover">
            </div>
        @endforeach

        <!-- Navigation Arrows (appear on hover) -->
        <button @click.stop="prev()" 
                class="absolute left-3 top-1/2 -translate-y-1/2 p-2 rounded-lg bg-black/60 text-white hover:bg-[#F5FF67] hover:text-[#1C2459] border border-white/20 opacity-0 group-hover:opacity-100 transition-all duration-200">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
        </button>

        <button @click.stop="next()" 
                class="absolute right-3 top-1/2 -translate-y-1/2 p-2 rounded-lg bg-black/60 text-white hover:bg-[#F5FF67] hover:text-[#1C2459] border border-white/20 opacity-0 group-hover:opacity-100 transition-all duration-200">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
        </button>

        <!-- Slide Counter Badge -->
        <div class="absolute bottom-3 right-3 px-2 py-0.5 rounded text-[10px] font-mono bg-black/75 text-[#F5FF67] border border-[#2E3A82] backdrop-blur-sm z-10">
            <span x-text="(current + 1) + ' / ' + total"></span>
        </div>

        <!-- Dot Navigation Indicators -->
        <div class="absolute bottom-3 left-1/2 -translate-x-1/2 flex items-center gap-1.5 z-10 bg-black/50 px-2.5 py-1 rounded-full backdrop-blur-sm">
            @foreach($imageList as $idx => $img)
                <button @click.stop="current = {{ $idx }}" 
                        :class="current === {{ $idx }} ? 'bg-[#F5FF67] w-4' : 'bg-white/50 w-1.5'"
                        class="h-1.5 rounded-full transition-all duration-300"></button>
            @endforeach
        </div>
    </div>
@elseif(count($imageList) === 1)
    <div class="relative w-full {{ $aspect }} overflow-hidden rounded-xl bg-gray-950 border border-gray-200 dark:border-[#2E3A82]">
        <img src="{{ $imageList[0] }}" alt="{{ $title }}" class="w-full h-full object-cover">
    </div>
@endif
