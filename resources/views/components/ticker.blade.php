<div class="w-full overflow-hidden bg-gray-100/80 dark:bg-[#12173B]/90 border-y border-gray-200 dark:border-[#2E3A82] py-4 select-none">
    <div class="flex items-center gap-8 animate-marquee whitespace-nowrap">
        @php
            $techs = [
                ['name' => 'Laravel 12', 'badge' => 'Framework'],
                ['name' => 'PHP 8.4', 'badge' => 'Engine'],
                ['name' => 'Tailwind CSS', 'badge' => 'Styling'],
                ['name' => 'Vue.js 3', 'badge' => 'Frontend'],
                ['name' => 'React & Next.js', 'badge' => 'Client'],
                ['name' => 'PostgreSQL', 'badge' => 'Database'],
                ['name' => 'Redis Enterprise', 'badge' => 'Cache/Queue'],
                ['name' => 'Docker & K8s', 'badge' => 'Container'],
                ['name' => 'AWS Cloud', 'badge' => 'Infra'],
                ['name' => 'Flutter & Dart', 'badge' => 'Mobile'],
                ['name' => 'Python AI / LLMs', 'badge' => 'Intelligence'],
                ['name' => 'Alpine.js', 'badge' => 'Micro-UI'],
                ['name' => 'GraphQL / REST', 'badge' => 'API Layer'],
                ['name' => 'Meilisearch', 'badge' => 'Fast Search']
            ];
        @endphp

        <!-- First copy -->
        @foreach($techs as $tech)
            <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-lg bg-white dark:bg-[#1C2459] border border-gray-300 dark:border-[#2E3A82] text-xs font-mono shadow-sm">
                <span class="w-2 h-2 rounded-full bg-[#F5FF67]"></span>
                <span class="font-bold text-[#1C2459] dark:text-white">{{ $tech['name'] }}</span>
                <span class="text-[10px] text-gray-500 dark:text-gray-400 bg-gray-100 dark:bg-[#12173B] px-1.5 py-0.5 rounded">{{ $tech['badge'] }}</span>
            </div>
        @endforeach

        <!-- Second copy for seamless loop -->
        @foreach($techs as $tech)
            <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-lg bg-white dark:bg-[#1C2459] border border-gray-300 dark:border-[#2E3A82] text-xs font-mono shadow-sm">
                <span class="w-2 h-2 rounded-full bg-[#F5FF67]"></span>
                <span class="font-bold text-[#1C2459] dark:text-white">{{ $tech['name'] }}</span>
                <span class="text-[10px] text-gray-500 dark:text-gray-400 bg-gray-100 dark:bg-[#12173B] px-1.5 py-0.5 rounded">{{ $tech['badge'] }}</span>
            </div>
        @endforeach
    </div>
</div>
