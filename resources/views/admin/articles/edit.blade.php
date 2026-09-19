@extends('layouts.admin')

@section('title', 'Edit Article // ' . $article->title)

@section('content')
<div class="max-w-4xl mx-auto space-y-6 font-mono text-xs">
    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-2xl font-bold text-[#1C2459] dark:text-white">Edit Radar Article</h2>
            <p class="text-gray-500 dark:text-gray-400">Modify specs for "{{ $article->title }}".</p>
        </div>
        <a href="{{ route('admin.articles.index') }}" class="text-gray-500 hover:underline">← Cancel</a>
    </div>

    <form action="{{ route('admin.articles.update', $article) }}" method="POST" class="p-8 rounded-2xl bg-white dark:bg-[#171E4A] border border-gray-200 dark:border-[#2E3A82] space-y-6 shadow-sm">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 sm:grid-cols-3 gap-5">
            <div class="sm:col-span-2 space-y-1.5">
                <label class="block font-bold text-gray-700 dark:text-gray-200">Article Title *</label>
                <input type="text" name="title" required value="{{ old('title', $article->title) }}"
                       class="w-full px-4 py-2.5 rounded-xl bg-gray-50 dark:bg-[#12173B] border border-gray-300 dark:border-[#2E3A82] text-gray-900 dark:text-white focus:outline-none focus:border-[#F5FF67]">
            </div>

            <div class="space-y-1.5">
                <label class="block font-bold text-gray-700 dark:text-gray-200">Category *</label>
                <input type="text" name="category" required value="{{ old('category', $article->category) }}"
                       class="w-full px-4 py-2.5 rounded-xl bg-gray-50 dark:bg-[#12173B] border border-gray-300 dark:border-[#2E3A82] text-gray-900 dark:text-white focus:outline-none focus:border-[#F5FF67]">
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-3 gap-5">
            <div class="space-y-1.5">
                <label class="block font-bold text-gray-700 dark:text-gray-200">Author Name *</label>
                <input type="text" name="author" required value="{{ old('author', $article->author) }}"
                       class="w-full px-4 py-2.5 rounded-xl bg-gray-50 dark:bg-[#12173B] border border-gray-300 dark:border-[#2E3A82] text-gray-900 dark:text-white focus:outline-none focus:border-[#F5FF67]">
            </div>

            <div class="space-y-1.5">
                <label class="block font-bold text-gray-700 dark:text-gray-200">Author Role *</label>
                <input type="text" name="author_role" required value="{{ old('author_role', $article->author_role) }}"
                       class="w-full px-4 py-2.5 rounded-xl bg-gray-50 dark:bg-[#12173B] border border-gray-300 dark:border-[#2E3A82] text-gray-900 dark:text-white focus:outline-none focus:border-[#F5FF67]">
            </div>

            <div class="space-y-1.5">
                <label class="block font-bold text-gray-700 dark:text-gray-200">Read Time (Mins) *</label>
                <input type="number" name="read_time_minutes" required value="{{ old('read_time_minutes', $article->read_time_minutes) }}"
                       class="w-full px-4 py-2.5 rounded-xl bg-gray-50 dark:bg-[#12173B] border border-gray-300 dark:border-[#2E3A82] text-gray-900 dark:text-white focus:outline-none focus:border-[#F5FF67]">
            </div>
        </div>

        <div class="space-y-1.5">
            <label class="block font-bold text-gray-700 dark:text-gray-200">Executive Summary *</label>
            <textarea name="summary" required rows="2"
                      class="w-full px-4 py-2.5 rounded-xl bg-gray-50 dark:bg-[#12173B] border border-gray-300 dark:border-[#2E3A82] text-gray-900 dark:text-white focus:outline-none focus:border-[#F5FF67]">{{ old('summary', $article->summary) }}</textarea>
        </div>

        <div class="space-y-1.5">
            <label class="block font-bold text-gray-700 dark:text-gray-200">Article Content *</label>
            <textarea name="content" required rows="8"
                      class="w-full px-4 py-3 rounded-xl bg-gray-50 dark:bg-[#12173B] border border-gray-300 dark:border-[#2E3A82] text-gray-900 dark:text-white focus:outline-none focus:border-[#F5FF67] font-sans text-sm">{{ old('content', $article->content) }}</textarea>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
            <div class="space-y-1.5">
                <label class="block font-bold text-gray-700 dark:text-gray-200">Cover Image URL</label>
                <input type="url" name="cover_image" value="{{ old('cover_image', $article->cover_image) }}"
                       class="w-full px-4 py-2.5 rounded-xl bg-gray-50 dark:bg-[#12173B] border border-gray-300 dark:border-[#2E3A82] text-gray-900 dark:text-white focus:outline-none focus:border-[#F5FF67]">
            </div>

            <div class="space-y-1.5">
                <label class="block font-bold text-gray-700 dark:text-gray-200">Tags (comma separated)</label>
                <input type="text" name="tags_input" value="{{ old('tags_input', implode(', ', $article->tags ?? [])) }}"
                       class="w-full px-4 py-2.5 rounded-xl bg-gray-50 dark:bg-[#12173B] border border-gray-300 dark:border-[#2E3A82] text-gray-900 dark:text-white focus:outline-none focus:border-[#F5FF67]">
            </div>
        </div>

        <div class="pt-4 border-t border-gray-100 dark:border-[#2E3A82] flex items-center justify-end gap-3">
            <a href="{{ route('admin.articles.index') }}" class="px-5 py-2.5 rounded-xl text-gray-500 hover:text-white">Cancel</a>
            <button type="submit" class="px-6 py-2.5 rounded-xl font-bold text-[#1C2459] bg-[#F5FF67] hover:bg-[#E2EC48]">
                Save Changes ⚡
            </button>
        </div>
    </form>
</div>
@endsection
