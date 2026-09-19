<section id="contact" class="py-20 md:py-28 relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-start">
            
            <!-- Left Info Column (5 cols) -->
            <div class="lg:col-span-5 space-y-6">
                <div class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full bg-white dark:bg-[#12173B] border border-gray-300 dark:border-[#2E3A82] text-xs font-mono text-[#1C2459] dark:text-[#F5FF67]">
                    <span class="w-2 h-2 rounded-full bg-[#F5FF67]"></span>
                    <span>INITIATE ENGAGEMENT</span>
                </div>

                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold tracking-tight text-[#1C2459] dark:text-white leading-tight">
                    Let's architect your next software triumph.
                </h2>

                <p class="text-sm sm:text-base text-gray-600 dark:text-gray-300 leading-relaxed">
                    Have an upcoming product roadmap, an architecture bottleneck, or an AI workflow to integrate? Tell us your specifications and we'll reply with a detailed technical breakdown.
                </p>

                <!-- Direct Channels -->
                <div class="space-y-4 pt-4 border-t border-gray-200 dark:border-[#2E3A82]/60 font-mono text-xs">
                    <div class="flex items-center gap-3 p-3 rounded-xl bg-white dark:bg-[#171E4A] border border-gray-200 dark:border-[#2E3A82]">
                        <div class="w-8 h-8 rounded-lg bg-[#1C2459] text-[#F5FF67] flex items-center justify-center font-bold">@</div>
                        <div>
                            <div class="text-gray-400 text-[10px]">DIRECT ARCHITECT DESK</div>
                            <a href="mailto:contact@devtz.com" class="text-sm font-bold text-[#1C2459] dark:text-white hover:text-[#F5FF67]">contact@devtz.com</a>
                        </div>
                    </div>

                    <div class="flex items-center gap-3 p-3 rounded-xl bg-white dark:bg-[#171E4A] border border-gray-200 dark:border-[#2E3A82]">
                        <div class="w-8 h-8 rounded-lg bg-[#1C2459] text-[#F5FF67] flex items-center justify-center font-bold">⚡</div>
                        <div>
                            <div class="text-gray-400 text-[10px]">GUARANTEED TURNAROUND</div>
                            <div class="text-sm font-bold text-emerald-600 dark:text-emerald-400">&lt; 24h Technical Scoping Review</div>
                        </div>
                    </div>

                    <div class="flex items-center gap-3 p-3 rounded-xl bg-white dark:bg-[#171E4A] border border-gray-200 dark:border-[#2E3A82]">
                        <div class="w-8 h-8 rounded-lg bg-[#1C2459] text-[#F5FF67] flex items-center justify-center font-bold">🌐</div>
                        <div>
                            <div class="text-gray-400 text-[10px]">TIMEZONE COVERAGE</div>
                            <div class="text-sm font-bold text-[#1C2459] dark:text-white">US / EU / Global Distributed Squads</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Form Column (7 cols) -->
            <div class="lg:col-span-7 p-6 sm:p-8 rounded-2xl bg-white dark:bg-[#171E4A] border border-gray-200 dark:border-[#2E3A82] shadow-xl">
                
                @if ($errors->any())
                    <div class="mb-6 p-4 rounded-xl bg-red-500/10 border border-red-500/30 text-red-600 dark:text-red-400 text-xs font-mono space-y-1">
                        <div class="font-bold">Please resolve the following fields:</div>
                        <ul class="list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('contact.store') }}" method="POST" class="space-y-5">
                    @csrf

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <!-- Name -->
                        <div class="space-y-1.5">
                            <label class="block text-xs font-mono text-gray-700 dark:text-gray-300 font-semibold" for="name">
                                Full Name <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="name" id="name" required value="{{ old('name') }}" placeholder="Alex Mercer"
                                   class="w-full px-4 py-2.5 rounded-xl bg-gray-50 dark:bg-[#12173B] border border-gray-300 dark:border-[#2E3A82] text-sm text-gray-900 dark:text-white focus:outline-none focus:border-[#F5FF67]">
                        </div>

                        <!-- Email -->
                        <div class="space-y-1.5">
                            <label class="block text-xs font-mono text-gray-700 dark:text-gray-300 font-semibold" for="email">
                                Work Email <span class="text-red-500">*</span>
                            </label>
                            <input type="email" name="email" id="email" required value="{{ old('email') }}" placeholder="alex@company.com"
                                   class="w-full px-4 py-2.5 rounded-xl bg-gray-50 dark:bg-[#12173B] border border-gray-300 dark:border-[#2E3A82] text-sm text-gray-900 dark:text-white focus:outline-none focus:border-[#F5FF67]">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <!-- Company -->
                        <div class="space-y-1.5">
                            <label class="block text-xs font-mono text-gray-700 dark:text-gray-300 font-semibold" for="company">
                                Company / Startup Name
                            </label>
                            <input type="text" name="company" id="company" value="{{ old('company') }}" placeholder="Acme Technologies Inc."
                                   class="w-full px-4 py-2.5 rounded-xl bg-gray-50 dark:bg-[#12173B] border border-gray-300 dark:border-[#2E3A82] text-sm text-gray-900 dark:text-white focus:outline-none focus:border-[#F5FF67]">
                        </div>

                        <!-- Project Type -->
                        <div class="space-y-1.5">
                            <label class="block text-xs font-mono text-gray-700 dark:text-gray-300 font-semibold" for="project_type">
                                Primary Domain <span class="text-red-500">*</span>
                            </label>
                            <select name="project_type" id="project_type" required
                                    class="w-full px-4 py-2.5 rounded-xl bg-gray-50 dark:bg-[#12173B] border border-gray-300 dark:border-[#2E3A82] text-sm text-gray-900 dark:text-white focus:outline-none focus:border-[#F5FF67]">
                                <option value="custom-web-application">Custom Web Application (Laravel/Vue/React)</option>
                                <option value="cloud-microservices">Cloud & Microservices (AWS/K8s)</option>
                                <option value="mobile-application">Mobile Application (Flutter/React Native)</option>
                                <option value="ai-automation">Applied AI & Automation Pipelines</option>
                                <option value="dedicated-squad">Dedicated Engineering Squad</option>
                            </select>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <!-- Budget Range -->
                        <div class="space-y-1.5">
                            <label class="block text-xs font-mono text-gray-700 dark:text-gray-300 font-semibold" for="budget_range">
                                Target Investment Range
                            </label>
                            <input type="text" name="budget_range" id="budget_range" value="{{ old('budget_range', '$5,000 - $15,000+') }}" placeholder="e.g. $10,000"
                                   class="w-full px-4 py-2.5 rounded-xl bg-gray-50 dark:bg-[#12173B] border border-gray-300 dark:border-[#2E3A82] text-sm text-gray-900 dark:text-white focus:outline-none focus:border-[#F5FF67]">
                        </div>

                        <!-- Timeline -->
                        <div class="space-y-1.5">
                            <label class="block text-xs font-mono text-gray-700 dark:text-gray-300 font-semibold" for="timeline">
                                Desired Target Launch
                            </label>
                            <select name="timeline" id="timeline"
                                    class="w-full px-4 py-2.5 rounded-xl bg-gray-50 dark:bg-[#12173B] border border-gray-300 dark:border-[#2E3A82] text-sm text-gray-900 dark:text-white focus:outline-none focus:border-[#F5FF67]">
                                <option value="asap">Immediate Sprint (Within 4 Weeks)</option>
                                <option value="1-3-months" selected>Standard Roadmap (1 - 3 Months)</option>
                                <option value="3-6-months">Comprehensive Build (3 - 6 Months)</option>
                                <option value="ongoing">Ongoing Retainer Partnership</option>
                            </select>
                        </div>
                    </div>

                    <!-- Message -->
                    <div class="space-y-1.5">
                        <label class="block text-xs font-mono text-gray-700 dark:text-gray-300 font-semibold" for="message">
                            Project Specifications & Architecture Goals <span class="text-red-500">*</span>
                        </label>
                        <textarea name="message" id="message" rows="4" required placeholder="Describe your product requirements, current tech stack, traffic expectations, and key milestones..."
                                  class="w-full px-4 py-3 rounded-xl bg-gray-50 dark:bg-[#12173B] border border-gray-300 dark:border-[#2E3A82] text-sm text-gray-900 dark:text-white focus:outline-none focus:border-[#F5FF67]">{{ old('message') }}</textarea>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit"
                            class="w-full py-4 px-6 text-sm font-mono font-bold uppercase tracking-wider text-[#1C2459] bg-[#F5FF67] hover:bg-[#E2EC48] rounded-xl shadow-[0_0_20px_rgba(245,255,103,0.35)] hover:shadow-[0_0_30px_rgba(245,255,103,0.6)] transform hover:-translate-y-0.5 transition-all">
                        Transmitting Project Dispatch ⚡
                    </button>
                </form>

            </div>

        </div>

    </div>
</section>
