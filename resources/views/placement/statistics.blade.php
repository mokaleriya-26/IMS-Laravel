@extends('layouts.app')
@section('content')
<div class="flex min-h-screen bg-[#F8FAFC]">
    <aside class="w-64 bg-white border-r border-slate-200 flex flex-col fixed h-full z-20 shadow-sm p-6">
        <div class="flex items-center gap-3 mb-8"><div class="bg-[#005F5B] text-white p-2 rounded-xl"><svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg></div><div><h3 class="font-extrabold text-slate-900 text-[15px]">Placement Cell</h3></div></div>
        <nav class="space-y-1">
            <a href="{{ route('placement.dashboard') }}" class="block px-4 py-3 text-sm font-bold rounded-xl text-slate-600 hover:bg-slate-50">Dashboard</a>
            <a href="{{ route('placement.jobs') }}" class="block px-4 py-3 text-sm font-bold rounded-xl text-slate-600 hover:bg-slate-50">Jobs & Drives</a>
            <a href="{{ route('placement.applications') }}" class="block px-4 py-3 text-sm font-bold rounded-xl text-slate-600 hover:bg-slate-50">Applications</a>
            <a href="{{ route('placement.students') }}" class="block px-4 py-3 text-sm font-bold rounded-xl text-slate-600 hover:bg-slate-50">Student Database</a>
            <a href="{{ route('placement.statistics') }}" class="block px-4 py-3 text-sm font-bold rounded-xl bg-[#EBF5F4] text-[#005F5B]">Statistics</a>
        </nav>
        <div class="mt-auto"><form action="{{ route('logout') }}" method="POST">@csrf<button class="w-full text-sm font-bold text-slate-600 bg-slate-100 px-4 py-2 rounded-xl">Logout</button></form></div>
    </aside>
    <div class="pl-64 flex-1">
        <header class="h-16 bg-white border-b border-slate-200 flex items-center px-8 sticky top-0 z-10 shadow-sm">
            <h1 class="text-lg font-black text-slate-800">Placement Statistics</h1>
        </header>
        <main class="p-8 space-y-6">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-5">
                <div class="bg-white border border-slate-200 rounded-2xl p-6 shadow-sm text-center">
                    <p class="text-xs font-bold text-slate-600 mb-2">Total Students</p>
                    <h3 class="text-4xl font-black text-slate-900">{{ $totalStudents }}</h3>
                </div>
                <div class="bg-white border border-slate-200 rounded-2xl p-6 shadow-sm text-center">
                    <p class="text-xs font-bold text-slate-600 mb-2">Students Placed</p>
                    <h3 class="text-4xl font-black text-[#005F5B]">{{ $placed }}</h3>
                </div>
                <div class="bg-white border border-slate-200 rounded-2xl p-6 shadow-sm text-center">
                    <p class="text-xs font-bold text-slate-600 mb-2">Total Drives</p>
                    <h3 class="text-4xl font-black text-slate-900">{{ $totalDrives }}</h3>
                </div>
                <div class="bg-white border border-slate-200 rounded-2xl p-6 shadow-sm text-center">
                    <p class="text-xs font-bold text-slate-600 mb-2">Open Drives</p>
                    <h3 class="text-4xl font-black text-emerald-600">{{ $openDrives }}</h3>
                </div>
            </div>
            @if($totalStudents > 0)
            <div class="bg-white border border-slate-200 rounded-2xl p-6 shadow-sm">
                <h3 class="font-black text-slate-800 mb-4">Placement Rate</h3>
                <div class="flex items-center gap-4">
                    <div class="flex-1 bg-slate-100 rounded-full h-4 overflow-hidden">
                        <div class="bg-[#005F5B] h-4 rounded-full transition-all" style="width: {{ min(100, round(($placed / max(1,$totalStudents)) * 100)) }}%"></div>
                    </div>
                    <span class="font-black text-xl text-[#005F5B]">{{ round(($placed / max(1,$totalStudents)) * 100) }}%</span>
                </div>
            </div>
            @endif
            <div class="bg-white border border-slate-200 rounded-2xl p-6 shadow-sm">
                <h3 class="font-black text-slate-800 mb-4">Applications by Status</h3>
                <div class="space-y-3">
                    @foreach($byStatus as $status => $count)
                    <div class="flex items-center gap-3">
                        <span class="text-sm font-bold text-slate-700 w-28">{{ $status }}</span>
                        <div class="flex-1 bg-slate-100 rounded-full h-3 overflow-hidden">
                            @php $total = $byStatus->sum(); @endphp
                            <div class="bg-[#005F5B] h-3 rounded-full" style="width: {{ $total > 0 ? round(($count/$total)*100) : 0 }}%"></div>
                        </div>
                        <span class="text-sm font-black text-slate-800 w-8 text-right">{{ $count }}</span>
                    </div>
                    @endforeach
                </div>
            </div>
        </main>
    </div>
</div>
@endsection
