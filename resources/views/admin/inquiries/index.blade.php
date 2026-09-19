@extends('layouts.admin')

@section('title', 'Client Inquiries & Leads')

@section('content')
<div class="space-y-6 max-w-7xl mx-auto font-mono text-xs">
    
    <!-- Top Action Bar -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h2 class="text-2xl font-bold text-[#1C2459] dark:text-white">Client Inquiries & Project Specs</h2>
            <p class="text-gray-500 dark:text-gray-400">Incoming architectural inquiries submitted through the DevTZ portfolio.</p>
        </div>

        <!-- Filter Status Pills -->
        <div class="flex flex-wrap gap-1.5 p-1 rounded-xl bg-white dark:bg-[#171E4A] border border-gray-200 dark:border-[#2E3A82]">
            <a href="{{ route('admin.inquiries.index') }}" 
               class="px-3 py-1 rounded-lg {{ empty($status) ? 'bg-[#F5FF67] text-[#1C2459] font-bold' : 'text-gray-600 dark:text-gray-300 hover:text-white' }}">
                All ({{ $counts['all'] }})
            </a>
            <a href="{{ route('admin.inquiries.index', ['status' => 'new']) }}" 
               class="px-3 py-1 rounded-lg {{ $status === 'new' ? 'bg-[#F5FF67] text-[#1C2459] font-bold' : 'text-gray-600 dark:text-gray-300 hover:text-white' }}">
                New ({{ $counts['new'] }})
            </a>
            <a href="{{ route('admin.inquiries.index', ['status' => 'reviewed']) }}" 
               class="px-3 py-1 rounded-lg {{ $status === 'reviewed' ? 'bg-[#F5FF67] text-[#1C2459] font-bold' : 'text-gray-600 dark:text-gray-300 hover:text-white' }}">
                Reviewed ({{ $counts['reviewed'] }})
            </a>
            <a href="{{ route('admin.inquiries.index', ['status' => 'scheduled']) }}" 
               class="px-3 py-1 rounded-lg {{ $status === 'scheduled' ? 'bg-[#F5FF67] text-[#1C2459] font-bold' : 'text-gray-600 dark:text-gray-300 hover:text-white' }}">
                Scheduled ({{ $counts['scheduled'] }})
            </a>
        </div>
    </div>

    <!-- Inquiries Table Card -->
    <div class="rounded-2xl bg-white dark:bg-[#171E4A] border border-gray-200 dark:border-[#2E3A82] overflow-hidden shadow-sm">
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead class="bg-gray-50 dark:bg-[#12173B] text-gray-500 dark:text-gray-400 border-b border-gray-200 dark:border-[#2E3A82]">
                    <tr>
                        <th class="px-6 py-4">Status</th>
                        <th class="px-6 py-4">Client Contact</th>
                        <th class="px-6 py-4">Domain / Platform</th>
                        <th class="px-6 py-4">Budget / Timeline</th>
                        <th class="px-6 py-4">Received</th>
                        <th class="px-6 py-4 text-right">Inspect</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 dark:divide-[#2E3A82]/50 text-gray-700 dark:text-gray-200">
                    @forelse($inquiries as $inquiry)
                        <tr class="hover:bg-gray-50/50 dark:hover:bg-[#1C2459]/50 transition-colors">
                            <td class="px-6 py-4">
                                @if($inquiry->status === 'new')
                                    <span class="px-2.5 py-1 rounded text-[10px] font-bold uppercase bg-red-100 dark:bg-red-950/70 text-red-700 dark:text-red-300 border border-red-300 dark:border-red-800">
                                        NEW
                                    </span>
                                @elseif($inquiry->status === 'reviewed')
                                    <span class="px-2.5 py-1 rounded text-[10px] font-bold uppercase bg-blue-100 dark:bg-blue-950/70 text-blue-700 dark:text-blue-300 border border-blue-300 dark:border-blue-800">
                                        REVIEWED
                                    </span>
                                @elseif($inquiry->status === 'scheduled')
                                    <span class="px-2.5 py-1 rounded text-[10px] font-bold uppercase bg-emerald-100 dark:bg-emerald-950/70 text-emerald-700 dark:text-emerald-300 border border-emerald-300 dark:border-emerald-800">
                                        SCHEDULED
                                    </span>
                                @else
                                    <span class="px-2.5 py-1 rounded text-[10px] font-bold uppercase bg-gray-100 dark:bg-gray-800 text-gray-600 dark:text-gray-300">
                                        {{ $inquiry->status }}
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                <div class="font-bold text-sm text-[#1C2459] dark:text-white">{{ $inquiry->name }}</div>
                                <div class="text-[11px] text-gray-500 dark:text-[#A5B4FC]">{{ $inquiry->email }}</div>
                                @if($inquiry->company)
                                    <div class="text-[10px] text-gray-400 font-sans font-medium">{{ $inquiry->company }}</div>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                <span class="capitalize text-gray-800 dark:text-gray-200">{{ str_replace('-', ' ', $inquiry->project_type) }}</span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-[#1C2459] dark:text-[#F5FF67] font-bold">{{ $inquiry->budget_range ?? 'Not specified' }}</div>
                                <div class="text-[10px] text-gray-400">{{ $inquiry->timeline ?? 'Flexible' }}</div>
                            </td>
                            <td class="px-6 py-4 text-gray-500 dark:text-gray-400">
                                {{ $inquiry->created_at->format('M d, Y H:i') }}
                            </td>
                            <td class="px-6 py-4 text-right">
                                <a href="{{ route('admin.inquiries.show', $inquiry) }}" 
                                   class="px-3 py-1.5 rounded-lg bg-gray-100 dark:bg-[#12173B] text-[#1C2459] dark:text-[#F5FF67] border border-gray-300 dark:border-[#2E3A82] hover:border-[#F5FF67] font-bold">
                                    Inspect Specs →
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-12 text-center text-gray-400">
                                No inquiries match the selected filter.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($inquiries->hasPages())
            <div class="p-4 border-t border-gray-100 dark:border-[#2E3A82]">
                {{ $inquiries->links() }}
            </div>
        @endif
    </div>

</div>
@endsection
