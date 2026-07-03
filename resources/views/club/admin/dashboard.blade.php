@extends('layouts.app')
@section('content')
<div class="flex min-h-screen bg-[#F8FAFC]">
    <aside class="w-64 bg-white border-r border-slate-200 flex flex-col fixed h-full z-20 shadow-sm">
        <div class="p-6 flex-1">
            <div class="flex items-center gap-4 mb-8">
                <img src="{{ asset('images/logo.png') }}" alt="EduHive Logo" class="w-14 h-14 md:w-16 md:h-16 object-contain drop-shadow-md flex-shrink-0" draggable="false" >
                <div>
                    <h3 class="text-lg font-bold text-slate-900 leading-tight"> {{ $clubName ?: 'Club Admin' }} </h3>
                    <p class="text-sm text-[#005F5B] font-semibold tracking-wide"> EduHive </p>
                </div>
            </div>
            <nav class="space-y-1">
                <a href="{{ route('club.admin.dashboard') }}" class="flex items-center gap-3 px-4 py-3 text-sm font-bold rounded-xl {{ request()->routeIs('club.admin.dashboard') ? 'bg-[#EBF5F4] text-[#005F5B]' : 'text-slate-600 hover:bg-slate-50' }}">
                    <svg fill="#005F5B" width="18px" height="18px" viewBox="0 0 1000 1000" xmlns="http://www.w3.org/2000/svg" stroke="#005F5B"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M808 154H616l-1-7q-4-44-37-74t-78-30-78 30-37 74l-1 7H192q-31 0-53 22t-22 53v616q0 31 22 53.5t53 22.5h616q31 0 53-22.5t22-53.5V230q0-32-22-54t-53-22zm-308-41q18 0 31 13t13 31.5-13 31.5-31 13-31-13-13-31.5 13-31.5 31-13zm31 611H297q-8 0-14-5.5t-6-13.5v-48q0-8 6-13.5t14-5.5h234q8 0 14 5.5t6 13.5v48q0 8-6 13.5t-14 5.5zm172-150H297q-8 0-14-5.5t-6-13.5v-48q0-8 6-14t14-6h406q8 0 14 6t6 14v48q0 8-6 13.5t-14 5.5zm0-150H297q-8 0-14-5.5t-6-14.5v-47q0-8 6-14t14-6h406q8 0 14 6t6 14v47q0 9-6 14.5t-14 5.5z"></path></g></svg>
                    Dashboard
                </a>
                <a href="{{ route('club.admin.events') }}" class="flex items-center gap-3 px-4 py-3 text-sm font-bold rounded-xl {{ request()->routeIs('club.admin.events*') ? 'bg-[#EBF5F4] text-[#005F5B]' : 'text-slate-600 hover:bg-slate-50' }}">
                    <svg version="1.1" id="Icons" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 32 32" xml:space="preserve" fill="#005f5b" width="18px" height="18px" stroke="#005f5b"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <style type="text/css"> .st0{fill:none;stroke:#000000;stroke-width:2;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;} </style> <path d="M8,16c-4.4,0-8,3.6-8,8s3.6,8,8,8s8-3.6,8-8S12.4,16,8,16z M13.9,23H12c-0.1-1.5-0.4-2.9-0.8-4.1 C12.6,19.8,13.6,21.3,13.9,23z M8,30c-0.6,0-1.8-1.9-2-5H10C9.8,28.1,8.6,30,8,30z M6,23c0.2-3.1,1.3-5,2-5s1.8,1.9,2,5H6z M4.9,18.9C4.4,20.1,4.1,21.5,4,23H2.1C2.4,21.3,3.4,19.8,4.9,18.9z M2.1,25H4c0.1,1.5,0.4,2.9,0.8,4.1C3.4,28.2,2.4,26.7,2.1,25z M11.1,29.1c0.5-1.2,0.7-2.6,0.8-4.1h1.9C13.6,26.7,12.6,28.2,11.1,29.1z"></path> <path d="M29,8h-8.9l-2.3-3.5C17.7,4.2,17.3,4,17,4H7C5.3,4,4,5.3,4,7v7.8C5.2,14.3,6.6,14,8,14c5.5,0,10,4.5,10,10 c0,1.4-0.3,2.8-0.8,4H29c1.7,0,3-1.3,3-3V11C32,9.3,30.7,8,29,8z M30,23.6L21.4,10H29c0.6,0,1,0.4,1,1V23.6z"></path> </g></svg>
                    Manage Events
                </a>
                <a href="{{ route('club.admin.registrations') }}" class="flex items-center gap-3 px-4 py-3 text-sm font-bold rounded-xl {{ request()->routeIs('club.admin.registrations') ? 'bg-[#EBF5F4] text-[#005F5B]': 'text-slate-600 hover:bg-slate-50' }}">
                    <svg fill="#005f5b" height="18px" width="18px" version="1.1" id="Filled_Icons" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 24 24" enable-background="new 0 0 24 24" xml:space="preserve" stroke="#005f5b"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g id="Add-User-Filled"> <path d="M21,14h-2v-3h-3V9h3V6h2v3h3v2h-3V14z"></path> <path d="M14,6c0,2.76-2.24,5-5,5S4,8.76,4,6s2.24-5,5-5S14,3.24,14,6z M17,23v-4c0-4.42-3.58-8-8-8h0c-4.42,0-8,3.58-8,8v4"></path> </g> </g></svg>
                    Registrations
                </a>
                <a href="{{ route('club.admin.announcements') }}" class="flex items-center gap-3 px-4 py-3 text-sm font-bold rounded-xl {{ request()->routeIs('club.admin.announcements') ? 'bg-[#EBF5F4] text-[#005F5B]' : 'text-slate-600 hover:bg-slate-50' }}">
                    <svg fill="#005f5b" height="18px" width="18px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 256 256" xml:space="preserve" stroke="#005f5b"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <path d="M214.5,188.2h0.2c-0.3-0.2-0.7-0.3-0.8-0.5C214,187.9,214.3,188.1,214.5,188.2z"></path> <path d="M232,84V22.5l0,0c-0.5-5.9-5.4-10.6-11.5-10.6c-4.2,0-7.9,2.4-9.9,5.7C184.2,39,151,66.5,101.3,66.5H42.7 c-0.7,0-1.5,0-2.2,0.2c-0.2,0-0.2,0-0.3,0C21,66.6,5.5,82.1,5.5,101.3S21,136,40.2,136c0.2,0,0.2,0,0.3,0c0.7,0,1.5,0.2,2.2,0.2H50 l16.7,109.4l49.7-6.4l-2.5-20.2l10.1-1.5l-2.9-19.2l-9.8,1.5L100.7,136c4.9,0,9.3,0.2,12.1,0.5c45.8,3.9,75.6,30.1,99.9,50 c0.3,0.3,0.8,0.7,1.2,1c0.3,0.2,0.7,0.3,0.8,0.5c1.7,1,3.7,1.5,5.7,1.5c5.7,0,10.6-4.2,11.3-9.8l0,0h0.2v-61.1 c9.6,0,17.3-7.7,17.3-17.3C249.4,91.7,241.6,84,232,84z M214.5,166c-35.4-27.1-61.3-42.4-95.8-46.3V83 c34.5-3.9,60.5-19.4,95.8-46.7V166z"></path> </g> </g></svg>
                    Announcements
                </a>
            </nav>
        </div>
        <div class="p-4 border-t border-slate-100 items-center justify-center">
            <div class="p-3 rounded-2xl bg-slate-50 flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl bg-[#005F5B] text-white flex items-center justify-center font-bold text-sm shadow-md">CA</div>
                <div>
                    <p class="text-sm font-bold text-slate-800">{{ $clubName ?: 'Club Admin' }}</p>
                    <p class="text-xs text-slate-500">Administrator</p>
                </div>
            </div>
        </div>
    </aside>
    <div class="pl-64 flex-1">
        <header class="h-16 bg-white border-b border-slate-200 flex items-center justify-between px-8 sticky top-0 z-10">
            <h2 class="text-lg font-black text-[#005F5B]">{{ $clubName }} — Club Admin</h2>
            <div class="flex items-center gap-4">
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
        <main class="p-8 space-y-6">
            @if(session('success'))<div class="p-4 bg-emerald-50 border border-emerald-200 rounded-xl text-emerald-800 text-sm font-semibold">{{ session('success') }}</div>@endif

            {{-- Hero Banner --}}
            <div class="bg-[#005F5B] rounded-3xl p-8 text-white relative overflow-hidden shadow-xl">
                <h2 class="text-3xl font-extrabold tracking-tight">{{ $clubName }} Admin Panel</h2>
                <p class="[#EBF5F4]/80 mt-1 text-sm">Manage events, members, and announcements for your club.</p>
                <a href="{{ route('club.admin.events.create') }}" class="inline-flex items-center gap-2 mt-4 bg-white text-[#005F5B] font-bold text-sm px-5 py-2.5 rounded-xl hover:bg-[#EBF5F4] transition shadow-sm">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
                    </svg>
                    <span>Create Event</span>
                </a>
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
                    <h3 class="font-black text-lg text-[#005F5B]">Recent Events</h3>
                    <a href="{{ route('club.admin.events') }}" class="text-sm font-bold text-[#005F5B] hover:underline">Manage All</a>
                </div>
                <table class="w-full text-sm">
                    <thead><tr class="bg-slate-50 border-b text-xs font-bold uppercase text-black tracking-wider">
                        <th class="py-3 px-5 text-left">Event</th>
                        <th class="py-3 px-5 text-left">Date</th>
                        <th class="py-3 px-5 text-left">Location</th>
                        <th class="py-3 px-5 text-left">Brochure</th>
                        <th class="py-3 px-5 text-left">Status</th>
                    </tr></thead>
                    <tbody class="divide-y divide-slate-100">
                        @forelse($recentEvents as $event)
                        <tr class="hover:bg-slate-50">
                            <td class="py-3.5 px-5 font-bold text-slate-800">{{ $event->title }}</td>
                            <td class="py-3.5 px-5 text-slate-600 text-xs">
                                <div class="text-xs text-slate-600">
                                    {{ \Carbon\Carbon::parse($event->from_date)->format('d M Y') }}
                                    —
                                    {{ \Carbon\Carbon::parse($event->to_date)->format('d M Y') }}
                                </div>
                            </td>
                            <td>{{ $event->location }}</td>
                            <td>
                                @if($event->brochure)
                                    <a href="{{ asset('storage/'.$event->brochure) }}" target="_blank" class="text-[#005F5B] font-semibold hover:underline">View File</a>
                                @else
                                    —
                                @endif
                            </td>
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
