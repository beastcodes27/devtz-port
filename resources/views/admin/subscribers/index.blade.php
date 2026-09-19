@extends('layouts.admin')

@section('title', 'Engineering Radar Subscribers')

@section('content')
<div class="space-y-6 max-w-7xl mx-auto font-mono text-xs">
    
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h2 class="text-2xl font-bold text-[#1C2459] dark:text-white">Radar Newsletter Subscribers</h2>
            <p class="text-gray-500 dark:text-gray-400">Engineering leads receiving architectural updates.</p>
        </div>
        <div class="text-xs bg-white dark:bg-[#171E4A] border border-gray-200 dark:border-[#2E3A82] px-4 py-2 rounded-xl">
            Total Active: <span class="font-bold text-[#1C2459] dark:text-[#F5FF67]">{{ \App\Models\NewsletterSubscriber::where('status', 'active')->count() }}</span>
        </div>
    </div>

    <div class="rounded-2xl bg-white dark:bg-[#171E4A] border border-gray-200 dark:border-[#2E3A82] overflow-hidden shadow-sm">
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead class="bg-gray-50 dark:bg-[#12173B] text-gray-500 dark:text-gray-400 border-b border-gray-200 dark:border-[#2E3A82]">
                    <tr>
                        <th class="px-6 py-4">Status</th>
                        <th class="px-6 py-4">Subscriber Email</th>
                        <th class="px-6 py-4">Subscribed Date</th>
                        <th class="px-6 py-4">IP Address</th>
                        <th class="px-6 py-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 dark:divide-[#2E3A82]/50 text-gray-700 dark:text-gray-200">
                    @forelse($subscribers as $sub)
                        <tr class="hover:bg-gray-50/50 dark:hover:bg-[#1C2459]/50 transition-colors">
                            <td class="px-6 py-4">
                                @if($sub->status === 'active')
                                    <span class="px-2.5 py-1 rounded text-[10px] font-bold uppercase bg-emerald-100 dark:bg-emerald-950/70 text-emerald-700 dark:text-emerald-300 border border-emerald-300 dark:border-emerald-800">
                                        ACTIVE
                                    </span>
                                @else
                                    <span class="px-2.5 py-1 rounded text-[10px] font-bold uppercase bg-gray-100 dark:bg-gray-800 text-gray-600 dark:text-gray-300">
                                        UNSUBSCRIBED
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-4 font-bold text-[#1C2459] dark:text-white">
                                {{ $sub->email }}
                            </td>
                            <td class="px-6 py-4 text-gray-400">
                                {{ $sub->created_at->format('M d, Y H:i') }}
                            </td>
                            <td class="px-6 py-4 text-gray-400">
                                {{ $sub->ip_address ?? '127.0.0.1' }}
                            </td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex items-center justify-end gap-2">
                                    <form action="{{ route('admin.subscribers.toggle', $sub) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="px-2.5 py-1.5 rounded-lg bg-gray-100 dark:bg-[#12173B] text-gray-700 dark:text-gray-200 border border-gray-300 dark:border-[#2E3A82]">
                                            Toggle Status
                                        </button>
                                    </form>

                                    <form action="{{ route('admin.subscribers.destroy', $sub) }}" method="POST"
                                          onsubmit="return confirm('Remove subscriber?');">
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
                            <td colspan="5" class="px-6 py-12 text-center text-gray-400">
                                No newsletter subscribers registered yet.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($subscribers->hasPages())
            <div class="p-4 border-t border-gray-100 dark:border-[#2E3A82]">
                {{ $subscribers->links() }}
            </div>
        @endif
    </div>

</div>
@endsection
