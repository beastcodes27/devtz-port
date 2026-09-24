@extends('layouts.admin')

@section('title', 'Portfolio Projects')

@section('content')
<div class="space-y-6 max-w-7xl mx-auto">
    
    <!-- Top Action Bar -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h2 class="text-2xl font-bold text-[#1C2459] dark:text-white font-mono">Manage Portfolio Projects</h2>
            <p class="text-xs text-gray-500 dark:text-gray-400 font-mono">Create, upload screenshots, add demo links, and manage showcase projects.</p>
        </div>

        <a href="{{ route('admin.projects.create') }}" 
           class="inline-flex items-center gap-1.5 px-4 py-2 text-xs font-mono font-bold text-[#1C2459] bg-[#F5FF67] hover:bg-[#E2EC48] rounded-xl shadow-[0_0_15px_rgba(245,255,103,0.3)] transition-all self-start sm:self-auto">
            <span>+ Deploy New Project</span>
        </a>
    </div>

    <!-- Projects Table Card -->
    <div class="rounded-2xl bg-white dark:bg-[#171E4A] border border-gray-200 dark:border-[#2E3A82] overflow-hidden shadow-sm">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs font-mono">
                <thead class="bg-gray-50 dark:bg-[#12173B] text-gray-500 dark:text-gray-400 border-b border-gray-200 dark:border-[#2E3A82]">
                    <tr>
                        <th class="px-6 py-4">Project & Client</th>
                        <th class="px-6 py-4">Domain / Category</th>
                        <th class="px-6 py-4">Screenshots & Media</th>
                        <th class="px-6 py-4">Demo Link</th>
                        <th class="px-6 py-4">Tech Stack</th>
                        <th class="px-6 py-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 dark:divide-[#2E3A82]/50 text-gray-700 dark:text-gray-200">
                    @forelse($projects as $project)
                        <tr class="hover:bg-gray-50/50 dark:hover:bg-[#1C2459]/50 transition-colors">
                            <td class="px-6 py-4">
                                <div class="font-bold text-sm text-[#1C2459] dark:text-white">{{ $project->title }}</div>
                                <div class="text-[11px] text-gray-500 dark:text-gray-400">Client: {{ $project->client_name }}</div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="space-y-1">
                                    <span class="px-2.5 py-1 rounded text-[10px] font-bold uppercase bg-[#1C2459] text-[#F5FF67] border border-[#2E3A82]">
                                        {{ $project->category }}
                                    </span>
                                    @if($project->industry)
                                        <div class="text-[10px] text-gray-400">{{ $project->industry }}</div>
                                    @endif
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                @php
                                    $shotsCount = is_array($project->screenshots) ? count($project->screenshots) : 0;
                                @endphp
                                <div class="flex items-center gap-1.5">
                                    <span class="px-2 py-0.5 rounded text-[10px] bg-gray-100 dark:bg-[#12173B] text-[#1C2459] dark:text-[#F5FF67] border border-gray-300 dark:border-[#2E3A82]">
                                        📸 {{ $shotsCount }} {{ Str::plural('Shot', $shotsCount) }}
                                    </span>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                @if(!empty($project->live_url))
                                    <a href="{{ $project->live_url }}" target="_blank" rel="noopener" class="inline-flex items-center gap-1 text-[11px] text-[#1C2459] dark:text-[#F5FF67] hover:underline font-bold">
                                        <span>Live Demo</span>
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                                    </a>
                                @else
                                    <span class="text-gray-400 text-[10px]">No Demo Link</span>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex flex-wrap gap-1 max-w-xs">
                                    @foreach(array_slice($project->tech_stack ?? [], 0, 3) as $t)
                                        <span class="text-[10px] px-1.5 py-0.5 rounded bg-gray-100 dark:bg-[#12173B] text-gray-600 dark:text-gray-300">
                                            {{ $t }}
                                        </span>
                                    @endforeach
                                </div>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex items-center justify-end gap-2">
                                    <a href="{{ route('admin.projects.edit', $project) }}" 
                                       class="px-2.5 py-1.5 rounded-lg bg-gray-100 dark:bg-[#12173B] text-[#1C2459] dark:text-[#F5FF67] border border-gray-300 dark:border-[#2E3A82] hover:border-[#F5FF67]">
                                        Edit
                                    </a>
                                    <form action="{{ route('admin.projects.destroy', $project) }}" method="POST" 
                                          onsubmit="return confirm('Are you sure you want to remove this project?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="px-2.5 py-1.5 rounded-lg text-red-500 hover:bg-red-50 dark:hover:bg-red-950/40">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-12 text-center text-gray-400">
                                No projects found. Click above to deploy your first project.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection
