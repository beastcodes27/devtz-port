@extends('layouts.admin')

@section('title', 'Deploy New Project')

@section('content')
<div class="max-w-4xl mx-auto space-y-6">
    
    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-2xl font-bold text-[#1C2459] dark:text-white font-mono">Deploy New Project</h2>
            <p class="text-xs text-gray-500 dark:text-gray-400 font-mono">Publish a new engineering project with screenshots, description, and live demo link.</p>
        </div>
        <a href="{{ route('admin.projects.index') }}" class="text-xs font-mono text-gray-500 dark:text-gray-400 hover:underline">
            ← Cancel & Return
        </a>
    </div>

    @if ($errors->any())
        <div class="p-4 rounded-xl bg-red-500/10 border border-red-500/30 text-red-600 dark:text-red-400 text-xs font-mono">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data" class="p-8 rounded-2xl bg-white dark:bg-[#171E4A] border border-gray-200 dark:border-[#2E3A82] space-y-6 shadow-sm font-mono text-xs">
        @csrf

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
            <!-- Title -->
            <div class="space-y-1.5">
                <label class="block font-bold text-gray-700 dark:text-gray-200">Project Title *</label>
                <input type="text" name="title" required value="{{ old('title') }}" placeholder="e.g. NexusPay Enterprise Settlement Gateway"
                       class="w-full px-4 py-2.5 rounded-xl bg-gray-50 dark:bg-[#12173B] border border-gray-300 dark:border-[#2E3A82] text-gray-900 dark:text-white focus:outline-none focus:border-[#F5FF67]">
            </div>

            <!-- Client Name -->
            <div class="space-y-1.5">
                <label class="block font-bold text-gray-700 dark:text-gray-200">Client / Organization *</label>
                <input type="text" name="client_name" required value="{{ old('client_name') }}" placeholder="e.g. Nexus Global Financials Ltd."
                       class="w-full px-4 py-2.5 rounded-xl bg-gray-50 dark:bg-[#12173B] border border-gray-300 dark:border-[#2E3A82] text-gray-900 dark:text-white focus:outline-none focus:border-[#F5FF67]">
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-3 gap-5">
            <!-- Industry -->
            <div class="space-y-1.5">
                <label class="block font-bold text-gray-700 dark:text-gray-200">Industry / Domain</label>
                <input type="text" name="industry" value="{{ old('industry') }}" placeholder="e.g. Fintech, Logistics, Healthcare"
                       class="w-full px-4 py-2.5 rounded-xl bg-gray-50 dark:bg-[#12173B] border border-gray-300 dark:border-[#2E3A82] text-gray-900 dark:text-white focus:outline-none focus:border-[#F5FF67]">
            </div>

            <!-- Category -->
            <div class="space-y-1.5">
                <label class="block font-bold text-gray-700 dark:text-gray-200">Category *</label>
                <select name="category" required class="w-full px-4 py-2.5 rounded-xl bg-gray-50 dark:bg-[#12173B] border border-gray-300 dark:border-[#2E3A82] text-gray-900 dark:text-white focus:outline-none focus:border-[#F5FF67]">
                    <option value="web">Web Applications</option>
                    <option value="mobile">Mobile Apps</option>
                    <option value="cloud">Cloud & DevOps</option>
                    <option value="ai">AI & Data Engineering</option>
                </select>
            </div>

            <!-- Order -->
            <div class="space-y-1.5">
                <label class="block font-bold text-gray-700 dark:text-gray-200">Display Priority Order</label>
                <input type="number" name="order" value="{{ old('order', 1) }}"
                       class="w-full px-4 py-2.5 rounded-xl bg-gray-50 dark:bg-[#12173B] border border-gray-300 dark:border-[#2E3A82] text-gray-900 dark:text-white focus:outline-none focus:border-[#F5FF67]">
            </div>
        </div>

        <!-- Tagline -->
        <div class="space-y-1.5">
            <label class="block font-bold text-gray-700 dark:text-gray-200">Tagline *</label>
            <input type="text" name="tagline" required value="{{ old('tagline') }}" placeholder="Sub-40ms high-throughput payment orchestrator processing $140M+ monthly..."
                   class="w-full px-4 py-2.5 rounded-xl bg-gray-50 dark:bg-[#12173B] border border-gray-300 dark:border-[#2E3A82] text-gray-900 dark:text-white focus:outline-none focus:border-[#F5FF67]">
        </div>

        <!-- Project Description -->
        <div class="space-y-1.5">
            <div class="flex items-center justify-between">
                <label class="block font-bold text-gray-700 dark:text-gray-200">Project Description *</label>
                <span class="text-[10px] text-gray-400">Detailed overview presented to visitors</span>
            </div>
            <textarea name="description" required rows="4" placeholder="Detailed architectural description of the project, client requirements, key system workflows, modules built, and engineering highlights..."
                      class="w-full px-4 py-2.5 rounded-xl bg-gray-50 dark:bg-[#12173B] border border-gray-300 dark:border-[#2E3A82] text-gray-900 dark:text-white focus:outline-none focus:border-[#F5FF67]">{{ old('description') }}</textarea>
        </div>

        <!-- Links (Demo Link & GitHub) -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5 p-4 rounded-xl bg-gray-50 dark:bg-[#12173B]/70 border border-gray-200 dark:border-[#2E3A82]">
            <!-- Live Demo Link -->
            <div class="space-y-1.5">
                <label class="block font-bold text-[#1C2459] dark:text-[#F5FF67] flex items-center gap-1.5">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                    <span>Project Demo Link (Live URL)</span>
                </label>
                <input type="url" name="live_url" value="{{ old('live_url') }}" placeholder="https://demo.devtz.com/your-project"
                       class="w-full px-4 py-2.5 rounded-xl bg-white dark:bg-[#171E4A] border border-gray-300 dark:border-[#2E3A82] text-gray-900 dark:text-white focus:outline-none focus:border-[#F5FF67]">
                <span class="text-[10px] text-gray-400">Visitors can click "Live Demo" to test the running deployment.</span>
            </div>

            <!-- GitHub Specs URL -->
            <div class="space-y-1.5">
                <label class="block font-bold text-gray-700 dark:text-gray-200 flex items-center gap-1.5">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/></svg>
                    <span>Source Specs / Repository (Optional)</span>
                </label>
                <input type="url" name="github_url" value="{{ old('github_url') }}" placeholder="https://github.com/devtz/project-repo"
                       class="w-full px-4 py-2.5 rounded-xl bg-white dark:bg-[#171E4A] border border-gray-300 dark:border-[#2E3A82] text-gray-900 dark:text-white focus:outline-none focus:border-[#F5FF67]">
            </div>
        </div>

        <!-- Screenshots Upload & Gallery -->
        <div class="space-y-4 p-5 rounded-2xl bg-gray-50/70 dark:bg-[#12173B]/80 border-2 border-dashed border-gray-300 dark:border-[#2E3A82]">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="font-bold text-sm text-[#1C2459] dark:text-white flex items-center gap-2">
                        <svg class="w-4 h-4 text-[#F5FF67]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                        <span>Project Screenshots (File Upload)</span>
                    </h3>
                    <p class="text-[11px] text-gray-500 dark:text-gray-400">Upload multiple screenshots from your computer to create an interactive showcase slider.</p>
                </div>
                <span class="px-2 py-0.5 rounded text-[10px] bg-[#1C2459] text-[#F5FF67] border border-[#2E3A82]">Multiple Allowed</span>
            </div>

            <!-- File Upload Input -->
            <div class="space-y-2">
                <input type="file" name="screenshot_files[]" multiple accept="image/*"
                       class="w-full px-4 py-3 rounded-xl bg-white dark:bg-[#171E4A] border border-gray-300 dark:border-[#2E3A82] text-gray-900 dark:text-gray-200 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-xs file:font-mono file:font-bold file:bg-[#1C2459] file:text-[#F5FF67] hover:file:bg-[#202963] cursor-pointer">
                <span class="text-[10px] text-gray-400">Accepted formats: PNG, JPG, WebP, SVG, GIF (Max 10MB per file).</span>
            </div>

            <!-- Optional: External Screenshot URLs -->
            <div class="space-y-1.5 pt-2">
                <label class="block font-bold text-gray-600 dark:text-gray-300">Or Paste Image URLs (one per line or comma separated):</label>
                <textarea name="screenshots_input" rows="2" placeholder="https://images.unsplash.com/...&#10;https://images.unsplash.com/..."
                          class="w-full px-4 py-2 rounded-xl bg-white dark:bg-[#171E4A] border border-gray-300 dark:border-[#2E3A82] text-gray-900 dark:text-white focus:outline-none focus:border-[#F5FF67]">{{ old('screenshots_input') }}</textarea>
            </div>

            <!-- Banner Image File / URL -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 pt-2 border-t border-gray-200 dark:border-[#2E3A82]/50">
                <div class="space-y-1">
                    <label class="block font-bold text-gray-700 dark:text-gray-200">Main Banner Image Upload (Optional)</label>
                    <input type="file" name="banner_file" accept="image/*"
                           class="w-full text-xs text-gray-500 dark:text-gray-400 file:mr-3 file:py-1.5 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-mono file:bg-gray-200 dark:file:bg-[#1C2459] dark:file:text-white">
                </div>
                <div class="space-y-1">
                    <label class="block font-bold text-gray-700 dark:text-gray-200">Or Banner Image URL</label>
                    <input type="url" name="banner_image" value="{{ old('banner_image', 'https://images.unsplash.com/photo-1551288049-bebda4e38f71?auto=format&fit=crop&w=1200&q=80') }}"
                           class="w-full px-3 py-2 rounded-xl bg-white dark:bg-[#171E4A] border border-gray-300 dark:border-[#2E3A82] text-gray-900 dark:text-white">
                </div>
            </div>
        </div>

        <!-- Challenge, Solution & Outcome -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
            <div class="space-y-1.5">
                <label class="block font-bold text-red-500 dark:text-red-400">The Challenge / Problem Solved</label>
                <textarea name="challenge" rows="3" placeholder="Client bottlenecks, legacy limitations, or technical hurdles..."
                          class="w-full px-4 py-2.5 rounded-xl bg-gray-50 dark:bg-[#12173B] border border-gray-300 dark:border-[#2E3A82] text-gray-900 dark:text-white focus:outline-none focus:border-[#F5FF67]">{{ old('challenge') }}</textarea>
            </div>

            <div class="space-y-1.5">
                <label class="block font-bold text-emerald-600 dark:text-emerald-400">The DevTZ Architecture / Solution</label>
                <textarea name="solution" rows="3" placeholder="Technologies implemented, optimizations, and architectural design..."
                          class="w-full px-4 py-2.5 rounded-xl bg-gray-50 dark:bg-[#12173B] border border-gray-300 dark:border-[#2E3A82] text-gray-900 dark:text-white focus:outline-none focus:border-[#F5FF67]">{{ old('solution') }}</textarea>
            </div>
        </div>

        <!-- Measurable Business Outcome -->
        <div class="space-y-1.5">
            <label class="block font-bold text-emerald-700 dark:text-emerald-400">Business Impact / Outcome</label>
            <input type="text" name="outcome" value="{{ old('outcome') }}" placeholder="e.g. Reduced processing latency by 45% with 99.98% ledger settlement accuracy."
                   class="w-full px-4 py-2.5 rounded-xl bg-gray-50 dark:bg-[#12173B] border border-gray-300 dark:border-[#2E3A82] text-gray-900 dark:text-white focus:outline-none focus:border-[#F5FF67]">
        </div>

        <!-- Tech Stack -->
        <div class="space-y-1.5">
            <label class="block font-bold text-gray-700 dark:text-gray-200">Production Tech Stack (comma separated)</label>
            <input type="text" name="tech_stack_input" value="{{ old('tech_stack_input', 'Laravel 12, PostgreSQL, Redis, Vue 3, Tailwind CSS') }}"
                   class="w-full px-4 py-2.5 rounded-xl bg-gray-50 dark:bg-[#12173B] border border-gray-300 dark:border-[#2E3A82] text-gray-900 dark:text-white focus:outline-none focus:border-[#F5FF67]">
        </div>

        <!-- Metrics Builder -->
        <div class="space-y-3 pt-4 border-t border-gray-100 dark:border-[#2E3A82]">
            <label class="block font-bold text-gray-700 dark:text-gray-200">Key Quantifiable Metrics</label>
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                <div class="space-y-1">
                    <input type="text" name="metric_labels[]" placeholder="Metric 1 Label (e.g. Avg API Latency)" class="w-full px-3 py-2 rounded-xl bg-gray-50 dark:bg-[#12173B] border border-gray-300 dark:border-[#2E3A82] text-gray-900 dark:text-white">
                    <input type="text" name="metric_values[]" placeholder="Metric 1 Value (e.g. 32ms)" class="w-full px-3 py-2 rounded-xl bg-gray-50 dark:bg-[#12173B] border border-gray-300 dark:border-[#2E3A82] text-[#1C2459] dark:text-[#F5FF67] font-bold">
                </div>
                <div class="space-y-1">
                    <input type="text" name="metric_labels[]" placeholder="Metric 2 Label (e.g. Monthly Volume)" class="w-full px-3 py-2 rounded-xl bg-gray-50 dark:bg-[#12173B] border border-gray-300 dark:border-[#2E3A82] text-gray-900 dark:text-white">
                    <input type="text" name="metric_values[]" placeholder="Metric 2 Value (e.g. $140M+)" class="w-full px-3 py-2 rounded-xl bg-gray-50 dark:bg-[#12173B] border border-gray-300 dark:border-[#2E3A82] text-[#1C2459] dark:text-[#F5FF67] font-bold">
                </div>
                <div class="space-y-1">
                    <input type="text" name="metric_labels[]" placeholder="Metric 3 Label (e.g. Success Rate)" class="w-full px-3 py-2 rounded-xl bg-gray-50 dark:bg-[#12173B] border border-gray-300 dark:border-[#2E3A82] text-gray-900 dark:text-white">
                    <input type="text" name="metric_values[]" placeholder="Metric 3 Value (e.g. 99.98%)" class="w-full px-3 py-2 rounded-xl bg-gray-50 dark:bg-[#12173B] border border-gray-300 dark:border-[#2E3A82] text-[#1C2459] dark:text-[#F5FF67] font-bold">
                </div>
            </div>
        </div>

        <div class="pt-4 border-t border-gray-100 dark:border-[#2E3A82] flex items-center justify-end gap-3">
            <a href="{{ route('admin.projects.index') }}" class="px-5 py-2.5 rounded-xl text-gray-500 hover:text-gray-700 dark:hover:text-white">Cancel</a>
            <button type="submit" class="px-6 py-2.5 rounded-xl font-bold text-[#1C2459] bg-[#F5FF67] hover:bg-[#E2EC48] shadow-[0_0_15px_rgba(245,255,103,0.3)]">
                Deploy Project ⚡
            </button>
        </div>
    </form>
</div>
@endsection
