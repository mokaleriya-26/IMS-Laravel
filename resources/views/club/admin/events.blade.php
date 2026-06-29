@extends('layouts.app')
@section('content')
<div class="flex min-h-screen bg-[#F8FAFC]">
    <aside class="w-64 bg-white border-r border-slate-200 flex flex-col fixed h-full z-20 shadow-sm p-6">
        <div class="flex items-center gap-3 mb-8">
            <div class="bg-indigo-600 text-white p-2 rounded-xl"><svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg></div>
            <div><h3 class="font-extrabold text-slate-900 text-[15px]">{{ $clubName }}</h3><p class="text-[11px] text-slate-500">Club Admin</p></div>
        </div>
        <nav class="space-y-1">
            <a href="{{ route('club.admin.dashboard') }}" class="block px-4 py-3 text-sm font-bold rounded-xl text-slate-600 hover:bg-slate-50">Dashboard</a>
            <a href="{{ route('club.admin.events') }}" class="block px-4 py-3 text-sm font-bold rounded-xl bg-indigo-50 text-indigo-700">Manage Events</a>
            <a href="{{ route('club.admin.registrations') }}" class="block px-4 py-3 text-sm font-bold rounded-xl text-slate-600 hover:bg-slate-50">Registrations</a>
            <a href="{{ route('club.admin.announcements') }}" class="block px-4 py-3 text-sm font-bold rounded-xl text-slate-600 hover:bg-slate-50">Announcements</a>
        </nav>
        <div class="mt-auto"><form action="{{ route('logout') }}" method="POST">@csrf<button class="w-full text-sm font-bold text-slate-600 bg-slate-100 px-4 py-2 rounded-xl">Logout</button></form></div>
    </aside>
    <div class="pl-64 flex-1">
        <header class="h-16 bg-white border-b border-slate-200 flex items-center justify-between px-8 sticky top-0 z-10 shadow-sm">
            <h1 class="text-lg font-black text-slate-800">Manage Club Events</h1>
            <a href="{{ route('club.admin.events.create') }}" class="bg-indigo-600 text-white font-bold text-sm px-5 py-2.5 rounded-xl hover:bg-indigo-700 transition flex items-center gap-2">+ Create Event</a>
        </header>
        <main class="p-8">
            @if(session('success'))<div class="mb-4 p-4 bg-emerald-50 border border-emerald-200 rounded-xl text-emerald-800 text-sm font-semibold">{{ session('success') }}</div>@endif
            <div class="bg-white border border-slate-200 rounded-2xl shadow-sm overflow-hidden">
                <table class="w-full text-sm">
                    <thead><tr class="bg-slate-50 border-b text-xs font-bold uppercase text-slate-500 tracking-wider">
                        <th class="py-3 px-5 text-left">Event Title</th>
                        <th class="py-3 px-5 text-left">Date</th>
                        <th class="py-3 px-5 text-left">Location</th>
                        <th class="py-3 px-5 text-left">Status</th>
                        <th class="py-3 px-5 text-center">Actions</th>
                    </tr></thead>
                    <tbody class="divide-y divide-slate-100">
                        @forelse($events as $event)
                        <tr class="hover:bg-slate-50 transition">
                            <td class="py-3.5 px-5 font-bold text-slate-800">{{ $event->title }}</td>
                            <td class="py-3.5 px-5 text-slate-600 text-xs">{{ $event->event_date ? \Carbon\Carbon::parse($event->event_date)->format('M d, Y') : 'TBD' }}</td>
                            <td class="py-3.5 px-5 text-slate-600">{{ $event->location ?? '—' }}</td>
                            <td class="py-3.5 px-5"><span class="{{ $event->status === 'Scheduled' ? 'text-emerald-700 bg-emerald-50' : 'text-slate-500 bg-slate-100' }} px-2.5 py-0.5 rounded-full text-xs font-bold">{{ $event->status }}</span></td>
                            <td class="py-3.5 px-5 text-center flex gap-2 justify-center">
                                <a href="{{ route('club.admin.events.edit', $event) }}" class="text-xs font-bold text-indigo-600 bg-indigo-50 px-3 py-1.5 rounded-lg hover:bg-indigo-600 hover:text-white transition">Edit</a>
                                <form method="POST" action="{{ route('club.admin.events.delete', $event) }}" onsubmit="return confirm('Delete this event?')">
                                    @csrf @method('DELETE')
                                    <button class="text-xs font-bold text-rose-600 bg-rose-50 px-3 py-1.5 rounded-lg hover:bg-rose-100 transition">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr><td colspan="5" class="py-8 text-center text-slate-500 font-semibold">No events scheduled. <a href="{{ route('club.admin.events.create') }}" class="text-[#005F5B] hover:underline">Create one now</a>.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</div>
@endsection
