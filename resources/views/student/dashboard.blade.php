@extends('layouts.app')

@section('content')
<div class="flex min-h-screen bg-[#F8FAFC] overflow-x-hidden">
    
    {{-- Sidebar --}}
    <aside class="w-64 bg-white border-r border-slate-200 flex flex-col justify-between fixed h-full z-20 shadow-sm">
        <div class="p-6">
            <div class="flex items-center gap-3 mb-8">
                <div class="bg-[#005F5B] text-white p-2 rounded-xl shadow-md">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 14l9-5-9-5-9 5 9 5z"/>
                    </svg>
                </div>
                <div>
                    <h3 class="font-extrabold text-slate-900 text-[15px] tracking-tight">Student Portal</h3>
                    <p class="text-[11px] text-slate-500 font-medium">EduStream IMS</p>
                </div>
            </div>

            <nav class="space-y-1">
                <a href="{{ route('student.dashboard', ['tab' => 'dashboard']) }}" 
                   class="flex items-center gap-3 px-4 py-3 text-sm font-bold rounded-xl transition-all {{ $currentTab === 'dashboard' ? 'bg-[#EBF5F4] text-[#005F5B]' : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2H6a2 2 0 01-2-2V6z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" d="M14 6a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2h-2a2 2 0 01-2-2V6z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2z"/>
                    </svg>
                    Dashboard
                </a>
                
                <a href="{{ route('student.dashboard', ['tab' => 'academic-records']) }}" 
                   class="flex items-center gap-3 px-4 py-3 text-sm font-bold rounded-xl transition-all {{ $currentTab === 'academic-records' ? 'bg-[#EBF5F4] text-[#005F5B]' : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                    My Records
                </a>

                <a href="{{ route('student.dashboard', ['tab' => 'submissions']) }}" 
                   class="flex items-center gap-3 px-4 py-3 text-sm font-bold rounded-xl transition-all {{ $currentTab === 'submissions' ? 'bg-[#EBF5F4] text-[#005F5B]' : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
                    </svg>
                    New Submission
                </a>

                <a href="{{ route('student.dashboard',['tab'=>'placement']) }}"
                   class="flex items-center gap-3 px-4 py-3 text-sm font-bold rounded-xl transition-all {{ $currentTab === 'placement' ? 'bg-[#EBF5F4] text-[#005F5B]' : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 14l9-5-9-5-9 5 9 5zm0 0v6m-6-3v2a6 6 0 0012 0v-2"/>
                    </svg>
                    Placement
                </a>

                <a href="{{ route('student.dashboard', ['tab' => 'events']) }}"
                   class="flex items-center gap-3 px-4 py-3 text-sm font-bold rounded-xl transition-all {{ $currentTab === 'events' ? 'bg-[#EBF5F4] text-[#005F5B]' : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 8c-1.657 0-3 1.343-3 3v1h6v-1c0-1.657-1.343-3-3-3z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 20a7 7 0 0114 0"/>
                    </svg>
                    Events
                </a>

                <a href="{{ route('student.dashboard', ['tab' => 'help-desk']) }}"
                    class="flex items-center gap-3 px-4 py-3 text-sm font-bold rounded-xl transition-all {{ $currentTab === 'help-desk' ? 'bg-[#EBF5F4] text-[#005F5B]' : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2"viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"d="M18 10c0 3.866-3.582 7-8 7a8.84 8.84 0 01-3-.52L3 18l1.5-3A6.93 6.93 0 012 10c0-3.866 3.582-7 8-7s8 3.134 8 7z"/>
                    </svg>
                    Help Desk
                </a>
            </nav>
        </div>

        <a href="{{ route('student.profile') }}" class="p-4 border-t border-slate-100 m-4 rounded-2xl flex items-center gap-3 bg-slate-50/50 hover:bg-slate-100/70 transition group">
            <div class="w-10 h-10 rounded-xl bg-[#005F5B] text-white flex items-center justify-center font-bold text-sm shadow-md">
                {{ $user->initials() }}
            </div>
            <div class="overflow-hidden">
                <h5 class="text-sm font-bold text-slate-800 truncate group-hover:text-[#005F5B] transition-colors">{{ $user->name }}</h5>
                <p class="text-xs text-slate-500 font-medium truncate">Roll: {{ $user->studentProfile->roll_number ?? 'Not Set' }}</p>
            </div>
        </a>
    </aside>

    {{-- Main Content --}}
    <div class="pl-64 flex-1 flex flex-col min-h-screen overflow-x-hidden box-border">
        
        {{-- Header --}}
        <header class="bg-white border-b border-slate-200/80 sticky top-0 z-10 shadow-sm">
            {{-- Announcement Marquee --}}
            @if($announcements->count() > 0)
            <div class="bg-[#005F5B] text-white py-2 px-4 text-xs font-semibold flex items-center gap-3 overflow-hidden">
                <span class="shrink-0 bg-white/20 text-white px-2 py-0.5 rounded-md font-bold uppercase tracking-wider text-[10px]">📢 Notice</span>
                <div class="overflow-hidden flex-1">
                    <marquee behavior="scroll" direction="left" scrollamount="3" class="w-full">
                        @foreach($announcements as $ann)
                            <span class="cursor-pointer mr-10 hover:underline" onclick="openAnnouncementModal('{{ addslashes($ann->title) }}', '{{ addslashes($ann->content) }}')">
                                @if($ann->type === 'club')
                                    {{ $ann->title }} - {{ $ann->target }}
                                @else
                                    {{ $ann->title }}
                                @endif
                            </span>
                            @if(!$loop->last)<span class="mr-10 opacity-50">•</span>@endif
                        @endforeach
                    </marquee>
                </div>
            </div>
            @endif

            <div class="h-16 flex items-center justify-between px-8">
                <div class="w-80 relative">
                    <input type="text" placeholder="Search records, categories..." class="w-full bg-slate-50 border border-slate-200 rounded-xl pl-10 pr-4 py-2.5 text-sm font-medium text-slate-700 focus:outline-none focus:border-[#005F5B] focus:bg-white transition-all">
                    <svg class="absolute left-3 top-3 w-4 h-4 text-slate-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                </div>
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
            </div>
        </header>

        <main class="flex-1 p-8 w-full overflow-x-hidden box-border">
        <div class="max-w-7xl mx-auto w-full">
            @if(session('success'))
                <div class="mb-6 p-4 bg-emerald-50 border border-emerald-200 rounded-xl text-emerald-800 text-sm font-semibold flex items-center gap-2 shadow-sm">
                    <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                    {{ session('success') }}
                </div>
            @endif
            @if(session('error'))
                <div class="mb-6 p-4 bg-rose-50 border border-rose-200 rounded-xl text-rose-700 text-sm font-semibold">
                    {{ session('error') }}
                </div>
            @endif

            {{-- ── Dashboard Tab ──────────────────────────────────────────── --}}
            @if($currentTab === 'dashboard')
                <div class="space-y-6">
                    {{-- Hero Banner --}}
                    <div class="bg-[#005F5B] rounded-3xl p-8 text-white relative overflow-hidden shadow-xl shadow-[#005F5B]/10">
                        <div class="absolute -top-10 -right-10 w-40 h-40 bg-white/5 rounded-full"></div>
                        <div class="absolute bottom-0 right-20 w-24 h-24 bg-white/5 rounded-full"></div>
                        <h2 class="text-3xl font-extrabold tracking-tight">Welcome back, {{ $user->name }} 👋</h2>
                        <p class="text-[#EBF5F4]/80 text-[14px] mt-1">Manage and submit your academic achievements effortlessly.</p>
                        <div class="flex gap-3 mt-5">
                            <a href="{{ route('student.dashboard', ['tab' => 'submissions']) }}" class="inline-flex items-center gap-2 bg-white text-[#005F5B] font-bold text-sm px-5 py-2.5 rounded-xl hover:bg-[#EBF5F4] transition shadow-sm">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
                                </svg>
                                <span>New Submission</span>
                            </a>
                            <a href="{{ route('student.dashboard', ['tab' => 'academic-records']) }}" class="bg-white/10 text-white font-bold text-sm px-5 py-2.5 rounded-xl hover:bg-white/20 transition border border-white/20">
                                View Records
                            </a>
                        </div>
                    </div>

                    {{-- Stat Cards --}}
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                        <div class="bg-white border border-slate-200 rounded-2xl p-6 shadow-sm hover:shadow-md transition">
                            <div class="flex items-center justify-between mb-3">
                                <p class="text-sm font-bold text-slate-600">Approved Records</p>
                                <div class="p-2 bg-emerald-50 rounded-xl text-emerald-600">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                </div>
                            </div>
                            <h3 class="text-4xl font-black text-slate-900">{{ $approvedCount }}</h3>
                        </div>
                        <div class="bg-white border border-slate-200 rounded-2xl p-6 shadow-sm hover:shadow-md transition">
                            <div class="flex items-center justify-between mb-3">
                                <p class="text-sm font-bold text-slate-600">Pending Review</p>
                                <div class="p-2 bg-amber-50 rounded-xl text-amber-600">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                </div>
                            </div>
                            <h3 class="text-4xl font-black text-slate-900">{{ $pendingCount }}</h3>
                        </div>
                        <div class="bg-white border border-slate-200 rounded-2xl p-6 shadow-sm hover:shadow-md transition">
                            <div class="flex items-center justify-between mb-3">
                                <p class="text-sm font-bold text-slate-600">Sent Back / Rejected</p>
                                <div class="p-2 bg-rose-50 rounded-xl text-rose-600">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                </div>
                            </div>
                            <h3 class="text-4xl font-black text-slate-900">{{ $rejectedCount }}</h3>
                        </div>
                    </div>

                    {{-- Quick Action Cards --}}
                    <div>
                        <h3 class="text-lg font-black text-slate-800 mb-4">Submit an Activity</h3>
                        <div class="grid grid-cols-2 md:grid-cols-5 gap-4">
                            
                            <a href="{{ route('student.dashboard', ['tab' => 'submissions', 'category' => 'Certificate']) }}" 
                               class="group bg-white border border-slate-200 rounded-2xl p-5 flex flex-col items-center gap-3 hover:border-[#005F5B] hover:shadow-lg hover:-translate-y-1 transition-all duration-200 cursor-pointer text-center shadow-sm">
                                <div class="w-12 h-12 bg-blue-50 text-blue-600 rounded-2xl flex items-center justify-center group-hover:bg-[#005F5B] group-hover:text-white transition-all">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/></svg>
                                </div>
                                <p class="text-xs font-bold text-slate-700 group-hover:text-[#005F5B] transition-colors leading-tight">Courses &amp;<br>Workshops</p>
                            </a>

                            <a href="{{ route('student.dashboard', ['tab' => 'submissions', 'category' => 'Competition', 'award_status' => 'Participation']) }}" 
                               class="group bg-white border border-slate-200 rounded-2xl p-5 flex flex-col items-center gap-3 hover:border-[#005F5B] hover:shadow-lg hover:-translate-y-1 transition-all duration-200 cursor-pointer text-center shadow-sm">
                                <div class="w-12 h-12 bg-purple-50 text-purple-600 rounded-2xl flex items-center justify-center group-hover:bg-[#005F5B] group-hover:text-white transition-all">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                </div>
                                <p class="text-xs font-bold text-slate-700 group-hover:text-[#005F5B] transition-colors leading-tight">Event<br>Participation</p>
                            </a>

                            <a href="{{ route('student.dashboard', ['tab' => 'submissions', 'category' => 'Competition', 'award_status' => 'Award']) }}" 
                               class="group bg-white border border-slate-200 rounded-2xl p-5 flex flex-col items-center gap-3 hover:border-[#005F5B] hover:shadow-lg hover:-translate-y-1 transition-all duration-200 cursor-pointer text-center shadow-sm">
                                <div class="w-12 h-12 bg-amber-50 text-amber-600 rounded-2xl flex items-center justify-center group-hover:bg-[#005F5B] group-hover:text-white transition-all">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/></svg>
                                </div>
                                <p class="text-xs font-bold text-slate-700 group-hover:text-[#005F5B] transition-colors leading-tight">Achievement<br>Submission</p>
                            </a>

                            <a href="{{ route('student.dashboard', ['tab' => 'submissions', 'category' => 'Internship']) }}" 
                               class="group bg-white border border-slate-200 rounded-2xl p-5 flex flex-col items-center gap-3 hover:border-[#005F5B] hover:shadow-lg hover:-translate-y-1 transition-all duration-200 cursor-pointer text-center shadow-sm">
                                <div class="w-12 h-12 bg-green-50 text-green-600 rounded-2xl flex items-center justify-center group-hover:bg-[#005F5B] group-hover:text-white transition-all">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                                </div>
                                <p class="text-xs font-bold text-slate-700 group-hover:text-[#005F5B] transition-colors leading-tight">Internship<br>Submission</p>
                            </a>

                            <a href="{{ route('student.dashboard', ['tab' => 'submissions', 'category' => 'Paper Publication']) }}" 
                               class="group bg-white border border-slate-200 rounded-2xl p-5 flex flex-col items-center gap-3 hover:border-[#005F5B] hover:shadow-lg hover:-translate-y-1 transition-all duration-200 cursor-pointer text-center shadow-sm">
                                <div class="w-12 h-12 bg-rose-50 text-rose-600 rounded-2xl flex items-center justify-center group-hover:bg-[#005F5B] group-hover:text-white transition-all">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                                </div>
                                <p class="text-xs font-bold text-slate-700 group-hover:text-[#005F5B] transition-colors leading-tight">Paper<br>Publication</p>
                            </a>

                        </div>
                    </div>
                </div>

            {{-- ── Events Tab ───────────────────────────────────────────── --}}                
            @elseif($currentTab === 'events')
            <div class="space-y-6">
                <div class="space-y-4">
                    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                        <div>
                            <h1 class="text-2xl font-black text-[#005F5B] tracking-tight">All Club Events</h1>
                            <p class="text-slate-500 mt-2">Browse and participate in events from every club.</p>
                        </div>
                        <div class="flex items-center gap-3">
                            <span class="text-sm text-slate-500">Showing {{ $events->count() }} events</span>
                        </div>
                    </div>

                    <form method="GET" action="{{ route('student.dashboard') }}" class="flex flex-wrap items-end gap-4">
                        <input type="hidden" name="tab" value="events">
                        <div class="min-w-[300px] flex-1">
                            <label class="block text-sm font-semibold text-slate-700 mb-2">Club Filter</label>
                            <select name="club" class="w-full h-12 bg-white border border-slate-300 rounded-xl px-4 text-sm font-medium text-slate-700 focus:outline-none focus:ring-2 focus:ring-[#005F5B] focus:border-[#005F5B] transition">
                                <option value="">All Clubs</option>
                                @foreach($clubNames as $clubName)
                                    <option value="{{ $clubName }}" {{ $selectedClub === $clubName ? 'selected' : '' }}>{{ $clubName }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="flex gap-3">
                            <button type="submit" class="h-12 px-6 rounded-xl bg-[#005F5B] text-white text-sm font-semibold hover:bg-[#004845] transition">Filter</button>
                            <a href="{{ route('student.dashboard', ['tab' => 'events']) }}" class="h-12 px-6 rounded-xl border border-slate-300 bg-white text-slate-700 text-sm font-semibold hover:bg-slate-50 transition flex items-center justify-center">Reset</a>
                        </div>
                        @if($selectedClub)
                            <div class="flex items-center h-12 text-sm text-slate-600 font-medium">Showing events for <span class="font-semibold text-slate-900">{{ $selectedClub }}</span>.</div>
                        @endif
                    </form>
                </div>

                @if($events->isEmpty())
                <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-10 text-center">
                    <div class="text-6xl mb-4">🎉</div>
                    <h2 class="text-xl font-bold text-slate-800">No events available right now</h2>
                    <p class="text-slate-500 mt-2">Check back later for upcoming club events and participation opportunities.</p>
                </div>
                @else
                <div class="grid grid-cols-1 xl:grid-cols-2 gap-6">
                    @foreach($events as $event)
                    <div class="bg-white border border-slate-200 rounded-3xl p-6 shadow-sm hover:shadow-md transition">
                        @if($event->event_banner)
                        <img src="{{ asset('storage/' . ltrim($event->event_banner, '/')) }}" alt="{{ $event->title }}" class="h-48 w-full rounded-3xl object-cover mb-5">
                        @endif
                        <div class="mb-4">
                            <p class="text-lg uppercase tracking-[0.1em] text-[#005F5B] underline">{{ $event->club?->name ?? $event->club_name }}</p>
                            <h3 class="font-black text-slate-900 text-lg mt-1">{{ $event->title }}</h3>
                            <p class="text-sm text-slate-600 mt-3 line-clamp-3">{{ $event->description }}</p>
                        </div>
                        <div class="grid gap-3 grid-cols-2 text-sm text-slate-600">
                            <div>
                                <p class="font-bold text-slate-800">Date</p>
                                <p class="mt-1">{{ $event->from_date ? \Carbon\Carbon::parse($event->from_date)->format('M d, Y') : 'TBD' }}@if($event->to_date) – {{ \Carbon\Carbon::parse($event->to_date)->format('M d, Y') }}@endif</p>
                            </div>
                            <div>
                                <p class="font-bold text-slate-800">Time</p>
                                <p class="mt-1">{{ $event->start_time ? \Carbon\Carbon::parse($event->start_time)->format('g:i A') : 'TBD' }} – {{ $event->end_time ? \Carbon\Carbon::parse($event->end_time)->format('g:i A') : 'TBD' }}</p>
                            </div>
                            <div>
                                <p class="font-bold text-slate-800">Venue</p>
                                <p class="mt-1">{{ $event->venue ?? $event->location ?? 'TBD' }}</p>
                            </div>
                            <div>
                                <p class="font-bold text-slate-800">Category</p>
                                <p class="mt-1">{{ $event->event_category ?? 'General' }}</p>
                            </div>
                            <div>
                                <p class="font-bold text-slate-800">Registration Deadline</p>
                                <p class="mt-1">{{ $event->registration_deadline ? \Carbon\Carbon::parse($event->registration_deadline)->format('M d, Y') : 'Open until start' }}</p>
                            </div>
                            <div>
                                <p class="font-bold text-slate-800">Organizer</p>
                                <p class="mt-1">{{ $event->organizer ?? 'TBD' }}</p>
                            </div>
                            <div>
                                <p class="font-bold text-slate-800">Available Seats</p>
                                <p class="mt-1">{{ $event->max_participants ? max(0, $event->max_participants - ($event->registrations_count ?? 0)) : 'Unlimited' }}</p>
                            </div>
                            <div>
                                <p class="font-bold text-slate-800">Registration Status</p>
                                <p class="mt-1">{{ $event->registration_status ?? 'Open' }}</p>
                            </div>
                        </div>
                        <div class="mt-5 flex flex-wrap items-center justify-between gap-3">
                            @php
                                $registration = $event->registrations->first();
                                $isRegistered = !is_null($registration);
                                $full = $event->max_participants && ($event->registrations_count ?? 0) >= $event->max_participants;
                                $deadlinePassed = $event->registration_deadline && \Carbon\Carbon::parse($event->registration_deadline)->isPast();
                                $registrationClosed = ($event->registration_status ?? 'Open') === 'Closed';
                            @endphp
                            <div>
                                <span class="px-3 py-1 rounded-full text-xs font-bold {{ $event->status === 'Completed' ? 'bg-slate-100 text-slate-700' : ($event->status === 'Scheduled' && $deadlinePassed ? 'bg-amber-100 text-amber-700' : 'bg-emerald-100 text-emerald-700') }}">{{ $event->status }}</span>
                            </div>
                            <div class="flex items-center gap-2">
                                @if($isRegistered)
                                <span class="rounded-2xl bg-emerald-50 px-4 py-2 text-xs font-bold text-emerald-700">Registered</span>
                                @elseif($event->status === 'Scheduled' && !$full && !$deadlinePassed && !$registrationClosed)
                                <form method="POST" action="{{ route('student.events.register', $event) }}">
                                    @csrf
                                    <button type="submit" class="rounded-2xl bg-[#005F5B] px-4 py-2 text-xs font-bold text-white hover:bg-[#004845] transition">Participate</button>
                                </form>
                                @elseif($full)
                                <span class="rounded-2xl bg-rose-50 px-4 py-2 text-xs font-bold text-rose-700">Full</span>
                                @elseif($registrationClosed)
                                <span class="rounded-2xl bg-amber-50 px-4 py-2 text-xs font-bold text-amber-700">Registration Closed</span>
                                @else
                                <span class="rounded-2xl bg-slate-100 px-4 py-2 text-xs font-bold text-slate-600">Closed</span>
                                @endif
                            </div>
                        </div>
                        @if($isRegistered)
                        <div class="mt-4 grid grid-cols-1 md:grid-cols-3 gap-3 text-sm text-slate-700">
                            <div class="bg-slate-50 border border-slate-200 rounded-2xl p-4">
                                <p class="text-xs font-semibold uppercase tracking-[0.18em] text-slate-500">Registration Status</p>
                                <p class="mt-2 font-bold text-slate-900">{{ $registration->status }}</p>
                            </div>
                            <div class="bg-slate-50 border border-slate-200 rounded-2xl p-4">
                                <p class="text-xs font-semibold uppercase tracking-[0.18em] text-slate-500">Attendance</p>
                                <p class="mt-2 font-bold text-slate-900">{{ $registration->attendance ?? 'Pending' }}</p>
                            </div>
                            <div class="bg-slate-50 border border-slate-200 rounded-2xl p-4">
                                <p class="text-xs font-semibold uppercase tracking-[0.18em] text-slate-500">Certificate</p>
                                @if($registration->certificate_path)
                                    <a href="{{ asset('storage/' . ltrim($registration->certificate_path, '/')) }}" target="_blank" class="mt-2 inline-flex items-center gap-2 text-[#005F5B] font-bold text-sm hover:underline">View Certificate</a>
                                @else
                                    <p class="mt-2 font-bold text-slate-900">Pending</p>
                                @endif
                            </div>
                        </div>
                        @endif
                    </div>
                    @endforeach
                </div>
                @endif
            </div>

            {{-- ── Help Records Tab ─────────────────────────────────────── --}}                
            @elseif($currentTab === 'help-desk')
            <div class="space-y-6">
                <div class="flex justify-between items-center">
                    <div>
                        <h1 class="text-2xl font-black text-[#005F5B] tracking-tight">Help Desk</h1>   
                        <p class="text-slate-500 mt-2">
                            Raise support tickets and track your requests.
                        </p>
                    </div>
                    <button onclick="document.getElementById('ticketModal').classList.remove('hidden')" class="bg-[#005F5B] text-white font-bold text-sm px-5 py-2.5 rounded-xl hover:bg-[#004845] shadow-md transition flex items-center gap-1.5">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
                        Raise Ticket
                    </button>
                </div>
                <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-10 text-center">
                    <div class="text-6xl mb-4">🎟️</div>
                    <h2 class="text-xl font-bold text-slate-800">
                        No Help Desk Tickets Yet
                    </h2>
                    <p class="text-slate-500 mt-2">
                        When you raise a support ticket, it will appear here.
                    </p>
                </div>
            </div>

            {{-- ── Placement Tab ─────────────────────────────────────── --}}
            @elseif($currentTab === 'placement')

            <div class="flex justify-between items-center mb-6">
                <div>
                    <h1 class="text-2xl font-black text-[#005F5B]">Placement Opportunities</h1>
                    <p class="text-sm text-slate-500 mt-1">Apply for available campus placement drives.</p>
                </div>
                <div class="bg-[#EBF5F4] text-[#005F5B] px-4 py-2 rounded-xl font-bold">
                    Open Drives: {{ $jobs->count() }}
                </div>
            </div>

            @if($jobs->isEmpty())

            <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-10 text-center">
                <div class="text-6xl mb-4">💼</div>
                <h2 class="text-xl font-bold text-slate-800">No Placement Drives Available</h2>
                <p class="text-slate-500 mt-2">New opportunities will appear here.</p>
            </div>

            @else

            <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
                <table class="w-full">
                    <thead class="bg-slate-50 border-b">
                        <tr class="text-xs uppercase font-bold tracking-wider text-black">
                            <th class="px-6 py-4 text-left">Company</th>
                            <th class="px-6 py-4 text-left">Position</th>
                            <th class="px-6 py-4 text-left">Type</th>
                            <th class="px-6 py-4 text-center">CGPA</th>
                            <th class="px-6 py-4 text-center">Drive Date</th>
                            <th class="px-6 py-4 text-center">Status</th>
                            <th class="px-6 py-4 text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @foreach($jobs as $job)
                        <tr class="hover:bg-slate-50">
                            <td class="px-6 py-5">
                                <div class="font-bold text-slate-800">{{ $job->company_name }}</div>
                            </td>
                            <td class="px-6 py-5">{{ $job->job_title }}</td>
                            <td class="px-6 py-5">
                                <span class="px-3 py-1 rounded-full bg-blue-100 text-blue-700 text-xs font-bold">{{ $job->type }}</span>
                            </td>
                            <td class="px-6 py-5 text-center">{{ $job->eligibility_cgpa }}</td>
                            <td class="px-6 py-5 text-center">{{ \Carbon\Carbon::parse($job->drive_date)->format('d M Y') }}</td>
                            <td class="px-6 py-5 text-center">
                                @if(isset($applications[$job->id]))
                                @php
                                    $status = $applications[$job->id];
                                @endphp
                                <span class="px-4 py-1 rounded-full text-xs font-bold
                                    @if($status=='Applied') bg-blue-100 text-blue-700
                                    @elseif($status=='Shortlisted') bg-yellow-100 text-yellow-700
                                    @elseif($status=='Interviewing') bg-purple-100 text-purple-700
                                    @elseif($status=='Selected') bg-green-100 text-green-700
                                    @elseif($status=='Rejected') bg-red-100 text-red-700
                                    @endif">{{ $status }}</span>
                                @else
                                <span class="text-slate-400 text-sm">Not Applied</span>
                                @endif
                            </td>
                            <td class="px-6 py-5 text-center">
                                @if(isset($applications[$job->id]))
                                <button disabled class="bg-slate-300 text-white px-4 py-1 rounded-lg cursor-not-allowed">Applied</button>
                                @else
                                <form action="{{ route('student.jobs.apply',$job) }}" method="POST">
                                    @csrf
                                    <button class="bg-[#005F5B] hover:bg-[#004845] text-white px-4 py-1 rounded-lg font-semibold transition">Apply</button>
                                </form>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif

        {{-- ── Academic Records Tab ─────────────────────────────────────── --}}
        @elseif($currentTab === 'academic-records')
                <div class="space-y-6">
                    <div class="w-full flex justify-between items-center">
                        <div>
                            <h1 class="text-2xl font-black text-[#005F5B] tracking-tight">My Achievements</h1>
                            <p class="text-sm text-slate-600 font-medium mt-1">Track and validate your institutional milestones.</p>
                        </div>
                        <div class="flex justify-between items-center gap-3">
                            <div class="relative group">
                                <button class="border border-slate-200 text-slate-700 font-bold text-sm px-4 py-2.5 rounded-xl bg-white hover:bg-slate-50 transition shadow-sm flex items-center gap-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                                    Export
                                </button>
                                <div class="hidden group-hover:flex absolute right-0 top-full mt-1 flex-col bg-white border border-slate-200 rounded-xl shadow-xl overflow-hidden z-20 w-36">
                                    <a href="{{ route('student.export', ['format' => 'csv']) }}" class="px-4 py-2.5 text-sm font-semibold text-slate-700 hover:bg-[#EBF5F4] hover:text-[#005F5B] transition">📊 CSV</a>
                                    <a href="{{ route('student.export', ['format' => 'pdf']) }}" class="px-4 py-2.5 text-sm font-semibold text-slate-700 hover:bg-[#EBF5F4] hover:text-[#005F5B] transition">📄 PDF</a>
                                    <a href="{{ route('student.export', ['format' => 'excel']) }}" class="px-4 py-2.5 text-sm font-semibold text-slate-700 hover:bg-[#EBF5F4] hover:text-[#005F5B] transition">📑 Excel</a>
                                </div>
                            </div>
                            <a href="{{ route('student.dashboard', ['tab' => 'submissions']) }}" class="bg-[#005F5B] text-white font-bold text-sm px-5 py-2.5 rounded-xl hover:bg-[#004845] shadow-md transition flex items-center gap-1.5">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
                                Add New
                            </a>
                        </div>
                    </div>

                    <div class="rounded-2xl border border-slate-200 shadow-sm bg-white">
                        <div class="overflow-x-auto">
                        <table class="w-full min-w-full">
                            <thead>
                                <tr class="border-b text-xs font-bold uppercase text-black bg-slate-50/60 tracking-wider">
                                    <th class="py-4 px-6">Academic Year</th>
                                    <th class="py-4 px-6">Student Name</th>
                                    <th class="py-4 px-6">Roll No.</th>
                                    <th class="py-4 px-6">Branch</th>
                                    <th class="py-4 px-6 ">Divison</th>
                                    <th class="py-4 px-6">Semester</th>
                                    <th class="py-4 px-6">Category</th>
                                    <th class="py-4 px-6">Event Name</th>
                                    <th class="py-4 px-6">Organization Name</th>
                                    <th class="py-4 px-6">From Date</th>
                                    <th class="py-4 px-6">To Date</th>
                                    <th class="py-4 px-6">Award/Participation</th>
                                    <th class="py-4 px-6">Status</th>
                                    <th class="py-4 px-6 ">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100 font-medium">
                            @forelse($achievements as $achievement)
                                <tr class="hover:bg-slate-50/30 transition">
                                    <td class="py-4 px-6 text-sm">{{ $achievement->academic_year }}</td>
                                    <td class="py-4 px-6 text-sm">{{ $user->name }}</td>
                                    <td class="py-4 px-6 text-sm">{{ $user->studentProfile->roll_number ?? '-' }}</td>
                                    <td class="py-4 px-6 text-sm">{{ $user->studentProfile->branch ?? '-' }}</td>
                                    <td class="py-4 px-6 text-sm">{{ $achievement->division }}</td>
                                    <td class="py-4 px-6 text-sm">{{ $achievement->semester }}</td>
                                    <td class="py-4 px-6 text-sm">{{ $achievement->category }}</td>
                                    <td class="py-4 px-6 text-sm">{{ $achievement->event_name }}</td>
                                    <td class="py-4 px-6 text-sm">{{ $achievement->organization_name }}</td>
                                    <td class="py-4 px-6 text-sm">{{ $achievement->from_date }}</td>
                                    <td class="py-4 px-6 text-sm">{{ $achievement->to_date   }}</td>
                                    <td class="py-4 px-6 text-sm">{{ $achievement->award_status }}</td>
                                    <td class="py-4 px-6">
                                        @if($achievement->status == 'Approved')
                                            <span class="px-3 py-1 rounded-full bg-green-100 text-green-700 text-xs font-bold">
                                                Approved
                                            </span>

                                        @elseif($achievement->status == 'Pending')
                                            <span class="px-3 py-1 rounded-full bg-yellow-100 text-yellow-700 text-xs font-bold">
                                                Pending
                                            </span>

                                        @else
                                            <span class="px-3 py-1 rounded-full bg-red-100 text-red-700 text-xs font-bold">
                                                Rejected
                                            </span>
                                        @endif
                                    </td>
                                    <td class="py-4 px-6">
                                        <button onclick='openDetailsModal(@json($achievement))' class="px-3 py-1 bg-[#005F5B] text-white rounded-lg text-xs hover:bg-[#004845]">
                                            View
                                        </button>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="15" class="py-10 text-center text-gray-500">
                                        No submissions yet. Use the quick actions above to get started!
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>

            {{-- ── Submissions Tab ──────────────────────────────────────────── --}}
            @elseif($currentTab === 'submissions')
                <div class="max-w-7xl mx-auto bg-white border border-slate-200 rounded-3xl shadow-xl overflow-hidden">
                    <div class="p-6 border-b border-slate-100 flex justify-between items-center bg-slate-50/50">
                        <div>
                            <h2 class="text-xl font-black text-[#005F5B]">New Submission</h2>
                            <p class="text-xs text-slate-500 font-semibold mt-0.5">Fill in all details and upload your proof document.</p>
                        </div>
                        <a href="{{ route('student.dashboard', ['tab' => 'academic-records']) }}" class="text-slate-500 hover:text-slate-700 text-sm font-bold p-2 bg-white rounded-full border shadow-sm transition">✕</a>
                    </div>

                    <form action="{{ route('student.achievement.store') }}" method="POST" enctype="multipart/form-data" class="p-8 space-y-7">
                        @csrf

                        @if($errors->any())
                            <div class="p-4 bg-rose-50 border border-rose-200 rounded-xl text-rose-700 text-sm font-semibold">
                                <ul class="list-disc list-inside space-y-1">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        {{-- Category --}}
                        <div>
                            <label class="block text-xs font-bold text-slate-700 uppercase tracking-wide mb-3">Select Category *</label>
                            <div class="grid grid-cols-2 sm:grid-cols-5 gap-3">
                                @foreach([
                                    'Certificate'       => ['label' => 'Courses & Workshops', 'sub' => 'External Certifications'],
                                    'Event Participation'=> ['label' => 'Event Participation', 'sub' => 'Events & Fests'],
                                    'Competition'       => ['label' => 'Achievement', 'sub' => 'Sports & Competitions'],
                                    'Internship'        => ['label' => 'Internship', 'sub' => 'Industry Experience'],
                                    'Paper Publication' => ['label' => 'Paper Publication', 'sub' => 'Research & Journals'],
                                ] as $catValue => $catInfo)
                                    <label class="cursor-pointer">
                                        <input type="radio" name="category" value="{{ $catValue }}" class="sr-only peer" {{ ($preCategory === $catValue || old('category') === $catValue) ? 'checked' : '' }}>
                                        <div class="border border-slate-200 rounded-xl p-3 text-left bg-white peer-checked:border-[#005F5B] peer-checked:bg-[#EBF5F4] peer-checked:text-[#005F5B] transition-all hover:bg-slate-50">
                                            <h5 class="text-xs font-bold tracking-tight">{{ $catInfo['label'] }}</h5>
                                            <p class="text-[10px] opacity-60 font-medium mt-0.5">{{ $catInfo['sub'] }}</p>
                                        </div>
                                    </label>
                                @endforeach
                            </div>
                        </div>

                        {{-- Student Information --}}
                        <div>
                            <h3 class="text-xs font-black text-[#005F5B] uppercase tracking-widest mb-3 pb-2 border-b border-slate-100">Student Information</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-xs font-bold text-slate-700 mb-1.5">Academic Year</label>
                                    <input type="text" name="academic_year" value="{{ old('academic_year') }}" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm font-medium text-slate-800 focus:outline-none focus:border-[#005F5B] focus:bg-white transition-all" placeholder="e.g. 2024–2025">
                                </div>
                                <div>
                                    <label class="block text-xs font-bold text-slate-700 mb-1.5">Student Name *</label>
                                    <input type="text" name="title" required value="{{ old('title') }}" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm font-medium text-slate-800 focus:outline-none focus:border-[#005F5B] focus:bg-white transition-all" placeholder="Name">
                                </div>
                                <div>
                                    <label class="block text-xs font-bold text-slate-700 mb-1.5">Roll Number</label>
                                    <input type="text" value="{{ optional($user->studentProfile)->roll_number ?? '' }}" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm font-medium text-slate-500 focus:outline-none transition-all" readonly>
                                </div>
                                <div>
                                    <label class="block text-xs font-bold text-slate-700 mb-1.5">Branch</label>
                                    <input type="text" value="{{ optional($user->studentProfile)->branch ?? '' }}" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm font-medium text-slate-500 focus:outline-none transition-all" readonly>
                                </div>
                                <div>
                                    <label class="block text-xs font-bold text-slate-700 mb-1.5">Division</label>
                                    <input type="text" name="division" value="{{ old('division') }}" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm font-medium text-slate-800 focus:outline-none focus:border-[#005F5B] focus:bg-white transition-all" placeholder="e.g. A / B / C">
                                </div>
                                <div>
                                    <label class="block text-xs font-bold text-slate-700 mb-1.5">Year / Semester</label>
                                    <div class="flex gap-2">
                                        <select name="semester" class="flex-1 bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm font-medium text-slate-800 focus:outline-none focus:border-[#005F5B] focus:bg-white transition-all">
                                            <option value="">Select Semester</option>
                                            @foreach(['I','II','III','IV','V','VI','VII','VIII'] as $sem)
                                                <option value="{{ $sem }}" {{ old('semester') === $sem ? 'selected' : '' }}>Sem {{ $sem }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Date Details --}}
                        <div>
                            <h3 class="text-xs font-black text-[#005F5B] uppercase tracking-widest mb-3 pb-2 border-b border-slate-100">Date Details</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-xs font-bold text-slate-700 mb-1.5">From Date</label>
                                    <input type="date" name="from_date" value="{{ old('from_date') }}" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm font-medium text-slate-800 focus:outline-none focus:border-[#005F5B] focus:bg-white transition-all">
                                </div>
                                <div>
                                    <label class="block text-xs font-bold text-slate-700 mb-1.5">To Date</label>
                                    <input type="date" name="to_date" value="{{ old('to_date') }}" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm font-medium text-slate-800 focus:outline-none focus:border-[#005F5B] focus:bg-white transition-all">
                                </div>
                            </div>
                        </div>

                        {{-- Additional Information --}}
                        <div>
                            <h3 class="text-xs font-black text-[#005F5B] uppercase tracking-widest mb-3 pb-2 border-b border-slate-100">Additional Information</h3>
                            <div class="space-y-4">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-xs font-bold text-slate-700 mb-1.5">Organization Name</label>
                                        <input type="text" name="organization_name" value="{{ old('organization_name') }}" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm font-medium text-slate-800 focus:outline-none focus:border-[#005F5B] focus:bg-white transition-all" placeholder="Issuing organization or company">
                                    </div>
                                    <div>
                                        <label class="block text-xs font-bold text-slate-700 mb-1.5">Event Name</label>
                                        <input type="text" name="event_name" value="{{ old('event_name') }}" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm font-medium text-slate-800 focus:outline-none focus:border-[#005F5B] focus:bg-white transition-all" placeholder="Name of event or competition">
                                    </div>
                                </div>
                                <div>
                                    <label class="block text-xs font-bold text-slate-700 mb-2">Award / Participation Status</label>
                                    <div class="flex gap-4">
                                        <label class="flex items-center gap-2 cursor-pointer">
                                            <input type="radio" name="award_status" value="Award" class="w-4 h-4 text-[#005F5B] border-slate-300 focus:ring-[#005F5B]" {{ $preAwardStatus === 'Award' ? 'checked' : '' }}>
                                            <span class="text-sm font-semibold text-slate-700">🏆 Award / Winner</span>
                                        </label>
                                        <label class="flex items-center gap-2 cursor-pointer">
                                            <input type="radio" name="award_status" value="Participation" class="w-4 h-4 text-[#005F5B] border-slate-300 focus:ring-[#005F5B]" {{ $preAwardStatus === 'Participation' ? 'checked' : '' }}>
                                            <span class="text-sm font-semibold text-slate-700">🎟️ Participation</span>
                                        </label>
                                    </div>
                                </div>
                                <div>
                                    <label class="block text-xs font-bold text-slate-700 mb-1.5">Description *</label>
                                    <textarea name="description" required rows="3" class="w-full bg-slate-50 border border-slate-200 rounded-xl p-4 text-sm font-medium text-slate-800 focus:outline-none focus:border-[#005F5B] focus:bg-white transition-all" placeholder="Provide context, scope, and learning outcomes...">{{ old('description') }}</textarea>
                                </div>
                                <div>
                                    <label class="block text-xs font-bold text-slate-700 mb-1.5">Remarks</label>
                                    <textarea name="remarks" rows="2" class="w-full bg-slate-50 border border-slate-200 rounded-xl p-4 text-sm font-medium text-slate-800 focus:outline-none focus:border-[#005F5B] focus:bg-white transition-all" placeholder="Any additional remarks or notes...">{{ old('remarks') }}</textarea>
                                </div>
                            </div>
                        </div>

                        {{-- File Upload --}}
                        <div>
                            <label class="block text-xs font-bold text-slate-700 uppercase tracking-wide mb-2">Upload Proof (PDF or Image) *</label>
                            <div class="border-2 border-dashed border-slate-200 rounded-2xl p-8 text-center bg-slate-50/30 relative hover:bg-slate-50/70 transition-all cursor-pointer group">
                                <input type="file" name="file" required accept=".pdf,.jpg,.jpeg,.png" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10" id="file-upload">
                                <div class="space-y-2">
                                    <div class="text-3xl text-slate-400 group-hover:scale-110 group-hover:text-[#005F5B] transition-all duration-200">📤</div>
                                    <p class="text-sm font-bold text-slate-700">Click to upload or drag and drop</p>
                                    <p class="text-xs text-slate-500 font-semibold">Supported: PDF, PNG, JPG up to 10MB</p>
                                    <p id="file-name-display" class="text-xs text-[#005F5B] font-bold hidden"></p>
                                </div>
                            </div>
                        </div>

                        {{-- Declaration --}}
                        <div class="flex items-start gap-3 bg-slate-50 p-4 rounded-xl border border-slate-100">
                            <input type="checkbox" required id="certify" class="w-4 h-4 rounded text-[#005F5B] border-slate-300 focus:ring-[#005F5B] mt-0.5">
                            <label for="certify" class="text-xs font-semibold text-slate-600 select-none cursor-pointer leading-relaxed">
                                I hereby declare that all the details and documents uploaded above are genuine. Any discrepancy may result in rejection of credentials.
                            </label>
                        </div>

                        <div class="border-t pt-5 flex justify-end gap-3">
                            <a href="{{ route('student.dashboard', ['tab' => 'academic-records']) }}" class="px-5 py-2.5 border border-slate-200 rounded-xl text-sm font-bold text-slate-700 hover:bg-slate-50 transition shadow-sm">Discard</a>
                            <button type="submit" class="px-6 py-2.5 bg-[#005F5B] text-white rounded-xl text-sm font-bold hover:bg-[#004845] transition shadow-md shadow-[#005F5B]/10 flex items-center gap-2">
                                Submit for Review <span>&rarr;</span>
                            </button>
                        </div>
                    </form>
                </div>
            @endif
        </div>
        </main>
    </div>
</div>

{{-- Details Modal --}}
<div id="details-modal" class="fixed inset-0 z-50 hidden bg-slate-900/40 backdrop-blur-sm flex items-center justify-center p-4">
    <div class="bg-white rounded-3xl border border-slate-200 max-w-2xl w-full shadow-2xl overflow-hidden">
        <div class="p-6 border-b border-slate-100 flex justify-between items-center bg-slate-50/50">
            <div>
                <h3 class="text-lg font-black text-slate-900">Achievement Details</h3>
                <p id="modal-date" class="text-xs text-slate-500 font-semibold mt-0.5"></p>
            </div>
            <button onclick="closeDetailsModal()" class="text-slate-400 hover:text-slate-700 text-sm font-bold p-2 bg-white rounded-full border shadow-sm transition">✕</button>
        </div>
        <div class="p-6 space-y-5 max-h-[70vh] overflow-y-auto">
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <span class="block text-[10px] text-slate-500 uppercase font-bold tracking-wider">Category</span>
                    <span id="modal-category" class="inline-block bg-[#EBF5F4] text-[#005F5B] font-extrabold text-xs px-2.5 py-1 rounded-md mt-1"></span>
                </div>
                <div>
                    <span class="block text-[10px] text-slate-500 uppercase font-bold tracking-wider">Status</span>
                    <span id="modal-status" class="inline-block mt-1 px-2.5 py-1 rounded-full text-xs font-bold"></span>
                </div>
            </div>
            <div>
                <span class="block text-[10px] text-slate-500 uppercase font-bold tracking-wider mb-1">Title</span>
                <h4 id="modal-title" class="text-base font-bold text-slate-800 leading-snug"></h4>
            </div>
            <div id="modal-org-section" class="grid grid-cols-2 gap-4">
                <div>
                    <span class="block text-[10px] text-slate-500 uppercase font-bold tracking-wider">Organization</span>
                    <p id="modal-org" class="text-sm font-semibold text-slate-700 mt-1"></p>
                </div>
                <div>
                    <span class="block text-[10px] text-slate-500 uppercase font-bold tracking-wider">Event</span>
                    <p id="modal-event" class="text-sm font-semibold text-slate-700 mt-1"></p>
                </div>
            </div>
            <div>
                <span class="block text-[10px] text-slate-500 uppercase font-bold tracking-wider mb-1">Description</span>
                <p id="modal-description" class="text-sm text-slate-700 font-medium leading-relaxed bg-slate-50 p-4 rounded-xl border border-slate-100 whitespace-pre-line"></p>
            </div>
            <div id="modal-remarks-section">
                <span class="block text-[10px] text-slate-500 uppercase font-bold tracking-wider mb-1">Faculty Remarks</span>
                <p id="modal-remarks" class="text-sm text-amber-700 font-medium leading-relaxed bg-amber-50/50 p-4 rounded-xl border border-amber-100 whitespace-pre-line"></p>
            </div>
            <div class="border-t pt-4 flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <span class="text-2xl">📄</span>
                    <div>
                        <span class="block text-[10px] text-slate-500 uppercase font-bold tracking-wider">Attached File</span>
                        <a id="modal-file-link" href="#" target="_blank" class="text-sm font-bold text-[#005F5B] hover:underline truncate block max-w-xs"></a>
                    </div>
                </div>
                <div class="flex gap-2">
                    <a id="modal-file-view" href="#" target="_blank" class="px-4 py-2 border border-slate-200 rounded-xl text-xs font-bold text-slate-700 hover:bg-slate-50 transition">View</a>
                    <a id="modal-file-download" href="#" download class="px-4 py-2 bg-[#005F5B] text-white rounded-xl text-xs font-bold">Download</a>
                    <form id="delete-achievement-form" method="POST">
                        @csrf
                        @method('DELETE')
                        <button id="delete-achievement-btn" type="submit" onclick="return confirm('Delete this achievement?')" class="hidden px-4 py-2 bg-red-600 text-white rounded-xl text-xs font-bold hover:bg-red-700">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Announcement Modal --}}
<div id="announcement-modal" class="fixed inset-0 z-50 hidden bg-slate-900/40 backdrop-blur-sm flex items-center justify-center p-4">
    <div class="bg-white rounded-3xl border border-slate-200 max-w-xl w-full shadow-2xl overflow-hidden">
        <div class="p-6 border-b border-slate-100 flex justify-between items-center bg-[#005F5B] text-white">
            <h3 class="text-lg font-black">📢 Announcement</h3>
            <button onclick="closeAnnouncementModal()" class="text-white/70 hover:text-white p-2 rounded-full transition">✕</button>
        </div>
        <div class="p-6 space-y-3">
            <h4 id="ann-modal-title" class="text-xl font-black text-slate-900"></h4>
            <p id="ann-modal-content" class="text-sm text-slate-700 font-medium leading-relaxed whitespace-pre-line"></p>
        </div>
    </div>
</div>

{{-- Help Desk Ticket Modal --}}
<div id="ticketModal"
class="hidden fixed inset-0 bg-black/50 flex justify-center items-center z-50">
    <div class="bg-white rounded-2xl w-full max-w-2xl p-6">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold">Raise Help Desk Ticket</h2>
            <button
            onclick="document.getElementById('ticketModal').classList.add('hidden')"
            class="text-xl">
                ✕
            </button>
        </div>
        <form action="{{ route('student.helpdesk.store') }}"
              method="POST"
              enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label class="font-semibold">Category</label>
                <select
                    name="category"
                    class="w-full border rounded-lg p-3 mt-2">
                    <option>Technical</option>
                    <option>Academics</option>
                    <option>Submission</option>
                    <option>Account</option>
                    <option>Other</option>
                </select>
            </div>
            <div class="mb-4">
                <label class="font-semibold">Subject</label>
                <input
                    type="text"
                    name="subject"
                    class="w-full border rounded-lg p-3 mt-2">
            </div>
            <div class="mb-4">
                <label class="font-semibold">Description</label>
                <textarea
                    name="description"
                    rows="5"
                    class="w-full border rounded-lg p-3 mt-2"></textarea>
            </div>
            <div class="mb-4">
                <label class="font-semibold">Attachment</label>
                <input
                    type="file"
                    name="attachment"
                    class="mt-2">
            </div>
            <div class="flex justify-end gap-3">
                <button
                    type="button"
                    onclick="document.getElementById('ticketModal').classList.add('hidden')"
                    class="px-5 py-2 border rounded-lg">
                    Cancel
                </button>
                <button
                    type="submit"
                    class="bg-[#005F5B] text-white px-6 py-2 rounded-lg">
                    Submit Ticket
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    // File upload name display
    document.getElementById('file-upload')?.addEventListener('change', function() {
        const display = document.getElementById('file-name-display');
        if (this.files.length > 0) {
            display.textContent = '✓ ' + this.files[0].name;
            display.classList.remove('hidden');
        }
    });

    function openDetailsModal(achievement) {
        const deleteBtn = document.getElementById('delete-achievement-btn');
        const deleteForm = document.getElementById('delete-achievement-form');
        deleteForm.action = "{{ url('student/achievement') }}/" + achievement.id;
        if (achievement.status === "Pending" || achievement.status === "Rejected") {
            deleteBtn.classList.remove("hidden");
        } else {
            deleteBtn.classList.add("hidden");
        }

        const modal = document.getElementById('details-modal');
        let formattedDate = 'N/A';
        if (achievement.created_at) {
            const date = new Date(achievement.created_at);
            formattedDate = date.toLocaleDateString('en-US', { month: 'short', day: 'numeric', year: 'numeric' });
        }
        document.getElementById('modal-date').innerText = 'Submitted on ' + formattedDate;
        document.getElementById('modal-category').innerText = achievement.category;

        const statusEl = document.getElementById('modal-status');
        statusEl.innerText = achievement.status;
        statusEl.className = 'inline-block mt-1 px-2.5 py-1 rounded-full text-xs font-bold';
        if (achievement.status === 'Approved') statusEl.classList.add('text-emerald-700', 'bg-emerald-50');
        else if (achievement.status === 'Pending') statusEl.classList.add('text-amber-700', 'bg-amber-50');
        else statusEl.classList.add('text-rose-700', 'bg-rose-50');

        document.getElementById('modal-title').innerText = achievement.title;
        document.getElementById('modal-description').innerText = achievement.description || 'No description provided.';
        document.getElementById('modal-org').innerText = achievement.organization_name || '—';
        document.getElementById('modal-event').innerText = achievement.event_name || '—';

        const remarksSection = document.getElementById('modal-remarks-section');
        if (achievement.faculty_remarks) {
            remarksSection.style.display = 'block';
            document.getElementById('modal-remarks').innerText = achievement.faculty_remarks;
        } else {
            remarksSection.style.display = 'none';
        }

        if (achievement.file_path) {
            const filePath = '/storage/' + achievement.file_path;
            const fileName = achievement.file_path.split('/').pop();
            document.getElementById('modal-file-link').innerText = fileName;
            document.getElementById('modal-file-link').href = filePath;
            document.getElementById('modal-file-view').href = filePath;
            document.getElementById('modal-file-download').href = filePath;
        }

        modal.classList.remove('hidden');
        modal.classList.add('flex');
    }

    function closeDetailsModal() {
        const modal = document.getElementById('details-modal');
        modal.classList.remove('flex');
        modal.classList.add('hidden');
    }

    function openAnnouncementModal(title, content) {
        document.getElementById('ann-modal-title').innerText = title;
        document.getElementById('ann-modal-content').innerText = content;
        const modal = document.getElementById('announcement-modal');
        modal.classList.remove('hidden');
        modal.classList.add('flex');
    }

    function closeAnnouncementModal() {
        const modal = document.getElementById('announcement-modal');
        modal.classList.remove('flex');
        modal.classList.add('hidden');
    }
</script>
@endsection