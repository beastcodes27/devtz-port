@extends('layouts.admin')

@section('title', 'Portfolio Case Studies')

@section('content')
<div class="space-y-6 max-w-7xl mx-auto">
    
    <!-- Top Action Bar -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h2 class="text-2xl font-bold text-[#1C2459] dark:text-white font-mono">Manage Portfolio Projects</h2>
            <p class="text-xs text-gray-500 dark:text-gray-400 font-mono">Create, calibrate metrics, and organize public case studies.</p>
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
                        <th class="px-6 py-4">Domain</th>
                        <th class="px-6 py-4">Key Metrics</th>
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
                                <span class="px-2.5 py-1 rounded text-[10px] font-bold uppercase bg-[#1C2459] text-[#F5FF67] border border-[#2E3A82]">
                                    {{ $project->category }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="space-y-1">
                                    @foreach($project->metrics as $metric)
                                        <div class="text-[11px]">
                                            <span class="font-bold text-[#1C2459] dark:text-[#F5FF67]">{{ $metric->value }}</span>
                                            <span class="text-gray-400 truncate text-[10px]">({{ $metric->label }})</span>
                                        </div>
                                    @endforeach
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex flex-wrap gap-1 max-w-xs">
                                    @foreach($project->tech_stack ?? [] as $t)
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
                            <td colspan="5" class="px-6 py-12 text-center text-gray-400">
                                No projects found. Click above to deploy your first case study.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection
