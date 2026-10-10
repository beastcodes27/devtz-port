@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <!-- Header -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
        <div>
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-gray-100 dark:bg-[#12173B] border border-gray-300 dark:border-[#2E3A82] text-xs font-mono text-[#1C2459] dark:text-[#F5FF67] mb-2">
                <span class="w-2 h-2 rounded-full bg-[#F5FF67]"></span>
                <span>TEAM & EXPERTS ADMINISTRATION</span>
            </div>
            <h1 class="text-3xl font-extrabold text-[#1C2459] dark:text-white font-mono">
                Manage Engineering Team Members
            </h1>
            <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">
                Add, update, or reorder engineers, system architects, and technical leaders shown on the public site.
            </p>
        </div>
        <div>
            <a href="{{ route('admin.team.create') }}"
               class="inline-flex items-center px-4 py-2.5 rounded-xl text-xs font-mono font-bold text-[#1C2459] bg-[#F5FF67] hover:bg-[#E2EC48] shadow-md transition-all">
                <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                <span>Add Team Member</span>
            </a>
        </div>
    </div>

    @if(session('success'))
        <div class="mb-6 p-4 rounded-xl bg-emerald-500/10 border border-emerald-500/30 text-emerald-600 dark:text-emerald-400 text-xs font-mono">
            ✓ {{ session('success') }}
        </div>
    @endif

    <!-- Team Members Table -->
    <div class="bg-white dark:bg-[#12173B] rounded-2xl border border-gray-200 dark:border-[#2E3A82] overflow-hidden shadow-xl">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs font-mono">
                <thead class="bg-gray-50 dark:bg-[#1C2459] border-b border-gray-200 dark:border-[#2E3A82] text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                    <tr>
                        <th class="px-6 py-4">Order</th>
                        <th class="px-6 py-4">Engineer / Expert</th>
                        <th class="px-6 py-4">Role Designation</th>
                        <th class="px-6 py-4">Social & Links</th>
                        <th class="px-6 py-4">Status</th>
                        <th class="px-6 py-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 dark:divide-[#2E3A82]/50 text-gray-700 dark:text-gray-300">
                    @forelse($members as $m)
                        <tr class="hover:bg-gray-50/50 dark:hover:bg-[#1C2459]/50 transition-colors">
                            <td class="px-6 py-4 font-bold text-[#1C2459] dark:text-[#F5FF67]">
                                #{{ $m->order }}
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 rounded-full bg-[#1C2459] border-2 border-[#F5FF67] flex items-center justify-center text-[#F5FF67] font-bold text-sm shrink-0">
                                        {{ strtoupper(substr($m->name, 0, 1)) }}
                                    </div>
                                    <div>
                                        <div class="font-bold text-sm text-[#1C2459] dark:text-white">{{ $m->name }}</div>
                                        <div class="text-[11px] text-gray-400 max-w-xs truncate">{{ $m->bio }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 font-semibold text-[#1C2459] dark:text-[#F5FF67]">
                                {{ $m->role }}
                            </td>
                            <td class="px-6 py-4 space-x-2">
                                @if($m->github)
                                    <a href="{{ $m->github }}" target="_blank" class="hover:text-[#F5FF67]">GitHub</a>
                                @endif
                                @if($m->linkedin)
                                    <a href="{{ $m->linkedin }}" target="_blank" class="hover:text-[#F5FF67]">LinkedIn</a>
                                @endif
                                @if($m->portfolio)
                                    <a href="{{ $m->portfolio }}" target="_blank" class="hover:text-[#F5FF67]">Portfolio</a>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                @if($m->is_active)
                                    <span class="px-2.5 py-1 rounded-full text-[10px] bg-emerald-500/10 border border-emerald-500/30 text-emerald-500 font-bold">ACTIVE</span>
                                @else
                                    <span class="px-2.5 py-1 rounded-full text-[10px] bg-gray-500/10 border border-gray-500/30 text-gray-400 font-bold">HIDDEN</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-right space-x-2">
                                <a href="{{ route('admin.team.edit', $m->id) }}"
                                   class="px-3 py-1.5 rounded-lg bg-gray-100 dark:bg-[#1C2459] border border-gray-300 dark:border-[#2E3A82] text-xs font-bold text-[#1C2459] dark:text-[#F5FF67] hover:border-[#F5FF67] transition-all">
                                    Edit
                                </a>
                                <form action="{{ route('admin.team.destroy', $m->id) }}" method="POST" class="inline" onsubmit="return confirm('Delete this team member?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="px-3 py-1.5 rounded-lg bg-red-500/10 border border-red-500/30 text-xs font-bold text-red-500 hover:bg-red-500 hover:text-white transition-all">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-12 text-center text-gray-500">
                                No team members found. Click "Add Team Member" to create one.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

