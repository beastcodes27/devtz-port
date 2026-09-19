@extends('layouts.admin')

@section('title', 'Radar Engineering Articles')

@section('content')
<div class="space-y-6 max-w-7xl mx-auto font-mono text-xs">
    
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h2 class="text-2xl font-bold text-[#1C2459] dark:text-white">Engineering Radar Articles</h2>
            <p class="text-gray-500 dark:text-gray-400">Publish deep-dives, architecture benchmarks, and company dispatches.</p>
        </div>

        <a href="{{ route('admin.articles.create') }}" 
           class="inline-flex items-center gap-1.5 px-4 py-2 text-xs font-bold text-[#1C2459] bg-[#F5FF67] hover:bg-[#E2EC48] rounded-xl shadow-[0_0_15px_rgba(245,255,103,0.3)] transition-all self-start sm:self-auto">
            <span>+ Write Article</span>
        </a>
    </div>

    <div class="rounded-2xl bg-white dark:bg-[#171E4A] border border-gray-200 dark:border-[#2E3A82] overflow-hidden shadow-sm">
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead class="bg-gray-50 dark:bg-[#12173B] text-gray-500 dark:text-gray-400 border-b border-gray-200 dark:border-[#2E3A82]">
                    <tr>
                        <th class="px-6 py-4">Article Title</th>
                        <th class="px-6 py-4">Author</th>
                        <th class="px-6 py-4">Category</th>
                        <th class="px-6 py-4">Read Time</th>
                        <th class="px-6 py-4">Published</th>
                        <th class="px-6 py-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 dark:divide-[#2E3A82]/50 text-gray-700 dark:text-gray-200">
                    @forelse($articles as $article)
                        <tr class="hover:bg-gray-50/50 dark:hover:bg-[#1C2459]/50 transition-colors">
                            <td class="px-6 py-4">
                                <div class="font-bold text-sm text-[#1C2459] dark:text-white">{{ $article->title }}</div>
                                <div class="text-[11px] text-gray-400 truncate max-w-sm">{{ $article->summary }}</div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="font-bold text-[#1C2459] dark:text-white">{{ $article->author }}</div>
                                <div class="text-[10px] text-gray-400">{{ $article->author_role }}</div>
                            </td>
                            <td class="px-6 py-4">
                                <span class="px-2 py-0.5 rounded text-[10px] bg-gray-100 dark:bg-[#12173B] border border-gray-200 dark:border-[#2E3A82]">
                                    {{ $article->category }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                {{ $article->read_time_minutes }} mins
                            </td>
                            <td class="px-6 py-4 text-gray-400">
                                {{ $article->published_at ? $article->published_at->format('M d, Y') : 'Draft' }}
                            </td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex items-center justify-end gap-2">
                                    <a href="{{ route('admin.articles.edit', $article) }}" 
                                       class="px-2.5 py-1.5 rounded-lg bg-gray-100 dark:bg-[#12173B] text-[#1C2459] dark:text-[#F5FF67] border border-gray-300 dark:border-[#2E3A82]">
                                        Edit
                                    </a>
                                    <form action="{{ route('admin.articles.destroy', $article) }}" method="POST" 
                                          onsubmit="return confirm('Delete this article?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="px-2.5 py-1.5 text-red-500 hover:bg-red-50 dark:hover:bg-red-950/40 rounded-lg">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-12 text-center text-gray-400">
                                No articles published yet.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($articles->hasPages())
            <div class="p-4 border-t border-gray-100 dark:border-[#2E3A82]">
                {{ $articles->links() }}
            </div>
        @endif
    </div>

</div>
@endsection
