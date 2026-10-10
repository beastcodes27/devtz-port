@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <!-- Header -->
    <div class="mb-8">
        <a href="{{ route('admin.team.index') }}" class="text-xs font-mono text-gray-500 hover:text-[#F5FF67] flex items-center gap-1 mb-2">
            <span>← Back to Team Management</span>
        </a>
        <h1 class="text-3xl font-extrabold text-[#1C2459] dark:text-white font-mono">
            Add New Team Member / Expert
        </h1>
        <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">
            Fill in details to add an engineer, lead architect, or specialist to the agency roster.
        </p>
    </div>

    <!-- Form -->
    <form action="{{ route('admin.team.store') }}" method="POST" class="bg-white dark:bg-[#12173B] p-8 rounded-2xl border border-gray-200 dark:border-[#2E3A82] shadow-xl space-y-6 text-xs font-mono">
        @csrf

        <!-- Name & Role -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="name" class="block font-bold text-gray-700 dark:text-gray-300 mb-1 uppercase">Full Name *</label>
                <input type="text" id="name" name="name" required value="{{ old('name') }}"
                       class="w-full px-4 py-2.5 rounded-xl bg-gray-50 dark:bg-[#1C2459] border border-gray-300 dark:border-[#2E3A82] text-gray-900 dark:text-white focus:outline-none focus:border-[#F5FF67]"
                       placeholder="e.g. Juma Hamisi">
            </div>

            <div>
                <label for="role" class="block font-bold text-gray-700 dark:text-gray-300 mb-1 uppercase">Role Title *</label>
                <input type="text" id="role" name="role" required value="{{ old('role') }}"
                       class="w-full px-4 py-2.5 rounded-xl bg-gray-50 dark:bg-[#1C2459] border border-gray-300 dark:border-[#2E3A82] text-gray-900 dark:text-white focus:outline-none focus:border-[#F5FF67]"
                       placeholder="e.g. Lead Systems Architect">
            </div>
        </div>

        <!-- Bio -->
        <div>
            <label for="bio" class="block font-bold text-gray-700 dark:text-gray-300 mb-1 uppercase">Engineering Bio *</label>
            <textarea id="bio" name="bio" rows="4" required
                      class="w-full px-4 py-2.5 rounded-xl bg-gray-50 dark:bg-[#1C2459] border border-gray-300 dark:border-[#2E3A82] text-gray-900 dark:text-white focus:outline-none focus:border-[#F5FF67]"
                      placeholder="Specializing in microservices, cloud backends, and high-concurrency systems...">{{ old('bio') }}</textarea>
        </div>

        <!-- Links -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div>
                <label for="github" class="block font-bold text-gray-700 dark:text-gray-300 mb-1 uppercase">GitHub URL</label>
                <input type="url" id="github" name="github" value="{{ old('github') }}"
                       class="w-full px-4 py-2.5 rounded-xl bg-gray-50 dark:bg-[#1C2459] border border-gray-300 dark:border-[#2E3A82] text-gray-900 dark:text-white focus:outline-none focus:border-[#F5FF67]"
                       placeholder="https://github.com/username">
            </div>

            <div>
                <label for="linkedin" class="block font-bold text-gray-700 dark:text-gray-300 mb-1 uppercase">LinkedIn URL</label>
                <input type="url" id="linkedin" name="linkedin" value="{{ old('linkedin') }}"
                       class="w-full px-4 py-2.5 rounded-xl bg-gray-50 dark:bg-[#1C2459] border border-gray-300 dark:border-[#2E3A82] text-gray-900 dark:text-white focus:outline-none focus:border-[#F5FF67]"
                       placeholder="https://linkedin.com/in/username">
            </div>

            <div>
                <label for="portfolio" class="block font-bold text-gray-700 dark:text-gray-300 mb-1 uppercase">Portfolio URL</label>
                <input type="url" id="portfolio" name="portfolio" value="{{ old('portfolio') }}"
                       class="w-full px-4 py-2.5 rounded-xl bg-gray-50 dark:bg-[#1C2459] border border-gray-300 dark:border-[#2E3A82] text-gray-900 dark:text-white focus:outline-none focus:border-[#F5FF67]"
                       placeholder="https://devtz.site">
            </div>
        </div>

        <!-- Order & Active -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 pt-2">
            <div>
                <label for="order" class="block font-bold text-gray-700 dark:text-gray-300 mb-1 uppercase">Display Order (Sort Index)</label>
                <input type="number" id="order" name="order" value="{{ old('order', 1) }}"
                       class="w-full px-4 py-2.5 rounded-xl bg-gray-50 dark:bg-[#1C2459] border border-gray-300 dark:border-[#2E3A82] text-gray-900 dark:text-white focus:outline-none focus:border-[#F5FF67]">
            </div>

            <div class="flex items-center pt-6">
                <label class="flex items-center gap-2 cursor-pointer text-gray-700 dark:text-gray-300 font-bold uppercase">
                    <input type="checkbox" name="is_active" value="1" checked class="w-4 h-4 rounded text-[#1C2459]">
                    <span>Visible on Website</span>
                </label>
            </div>
        </div>

        <!-- Buttons -->
        <div class="flex items-center justify-end gap-3 pt-4 border-t border-gray-200 dark:border-[#2E3A82]">
            <a href="{{ route('admin.team.index') }}" class="px-4 py-2.5 rounded-xl bg-gray-100 dark:bg-[#1C2459] text-gray-700 dark:text-gray-300 font-bold">Cancel</a>
            <button type="submit" class="px-6 py-2.5 rounded-xl bg-[#F5FF67] text-[#1C2459] font-bold shadow-md hover:bg-[#E2EC48]">Save Team Member</button>
        </div>
    </form>
</div>
@endsection

