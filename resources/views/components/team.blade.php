<section id="team" class="py-20 md:py-28 relative border-t border-gray-200 dark:border-[#2E3A82]/50 bg-gray-50/30 dark:bg-[#12173B]/30">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Section Header -->
        <div class="text-center max-w-3xl mx-auto space-y-4 mb-16">
            <div class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full bg-white dark:bg-[#12173B] border border-gray-300 dark:border-[#2E3A82] text-xs font-mono text-[#1C2459] dark:text-[#F5FF67]">
                <span class="w-2 h-2 rounded-full bg-[#F5FF67]"></span>
                <span>CORE ARCHITECTS & ENGINEERS</span>
            </div>
            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold tracking-tight text-[#1C2459] dark:text-white">
                The engineering team behind the systems.
            </h2>
            <p class="text-base text-gray-600 dark:text-gray-300">
                A multidisciplinary team of software architects, high-concurrency backend engineers, mobile specialists, and cloud operators crafting enterprise software.
            </p>
        </div>

        @php
            $teamMembers = [
                [
                    'name' => 'Beast',
                    'role' => 'Founder & Lead Systems Architect',
                    'discipline' => 'Core Architecture & Infrastructure',
                    'bio' => 'Specializes in distributed systems design, ultra-high-throughput Laravel Octane pipelines, optimistic concurrency locking, and resilient multi-currency financial engines.',
                    'avatar' => 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=400&q=80',
                    'badge' => 'Founder & Architect',
                    'skills' => ['Laravel Octane', 'Go', 'PostgreSQL', 'Redis Streams', 'Docker'],
                    'github' => 'https://github.com/beastcodes27',
                    'initials' => 'BC',
                ],
                [
                    'name' => 'Sarah Chen',
                    'role' => 'Principal Full-Stack Engineer',
                    'discipline' => 'Real-Time Web & Frontend Architecture',
                    'bio' => 'Leads enterprise SaaS portal development, WebSocket telemetry streaming, reactive design system state machines, and micro-frontend architectures.',
                    'avatar' => 'https://images.unsplash.com/photo-1580489944761-15a19d654956?auto=format&fit=crop&w=400&q=80',
                    'badge' => 'Full-Stack Lead',
                    'skills' => ['Vue 3', 'TypeScript', 'Node.js', 'Tailwind CSS', 'GraphQL'],
                    'github' => 'https://github.com/devtz',
                    'initials' => 'SC',
                ],
                [
                    'name' => 'Marcus Vance',
                    'role' => 'Head of Mobile & Cross-Platform',
                    'discipline' => 'Native iOS & Android Systems',
                    'bio' => 'Architects cross-platform mobile ecosystems with Flutter and Swift, building local-first SQLite offline synchronization and end-to-end encrypted WebRTC audio/video.',
                    'avatar' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=400&q=80',
                    'badge' => 'Mobile Lead',
                    'skills' => ['Flutter', 'Dart', 'Swift', 'WebRTC', 'Offline Sync'],
                    'github' => 'https://github.com/devtz',
                    'initials' => 'MV',
                ],
                [
                    'name' => 'Elena Rostova',
                    'role' => 'Cloud & DevOps Infrastructure Lead',
                    'discipline' => 'Cloud Platforms & Reliability',
                    'bio' => 'Orchestrates multi-region Kubernetes clusters, automated GitOps deployment pipelines, canary testing harnesses, and Prometheus/Grafana real-time monitoring.',
                    'avatar' => 'https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?auto=format&fit=crop&w=400&q=80',
                    'badge' => 'DevOps Lead',
                    'skills' => ['Kubernetes', 'AWS', 'Terraform', 'Prometheus', 'CI/CD'],
                    'github' => 'https://github.com/devtz',
                    'initials' => 'ER',
                ],
                [
                    'name' => 'Devon Kigozi',
                    'role' => 'AI & Data Systems Architect',
                    'discipline' => 'Applied Intelligence & Vectors',
                    'bio' => 'Implements enterprise retrieval-augmented generation (RAG), PgVector millisecond semantic embeddings recall, and autonomous guardrailed LLM operational pipelines.',
                    'avatar' => 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?auto=format&fit=crop&w=400&q=80',
                    'badge' => 'AI Systems',
                    'skills' => ['Python', 'PgVector', 'FastAPI', 'LangChain', 'PyTorch'],
                    'github' => 'https://github.com/devtz',
                    'initials' => 'DK',
                ],
                [
                    'name' => 'Amara Okafor',
                    'role' => 'Senior UI/UX & Design Systems Lead',
                    'discipline' => 'Product Experience & Systems',
                    'bio' => 'Designs high-density data visualizations, tokenized accessible design components, and friction-free user journeys for enterprise software products.',
                    'avatar' => 'https://images.unsplash.com/photo-1531746020798-e6953c6e8e04?auto=format&fit=crop&w=400&q=80',
                    'badge' => 'UI/UX Design',
                    'skills' => ['Design Systems', 'Figma', 'WCAG AAA', 'Tailwind', 'Prototyping'],
                    'github' => 'https://github.com/devtz',
                    'initials' => 'AO',
                ],
            ];
        @endphp

        <!-- 6-Member Team Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($teamMembers as $member)
                <div class="group relative rounded-2xl bg-white dark:bg-[#171E4A] border border-gray-200 dark:border-[#2E3A82] p-6 flex flex-col justify-between hover:border-[#F5FF67] dark:hover:border-[#F5FF67] transition-all duration-300 hover:-translate-y-1.5 shadow-sm hover:shadow-[0_15px_35px_rgba(28,36,89,0.15)] dark:hover:shadow-[0_0_30px_rgba(245,255,103,0.18)]">
                    
                    <!-- Top Accent Line -->
                    <div class="absolute top-0 inset-x-0 h-0.5 bg-gradient-to-r from-transparent via-[#F5FF67] to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>

                    <div class="space-y-5">
                        <!-- Profile Header -->
                        <div class="flex items-start gap-4">
                            <!-- Avatar with Status Dot -->
                            <div class="relative shrink-0">
                                <img src="{{ $member['avatar'] }}" alt="{{ $member['name'] }}" class="w-16 h-16 rounded-xl object-cover border-2 border-gray-200 dark:border-[#2E3A82] group-hover:border-[#F5FF67] transition-colors shadow-sm">
                                <span class="absolute -bottom-1 -right-1 w-4 h-4 rounded-full bg-emerald-500 border-2 border-white dark:border-[#171E4A]" title="Active Contributor"></span>
                            </div>

                            <!-- Name & Roles -->
                            <div class="space-y-1 min-w-0">
                                <div class="flex items-center gap-2">
                                    <h3 class="text-lg font-bold text-[#1C2459] dark:text-white truncate">
                                        {{ $member['name'] }}
                                    </h3>
                                    <svg class="w-4 h-4 text-emerald-500 shrink-0" fill="currentColor" viewBox="0 0 20 20" title="Verified Engineer">
                                        <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                    </svg>
                                </div>
                                <div class="text-xs font-semibold text-[#1C2459] dark:text-[#F5FF67] font-mono leading-tight">
                                    {{ $member['role'] }}
                                </div>
                                <div class="text-[11px] font-mono text-gray-500 dark:text-gray-400">
                                    {{ $member['discipline'] }}
                                </div>
                            </div>
                        </div>

                        <!-- Bio / Focus -->
                        <p class="text-xs text-gray-600 dark:text-gray-300 leading-relaxed">
                            {{ $member['bio'] }}
                        </p>

                        <!-- Tech Stack Badges -->
                        <div class="space-y-1.5 pt-1">
                            <div class="text-[10px] font-mono uppercase tracking-wider text-gray-400">Specialization Stack</div>
                            <div class="flex flex-wrap gap-1.5">
                                @foreach($member['skills'] as $skill)
                                    <span class="text-[10px] font-mono px-2 py-0.5 rounded-md bg-gray-100 dark:bg-[#12173B] text-gray-700 dark:text-gray-200 border border-gray-200 dark:border-[#2E3A82]">
                                        {{ $skill }}
                                    </span>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <!-- Footer Action -->
                    <div class="pt-4 mt-5 border-t border-gray-100 dark:border-[#2E3A82]/50 flex items-center justify-between">
                        <span class="inline-flex items-center px-2 py-0.5 rounded text-[10px] font-mono font-bold uppercase tracking-wider bg-[#F5FF67]/15 text-[#1C2459] dark:text-[#F5FF67] border border-[#F5FF67]/30">
                            {{ $member['badge'] }}
                        </span>

                        <a href="{{ $member['github'] }}" target="_blank" rel="noopener" class="inline-flex items-center gap-1.5 text-xs font-mono font-semibold text-gray-500 dark:text-gray-400 hover:text-[#1C2459] dark:hover:text-[#F5FF67] transition-colors">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path fill-rule="evenodd" clip-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.53 1.032 1.53 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z"/></svg>
                            <span>GitHub</span>
                        </a>
                    </div>

                </div>
            @endforeach
        </div>

    </div>
</section>
