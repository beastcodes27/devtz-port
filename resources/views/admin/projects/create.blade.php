@extends('layouts.admin')

@section('title', 'Deploy New Case Study')

@section('content')
<div class="max-w-4xl mx-auto space-y-6">
    
    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-2xl font-bold text-[#1C2459] dark:text-white font-mono">Deploy Case Study</h2>
            <p class="text-xs text-gray-500 dark:text-gray-400 font-mono">Publish a new engineering architecture to the public DevTZ showcase.</p>
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

    <form action="{{ route('admin.projects.store') }}" method="POST" class="p-8 rounded-2xl bg-white dark:bg-[#171E4A] border border-gray-200 dark:border-[#2E3A82] space-y-6 shadow-sm font-mono text-xs">
        @csrf

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
            <!-- Title -->
            <div class="space-y-1.5">
                <label class="block font-bold text-gray-700 dark:text-gray-200">Project Title *</label>
                <input type="text" name="title" required value="{{ old('title') }}" placeholder="e.g. NexusPay Enterprise Gateway"
                       class="w-full px-4 py-2.5 rounded-xl bg-gray-50 dark:bg-[#12173B] border border-gray-300 dark:border-[#2E3A82] text-gray-900 dark:text-white focus:outline-none focus:border-[#F5FF67]">
            </div>

            <!-- Client Name -->
            <div class="space-y-1.5">
                <label class="block font-bold text-gray-700 dark:text-gray-200">Client / Organization *</label>
                <input type="text" name="client_name" required value="{{ old('client_name') }}" placeholder="e.g. Nexus Global Financials"
                       class="w-full px-4 py-2.5 rounded-xl bg-gray-50 dark:bg-[#12173B] border border-gray-300 dark:border-[#2E3A82] text-gray-900 dark:text-white focus:outline-none focus:border-[#F5FF67]">
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
            <!-- Category -->
            <div class="space-y-1.5">
                <label class="block font-bold text-gray-700 dark:text-gray-200">Domain Category *</label>
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
            <input type="text" name="tagline" required value="{{ old('tagline') }}" placeholder="Sub-40ms high-throughput payment orchestrator..."
                   class="w-full px-4 py-2.5 rounded-xl bg-gray-50 dark:bg-[#12173B] border border-gray-300 dark:border-[#2E3A82] text-gray-900 dark:text-white focus:outline-none focus:border-[#F5FF67]">
        </div>

        <!-- Summary -->
        <div class="space-y-1.5">
            <label class="block font-bold text-gray-700 dark:text-gray-200">Executive Summary *</label>
            <textarea name="summary" required rows="3" placeholder="Overview of the system and client deliverables..."
                      class="w-full px-4 py-2.5 rounded-xl bg-gray-50 dark:bg-[#12173B] border border-gray-300 dark:border-[#2E3A82] text-gray-900 dark:text-white focus:outline-none focus:border-[#F5FF67]">{{ old('summary') }}</textarea>
        </div>

        <!-- Challenge & Solution -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
            <div class="space-y-1.5">
                <label class="block font-bold text-red-500 dark:text-red-400">The Challenge *</label>
                <textarea name="challenge" required rows="4" placeholder="Bottlenecks, legacy issues, compliance risks..."
                          class="w-full px-4 py-2.5 rounded-xl bg-gray-50 dark:bg-[#12173B] border border-gray-300 dark:border-[#2E3A82] text-gray-900 dark:text-white focus:outline-none focus:border-[#F5FF67]">{{ old('challenge') }}</textarea>
            </div>

            <div class="space-y-1.5">
                <label class="block font-bold text-emerald-600 dark:text-emerald-400">The DevTZ Architecture Solution *</label>
                <textarea name="solution" required rows="4" placeholder="Technologies implemented, optimizations..."
                          class="w-full px-4 py-2.5 rounded-xl bg-gray-50 dark:bg-[#12173B] border border-gray-300 dark:border-[#2E3A82] text-gray-900 dark:text-white focus:outline-none focus:border-[#F5FF67]">{{ old('solution') }}</textarea>
            </div>
        </div>

        <!-- Links & Media -->
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
            <div class="space-y-1.5">
                <label class="block font-bold text-gray-700 dark:text-gray-200">Main Banner Image URL</label>
                <input type="url" name="banner_image" value="{{ old('banner_image', 'https://images.unsplash.com/photo-1551288049-bebda4e38f71?auto=format&fit=crop&w=1200&q=80') }}"
                       class="w-full px-3 py-2 rounded-xl bg-gray-50 dark:bg-[#12173B] border border-gray-300 dark:border-[#2E3A82] text-gray-900 dark:text-white focus:outline-none focus:border-[#F5FF67]">
            </div>

            <div class="space-y-1.5">
                <label class="block font-bold text-gray-700 dark:text-gray-200">Live Demo URL</label>
                <input type="url" name="live_url" value="{{ old('live_url') }}" placeholder="https://example.com"
                       class="w-full px-3 py-2 rounded-xl bg-gray-50 dark:bg-[#12173B] border border-gray-300 dark:border-[#2E3A82] text-gray-900 dark:text-white focus:outline-none focus:border-[#F5FF67]">
            </div>

            <div class="space-y-1.5">
                <label class="block font-bold text-gray-700 dark:text-gray-200">GitHub Specs URL</label>
                <input type="url" name="github_url" value="{{ old('github_url') }}" placeholder="https://github.com/..."
                       class="w-full px-3 py-2 rounded-xl bg-gray-50 dark:bg-[#12173B] border border-gray-300 dark:border-[#2E3A82] text-gray-900 dark:text-white focus:outline-none focus:border-[#F5FF67]">
            </div>
        </div>

        <!-- Multiple Screenshots Slider URLs -->
        <div class="space-y-1.5">
            <label class="block font-bold text-gray-700 dark:text-gray-200">Multiple Screenshots / Gallery URLs (one per line or comma-separated for Automatic Slider)</label>
            <textarea name="screenshots_input" rows="3" placeholder="https://images.unsplash.com/photo-1551288049-bebda4e38f71...&#10;https://images.unsplash.com/photo-1563986768609-322da13575f3...&#10;https://images.unsplash.com/photo-1460925895917-afdab827c52f..."
                      class="w-full px-4 py-2.5 rounded-xl bg-gray-50 dark:bg-[#12173B] border border-gray-300 dark:border-[#2E3A82] text-gray-900 dark:text-white focus:outline-none focus:border-[#F5FF67]">{{ old('screenshots_input') }}</textarea>
            <span class="text-[10px] text-gray-400">These images will automatically transition in a high-tech slider on the case study modal and project showcase.</span>
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
                Deploy Case Study ⚡
            </button>
        </div>
    </form>
</div>
@endsection

