@extends('layouts.admin')

@section('title', 'Inquiry Specs // ' . $inquiry->name)

@section('content')
<div class="max-w-4xl mx-auto space-y-6 font-mono text-xs">
    
    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-2xl font-bold text-[#1C2459] dark:text-white">Inquiry Specifications</h2>
            <p class="text-gray-500 dark:text-gray-400">Received {{ $inquiry->created_at->format('F d, Y \a\t H:i:s T') }} from IP: {{ $inquiry->ip_address ?? '127.0.0.1' }}</p>
        </div>
        <a href="{{ route('admin.inquiries.index') }}" class="text-gray-500 dark:text-gray-400 hover:underline">
            ← Back to Inquiries
        </a>
    </div>

    <!-- Main Card -->
    <div class="p-8 rounded-2xl bg-white dark:bg-[#171E4A] border border-gray-200 dark:border-[#2E3A82] shadow-sm space-y-6">
        
        <!-- Status & Actions Bar -->
        <div class="p-4 rounded-xl bg-gray-50 dark:bg-[#12173B] border border-gray-200 dark:border-[#2E3A82] flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
            <div class="flex items-center gap-3">
                <span class="text-gray-500 dark:text-gray-400">Current Status:</span>
                <span class="px-3 py-1 rounded text-xs font-bold uppercase bg-[#1C2459] text-[#F5FF67] border border-[#2E3A82]">
                    {{ $inquiry->status }}
                </span>
            </div>

            <!-- Status Form Actions -->
            <form action="{{ route('admin.inquiries.status', $inquiry) }}" method="POST" class="flex items-center gap-2">
                @csrf
                @method('PATCH')
                <select name="status" class="px-3 py-1.5 rounded-lg bg-white dark:bg-[#1C2459] border border-gray-300 dark:border-[#2E3A82] text-gray-900 dark:text-white">
                    <option value="new" {{ $inquiry->status === 'new' ? 'selected' : '' }}>New</option>
                    <option value="reviewed" {{ $inquiry->status === 'reviewed' ? 'selected' : '' }}>Reviewed</option>
                    <option value="scheduled" {{ $inquiry->status === 'scheduled' ? 'selected' : '' }}>Call Scheduled</option>
                    <option value="archived" {{ $inquiry->status === 'archived' ? 'selected' : '' }}>Archived</option>
                </select>
                <button type="submit" class="px-4 py-1.5 rounded-lg font-bold text-[#1C2459] bg-[#F5FF67] hover:bg-[#E2EC48]">
                    Update
                </button>
            </form>
        </div>

        <!-- Contact Info Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
            <div class="p-4 rounded-xl bg-gray-50 dark:bg-[#12173B] border border-gray-200 dark:border-[#2E3A82]">
                <div class="text-gray-400 text-[10px]">CLIENT NAME</div>
                <div class="text-base font-bold text-[#1C2459] dark:text-white mt-1">{{ $inquiry->name }}</div>
                <div class="text-gray-500 dark:text-gray-400">{{ $inquiry->company ?? 'No Company Specified' }}</div>
            </div>

            <div class="p-4 rounded-xl bg-gray-50 dark:bg-[#12173B] border border-gray-200 dark:border-[#2E3A82]">
                <div class="text-gray-400 text-[10px]">DIRECT EMAIL</div>
                <div class="text-sm font-bold text-[#1C2459] dark:text-[#F5FF67] mt-1">{{ $inquiry->email }}</div>
                <a href="mailto:{{ $inquiry->email }}?subject=DevTZ Software Architecture Followup" class="text-[10px] text-blue-500 hover:underline mt-1 inline-block">
                    Open Email Client ↗
                </a>
            </div>

            <div class="p-4 rounded-xl bg-gray-50 dark:bg-[#12173B] border border-gray-200 dark:border-[#2E3A82]">
                <div class="text-gray-400 text-[10px]">BUDGET & TIMELINE</div>
                <div class="text-sm font-bold text-emerald-600 dark:text-emerald-400 mt-1">{{ $inquiry->budget_range ?? 'Unspecified' }}</div>
                <div class="text-gray-500 dark:text-gray-400">{{ $inquiry->timeline ?? 'Standard Roadmap' }}</div>
            </div>
        </div>

        <!-- Architecture Goal & Message -->
        <div class="space-y-2">
            <div class="text-gray-500 dark:text-gray-400 uppercase tracking-wider font-bold">Technical Specifications & Project Scope:</div>
            <div class="p-6 rounded-xl bg-gray-50 dark:bg-[#12173B] border border-gray-200 dark:border-[#2E3A82] text-gray-800 dark:text-gray-200 font-sans text-sm leading-relaxed whitespace-pre-wrap">
{{ $inquiry->message }}
            </div>
        </div>

        <!-- Purge action -->
        <div class="pt-4 border-t border-gray-100 dark:border-[#2E3A82] flex items-center justify-between">
            <a href="mailto:{{ $inquiry->email }}?subject=Re: Your DevTZ Project Inquiry" 
               class="px-5 py-2.5 rounded-xl font-bold text-[#1C2459] bg-[#F5FF67] hover:bg-[#E2EC48]">
                Reply to Prospect ⚡
            </a>

            <form action="{{ route('admin.inquiries.destroy', $inquiry) }}" method="POST" 
                  onsubmit="return confirm('Permanently delete this inquiry from records?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="px-4 py-2 text-red-500 hover:bg-red-50 dark:hover:bg-red-950/50 rounded-xl">
                    Purge Inquiry
                </button>
            </form>
        </div>

    </div>
</div>
@endsection
