@extends('layouts.admin')

@section('title', 'Team Admins')

@section('content')
<div class="space-y-6 max-w-7xl mx-auto font-mono text-xs">
    
    <!-- Top Header -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h2 class="text-2xl font-bold text-[#1C2459] dark:text-white">Mission Control Operators</h2>
            <p class="text-gray-500 dark:text-gray-400">Authorized team administrators managing the DevTZ platform.</p>
        </div>
        <div class="flex items-center gap-3">
            <div class="text-xs bg-white dark:bg-[#171E4A] border border-gray-200 dark:border-[#2E3A82] px-4 py-2.5 rounded-xl">
                Total Admins: <span class="font-bold text-[#1C2459] dark:text-[#F5FF67]">{{ $admins->total() }}</span>
            </div>
            <a href="{{ route('admin.users.create') }}" 
               class="px-4 py-2.5 rounded-xl bg-[#F5FF67] hover:bg-[#E2EC48] text-[#1C2459] font-bold shadow-[0_0_15px_rgba(245,255,103,0.3)] transition-all flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                <span>Add New Admin</span>
            </a>
        </div>
    </div>

    <!-- Admins Table -->
    <div class="rounded-2xl bg-white dark:bg-[#171E4A] border border-gray-200 dark:border-[#2E3A82] overflow-hidden shadow-sm">
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead class="bg-gray-50 dark:bg-[#12173B] text-gray-500 dark:text-gray-400 border-b border-gray-200 dark:border-[#2E3A82]">
                    <tr>
                        <th class="px-6 py-4">Operator</th>
                        <th class="px-6 py-4">Email Address</th>
                        <th class="px-6 py-4">Status</th>
                        <th class="px-6 py-4">Created At</th>
                        <th class="px-6 py-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 dark:divide-[#2E3A82]/50 text-gray-700 dark:text-gray-200">
                    @forelse($admins as $admin)
                        <tr class="hover:bg-gray-50/50 dark:hover:bg-[#1C2459]/50 transition-colors">
                            <td class="px-6 py-4 font-bold text-[#1C2459] dark:text-white flex items-center gap-3">
                                <div class="w-8 h-8 rounded-full bg-[#1C2459] text-[#F5FF67] dark:bg-[#F5FF67] dark:text-[#1C2459] font-bold flex items-center justify-center text-xs shadow-sm">
                                    {{ strtoupper(substr($admin->name, 0, 1)) }}
                                </div>
                                <div>
                                    <div>{{ $admin->name }}</div>
                                    @if(Auth::id() === $admin->id)
                                        <span class="text-[10px] text-gray-400 font-normal">(Current Session)</span>
                                    @endif
                                </div>
                            </td>
                            <td class="px-6 py-4 font-mono text-gray-600 dark:text-gray-300">
                                {{ $admin->email }}
                            </td>
                            <td class="px-6 py-4">
                                <span class="px-2.5 py-1 rounded text-[10px] font-bold uppercase bg-emerald-100 dark:bg-emerald-950/70 text-emerald-700 dark:text-emerald-300 border border-emerald-300 dark:border-emerald-800">
                                    Active Admin
                                </span>
                            </td>
                            <td class="px-6 py-4 text-gray-400">
                                {{ $admin->created_at ? $admin->created_at->format('M d, Y') : 'Pre-seeded' }}
                            </td>
                            <td class="px-6 py-4 text-right">
                                @if(Auth::id() !== $admin->id)
                                    <form action="{{ route('admin.users.destroy', $admin) }}" method="POST" onsubmit="return confirm('Are you sure you want to terminate this admin operator?');" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="px-2.5 py-1.5 rounded-lg text-red-500 hover:text-red-700 hover:bg-red-50 dark:hover:bg-red-950/30 transition-colors">
                                            Remove
                                        </button>
                                    </form>
                                @else
                                    <span class="text-gray-400 italic text-[11px]">Protected</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-8 text-center text-gray-400">
                                No admin operators found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($admins->hasPages())
            <div class="p-4 border-t border-gray-200 dark:border-[#2E3A82]">
                {{ $admins->links() }}
            </div>
        @endif
    </div>

</div>
@endsection
