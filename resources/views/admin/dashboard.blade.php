@extends('layouts.admin')

@section('title', 'Mission Control // Overview')

@section('content')
<div class="space-y-8 max-w-7xl mx-auto">
    
    <!-- Top Greeting Banner -->
    <div class="p-6 rounded-2xl bg-white dark:bg-[#171E4A] border border-gray-200 dark:border-[#2E3A82] flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 shadow-sm">
        <div>
            <div class="text-xs font-mono text-[#1C2459] dark:text-[#F5FF67] uppercase tracking-wider font-semibold">
                SYSTEM TELEMETRY // ONLINE
            </div>
            <h2 class="text-2xl font-bold text-[#1C2459] dark:text-white mt-1">
                Welcome back, {{ Auth::user()->name }}
            </h2>
            <p class="text-xs text-gray-500 dark:text-gray-400 mt-0.5 font-mono">
                Manage your enterprise portfolio, respond to high-value leads, and dispatch engineering articles.
            </p>
        </div>

        <div class="flex items-center gap-3">
            <a href="{{ route('admin.projects.create') }}" 
               class="inline-flex items-center gap-1.5 px-4 py-2 text-xs font-mono font-bold text-[#1C2459] bg-[#F5FF67] hover:bg-[#E2EC48] rounded-xl shadow-[0_0_15px_rgba(245,255,103,0.3)] transition-all">
                <span>+ Deploy Project</span>
            </a>
            <a href="{{ route('admin.inquiries.index') }}" 
               class="inline-flex items-center gap-1.5 px-4 py-2 text-xs font-mono font-bold text-gray-700 dark:text-white bg-gray-100 dark:bg-[#12173B] border border-gray-300 dark:border-[#2E3A82] rounded-xl">
                <span>View Inquiries</span>
            </a>
        </div>
    </div>

    <!-- Stat Tiles Matrix -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
        <!-- Inquiries Tile -->
        <div class="p-6 rounded-2xl bg-white dark:bg-[#171E4A] border border-gray-200 dark:border-[#2E3A82] shadow-sm">
            <div class="flex items-center justify-between text-xs font-mono text-gray-500 dark:text-gray-400 mb-2">
                <span>NEW LEADS / INQUIRIES</span>
                <span class="w-2 h-2 rounded-full bg-[#F5FF67] animate-ping"></span>
            </div>
            <div class="text-3xl font-extrabold font-mono text-[#1C2459] dark:text-[#F5FF67]">
                {{ $stats['new_inquiries_count'] }} <span class="text-sm font-normal text-gray-400">/ {{ $stats['inquiries_count'] }} total</span>
            </div>
            <div class="mt-3 pt-3 border-t border-gray-100 dark:border-[#2E3A82]/60 text-[11px] font-mono text-emerald-600 dark:text-emerald-400">
                100% database persistence active
            </div>
        </div>

        <!-- Projects Tile -->
        <div class="p-6 rounded-2xl bg-white dark:bg-[#171E4A] border border-gray-200 dark:border-[#2E3A82] shadow-sm">
            <div class="flex items-center justify-between text-xs font-mono text-gray-500 dark:text-gray-400 mb-2">
                <span>SHIPPED CASE STUDIES</span>
                <span class="text-[10px] bg-gray-100 dark:bg-[#12173B] px-1.5 py-0.5 rounded">PUBLIC</span>
            </div>
            <div class="text-3xl font-extrabold font-mono text-[#1C2459] dark:text-[#F5FF67]">
                {{ $stats['projects_count'] }}
            </div>
            <div class="mt-3 pt-3 border-t border-gray-100 dark:border-[#2E3A82]/60 text-[11px] font-mono text-gray-500 dark:text-gray-400">
                Active on portfolio showcase
            </div>
        </div>

        <!-- Radar Subscribers Tile -->
        <div class="p-6 rounded-2xl bg-white dark:bg-[#171E4A] border border-gray-200 dark:border-[#2E3A82] shadow-sm">
            <div class="flex items-center justify-between text-xs font-mono text-gray-500 dark:text-gray-400 mb-2">
                <span>RADAR SUBSCRIBERS</span>
                <span class="text-[10px] bg-emerald-100 dark:bg-emerald-950 text-emerald-600 dark:text-emerald-300 px-1.5 py-0.5 rounded">GROWTH</span>
            </div>
            <div class="text-3xl font-extrabold font-mono text-[#1C2459] dark:text-[#F5FF67]">
                {{ $stats['subscribers_count'] }}
            </div>
            <div class="mt-3 pt-3 border-t border-gray-100 dark:border-[#2E3A82]/60 text-[11px] font-mono text-gray-500 dark:text-gray-400">
                Connected engineering leads
            </div>
        </div>

        <!-- Articles Tile -->
        <div class="p-6 rounded-2xl bg-white dark:bg-[#171E4A] border border-gray-200 dark:border-[#2E3A82] shadow-sm">
            <div class="flex items-center justify-between text-xs font-mono text-gray-500 dark:text-gray-400 mb-2">
                <span>PUBLISHED ARTICLES</span>
                <span class="text-[10px] bg-purple-100 dark:bg-purple-950 text-purple-600 dark:text-purple-300 px-1.5 py-0.5 rounded">INSIGHTS</span>
            </div>
            <div class="text-3xl font-extrabold font-mono text-[#1C2459] dark:text-[#F5FF67]">
                {{ $stats['articles_count'] }}
            </div>
            <div class="mt-3 pt-3 border-t border-gray-100 dark:border-[#2E3A82]/60 text-[11px] font-mono text-gray-500 dark:text-gray-400">
                Technical deep-dives live
            </div>
        </div>
    </div>

    <!-- Two-Column Feed (Recent Inquiries & Recent Projects) -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
        
        <!-- Recent Inquiries (7 cols) -->
        <div class="lg:col-span-7 p-6 rounded-2xl bg-white dark:bg-[#171E4A] border border-gray-200 dark:border-[#2E3A82] shadow-sm space-y-4">
            <div class="flex items-center justify-between pb-3 border-b border-gray-100 dark:border-[#2E3A82]/60">
                <h3 class="text-sm font-bold font-mono text-[#1C2459] dark:text-white uppercase tracking-wider">
                    Recent Inquiries Feed
                </h3>
                <a href="{{ route('admin.inquiries.index') }}" class="text-xs font-mono text-[#1C2459] dark:text-[#F5FF67] hover:underline">
                    View All →
                </a>
            </div>

            <div class="divide-y divide-gray-100 dark:divide-[#2E3A82]/40">
                @forelse($recentInquiries as $inquiry)
                    <div class="py-3.5 flex items-center justify-between gap-4">
                        <div class="min-w-0">
                            <div class="flex items-center gap-2">
                                <span class="font-bold text-sm text-[#1C2459] dark:text-white truncate">{{ $inquiry->name }}</span>
                                <span class="text-xs text-gray-500 dark:text-gray-400 truncate">({{ $inquiry->company ?? 'Independent' }})</span>
                            </div>
                            <p class="text-xs text-gray-600 dark:text-gray-300 truncate mt-0.5">{{ $inquiry->message }}</p>
                            <span class="text-[10px] font-mono text-gray-400">{{ $inquiry->created_at->diffForHumans() }} • Budget: {{ $inquiry->budget_range ?? 'N/A' }}</span>
                        </div>

                        <div class="shrink-0">
                            @if($inquiry->status === 'new')
                                <span class="px-2.5 py-1 rounded text-[10px] font-mono font-bold uppercase bg-red-100 dark:bg-red-950/60 text-red-700 dark:text-red-300 border border-red-300 dark:border-red-800">
                                    NEW
                                </span>
                            @else
                                <span class="px-2.5 py-1 rounded text-[10px] font-mono font-bold uppercase bg-emerald-100 dark:bg-emerald-950/60 text-emerald-700 dark:text-emerald-300 border border-emerald-300 dark:border-emerald-800">
                                    {{ $inquiry->status }}
                                </span>
                            @endif
                        </div>
                    </div>
                @empty
                    <div class="py-8 text-center text-xs font-mono text-gray-400">
                        No incoming inquiries logged yet.
                    </div>
                @endforelse
            </div>
        </div>

        <!-- Case Studies Quick Review (5 cols) -->
        <div class="lg:col-span-5 p-6 rounded-2xl bg-white dark:bg-[#171E4A] border border-gray-200 dark:border-[#2E3A82] shadow-sm space-y-4">
            <div class="flex items-center justify-between pb-3 border-b border-gray-100 dark:border-[#2E3A82]/60">
                <h3 class="text-sm font-bold font-mono text-[#1C2459] dark:text-white uppercase tracking-wider">
                    Published Projects
                </h3>
                <a href="{{ route('admin.projects.index') }}" class="text-xs font-mono text-[#1C2459] dark:text-[#F5FF67] hover:underline">
                    Manage →
                </a>
            </div>

            <div class="space-y-3">
                @foreach($recentProjects as $project)
                    <div class="p-3 rounded-xl bg-gray-50 dark:bg-[#12173B] border border-gray-200 dark:border-[#2E3A82] flex items-center justify-between">
                        <div class="min-w-0">
                            <h4 class="text-xs font-bold text-[#1C2459] dark:text-white truncate">{{ $project->title }}</h4>
                            <span class="text-[10px] font-mono text-gray-500 dark:text-gray-400">{{ strtoupper($project->category) }} • {{ $project->client_name }}</span>
                        </div>
                        <a href="{{ route('admin.projects.edit', $project) }}" class="text-xs font-mono text-[#1C2459] dark:text-[#F5FF67] hover:underline ml-2">
                            Edit
                        </a>
                    </div>
                @endforeach
            </div>
        </div>

    </div>

</div>
@endsection
