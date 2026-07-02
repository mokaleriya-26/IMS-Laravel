@extends('layouts.app')
@section('content')
<div class="flex min-h-screen bg-[#F8FAFC]">
    <aside class="w-64 bg-white border-r border-slate-200 flex flex-col fixed h-full z-20 shadow-sm">
        <div class="p-6 flex-1">
            <div class="flex items-center gap-3 mb-8">
                <div class="bg-[#005F5B] text-white p-2 rounded-xl shadow-md">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-2 10v-5a1 1 0 00-1-1h-2a1 1 0 00-1 1v5m4 0H9"/></svg>
                </div>
                <div>
                    <h3 class="font-extrabold text-slate-900 text-[15px] tracking-tight">{{ $branch ?: 'Branch Admin' }}</h3>
                    <p class="text-[11px] text-slate-500 font-medium">EduStream IMS</p>
                </div>
            </div>
            <nav class="space-y-1">
                <a href="{{ route('branch.admin.dashboard') }}" class="flex items-center gap-3 px-4 py-3 text-sm font-bold rounded-xl transition-all {{ request()->routeIs('branch.admin.dashboard') ? 'bg-[#EBF5F4] text-[#005F5B]' : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2H6a2 2 0 01-2-2V6z"/></svg>
                    Dashboard
                </a>
                <a href="{{ route('branch.admin.students') }}" class="flex items-center gap-3 px-4 py-3 text-sm font-bold rounded-xl transition-all {{ request()->routeIs('branch.admin.students') ? 'bg-[#EBF5F4] text-[#005F5B]' : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900' }}">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                    </svg>
                    Students
                </a>
                <a href="{{ route('branch.admin.faculty') }}" class="flex items-center gap-3 px-4 py-3 text-sm font-bold rounded-xl transition-all {{ request()->routeIs('branch.admin.faculty') ? 'bg-[#EBF5F4] text-[#005F5B]' : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900' }}">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857"/>
                    </svg>
                    Faculty
                </a>
                <a href="{{ route('branch.admin.requests') }}" class="flex items-center gap-3 px-4 py-3 text-sm font-bold rounded-xl transition-all {{ request()->routeIs('branch.admin.requests') ? 'bg-[#EBF5F4] text-[#005F5B]' : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900' }}">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                    </svg>
                    Requests Queue
                </a>
                <a href="{{ route('branch.admin.notices') }}" class="flex items-center gap-3 px-4 py-3 text-sm font-bold rounded-xl transition-all {{ request()->routeIs('branch.admin.notices') ? 'bg-[#EBF5F4] text-[#005F5B]' : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900' }}">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"/>
                    </svg>
                    Branch Notices
                </a>
                    <a href="{{ route('branch.admin.reports') }}" class="flex items-center gap-3 px-4 py-3 text-sm font-bold rounded-xl transition-all {{ request()->routeIs('branch.admin.reports') ? 'bg-[#EBF5F4] text-[#005F5B]' : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900' }}">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a２ ２ ０ ０１-２ -２z"/>
                    </svg>
                    Branch Reports
                </a>
            </nav>
        </div>
        <div class="p-4 border-t border-slate-100">
            <div class="p-3 rounded-2xl bg-slate-50 flex items-center gap-3 mb-2">
                <div class="w-10 h-10 rounded-xl bg-[#005F5B] text-white flex items-center justify-center font-bold text-sm shadow-md">{{ $user->initials() }}</div>
                <div><p class="text-sm font-bold text-slate-800">{{ $user->name }}</p><p class="text-xs text-slate-500">Branch Admin</p></div>
            </div>
        </div>
    </aside>
    <div class="pl-64 flex-1 flex-col">
        <header class="h-16 bg-white border-b border-slate-200 flex items-center justify-between px-8 sticky top-0 z-10">
            <h1 class="text-lg font-black text-[#005F5B]">{{ $branch }} — Branch Dashboard</h1>
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
            @if(session('success'))
            <div class="p-4 bg-emerald-50 border border-emerald-200 rounded-xl text-emerald-800 text-sm font-semibold">{{ session('success') }}</div>@endif

            {{-- Hero Banner --}}
            <div class="bg-[#005F5B] rounded-3xl p-8 text-white relative overflow-hidden shadow-xl shadow-[#005F5B]/10">
                <h2 class="text-3xl font-extrabold tracking-tight">{{ $branch }} Portal</h2>
                <p class="text-[#EBF5F4]/80 mt-1 text-sm">Manage student and faculty listings, publish notices, and view branch statistics.</p>
            </div>

            {{-- Stats --}}
            <div class="grid grid-cols-2 md:grid-cols-4 gap-5">
                <div class="bg-white border border-slate-200 rounded-2xl p-5 shadow-sm text-center"><p class="text-xs font-bold text-slate-600 mb-2">Students</p><h3 class="text-3xl font-black text-slate-900">{{ $totalStudents }}</h3></div>
                <div class="bg-white border border-slate-200 rounded-2xl p-5 shadow-sm text-center"><p class="text-xs font-bold text-slate-600 mb-2">Faculty members</p><h3 class="text-3xl font-black text-slate-900">{{ $totalFaculty }}</h3></div>
                <div class="bg-white border border-slate-200 rounded-2xl p-5 shadow-sm text-center"><p class="text-xs font-bold text-slate-600 mb-2">Pending Requests</p><h3 class="text-3xl font-black text-amber-600">{{ $pendingRequests }}</h3></div>
                <div class="bg-white border border-slate-200 rounded-2xl p-5 shadow-sm text-center"><p class="text-xs font-bold text-slate-600 mb-2">Approved entries</p><h3 class="text-3xl font-black text-emerald-600">{{ $approvedCount }}</h3></div>
            </div>

            {{-- Notices list --}}
            <div class="bg-white border border-slate-200 rounded-2xl shadow-sm overflow-hidden">
                <div class="p-5 border-b border-slate-100 flex justify-between items-center bg-slate-50/50">
                    <h3 class="font-black text-slate-800">Recent Branch Notices</h3>
                    <a href="{{ route('branch.admin.notices') }}" class="text-sm font-bold text-[#005F5B] hover:underline">Manage Notices</a>
                </div>
                <div class="divide-y divide-slate-100">
                    @forelse($notices as $notice)
                    <div class="p-5">
                        <h4 class="font-bold text-slate-800 text-sm">{{ $notice->title }}</h4>
                        <p class="text-xs text-slate-600 mt-1 leading-relaxed">{{ $notice->content }}</p>
                        <span class="text-[10px] text-slate-400 mt-2 inline-block">{{ $notice->created_at->format('M d, Y H:i') }}</span>
                    </div>
                    @empty
                    <p class="p-6 text-center text-slate-500 font-semibold">No recent branch notices published.</p>
                    @endforelse
                </div>
            </div>
        </main>
    </div>
</div>
@endsection
