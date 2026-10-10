<!DOCTYPE html>
<html lang="en" x-data="appState()" :class="{ 'dark': darkMode }" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DevTZ - Enterprise Digital Agency & Software Solutions</title>
    <meta name="description" content="DevTZ delivers premium software development, web applications, mobile apps, and automation solutions for enterprises and individuals in Tanzania and beyond.">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=JetBrains+Mono:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                        mono: ['JetBrains Mono', 'monospace'],
                    },
                    colors: {
                        navy: {
                            800: '#1C2459',
                            900: '#12173B',
                            950: '#0E122F',
                        },
                        accent: {
                            yellow: '#F5FF67',
                        }
                    }
                }
            }
        }
    </script>

    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        [x-cloak] { display: none !important; }
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-50 dark:bg-[#0E122F] text-gray-900 dark:text-gray-100 min-h-screen flex flex-col transition-colors duration-300">

    <!-- Sticky Navigation Bar -->
    @include('components.navbar')

    <!-- Main Content Body -->
    <main class="flex-grow">
        @yield('content')
    </main>

    <!-- Footer Component -->
    @include('components.footer')

    <!-- Global CLI Terminal Modal -->
    <div x-show="terminalOpen" 
         x-cloak
         @keydown.escape.window="terminalOpen = false"
         class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/70 backdrop-blur-sm"
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 scale-95"
         x-transition:enter-end="opacity-100 scale-100"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100 scale-100"
         x-transition:leave-end="opacity-0 scale-95">
        
        <div class="w-full max-w-2xl bg-gray-900 border-2 border-[#2E3A82] rounded-2xl shadow-2xl overflow-hidden font-mono text-xs">
            <!-- Terminal Header -->
            <div class="flex items-center justify-between px-4 py-3 bg-[#12173B] border-b border-[#2E3A82]">
                <div class="flex items-center gap-2">
                    <span class="w-3 h-3 rounded-full bg-red-500 cursor-pointer" @click="terminalOpen = false"></span>
                    <span class="w-3 h-3 rounded-full bg-yellow-500"></span>
                    <span class="w-3 h-3 rounded-full bg-emerald-500"></span>
                </div>
                <span class="text-gray-400">DevTZ Interactive Shell v2.4</span>
                <button @click="terminalOpen = false" class="text-gray-400 hover:text-white">&times;</button>
            </div>

            <!-- Terminal Body -->
            <div class="p-6 space-y-4 text-gray-300 max-h-[60vh] overflow-y-auto">
                <div class="text-[#F5FF67]">
                    Welcome to DevTZ Interactive CLI Terminal.<br>
                    Type <span class="text-white font-bold">help</span> or <span class="text-white font-bold">services</span>, <span class="text-white font-bold">projects</span>, <span class="text-white font-bold">team</span>, <span class="text-white font-bold">contact</span>.
                </div>
                
                <div x-for="(log, idx) in terminalLogs" :key="idx" class="space-y-1">
                    <div class="flex items-center gap-2 text-emerald-400">
                        <span>devtz-user@guest:~$</span>
                        <span x-text="log.cmd" class="text-white"></span>
                    </div>
                    <div class="text-gray-300 pl-4 whitespace-pre-wrap" x-html="log.output"></div>
                </div>

                <!-- Input prompt -->
                <form @submit.prevent="runTerminalCommand()" class="flex items-center gap-2 pt-2">
                    <span class="text-emerald-400 font-bold">devtz-user@guest:~$</span>
                    <input type="text" 
                           x-model="terminalInput" 
                           x-ref="terminalInputRef"
                           class="flex-1 bg-transparent text-white outline-none font-mono text-xs" 
                           placeholder="Enter command..." autofocus>
                </form>
            </div>
        </div>
    </div>

    <!-- Alpine Global State Definition -->
    <script>
        function appState() {
            return {
                darkMode: localStorage.getItem('theme') === 'dark',
                mobileMenuOpen: false,
                terminalOpen: false,
                terminalInput: '',
                terminalLogs: [],
                selectedProject: null,

                openProjectModal(proj) {
                    this.selectedProject = proj;
                },
                
                toggleTheme() {
                    this.darkMode = !this.darkMode;
                    localStorage.setItem('theme', this.darkMode ? 'dark' : 'light');
                },

                toggleTerminal() {
                    this.terminalOpen = !this.terminalOpen;
                    if (this.terminalOpen) {
                        this.$nextTick(() => {
                            if (this.$refs.terminalInputRef) this.$refs.terminalInputRef.focus();
                        });
                    }
                },

                runTerminalCommand() {
                    const cmd = this.terminalInput.trim().toLowerCase();
                    if (!cmd) return;

                    let output = '';
                    switch(cmd) {
                        case 'help':
                            output = 'Available commands:\n- services : List engineering capabilities\n- projects : View portfolio work\n- about    : Mission & Vision\n- team     : Meet the engineering team\n- contact  : Get contact information\n- clear    : Clear terminal logs';
                            break;
                        case 'services':
                            output = '1. Enterprise Software (ERP, CRM, Workflow)\n2. Web Development (Custom Web Apps, APIs)\n3. Mobile Applications (iOS, Android, Cross-platform)\n4. Automation Solutions (RPA, Data Pipelines)\n5. Custom Software (SaaS, Legacy Modernization)\n6. Security & Compliance (Audits, Data Protection)';
                            break;
                        case 'projects':
                            output = 'Featured Projects:\n- NexusPay: Enterprise Payment Gateway\n- OmniPulse: Telehealth & Clinical Workflow\n- AeroCloud: Kubernetes Fleet Orchestrator\n- CogniSearch: Enterprise RAG Semantic Engine';
                            break;
                        case 'about':
                            output = 'DevTZ: Premium software solutions and digital services.\nMission: Delivering innovative, high-quality software solutions in Tanzania & worldwide.\nVision: Tanzania\'s most trusted technology partner.';
                            break;
                        case 'team':
                            output = 'DevTZ Core Team:\n- Founders & Senior Engineers delivering enterprise excellence.';
                            break;
                        case 'contact':
                            output = 'Email: info@devtz.site\nWhatsApp: +255 746 439 242\nLocation: Dar es Salaam, Tanzania\nGitHub: github.com/DevTZ';
                            break;
                        case 'clear':
                            this.terminalLogs = [];
                            this.terminalInput = '';
                            return;
                        default:
                            output = `Command not found: ${cmd}. Type 'help' for available commands.`;
                    }

                    this.terminalLogs.push({ cmd: this.terminalInput, output: output });
                    this.terminalInput = '';
                },

                currency: 'USD',
                currencies: {
                    USD: { name: 'US Dollar', symbol: '$', rate: 1 },
                    TZS: { name: 'Tanzanian Shilling', symbol: 'TSh ', rate: 2600 },
                    EUR: { name: 'Euro', symbol: '€', rate: 0.92 },
                    GBP: { name: 'British Pound', symbol: '£', rate: 0.78 }
                },
                setCurrency(code) {
                    if (this.currencies[code]) {
                        this.currency = code;
                    }
                },
                getActiveCurrency() {
                    return this.currencies[this.currency] || this.currencies.USD;
                },
                formatAmount(usdAmount) {
                    const curr = this.getActiveCurrency();
                    const converted = usdAmount * curr.rate;
                    return converted.toLocaleString(undefined, { maximumFractionDigits: 0 });
                }
            }
        }

        // Keyboard Shortcut Ctrl+K / Cmd+K for CLI Terminal
        window.addEventListener('keydown', (e) => {
            if ((e.metaKey || e.ctrlKey) && e.key === 'k') {
                e.preventDefault();
                const app = document.querySelector('[x-data]')?._x_dataStack[0];
                if (app) app.toggleTerminal();
            }
        });
    </script>
</body>
</html>
