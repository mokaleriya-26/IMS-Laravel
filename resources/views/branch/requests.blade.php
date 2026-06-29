@extends('layouts.app')
@section('content')
<div class="flex min-h-screen bg-[#F8FAFC]">
    <aside class="w-64 bg-white border-r border-slate-200 flex flex-col fixed h-full z-20 shadow-sm p-6">
        <div class="flex items-center gap-3 mb-8"><div class="bg-amber-600 text-white p-2 rounded-xl"><svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-2 10v-5a1 1 0 00-1-1h-2a1 1 0 00-1 1v5m4 0H9"/></svg></div><div><h3 class="font-extrabold text-slate-900 text-[14px] truncate">{{ $branch }}</h3></div></div>
        <nav class="space-y-1">
            <a href="{{ route('branch.admin.dashboard') }}" class="block px-4 py-3 text-sm font-bold rounded-xl text-slate-600 hover:bg-slate-50">Dashboard</a>
            <a href="{{ route('branch.admin.students') }}" class="block px-4 py-3 text-sm font-bold rounded-xl text-slate-600 hover:bg-slate-50">Students</a>
            <a href="{{ route('branch.admin.faculty') }}" class="block px-4 py-3 text-sm font-bold rounded-xl text-slate-600 hover:bg-slate-50">Faculty</a>
            <a href="{{ route('branch.admin.requests') }}" class="block px-4 py-3 text-sm font-bold rounded-xl bg-amber-50 text-amber-700">Requests Queue</a>
            <a href="{{ route('branch.admin.notices') }}" class="block px-4 py-3 text-sm font-bold rounded-xl text-slate-600 hover:bg-slate-50">Branch Notices</a>
            <a href="{{ route('branch.admin.reports') }}" class="block px-4 py-3 text-sm font-bold rounded-xl text-slate-600 hover:bg-slate-50">Branch Reports</a>
        </nav>
        <div class="mt-auto"><form action="{{ route('logout') }}" method="POST">@csrf<button class="w-full text-sm font-bold text-slate-600 bg-slate-100 px-4 py-2 rounded-xl">Logout</button></form></div>
    </aside>
    <div class="pl-64 flex-1">
        <header class="h-16 bg-white border-b border-slate-200 flex items-center px-8 sticky top-0 z-10 shadow-sm">
            <h1 class="text-lg font-black text-slate-800">Pending Requests Queue – {{ $branch }}</h1>
        </header>
        <main class="p-8">
            @if(session('success'))<div class="mb-4 p-4 bg-emerald-50 border border-emerald-200 rounded-xl text-emerald-800 text-sm font-semibold">{{ session('success') }}</div>@endif
            <div class="bg-white border border-slate-200 rounded-2xl shadow-sm overflow-hidden">
                <table class="w-full text-sm">
                    <thead><tr class="bg-slate-50 border-b text-xs font-bold uppercase text-slate-500 tracking-wider">
                        <th class="py-3 px-5 text-left">Student</th>
                        <th class="py-3 px-5 text-left">Title</th>
                        <th class="py-3 px-5 text-left">Category</th>
                        <th class="py-3 px-5 text-left">File</th>
                        <th class="py-3 px-5 text-center">Actions</th>
                    </tr></thead>
                    <tbody class="divide-y divide-slate-100 font-medium">
                        @forelse($achievements as $ach)
                        <tr class="hover:bg-slate-50">
                            <td class="py-3.5 px-5">
                                <div class="font-bold text-slate-800">{{ $ach->student->name }}</div>
                                <div class="text-xs text-slate-500">Roll: {{ optional($ach->student->studentProfile)->roll_number }}</div>
                            </td>
                            <td class="py-3.5 px-5 text-slate-800">
                                <div>{{ $ach->title }}</div>
                                <div class="text-xs text-slate-500 mt-0.5">{{ $ach->description }}</div>
                            </td>
                            <td class="py-3.5 px-5"><span class="bg-[#EBF5F4] text-[#005F5B] font-bold text-xs px-2 py-0.5 rounded-md">{{ $ach->category }}</span></td>
                            <td class="py-3.5 px-5">
                                @if($ach->file_path)
                                <a href="/storage/{{ $ach->file_path }}" target="_blank" class="text-[#005F5B] hover:underline font-semibold text-xs">📄 View File</a>
                                @else
                                —
                                @endif
                            </td>
                            <td class="py-3.5 px-5 text-center">
                                <form method="POST" action="{{ route('branch.admin.requests.approve', $ach) }}" class="flex flex-col gap-2 items-center justify-center">
                                    @csrf
                                    <input type="text" name="remarks" placeholder="Optional remark" class="text-xs bg-slate-50 border border-slate-200 rounded-lg px-2 py-1 font-medium focus:outline-none">
                                    <div class="flex gap-2">
                                        <button name="action" value="approve" class="text-xs font-bold text-emerald-700 bg-emerald-50 px-2.5 py-1 rounded-md hover:bg-emerald-600 hover:text-white transition">Approve</button>
                                        <button name="action" value="reject" class="text-xs font-bold text-rose-700 bg-rose-50 px-2.5 py-1 rounded-md hover:bg-rose-600 hover:text-white transition">Reject</button>
                                    </div>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr><td colspan="5" class="py-8 text-center text-slate-500 font-semibold">No pending requests found.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</div>
@endsection
