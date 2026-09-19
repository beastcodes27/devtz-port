<!-- DevTZ CLI Terminal Easter Egg Modal -->
<div x-show="terminalOpen" 
     x-cloak
     class="fixed inset-0 z-50 overflow-y-auto"
     aria-labelledby="terminal-title" role="dialog" aria-modal="true">
    
    <!-- Backdrop with blur -->
    <div x-show="terminalOpen"
         x-transition:enter="ease-out duration-200"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="ease-in duration-150"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="fixed inset-0 bg-black/80 backdrop-blur-md transition-opacity"
         @click="terminalOpen = false"></div>

    <div class="flex min-h-full items-center justify-center p-4 text-center sm:p-6">
        <div x-show="terminalOpen"
             x-transition:enter="ease-out duration-200"
             x-transition:enter-start="opacity-0 scale-95"
             x-transition:enter-end="opacity-100 scale-100"
             x-transition:leave="ease-in duration-150"
             x-transition:leave-start="opacity-100 scale-100"
             x-transition:leave-end="opacity-0 scale-95"
             class="relative transform overflow-hidden rounded-2xl bg-[#0E132D] border-2 border-[#2E3A82] text-left shadow-[0_0_50px_rgba(245,255,103,0.15)] transition-all w-full max-w-3xl font-mono">
            
            <!-- Window Header -->
            <div class="flex items-center justify-between px-4 py-3 bg-[#161C47] border-b border-[#2E3A82]">
                <div class="flex items-center gap-2">
                    <button @click="terminalOpen = false" class="w-3 h-3 rounded-full bg-red-500 hover:opacity-80 transition-opacity"></button>
                    <button @click="terminalHistory = []" title="Clear Buffer" class="w-3 h-3 rounded-full bg-yellow-500 hover:opacity-80 transition-opacity"></button>
                    <button class="w-3 h-3 rounded-full bg-emerald-500 hover:opacity-80 transition-opacity"></button>
                    <span class="text-xs text-gray-300 ml-2 font-semibold">devtz-cli --session=live-node</span>
                </div>
                <div class="text-[11px] text-gray-400 flex items-center gap-2">
                    <span>Press <kbd class="px-1.5 py-0.5 bg-[#0E132D] border border-[#2E3A82] rounded text-gray-300">ESC</kbd> to exit</span>
                </div>
            </div>

            <!-- Terminal Screen Body -->
            <div id="terminal-body" class="p-6 text-xs h-96 overflow-y-auto space-y-3 text-gray-200">
                <template x-for="(item, index) in terminalHistory" :key="index">
                    <div>
                        <template x-if="item.type === 'system'">
                            <div class="text-[#F5FF67]" x-text="item.text"></div>
                        </template>

                        <template x-if="item.type === 'user'">
                            <div class="text-white font-bold flex items-center gap-1">
                                <span class="text-[#F5FF67]">devtz@studio:~$</span>
                                <span x-text="item.text.replace('$ ', '')"></span>
                            </div>
                        </template>

                        <template x-if="item.type === 'output'">
                            <div class="text-gray-300 whitespace-pre-wrap pl-3 border-l border-[#2E3A82]" x-text="item.text"></div>
                        </template>

                        <template x-if="item.type === 'error'">
                            <div class="text-red-400 pl-3 border-l border-red-500" x-text="item.text"></div>
                        </template>
                    </div>
                </template>

                <!-- Active Command Input Line -->
                <form @submit.prevent="executeCommand()" class="flex items-center gap-2 pt-2">
                    <span class="text-[#F5FF67] font-bold shrink-0">devtz@studio:~$</span>
                    <input type="text" id="terminal-cli-input" x-model="terminalInput" 
                           placeholder="type 'help', 'services', 'projects', 'quote', or 'hire'..." 
                           class="w-full bg-transparent text-white border-none outline-none focus:ring-0 text-xs font-mono placeholder-gray-600">
                </form>
            </div>

            <!-- Bottom Terminal Bar -->
            <div class="px-4 py-2 bg-[#161C47] border-t border-[#2E3A82] flex items-center justify-between text-[10px] text-gray-400">
                <span>UTF-8 // Laravel 12 // PHP 8.4</span>
                <span class="text-[#F5FF67]">HEX #1C2459 (Blueberry Void) & #F5FF67 (Lemon Glitch)</span>
            </div>
        </div>
    </div>
</div>
