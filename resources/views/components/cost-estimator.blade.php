<section id="cost-estimator" class="py-20 md:py-28 relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Header -->
        <div class="text-center max-w-3xl mx-auto space-y-4 mb-14">
            <div class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full bg-white dark:bg-[#12173B] border border-gray-300 dark:border-[#2E3A82] text-xs font-mono text-[#1C2459] dark:text-[#F5FF67]">
                <span class="w-2 h-2 rounded-full bg-[#F5FF67]"></span>
                <span>INTERACTIVE SCOPING ENGINE</span>
            </div>
            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold tracking-tight text-[#1C2459] dark:text-white">
                Transparent Project Cost Estimator
            </h2>
            <p class="text-sm sm:text-base text-gray-600 dark:text-gray-300">
                Configure your target product parameters below to generate an instant baseline architectural estimate and development roadmap. Default currency is <strong>TShs (TZS)</strong> with instant multi-currency switching.
            </p>
        </div>

        <!-- Interactive Estimator Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
            
            <!-- Estimator Controls (Left 8 cols) -->
            <div class="lg:col-span-8 p-6 sm:p-8 rounded-2xl bg-white dark:bg-[#171E4A] border border-gray-200 dark:border-[#2E3A82] space-y-8 shadow-sm">
                
                <!-- 1. Platform Type -->
                <div class="space-y-3">
                    <label class="block text-xs font-mono uppercase tracking-wider text-gray-500 dark:text-[#A5B4FC] font-semibold">
                        01 // Target Architecture Platform
                    </label>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                        <button type="button" @click="estimator.platform = 'web-app'; estimator.calculate()"
                                :class="estimator.platform === 'web-app' ? 'border-[#F5FF67] bg-[#F5FF67]/10 dark:bg-[#12173B] ring-1 ring-[#F5FF67]' : 'border-gray-200 dark:border-[#2E3A82] bg-gray-50 dark:bg-[#12173B]/50'"
                                class="p-4 rounded-xl border text-left transition-all">
                            <div class="font-bold text-sm text-[#1C2459] dark:text-white">Custom Web Application</div>
                            <div class="text-xs text-gray-500 dark:text-gray-400">Laravel 12 + Vue/React SPA</div>
                        </button>

                        <button type="button" @click="estimator.platform = 'mobile'; estimator.calculate()"
                                :class="estimator.platform === 'mobile' ? 'border-[#F5FF67] bg-[#F5FF67]/10 dark:bg-[#12173B] ring-1 ring-[#F5FF67]' : 'border-gray-200 dark:border-[#2E3A82] bg-gray-50 dark:bg-[#12173B]/50'"
                                class="p-4 rounded-xl border text-left transition-all">
                            <div class="font-bold text-sm text-[#1C2459] dark:text-white">Mobile Application</div>
                            <div class="text-xs text-gray-500 dark:text-gray-400">iOS + Android Flutter Native</div>
                        </button>

                        <button type="button" @click="estimator.platform = 'cloud-infra'; estimator.calculate()"
                                :class="estimator.platform === 'cloud-infra' ? 'border-[#F5FF67] bg-[#F5FF67]/10 dark:bg-[#12173B] ring-1 ring-[#F5FF67]' : 'border-gray-200 dark:border-[#2E3A82] bg-gray-50 dark:bg-[#12173B]/50'"
                                class="p-4 rounded-xl border text-left transition-all">
                            <div class="font-bold text-sm text-[#1C2459] dark:text-white">Cloud & Microservices</div>
                            <div class="text-xs text-gray-500 dark:text-gray-400">AWS / Kubernetes Clusters</div>
                        </button>

                        <button type="button" @click="estimator.platform = 'full-ecosystem'; estimator.calculate()"
                                :class="estimator.platform === 'full-ecosystem' ? 'border-[#F5FF67] bg-[#F5FF67]/10 dark:bg-[#12173B] ring-1 ring-[#F5FF67]' : 'border-gray-200 dark:border-[#2E3A82] bg-gray-50 dark:bg-[#12173B]/50'"
                                class="p-4 rounded-xl border text-left transition-all">
                            <div class="font-bold text-sm text-[#1C2459] dark:text-white">Full Digital Ecosystem</div>
                            <div class="text-xs text-gray-500 dark:text-gray-400">Web + Mobile + Cloud + AI</div>
                        </button>
                    </div>
                </div>

                <!-- 2. Scale & Complexity -->
                <div class="space-y-3">
                    <label class="block text-xs font-mono uppercase tracking-wider text-gray-500 dark:text-[#A5B4FC] font-semibold">
                        02 // Product Scale & Load Tier
                    </label>
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
                        <button type="button" @click="estimator.scale = 'startup'; estimator.calculate()"
                                :class="estimator.scale === 'startup' ? 'border-[#F5FF67] bg-[#F5FF67]/10 dark:bg-[#12173B] ring-1 ring-[#F5FF67]' : 'border-gray-200 dark:border-[#2E3A82] bg-gray-50 dark:bg-[#12173B]/50'"
                                class="p-3.5 rounded-xl border text-left transition-all">
                            <div class="font-bold text-xs text-[#1C2459] dark:text-white">MVP / Early Launch</div>
                            <div class="text-[11px] text-gray-500 dark:text-gray-400">Core Feature Set</div>
                        </button>

                        <button type="button" @click="estimator.scale = 'growth'; estimator.calculate()"
                                :class="estimator.scale === 'growth' ? 'border-[#F5FF67] bg-[#F5FF67]/10 dark:bg-[#12173B] ring-1 ring-[#F5FF67]' : 'border-gray-200 dark:border-[#2E3A82] bg-gray-50 dark:bg-[#12173B]/50'"
                                class="p-3.5 rounded-xl border text-left transition-all">
                            <div class="font-bold text-xs text-[#1C2459] dark:text-white">Growth Stage</div>
                            <div class="text-[11px] text-gray-500 dark:text-gray-400">50k+ Active Users</div>
                        </button>

                        <button type="button" @click="estimator.scale = 'enterprise'; estimator.calculate()"
                                :class="estimator.scale === 'enterprise' ? 'border-[#F5FF67] bg-[#F5FF67]/10 dark:bg-[#12173B] ring-1 ring-[#F5FF67]' : 'border-gray-200 dark:border-[#2E3A82] bg-gray-50 dark:bg-[#12173B]/50'"
                                class="p-3.5 rounded-xl border text-left transition-all">
                            <div class="font-bold text-xs text-[#1C2459] dark:text-white">Enterprise Tier</div>
                            <div class="text-[11px] text-gray-500 dark:text-gray-400">Multi-Region & HA</div>
                        </button>
                    </div>
                </div>

                <!-- 3. Key Feature Modules -->
                <div class="space-y-3">
                    <label class="block text-xs font-mono uppercase tracking-wider text-gray-500 dark:text-[#A5B4FC] font-semibold">
                        03 // Essential Feature Modules
                    </label>
                    <div class="grid grid-cols-2 sm:grid-cols-3 gap-2.5">
                        @php
                            $features = [
                                ['id' => 'auth', 'name' => 'RBAC & OAuth'],
                                ['id' => 'database', 'name' => 'Postgres Database'],
                                ['id' => 'api', 'name' => 'REST / GraphQL API'],
                                ['id' => 'admin-panel', 'name' => 'Admin Dashboard'],
                                ['id' => 'payments', 'name' => 'Stripe / Subscriptions'],
                                ['id' => 'ai-rag', 'name' => 'AI Agents / RAG'],
                                ['id' => 'websockets', 'name' => 'Live WebSockets'],
                                ['id' => 'analytics', 'name' => 'Telemetry & Audits'],
                                ['id' => 'ci-cd', 'name' => 'Automated CI/CD'],
                            ];
                        @endphp

                        @foreach($features as $f)
                            <label class="flex items-center gap-2 p-2.5 rounded-lg bg-gray-50 dark:bg-[#12173B]/60 border border-gray-200 dark:border-[#2E3A82] cursor-pointer hover:border-[#F5FF67] transition-all">
                                <input type="checkbox" value="{{ $f['id'] }}" x-model="estimator.features" @change="estimator.calculate()"
                                       class="rounded text-[#1C2459] focus:ring-[#F5FF67] dark:bg-[#1C2459] border-gray-300 dark:border-[#2E3A82]">
                                <span class="text-xs text-gray-700 dark:text-gray-300 font-medium">{{ $f['name'] }}</span>
                            </label>
                        @endforeach
                    </div>
                </div>

            </div>

            <!-- Estimated Quote Summary Card (Right 4 cols) -->
            <div class="lg:col-span-4 p-6 sm:p-8 rounded-2xl bg-gray-900 text-white dark:bg-[#12173B] border-2 border-gray-800 dark:border-[#2E3A82] space-y-6 shadow-xl sticky top-28">
                
                <div class="space-y-3 pb-5 border-b border-gray-800 dark:border-[#2E3A82]">
                    <div class="flex items-center justify-between gap-2">
                        <div class="text-[11px] font-mono text-[#F5FF67] uppercase tracking-wider font-semibold">ESTIMATED BALLPARK</div>
                        <!-- Currency Selector Switcher -->
                        <div class="inline-flex items-center gap-1 bg-black/40 dark:bg-[#1C2459]/60 p-1 rounded-lg border border-gray-700 dark:border-[#2E3A82]">
                            <template x-for="(c, code) in currencies" :key="code">
                                <button type="button"
                                        @click="setCurrency(code)"
                                        :class="currency === code ? 'bg-[#F5FF67] text-[#1C2459] font-bold shadow-sm' : 'text-gray-400 hover:text-white'"
                                        class="px-2 py-0.5 text-[11px] font-mono rounded transition-all"
                                        :title="c.name"
                                        x-text="code">
                                </button>
                            </template>
                        </div>
                    </div>

                    <!-- Price Display -->
                    <div class="space-y-1">
                        <div class="text-3xl sm:text-4xl font-extrabold font-mono text-[#F5FF67] flex items-baseline gap-2 flex-wrap">
                            <span class="text-xl sm:text-2xl text-gray-300 font-sans font-bold" x-text="getActiveCurrency().symbol"></span>
                            <span x-text="formatAmount(estimator.baseUSD)"></span>
                            <span class="text-xs font-normal text-gray-400 font-mono" x-text="currency"></span>
                        </div>
                        <div class="flex items-center justify-between text-[11px] text-gray-400 pt-1">
                            <span>Fixed-price or agile sprint delivery</span>
                            <span class="font-mono text-gray-400" x-show="currency !== 'USD'" x-text="'1 USD ≈ ' + getActiveCurrency().rate.toLocaleString() + ' ' + currency"></span>
                        </div>
                    </div>
                </div>

                <!-- Scope summary bullets -->
                <div class="space-y-2 text-xs font-mono text-gray-300">
                    <div class="flex justify-between py-1 border-b border-gray-800 dark:border-[#2E3A82]/50">
                        <span class="text-gray-400">Platform:</span>
                        <span class="text-[#F5FF67] capitalize" x-text="estimator.platform.replace('-', ' ')"></span>
                    </div>
                    <div class="flex justify-between py-1 border-b border-gray-800 dark:border-[#2E3A82]/50">
                        <span class="text-gray-400">Scale Tier:</span>
                        <span class="text-[#F5FF67] capitalize" x-text="estimator.scale"></span>
                    </div>
                    <div class="flex justify-between py-1 border-b border-gray-800 dark:border-[#2E3A82]/50">
                        <span class="text-gray-400">Modules Selected:</span>
                        <span class="text-[#F5FF67]" x-text="estimator.features.length + ' features'"></span>
                    </div>
                    <div class="flex justify-between py-1 border-b border-gray-800 dark:border-[#2E3A82]/50">
                        <span class="text-gray-400">Estimated Timeline:</span>
                        <span class="text-emerald-400">6 - 10 Weeks</span>
                    </div>
                </div>

                <!-- CTA Button -->
                <button type="button"
                        @click="document.getElementById('contact').scrollIntoView({ behavior: 'smooth' }); document.getElementById('project_type').value = estimator.platform; document.getElementById('budget_range').value = formatMoney(estimator.baseUSD);"
                        class="w-full py-3.5 px-4 text-xs font-mono font-bold uppercase tracking-wider text-[#1C2459] bg-[#F5FF67] hover:bg-[#E2EC48] rounded-xl shadow-[0_0_20px_rgba(245,255,103,0.3)] transition-all">
                    Lock In Estimate & Inquire
                </button>

                <p class="text-[10px] text-gray-400 text-center">
                    All proposals include full source code ownership, CI/CD pipeline, and 60-day post-launch warranty.
                </p>
            </div>

        </div>

    </div>
</section>
