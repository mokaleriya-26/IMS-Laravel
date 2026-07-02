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
    <div class="pl-64 flex-1">
        <header class="h-16 bg-white border-b border-slate-200 flex items-center justify-between px-8 sticky top-0 z-10">
            <h1 class="text-lg font-black text-[#005F5B]">Pending Requests Queue – {{ $branch }}</h1>
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
        <main class="p-8">
            @if(session('success'))<div class="mb-4 p-4 bg-emerald-50 border border-emerald-200 rounded-xl text-emerald-800 text-sm font-semibold">{{ session('success') }}</div>@endif
            <div class="bg-white border border-slate-200 rounded-2xl shadow-sm overflow-hidden">
                <table class="w-full text-sm">
                    <thead><tr class="bg-slate-50 border-b text-xs font-bold uppercase text-black tracking-wider">
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
