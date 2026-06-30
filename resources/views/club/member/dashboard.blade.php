@extends('layouts.app')
@section('content')
<div class="flex min-h-screen bg-[#F8FAFC]">
    <aside class="w-64 bg-white border-r border-slate-200 flex flex-col fixed h-full z-20 shadow-sm">
        <div class="p-6 flex-1">
            <div class="flex items-center gap-3 mb-8">
                <div class="bg-purple-600 text-white p-2 rounded-xl shadow-md">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                </div>
                <div>
                    <h3 class="font-extrabold text-slate-900 text-[15px]">{{ $clubName ?: 'Club Portal' }}</h3>
                    <p class="text-[11px] text-slate-500">Member Dashboard</p>
                </div>
            </div>
            <nav class="space-y-1">
                <a href="{{ route('club.member.dashboard') }}" class="flex items-center gap-3 px-4 py-3 text-sm font-bold rounded-xl bg-purple-50 text-purple-700">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2H6a2 2 0 01-2-2V6z"/></svg>
                    Dashboard
                </a>
            </nav>
        </div>
        <div class="p-4 border-t border-slate-100">
            <div class="p-3 rounded-2xl bg-slate-50 flex items-center gap-3 mb-2">
                <div class="w-9 h-9 rounded-full bg-purple-600 text-white flex items-center justify-center font-bold text-sm">{{ $user->initials() }}</div>
                <div><p class="text-sm font-bold text-slate-800">{{ $user->name }}</p><p class="text-xs text-slate-500">Club Member</p></div>
            </div>
            <div class="flex items-center gap-4">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="text-sm font-bold text-rose-600 bg-rose-50 px-4 py-2 rounded-xl hover:bg-rose-100 transition shadow-sm">Logout</button>
                </form>
            </div>
        </div>
    </aside>
    <div class="pl-64 flex-1">
        <header class="h-16 bg-white border-b border-slate-200 flex items-center px-8 sticky top-0 z-10 shadow-sm">
            <h1 class="text-lg font-black text-slate-800">{{ $clubName ?: 'Club' }} — Member Portal</h1>
        </header>
        <main class="p-8 space-y-6">
            @if(session('success'))<div class="mb-4 p-4 bg-emerald-50 border border-emerald-200 rounded-xl text-emerald-800 text-sm font-semibold">{{ session('success') }}</div>@endif
            @if(session('error'))<div class="mb-4 p-4 bg-rose-50 border border-rose-200 rounded-xl text-rose-700 text-sm font-semibold">{{ session('error') }}</div>@endif

            {{-- Announcements --}}
            @if($announcements->count())
            <div class="bg-white border border-slate-200 rounded-2xl shadow-sm overflow-hidden">
                <div class="p-5 border-b border-slate-100 bg-purple-50">
                    <h3 class="font-black text-purple-800 flex items-center gap-2"><span>📢</span> Club Announcements</h3>
                </div>
                <div class="divide-y divide-slate-100">
                    @foreach($announcements as $ann)
                    <div class="p-4">
                        <h4 class="font-bold text-slate-800 text-sm">{{ $ann->title }}</h4>
                        <p class="text-xs text-slate-600 mt-1 line-clamp-2">{{ $ann->content }}</p>
                        <p class="text-[10px] text-slate-400 mt-1">{{ $ann->created_at->diffForHumans() }}</p>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif

            {{-- Upcoming Events --}}
            <div>
                <h3 class="text-lg font-black text-slate-800 mb-4">Upcoming Events</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
                    @forelse($events as $event)
                    <div class="bg-white border border-slate-200 rounded-2xl shadow-sm p-5 hover:shadow-md transition">
                        <div class="flex items-start justify-between mb-3">
                            <div>
                                <h4 class="font-black text-slate-800">{{ $event->title }}</h4>
                                <p class="text-xs text-slate-500 mt-0.5">{{ $event->location ?? 'TBD' }}</p>
                            </div>
                            <span class="{{ $event->status === 'Scheduled' ? 'bg-emerald-50 text-emerald-700' : ($event->status === 'Completed' ? 'bg-slate-100 text-slate-600' : 'bg-rose-50 text-rose-700') }} text-xs font-bold px-2 py-0.5 rounded-full">{{ $event->status }}</span>
                        </div>
                        <p class="text-sm text-slate-600 mb-3 line-clamp-2">{{ $event->description }}</p>
                        <p class="text-xs font-bold text-slate-500 mb-3">📅 {{ $event->event_date ? \Carbon\Carbon::parse($event->event_date)->format('M d, Y') : 'TBD' }}</p>
                        @php $myReg = $myRegistrations->firstWhere('event_id', $event->id); @endphp
                        @if($myReg)
                            <span class="text-xs font-bold text-purple-700 bg-purple-50 px-3 py-1.5 rounded-lg">✓ Registered — {{ $myReg->status }}</span>
                        @elseif($event->status === 'Scheduled')
                            <form method="POST" action="{{ route('club.member.events.register', $event) }}">
                                @csrf
                                <button type="submit" class="text-xs font-bold text-white bg-purple-600 px-4 py-2 rounded-xl hover:bg-purple-700 transition w-full">Register for Event</button>
                            </form>
                        @endif
                    </div>
                    @empty
                    <div class="col-span-3 text-center text-slate-500 font-semibold py-12">No events scheduled for this club yet.</div>
                    @endforelse
                </div>
            </div>

            {{-- My Registrations --}}
            @if($myRegistrations->count())
            <div>
                <h3 class="text-lg font-black text-slate-800 mb-4">My Registrations</h3>
                <div class="bg-white border border-slate-200 rounded-2xl shadow-sm overflow-hidden">
                    <table class="w-full text-sm">
                        <thead><tr class="bg-slate-50 border-b text-xs font-bold uppercase text-slate-500 tracking-wider">
                            <th class="py-3 px-5 text-left">Event</th><th class="py-3 px-5 text-left">Date</th><th class="py-3 px-5 text-left">Status</th><th class="py-3 px-5 text-left">Attendance</th>
                        </tr></thead>
                        <tbody class="divide-y divide-slate-100">
                            @foreach($myRegistrations as $reg)
                            <tr class="hover:bg-slate-50">
                                <td class="py-3.5 px-5 font-bold text-slate-800">{{ $reg->event->title ?? '—' }}</td>
                                <td class="py-3.5 px-5 text-slate-600 text-xs">{{ $reg->event && $reg->event->event_date ? \Carbon\Carbon::parse($reg->event->event_date)->format('M d, Y') : 'TBD' }}</td>
                                <td class="py-3.5 px-5"><span class="{{ $reg->status === 'Approved' ? 'bg-emerald-50 text-emerald-700' : ($reg->status === 'Rejected' ? 'bg-rose-50 text-rose-700' : 'bg-amber-50 text-amber-700') }} px-2 py-0.5 rounded-full text-xs font-bold">{{ $reg->status }}</span></td>
                                <td class="py-3.5 px-5"><span class="{{ $reg->attendance === 'Present' ? 'bg-emerald-50 text-emerald-700' : ($reg->attendance === 'Absent' ? 'bg-rose-50 text-rose-700' : 'bg-slate-100 text-slate-600') }} px-2 py-0.5 rounded-full text-xs font-bold">{{ $reg->attendance }}</span></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            @endif
        </main>
    </div>
</div>
@endsection
