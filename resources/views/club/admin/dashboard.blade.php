@extends('layouts.app')
@section('content')
<div class="flex min-h-screen bg-[#F8FAFC]">
    <aside class="w-64 bg-white border-r border-slate-200 flex flex-col fixed h-full z-20 shadow-sm">
        <div class="p-6 flex-1">
            <div class="flex items-center gap-3 mb-8">
                <div class="bg-indigo-600 text-white p-2 rounded-xl"><svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg></div>
                <div><h3 class="font-extrabold text-slate-900 text-[15px]">{{ $clubName ?: 'Club Admin' }}</h3><p class="text-[11px] text-slate-500">Admin Dashboard</p></div>
            </div>
            <nav class="space-y-1">
                <a href="{{ route('club.admin.dashboard') }}" class="flex items-center gap-3 px-4 py-3 text-sm font-bold rounded-xl {{ request()->routeIs('club.admin.dashboard') ? 'bg-indigo-50 text-indigo-700' : 'text-slate-600 hover:bg-slate-50' }}">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2H6a2 2 0 01-2-2V6z"/></svg>
                    Dashboard
                </a>
                <a href="{{ route('club.admin.events') }}" class="flex items-center gap-3 px-4 py-3 text-sm font-bold rounded-xl {{ request()->routeIs('club.admin.events*') ? 'bg-indigo-50 text-indigo-700' : 'text-slate-600 hover:bg-slate-50' }}">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                    Manage Events
                </a>
                <a href="{{ route('club.admin.registrations') }}" class="flex items-center gap-3 px-4 py-3 text-sm font-bold rounded-xl {{ request()->routeIs('club.admin.registrations') ? 'bg-indigo-50 text-indigo-700' : 'text-slate-600 hover:bg-slate-50' }}">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
                    Registrations
                </a>
                <a href="{{ route('club.admin.announcements') }}" class="flex items-center gap-3 px-4 py-3 text-sm font-bold rounded-xl {{ request()->routeIs('club.admin.announcements') ? 'bg-indigo-50 text-indigo-700' : 'text-slate-600 hover:bg-slate-50' }}">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"/></svg>
                    Announcements
                </a>
            </nav>
        </div>
        <div class="p-4 border-t border-slate-100">
            <form action="{{ route('logout') }}" method="POST">@csrf<button class="w-full text-sm font-bold text-slate-600 bg-slate-100 px-4 py-2 rounded-xl hover:bg-slate-200 transition text-left">Logout</button></form>
        </div>
    </aside>
    <div class="pl-64 flex-1">
        <header class="h-16 bg-white border-b border-slate-200 flex items-center px-8 sticky top-0 z-10 shadow-sm">
            <h1 class="text-lg font-black text-slate-800">{{ $clubName }} — Club Admin</h1>
        </header>
        <main class="p-8 space-y-6">
            @if(session('success'))<div class="p-4 bg-emerald-50 border border-emerald-200 rounded-xl text-emerald-800 text-sm font-semibold">{{ session('success') }}</div>@endif

            {{-- Hero Banner --}}
            <div class="bg-indigo-600 rounded-3xl p-8 text-white relative overflow-hidden shadow-xl">
                <h2 class="text-3xl font-extrabold tracking-tight">{{ $clubName }} Admin Panel</h2>
                <p class="text-indigo-100 mt-1 text-sm">Manage events, members, and announcements for your club.</p>
                <a href="{{ route('club.admin.events.create') }}" class="mt-4 inline-flex bg-white text-indigo-700 font-bold text-sm px-5 py-2.5 rounded-xl hover:bg-indigo-50 transition shadow-sm">+ Create Event</a>
            </div>

            {{-- Stats --}}
            <div class="grid grid-cols-2 md:grid-cols-4 gap-5">
                <div class="bg-white border border-slate-200 rounded-2xl p-5 shadow-sm text-center"><p class="text-xs font-bold text-slate-600 mb-2">Total Events</p><h3 class="text-3xl font-black text-slate-900">{{ $totalEvents }}</h3></div>
                <div class="bg-white border border-slate-200 rounded-2xl p-5 shadow-sm text-center"><p class="text-xs font-bold text-slate-600 mb-2">Upcoming</p><h3 class="text-3xl font-black text-emerald-600">{{ $upcomingEvents }}</h3></div>
                <div class="bg-white border border-slate-200 rounded-2xl p-5 shadow-sm text-center"><p class="text-xs font-bold text-slate-600 mb-2">Total Registrations</p><h3 class="text-3xl font-black text-slate-900">{{ $totalRegistrations }}</h3></div>
                <div class="bg-white border border-slate-200 rounded-2xl p-5 shadow-sm text-center"><p class="text-xs font-bold text-slate-600 mb-2">Pending Approvals</p><h3 class="text-3xl font-black text-amber-600">{{ $pendingApprovals }}</h3></div>
            </div>

            {{-- Recent Events --}}
            <div class="bg-white border border-slate-200 rounded-2xl shadow-sm overflow-hidden">
                <div class="p-5 border-b border-slate-100 flex justify-between items-center">
                    <h3 class="font-black text-slate-800">Recent Events</h3>
                    <a href="{{ route('club.admin.events') }}" class="text-sm font-bold text-indigo-600 hover:underline">Manage All</a>
                </div>
                <table class="w-full text-sm">
                    <thead><tr class="bg-slate-50 border-b text-xs font-bold uppercase text-slate-500 tracking-wider">
                        <th class="py-3 px-5 text-left">Event</th><th class="py-3 px-5 text-left">Date</th><th class="py-3 px-5 text-left">Status</th>
                    </tr></thead>
                    <tbody class="divide-y divide-slate-100">
                        @forelse($recentEvents as $event)
                        <tr class="hover:bg-slate-50">
                            <td class="py-3.5 px-5 font-bold text-slate-800">{{ $event->title }}</td>
                            <td class="py-3.5 px-5 text-slate-600 text-xs">{{ $event->event_date ? \Carbon\Carbon::parse($event->event_date)->format('M d, Y') : 'TBD' }}</td>
                            <td class="py-3.5 px-5"><span class="{{ $event->status === 'Scheduled' ? 'bg-emerald-50 text-emerald-700' : 'bg-slate-100 text-slate-600' }} px-2.5 py-0.5 rounded-full text-xs font-bold">{{ $event->status }}</span></td>
                        </tr>
                        @empty
                        <tr><td colspan="3" class="py-6 text-center text-slate-500">No events yet.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</div>
@endsection
