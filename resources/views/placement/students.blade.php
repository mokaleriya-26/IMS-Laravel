@extends('layouts.app')
@section('content')
<div class="flex min-h-screen bg-[#F8FAFC]">
    <aside class="w-64 bg-white border-r border-slate-200 flex flex-col fixed h-full z-20 shadow-sm p-6">
        <div class="flex items-center gap-3 mb-8"><div class="bg-[#005F5B] text-white p-2 rounded-xl"><svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg></div><div><h3 class="font-extrabold text-slate-900 text-[15px]">Placement Cell</h3></div></div>
        <nav class="space-y-1">
            <a href="{{ route('placement.dashboard') }}" class="block px-4 py-3 text-sm font-bold rounded-xl text-slate-600 hover:bg-slate-50">Dashboard</a>
            <a href="{{ route('placement.jobs') }}" class="block px-4 py-3 text-sm font-bold rounded-xl text-slate-600 hover:bg-slate-50">Jobs & Drives</a>
            <a href="{{ route('placement.applications') }}" class="block px-4 py-3 text-sm font-bold rounded-xl text-slate-600 hover:bg-slate-50">Applications</a>
            <a href="{{ route('placement.students') }}" class="block px-4 py-3 text-sm font-bold rounded-xl bg-[#EBF5F4] text-[#005F5B]">Student Database</a>
            <a href="{{ route('placement.statistics') }}" class="block px-4 py-3 text-sm font-bold rounded-xl text-slate-600 hover:bg-slate-50">Statistics</a>
        </nav>
        <div class="mt-auto"><form action="{{ route('logout') }}" method="POST">@csrf<button class="w-full text-sm font-bold text-slate-600 bg-slate-100 px-4 py-2 rounded-xl">Logout</button></form></div>
    </aside>
    <div class="pl-64 flex-1">
        <header class="h-16 bg-white border-b border-slate-200 flex items-center px-8 sticky top-0 z-10 shadow-sm">
            <h1 class="text-lg font-black text-slate-800">Student Eligibility Database</h1>
        </header>
        <main class="p-8">
            <form method="GET" class="flex gap-3 mb-6">
                <select name="branch" class="bg-white border border-slate-200 rounded-xl px-4 py-2.5 text-sm font-medium text-slate-700 focus:outline-none focus:border-[#005F5B] transition">
                    <option value="">All Branches</option>
                    @foreach($branches as $b)<option value="{{ $b }}" {{ request('branch') === $b ? 'selected' : '' }}>{{ $b }}</option>@endforeach
                </select>
                <button type="submit" class="bg-[#005F5B] text-white font-bold text-sm px-5 py-2.5 rounded-xl hover:bg-[#004845] transition">Filter</button>
                <a href="{{ route('placement.students') }}" class="border border-slate-200 text-slate-700 font-bold text-sm px-4 py-2.5 rounded-xl hover:bg-slate-50 transition">Reset</a>
            </form>
            <div class="bg-white border border-slate-200 rounded-2xl shadow-sm overflow-hidden">
                <table class="w-full text-sm">
                    <thead><tr class="bg-slate-50 border-b text-xs font-bold uppercase text-slate-500 tracking-wider">
                        <th class="py-3 px-5 text-left">Student Name</th>
                        <th class="py-3 px-5 text-left">Roll Number</th>
                        <th class="py-3 px-5 text-left">Branch</th>
                        <th class="py-3 px-5 text-left">Year</th>
                        <th class="py-3 px-5 text-left">Applications</th>
                    </tr></thead>
                    <tbody class="divide-y divide-slate-100">
                        @forelse($students as $student)
                        <tr class="hover:bg-slate-50">
                            <td class="py-3.5 px-5 font-bold text-slate-800">{{ $student->name }}</td>
                            <td class="py-3.5 px-5 text-slate-600 text-xs">{{ optional($student->studentProfile)->roll_number ?? '—' }}</td>
                            <td class="py-3.5 px-5 text-slate-700">{{ optional($student->studentProfile)->branch ?? '—' }}</td>
                            <td class="py-3.5 px-5 text-slate-600">{{ optional($student->studentProfile)->year_of_study ? 'Year ' . $student->studentProfile->year_of_study : '—' }}</td>
                            <td class="py-3.5 px-5"><span class="bg-[#EBF5F4] text-[#005F5B] font-bold text-xs px-2 py-0.5 rounded-md">{{ $student->placementApplications->count() }}</span></td>
                        </tr>
                        @empty
                        <tr><td colspan="5" class="py-8 text-center text-slate-500 font-semibold">No students found.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</div>
@endsection
