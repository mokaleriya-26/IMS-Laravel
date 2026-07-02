@extends('layouts.app')

@section('content')
<div class="flex min-h-screen bg-[#F8FAFC]">

    {{-- Sidebar --}}
    <aside class="w-64 bg-white border-r border-slate-200 flex flex-col justify-between fixed h-full z-20 shadow-sm">
        <div class="p-6">
            <div class="flex items-center gap-3 mb-8">
                <div class="bg-[#005F5B] text-white p-2 rounded-xl shadow-md">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                </div>
                <div>
                    <h3 class="font-extrabold text-slate-900 text-[15px] tracking-tight">Placement Cell</h3>
                    <p class="text-[11px] text-slate-500 font-medium">EduStream IMS</p>
                </div>
            </div>
            <nav class="space-y-1">
                <a href="{{ route('placement.dashboard') }}" class="flex items-center gap-3 px-4 py-3 text-sm font-bold rounded-xl transition-all {{ request()->routeIs('placement.dashboard') ? 'bg-[#EBF5F4] text-[#005F5B]' : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2H6a2 2 0 01-2-2V6z"/></svg>
                    Dashboard
                </a>
                <a href="{{ route('placement.jobs') }}" class="flex items-center gap-3 px-4 py-3 text-sm font-bold rounded-xl transition-all {{ request()->routeIs('placement.jobs*') ? 'bg-[#EBF5F4] text-[#005F5B]' : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                    Jobs & Drives
                </a>
                <a href="{{ route('placement.applications') }}" class="flex items-center gap-3 px-4 py-3 text-sm font-bold rounded-xl transition-all {{ request()->routeIs('placement.applications') ? 'bg-[#EBF5F4] text-[#005F5B]' : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                    Applications
                </a>
                <a href="{{ route('placement.students') }}" class="flex items-center gap-3 px-4 py-3 text-sm font-bold rounded-xl transition-all {{ request()->routeIs('placement.students') ? 'bg-[#EBF5F4] text-[#005F5B]' : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                    Student Database
                </a>
                <a href="{{ route('placement.statistics') }}" class="flex items-center gap-3 px-4 py-3 text-sm font-bold rounded-xl transition-all {{ request()->routeIs('placement.statistics') ? 'bg-[#EBF5F4] text-[#005F5B]' : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
                    Statistics
                </a>
            </nav>
        </div>
        <div class="p-4 border-t border-slate-100">
            <div class="p-3 rounded-2xl bg-slate-50 flex items-center gap-3">
                <div class="w-9 h-9 rounded-full bg-[#005F5B] text-white flex items-center justify-center font-bold text-sm shadow-sm">PC</div>
                <div>
                    <p class="text-sm font-bold text-slate-800">Placement Cell</p>
                    <p class="text-xs text-slate-500">Administrator</p>
                </div>
            </div>
        </div>
    </aside>

    {{-- Main Content --}}
    <div class="pl-64 flex-1 flex flex-col">
        <header class="h-16 bg-white border-b border-slate-200 flex items-center justify-between px-8 sticky top-0 z-10">
            <h1 class="text-lg font-black text-[#005F5B]">Placement Cell Dashboard</h1>
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
        <main class="p-8 flex-1">

            @if(session('success'))
                <div class="mb-6 p-4 bg-emerald-50 border border-emerald-200 rounded-xl text-emerald-800 text-sm font-semibold flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                    {{ session('success') }}
                </div>
            @endif

            {{-- Hero Banner --}}
            <div class="bg-[#005F5B] rounded-3xl p-8 text-white relative overflow-hidden shadow-xl shadow-[#005F5B]/10 mb-6">
                <h2 class="text-3xl font-extrabold tracking-tight">Placement Cell Portal</h2>
                <p class="text-[#EBF5F4]/80 mt-1 text-sm">Manage recruitment drives, student applications, and placement statistics.</p>
                <a href="{{ route('placement.jobs.create') }}" class="mt-4 inline-flex bg-white text-[#005F5B] font-bold text-sm px-5 py-2.5 rounded-xl hover:bg-[#EBF5F4] transition shadow-sm">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
                    Post New Drive
                </a>
            </div>

            {{-- Stats Grid --}}
            <div class="grid grid-cols-2 md:grid-cols-5 gap-5 mb-8">
                <div class="bg-white border border-slate-200 rounded-2xl p-5 shadow-sm">
                    <p class="text-xs font-bold text-slate-600 mb-2">Total Drives</p>
                    <h3 class="text-3xl font-black text-slate-900">{{ $totalJobs }}</h3>
                </div>
                <div class="bg-white border border-slate-200 rounded-2xl p-5 shadow-sm">
                    <p class="text-xs font-bold text-slate-600 mb-2">Open Drives</p>
                    <h3 class="text-3xl font-black text-emerald-600">{{ $openJobs }}</h3>
                </div>
                <div class="bg-white border border-slate-200 rounded-2xl p-5 shadow-sm">
                    <p class="text-xs font-bold text-slate-600 mb-2">Total Applications</p>
                    <h3 class="text-3xl font-black text-slate-900">{{ $totalApps }}</h3>
                </div>
                <div class="bg-white border border-slate-200 rounded-2xl p-5 shadow-sm">
                    <p class="text-xs font-bold text-slate-600 mb-2">Shortlisted</p>
                    <h3 class="text-3xl font-black text-blue-600">{{ $shortlisted }}</h3>
                </div>
                <div class="bg-white border border-slate-200 rounded-2xl p-5 shadow-sm">
                    <p class="text-xs font-bold text-slate-600 mb-2">Placed Students</p>
                    <h3 class="text-3xl font-black text-[#005F5B]">{{ $selected }}</h3>
                </div>
            </div>

            {{-- Recent Drives --}}
            <div class="bg-white border border-slate-200 rounded-2xl shadow-sm overflow-hidden">
                <div class="p-5 border-b border-slate-100 flex justify-between items-center">
                    <h3 class="font-black text-slate-800">Recent Drives</h3>
                    <a href="{{ route('placement.jobs') }}" class="text-sm font-bold text-[#005F5B] hover:underline">View All</a>
                </div>
                <table class="w-full text-sm">
                    <thead><tr class="bg-slate-50 text-xs font-bold uppercase text-black tracking-wider border-b">
                        <th class="py-3 px-5 text-left">Company</th>
                        <th class="py-3 px-5 text-left">Position</th>
                        <th class="py-3 px-5 text-left">Type</th>
                        <th class="py-3 px-5 text-left">Drive Date</th>
                        <th class="py-3 px-5 text-left">Status</th>
                    </tr></thead>
                    <tbody class="divide-y divide-slate-100">
                        @forelse($recentJobs as $job)
                            <tr class="hover:bg-slate-50 transition">
                                <td class="py-3.5 px-5 font-bold text-slate-800">{{ $job->company_name }}</td>
                                <td class="py-3.5 px-5 text-slate-700">{{ $job->job_title }}</td>
                                <td class="py-3.5 px-5">
                                    <span class="bg-blue-50 text-blue-700 px-2 py-0.5 rounded-md text-xs font-bold">{{ $job->type }}</span>
                                </td>
                                <td class="py-3.5 px-5 text-slate-600 text-xs">{{ $job->drive_date ? \Carbon\Carbon::parse($job->drive_date)->format('M d, Y') : 'TBD' }}</td>
                                <td class="py-3.5 px-5">
                                    <span class="{{ $job->status === 'Open' ? 'text-emerald-700 bg-emerald-50' : 'text-slate-500 bg-slate-100' }} px-2.5 py-0.5 rounded-full text-xs font-bold">{{ $job->status }}</span>
                                </td>
                            </tr>
                        @empty
                            <tr><td colspan="5" class="py-8 text-center text-slate-500 font-semibold">No drives posted yet.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</div>
@endsection
