@extends('layouts.app')
@section('content')
<div class="flex min-h-screen bg-[#F8FAFC]">
    <aside class="w-64 bg-white border-r border-slate-200 flex flex-col fixed h-full z-20 shadow-sm p-6">
        <div class="flex items-center gap-3 mb-8"><div class="bg-amber-600 text-white p-2 rounded-xl"><svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-2 10v-5a1 1 0 00-1-1h-2a1 1 0 00-1 1v5m4 0H9"/></svg></div><div><h3 class="font-extrabold text-slate-900 text-[14px] truncate">{{ $branch }}</h3></div></div>
        <nav class="space-y-1">
            <a href="{{ route('branch.admin.dashboard') }}" class="block px-4 py-3 text-sm font-bold rounded-xl text-slate-600 hover:bg-slate-50">Dashboard</a>
            <a href="{{ route('branch.admin.students') }}" class="block px-4 py-3 text-sm font-bold rounded-xl text-slate-600 hover:bg-slate-50">Students</a>
            <a href="{{ route('branch.admin.faculty') }}" class="block px-4 py-3 text-sm font-bold rounded-xl text-slate-600 hover:bg-slate-50">Faculty</a>
            <a href="{{ route('branch.admin.requests') }}" class="block px-4 py-3 text-sm font-bold rounded-xl text-slate-600 hover:bg-slate-50">Requests Queue</a>
            <a href="{{ route('branch.admin.notices') }}" class="block px-4 py-3 text-sm font-bold rounded-xl text-slate-600 hover:bg-slate-50">Branch Notices</a>
            <a href="{{ route('branch.admin.reports') }}" class="block px-4 py-3 text-sm font-bold rounded-xl bg-amber-50 text-amber-700">Branch Reports</a>
        </nav>
        <div class="flex items-center gap-4">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="text-sm font-bold text-rose-600 bg-rose-50 px-4 py-2 rounded-xl hover:bg-rose-100 transition shadow-sm">Logout</button>
            </form>
        </div>
    </aside>
    <div class="pl-64 flex-1">
        <header class="h-16 bg-white border-b border-slate-200 flex items-center px-8 sticky top-0 z-10 shadow-sm">
            <h1 class="text-lg font-black text-slate-800">Branch Academic Reports – {{ $branch }}</h1>
        </header>
        <main class="p-8 space-y-6">
            <div class="grid grid-cols-3 gap-5">
                <div class="bg-white border border-slate-200 rounded-2xl p-5 shadow-sm">
                    <p class="text-xs font-bold text-slate-600 mb-1">Approved Achievements</p>
                    <h3 class="text-3xl font-black text-emerald-600">{{ $stats['approved'] }}</h3>
                </div>
                <div class="bg-white border border-slate-200 rounded-2xl p-5 shadow-sm">
                    <p class="text-xs font-bold text-slate-600 mb-1">Pending Review</p>
                    <h3 class="text-3xl font-black text-amber-600">{{ $stats['pending'] }}</h3>
                </div>
                <div class="bg-white border border-slate-200 rounded-2xl p-5 shadow-sm">
                    <p class="text-xs font-bold text-slate-600 mb-1">Rejected Entries</p>
                    <h3 class="text-3xl font-black text-rose-600">{{ $stats['rejected'] }}</h3>
                </div>
            </div>

            <div class="bg-white border border-slate-200 rounded-2xl shadow-sm overflow-hidden">
                <div class="p-5 border-b border-slate-100"><h3 class="font-black text-slate-800">Academic Achievements Log</h3></div>
                <table class="w-full text-sm">
                    <thead><tr class="bg-slate-50 border-b text-xs font-bold uppercase text-slate-500 tracking-wider">
                        <th class="py-3 px-5 text-left">Student</th>
                        <th class="py-3 px-5 text-left">Roll Number</th>
                        <th class="py-3 px-5 text-left">Title</th>
                        <th class="py-3 px-5 text-left">Category</th>
                        <th class="py-3 px-5 text-left">Status</th>
                    </tr></thead>
                    <tbody class="divide-y divide-slate-100 font-medium">
                        @forelse($achievements as $ach)
                        <tr class="hover:bg-slate-50">
                            <td class="py-3.5 px-5 font-bold text-slate-800">{{ $ach->student->name ?? '—' }}</td>
                            <td class="py-3.5 px-5 text-slate-600 text-xs">{{ optional($ach->student->studentProfile)->roll_number ?? '—' }}</td>
                            <td class="py-3.5 px-5 text-slate-800">{{ $ach->title }}</td>
                            <td class="py-3.5 px-5"><span class="bg-[#EBF5F4] text-[#005F5B] font-bold text-xs px-2 py-0.5 rounded-md">{{ $ach->category }}</span></td>
                            <td class="py-3.5 px-5">
                                <span class="{{ $ach->status === 'Approved' ? 'bg-emerald-50 text-emerald-700' : ($ach->status === 'Rejected' ? 'bg-rose-50 text-rose-700' : 'bg-amber-50 text-amber-700') }} px-2.5 py-0.5 rounded-full text-xs font-bold">{{ $ach->status }}</span>
                            </td>
                        </tr>
                        @empty
                        <tr><td colspan="5" class="py-8 text-center text-slate-500 font-semibold">No achievements logged.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</div>
@endsection
