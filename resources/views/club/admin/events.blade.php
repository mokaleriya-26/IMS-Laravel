@extends('layouts.app')
@section('content')
<div class="flex min-h-screen bg-[#F8FAFC]">
    <aside class="w-64 bg-white border-r border-slate-200 flex flex-col fixed h-full z-20 shadow-sm">
        <div class="p-6 flex-1">
            <div class="flex items-center gap-3 mb-8">
                <div class="bg-[#005F5B] text-white p-2 rounded-xl"><svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg></div>
                <div><h3 class="font-extrabold text-slate-900 text-[15px]">{{ $clubName ?: 'Club Admin' }}</h3><p class="text-[11px] text-slate-500">Admin Dashboard</p></div>
            </div>
            <nav class="space-y-1">
                <a href="{{ route('club.admin.dashboard') }}" class="flex items-center gap-3 px-4 py-3 text-sm font-bold rounded-xl {{ request()->routeIs('club.admin.dashboard') ? 'bg-[#EBF5F4] text-[#005F5B]' : 'text-slate-600 hover:bg-slate-50' }}">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2H6a2 2 0 01-2-2V6z"/></svg>
                    Dashboard
                </a>
                <a href="{{ route('club.admin.events') }}" class="flex items-center gap-3 px-4 py-3 text-sm font-bold rounded-xl {{ request()->routeIs('club.admin.events*') ? 'bg-[#EBF5F4] text-[#005F5B]' : 'text-slate-600 hover:bg-slate-50' }}">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                    Manage Events
                </a>
                <a href="{{ route('club.admin.registrations') }}" class="flex items-center gap-3 px-4 py-3 text-sm font-bold rounded-xl {{ request()->routeIs('club.admin.registrations') ? 'bg-[#EBF5F4] text-[#005F5B]' : 'text-slate-600 hover:bg-slate-50' }}">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
                    Registrations
                </a>
                <a href="{{ route('club.admin.announcements') }}" class="flex items-center gap-3 px-4 py-3 text-sm font-bold rounded-xl {{ request()->routeIs('club.admin.announcements') ? 'bg-[#EBF5F4] text-[#005F5B]' : 'text-slate-600 hover:bg-slate-50' }}">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"/></svg>
                    Announcements
                </a>
            </nav>
        </div>
        <div class="p-4 border-t border-slate-100 items-center justify-center">
            <div class="p-3 rounded-2xl bg-slate-50 flex items-center gap-3">
                <div class="w-9 h-9 rounded-full bg-[#005F5B] text-white flex items-center justify-center font-bold text-sm shadow-sm">CA</div>
                <div>
                    <p class="text-sm font-bold text-slate-800">{{ $clubName ?: 'Club Admin' }}</p>
                    <p class="text-xs text-slate-500">Administrator</p>
                </div>
            </div>
        </div>
    </aside>
    <div class="pl-64 flex-1">
        <header class="h-16 bg-white border-b border-slate-200 sticky top-0 z-10 flex items-center justify-between px-8 shadow-sm">
            <h1 class="text-lg font-black text-[#005F5B]">Manage Club Events</h1>
            <div class="flex items-center gap-4">
                <a href="{{ route('club.admin.events.create') }}" class="bg-[#005F5B] text-white font-bold text-sm px-5 py-2.5 rounded-xl hover:bg-[#005F5B] transition flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
                    Create Event</a>
                <div class="h-6 w-px bg-slate-300"></div>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="flex items-center gap-2 rounded-xl bg-rose-50 px-4 py-2 text-sm font-semibold text-rose-600 transition hover:bg-rose-600 hover:text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"d="M17 16l4-4m0 0l-4-4m4 4H9m4 4v1a2 2 0 01-2 2H6a2 2 0 01-2-2V7a2 2 0 012-2h5a2 2 0 012 2v1"/>
                        </svg>
                        Logout
                    </button>
                </form>
            </div>
        </header>
        <main class="p-8">
            @if(session('success'))<div class="mb-4 p-4 bg-emerald-50 border border-emerald-200 rounded-xl text-emerald-800 text-sm font-semibold">{{ session('success') }}</div>@endif
            <div class="bg-white border border-slate-200 rounded-2xl shadow-sm overflow-hidden">
                <table class="w-full text-sm">
                    <thead><tr class="bg-slate-50 border-b text-xs font-bold uppercase text-black tracking-wider">
                        <th class="py-3 px-5 text-left">Event Title</th>
                        <th class="py-3 px-5 text-left">From Date</th>
                        <th class="py-3 px-5 text-left">To Date</th>
                        <th class="py-3 px-5 text-left">Location</th>
                        <th class="py-3 px-5 text-left">Brochure</th>
                        <th class="py-3 px-5 text-left">Status</th>
                        <th class="py-3 px-5 text-center">Actions</th>
                    </tr></thead>
                    <tbody class="divide-y divide-slate-100">
                        @forelse($events as $event)
                            <tr class="hover:bg-slate-50 transition">
                                <td class="py-3.5 px-5 font-bold text-slate-800">{{ $event->title }}</td>
                                <td class="py-3.5 px-5 text-slate-600">{{ \Carbon\Carbon::parse($event->from_date)->format('d M Y') }}</td>
                                <td class="py-3.5 px-5 text-slate-600">{{ \Carbon\Carbon::parse($event->to_date)->format('d M Y') }}</td>
                                <td class="py-3.5 px-5 text-slate-600">{{ $event->location ?: '—' }}</td>
                                <td class="py-3.5 px-5 text-center">
                                    @if($event->brochure)
                                        <a href="{{ asset('storage/'.$event->brochure) }}" target="_blank" class="inline-flex items-center gap-1 bg-slate-50 text-slate-700 px-3 py-1 rounded-lg text-xs font-semibold hover:bg-blue-100"> 📄 View </a>
                                    @else
                                        <span class="text-slate-400">—</span>
                                    @endif
                                </td>
                                <td class="py-3.5 px-5">
                                    @if($event->status=="Scheduled")
                                        <span class="bg-emerald-50 text-emerald-700 px-3 py-1 rounded-full text-xs font-bold">Scheduled</span>
                                    @elseif($event->status=="Completed")
                                        <span class="bg-slate-50 text-slate-700 px-3 py-1 rounded-full text-xs font-bold">Completed</span>
                                    @else
                                        <span class="bg-rose-50 text-rose-700 px-3 py-1 rounded-full text-xs font-bold">Cancelled</span>
                                    @endif
                                </td>
                                <td class="py-3.5 px-5">
                                    <div class="flex justify-center gap-2">
                                        <a href="{{ route('club.admin.events.edit',$event) }}" class="bg-[#EBF5F4] text-[#005F5B] px-3 py-1.5 rounded-lg text-xs font-bold hover:bg-[#005F5B] hover:text-white transition"> Edit </a>
                                        <form action="{{ route('club.admin.events.delete',$event) }}" method="POST" onsubmit="return confirm('Delete this event?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="bg-rose-50 text-rose-600 px-3 py-1.5 rounded-lg text-xs font-bold hover:bg-rose-600 hover:text-white transition"> Delete </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="py-8 text-center text-slate-500 font-semibold">
                                    No events available.
                                    <a href="{{ route('club.admin.events.create') }}" class="text-[#005F5B] hover:underline"> Create one now </a>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</div>
@endsection
