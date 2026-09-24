function devtzApp() {
    return {
        darkMode: localStorage.getItem('devtz-theme') !== 'light',
        currency: localStorage.getItem('devtz-currency') || 'TZS',
        currencyDropdownOpen: false,
        currencies: {
            TZS: { code: 'TZS', symbol: 'TSh', name: 'Tanzanian Shilling', rate: 2600, step: 50000 },
            USD: { code: 'USD', symbol: '$', name: 'US Dollar', rate: 1, step: 50 },
            EUR: { code: 'EUR', symbol: '€', name: 'Euro', rate: 0.92, step: 50 },
            GBP: { code: 'GBP', symbol: '£', name: 'British Pound', rate: 0.79, step: 50 },
            KES: { code: 'KES', symbol: 'KSh', name: 'Kenyan Shilling', rate: 130, step: 5000 }
        },
        mobileMenuOpen: false,
        terminalOpen: false,
        terminalInput: '',
        terminalHistory: [
            { type: 'system', text: '⚡ DevTZ Kernel v3.4.0 [x86_64-linux-gnu]' },
            { type: 'system', text: 'Type "help" to view available diagnostic & exploration commands.' }
        ],
        selectedProject: null,
        selectedArticle: null,
        techTab: 'backend',
        projectCategory: 'all',

        getActiveCurrency() {
            return this.currencies[this.currency] || this.currencies.TZS;
        },

        setCurrency(code) {
            const upper = (code || '').toUpperCase();
            if (this.currencies[upper]) {
                this.currency = upper;
                localStorage.setItem('devtz-currency', upper);
                this.currencyDropdownOpen = false;
            }
        },

        formatAmount(usdAmount) {
            const curr = this.getActiveCurrency();
            let converted = (usdAmount || 0) * curr.rate;
            if (curr.step && curr.step > 1) {
                converted = Math.round(converted / curr.step) * curr.step;
            } else {
                converted = Math.round(converted);
            }
            return converted.toLocaleString();
        },

        formatMoney(usdAmount) {
            const curr = this.getActiveCurrency();
            return curr.symbol + ' ' + this.formatAmount(usdAmount);
        },
        
        // Interactive Cost Estimator State
        estimator: {
            platform: 'web-app',
            scale: 'growth',
            timeline: 'standard',
            features: ['auth', 'database', 'api', 'admin-panel'],
            baseUSD: 6500,
            budget: 6500,
            calculate() {
                let base = 2500;
                if (this.platform === 'web-app') base = 4000;
                if (this.platform === 'mobile') base = 5500;
                if (this.platform === 'full-ecosystem') base = 9000;
                if (this.platform === 'cloud-infra') base = 3500;

                let scaleMult = 1.0;
                if (this.scale === 'startup') scaleMult = 0.85;
                if (this.scale === 'growth') scaleMult = 1.2;
                if (this.scale === 'enterprise') scaleMult = 2.0;

                let timelineMult = 1.0;
                if (this.timeline === 'urgent') timelineMult = 1.35;
                if (this.timeline === 'relaxed') timelineMult = 0.9;

                let featureCost = this.features.length * 600;
                this.baseUSD = Math.round((base * scaleMult * timelineMult) + featureCost);
                this.budget = this.baseUSD;
            }
        },

        init() {
            this.estimator.calculate();
            this.$watch('darkMode', val => {
                if (val) {
                    document.documentElement.classList.add('dark');
                    localStorage.setItem('devtz-theme', 'dark');
                } else {
                    document.documentElement.classList.remove('dark');
                    localStorage.setItem('devtz-theme', 'light');
                }
            });
            this.$watch('currency', val => {
                if (this.currencies[val]) {
                    localStorage.setItem('devtz-currency', val);
                }
            });
        },

        toggleTheme() {
            this.darkMode = !this.darkMode;
        },

        toggleTerminal() {
            this.terminalOpen = !this.terminalOpen;
            if (this.terminalOpen) {
                this.$nextTick(() => {
                    const input = document.getElementById('terminal-cli-input');
                    if (input) input.focus();
                });
            }
        },

        executeCommand() {
            const raw = this.terminalInput.trim();
            if (!raw) return;
            this.terminalHistory.push({ type: 'user', text: `$ ${raw}` });
            const cmd = raw.toLowerCase();

            if (cmd === 'help') {
                this.terminalHistory.push({
                    type: 'output',
                    text: 'Available Commands:\n  • about     - Company overview & vision\n  • services  - Core engineering solutions\n  • projects  - Shipped enterprise case studies\n  • stack     - Core technology matrix\n  • quote     - Launch interactive cost estimator\n  • currency  - View or switch active currency (TZS, USD, EUR, GBP, KES)\n  • hire      - Open project inquiry channel\n  • theme     - Usage: theme [dark|light]\n  • clear     - Clear terminal buffer\n  • exit      - Close terminal'
                });
            } else if (cmd === 'about') {
                this.terminalHistory.push({
                    type: 'output',
                    text: 'DevTZ Software: Elite engineering studio crafting resilient web apps, cloud ecosystems, and AI integrations.'
                });
            } else if (cmd === 'services') {
                this.terminalHistory.push({
                    type: 'output',
                    text: '[1] Custom Web Architectures (Laravel/Vue/React)\n[2] Cloud & Microservices (AWS/Docker/K8s)\n[3] Mobile Applications (Flutter/React Native)\n[4] AI Integrations & Automated Pipelines'
                });
            } else if (cmd === 'projects') {
                this.terminalHistory.push({
                    type: 'output',
                    text: 'Explore case studies: FinTech Nexus, OmniHealth Cloud, AutoScale Logistics, NeuralTrade AI.'
                });
            } else if (cmd === 'stack') {
                this.terminalHistory.push({
                    type: 'output',
                    text: 'Backend: PHP 8.4+, Laravel 12, Node.js, Go, Python\nFrontend: Vue 3, React, Tailwind CSS, Alpine.js\nData: PostgreSQL, MySQL, Redis, Meilisearch'
                });
            } else if (cmd === 'quote') {
                this.terminalOpen = false;
                document.getElementById('cost-estimator')?.scrollIntoView({ behavior: 'smooth' });
            } else if (cmd === 'currency' || cmd.startsWith('currency ')) {
                const parts = cmd.split(/\s+/);
                if (parts.length > 1) {
                    const target = parts[1].toUpperCase();
                    if (this.currencies[target]) {
                        this.setCurrency(target);
                        this.terminalHistory.push({
                            type: 'output',
                            text: `✓ Currency switched to ${target} (${this.currencies[target].symbol} — ${this.currencies[target].name})`
                        });
                    } else {
                        this.terminalHistory.push({
                            type: 'error',
                            text: `Unknown currency: "${parts[1]}". Available options: ${Object.keys(this.currencies).join(', ')}`
                        });
                    }
                } else {
                    this.terminalHistory.push({
                        type: 'output',
                        text: `Active Currency: ${this.currency} (${this.getActiveCurrency().symbol} — ${this.getActiveCurrency().name})\nAvailable options: TZS (default), USD, EUR, GBP, KES\nSwitch with: currency [code]`
                    });
                }
            } else if (cmd === 'hire') {
                this.terminalOpen = false;
                document.getElementById('contact')?.scrollIntoView({ behavior: 'smooth' });
            } else if (cmd === 'theme light') {
                this.darkMode = false;
                this.terminalHistory.push({ type: 'output', text: 'Switched to Light Theme (White & Lemon Glitch #F5FF67)' });
            } else if (cmd === 'theme dark') {
                this.darkMode = true;
                this.terminalHistory.push({ type: 'output', text: 'Switched to Dark Theme (Blueberry Void #1C2459 & Lemon Glitch #F5FF67)' });
            } else if (cmd === 'clear') {
                this.terminalHistory = [];
            } else if (cmd === 'exit' || cmd === 'quit') {
                this.terminalOpen = false;
            } else {
                this.terminalHistory.push({
                    type: 'error',
                    text: `Command not found: "${cmd}". Type "help" for a list of commands.`
                });
            }

            this.terminalInput = '';
            this.$nextTick(() => {
                const termBody = document.getElementById('terminal-body');
                if (termBody) termBody.scrollTop = termBody.scrollHeight;
            });
        },

        openProjectModal(project) {
            this.selectedProject = project;
        },

        openArticleModal(article) {
            this.selectedArticle = article;
        },

        closeAllModals() {
            this.selectedProject = null;
            this.selectedArticle = null;
            this.terminalOpen = false;
            this.mobileMenuOpen = false;
        }
    };
}
