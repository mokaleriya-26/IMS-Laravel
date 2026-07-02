@extends('layouts.app')

@section('content')
<div class="flex min-h-screen bg-[#F8FAFC]">
    
    {{-- Sidebar --}}
    <aside class="w-64 bg-white border-r border-slate-200 flex flex-col justify-between fixed h-full z-20 shadow-sm">
        <div class="p-6">
            <div class="flex items-center gap-3 mb-8">
                <div class="bg-[#005F5B] text-white p-2 rounded-xl shadow-md">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                </div>
                <div>
                    <h3 class="font-extrabold text-slate-900 text-[15px] tracking-tight">EduManage IMS</h3>
                    <p class="text-[11px] text-[#005F5B] font-bold">System Administrator</p>
                </div>
            </div>

            <nav class="space-y-1">
                <a href="{{ route('admin.dashboard') }}" 
                   class="flex items-center gap-3 px-4 py-3 text-sm font-bold text-slate-600 hover:bg-slate-50 hover:text-slate-900 rounded-xl transition-all">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2H6a2 2 0 01-2-2V6z"/></svg>
                    Dashboard
                </a>
                
                <a href="{{ route('admin.users', ['role' => 'student']) }}" 
                   class="flex items-center gap-3 px-4 py-3 text-sm font-bold rounded-xl transition-all {{ $role === 'student' ? 'bg-[#EBF5F4] text-[#005F5B]' : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 14l9-5-9-5-9 5 9 5z"/></svg>
                    Manage Students
                </a>

                <a href="{{ route('admin.users', ['role' => 'faculty']) }}" 
                   class="flex items-center gap-3 px-4 py-3 text-sm font-bold rounded-xl transition-all {{ $role === 'faculty' ? 'bg-[#EBF5F4] text-[#005F5B]' : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857"/></svg>
                    Manage Faculty
                </a>

                <a href="{{ route('admin.users', ['role' => 'placement_cell']) }}" 
                   class="flex items-center gap-3 px-4 py-3 text-sm font-bold rounded-xl transition-all {{ $role === 'placement_cell' ? 'bg-[#EBF5F4] text-[#005F5B]' : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                    Placement Accounts
                </a>

                <a href="{{ route('admin.users', ['role' => 'club_admin']) }}" 
                   class="flex items-center gap-3 px-4 py-3 text-sm font-bold rounded-xl transition-all {{ $role === 'club_admin' ? 'bg-[#EBF5F4] text-[#005F5B]' : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                    Club Admins
                </a>

                <a href="{{ route('admin.users', ['role' => 'branch_admin']) }}" 
                   class="flex items-center gap-3 px-4 py-3 text-sm font-bold rounded-xl transition-all {{ $role === 'branch_admin' ? 'bg-[#EBF5F4] text-[#005F5B]' : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-2 10v-5a1 1 0 00-1-1h-2a1 1 0 00-1 1v5m4 0H9"/></svg>
                    Branch Admins
                </a>

                <a href="{{ route('admin.announcements') }}" 
                   class="flex items-center gap-3 px-4 py-3 text-sm font-bold text-slate-600 hover:bg-slate-50 hover:text-slate-900 rounded-xl transition-all">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"/></svg>
                    Announcements
                </a>
            </nav>
        </div>

        <div class="p-4 border-t border-slate-100 m-4 rounded-2xl flex items-center gap-3 bg-slate-50/50">
            <div class="w-10 h-10 rounded-full bg-[#005F5B] text-white flex items-center justify-center font-bold text-sm shadow-sm">
                {{ Auth::user()->initials() }}
            </div>
            <div class="overflow-hidden">
                <h5 class="text-sm font-bold text-slate-800 truncate">{{ Auth::user()->name }}</h5>
                <p class="text-xs text-slate-500 font-medium truncate">Administrator</p>
            </div>
        </div>
    </aside>

    {{-- Main Content --}}
    <div class="pl-64 flex-1 flex flex-col min-h-screen">
        
        {{-- Header --}}
        <header class="h-16 bg-white border-b border-slate-200/80 flex items-center justify-between px-8 sticky top-0 z-10 shadow-sm">
            <div class="font-extrabold text-slate-800 text-lg">Manage {{ ucfirst(str_replace('_', ' ', $role)) }} Accounts</div>
            <div class="flex items-center gap-4">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="text-sm font-bold text-rose-600 bg-rose-50 px-4 py-2 rounded-xl hover:bg-rose-100 transition shadow-sm">Logout</button>
                </form>
            </div>
        </header>

        {{-- Main Body --}}
        <main class="p-8 flex-1 space-y-6">
            
            @if(session('success'))
                <div class="p-4 bg-emerald-50 border border-emerald-200 text-emerald-800 text-sm font-semibold rounded-2xl">
                    {{ session('success') }}
                </div>
            @endif

            <div class="flex justify-between items-center">
                <div>
                    <h1 class="text-2xl font-black text-slate-900 tracking-tight">{{ ucfirst(str_replace('_', ' ', $role)) }} Directory</h1>
                    <p class="text-sm text-slate-500 font-medium mt-1">Add, update, or remove credentials in the institution system.</p>
                </div>
                <a href="{{ route('admin.users.create', ['role' => $role]) }}" class="bg-[#005F5B] text-white font-bold text-sm px-5 py-2.5 rounded-xl hover:bg-[#004845] shadow-md transition flex items-center gap-1.5">
                    + Add New {{ ucfirst(str_replace('_', ' ', $role)) }}
                </a>
            </div>

            {{-- Folders / Filters --}}
            <div class="bg-white border border-slate-200 rounded-2xl p-6 shadow-sm">
                <h4 class="text-xs font-bold text-slate-700 uppercase tracking-wider mb-3">Folders &amp; Filters</h4>
                <form method="GET" action="{{ route('admin.users') }}" class="flex flex-wrap gap-3">
                    <input type="hidden" name="role" value="{{ $role }}">
                    
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Search by name/user..." class="bg-slate-50 border border-slate-200 rounded-xl px-4 py-2 text-sm font-medium focus:outline-none focus:border-[#005F5B]">

                    @if($role === 'student' || $role === 'faculty')
                        <select name="branch" class="bg-slate-50 border border-slate-200 rounded-xl px-4 py-2 text-sm font-medium focus:outline-none focus:border-[#005F5B]">
                            <option value="">All Branches</option>
                            @foreach($branches as $b)
                                <option value="{{ $b }}" {{ request('branch') === $b ? 'selected' : '' }}>{{ $b }}</option>
                            @endforeach
                        </select>
                    @endif

                    @if($role === 'student')
                        <select name="year" class="bg-slate-50 border border-slate-200 rounded-xl px-4 py-2 text-sm font-medium focus:outline-none focus:border-[#005F5B]">
                            <option value="">All Years</option>
                            @foreach([1,2,3,4] as $y)
                                <option value="{{ $y }}" {{ request('year') == $y ? 'selected' : '' }}>Year {{ $y }}</option>
                            @endforeach
                        </select>
                    @endif

                    <button type="submit" class="bg-[#005F5B] text-white font-bold text-sm px-5 py-2 rounded-xl hover:bg-[#004845] transition">Apply</button>
                    <a href="{{ route('admin.users', ['role' => $role]) }}" class="border border-slate-200 text-slate-700 font-bold text-sm px-4 py-2 rounded-xl hover:bg-slate-50 transition">Reset</a>
                </form>
            </div>

            {{-- Table --}}
            <div class="bg-white border border-slate-200 rounded-2xl shadow-sm overflow-hidden">
                <table class="w-full text-left text-sm text-slate-600">
                    <thead>
                        <tr class="border-b text-xs font-bold uppercase text-slate-500 bg-slate-50/60 tracking-wider">
                            <th class="py-4 px-6">Name / Credentials</th>
                            <th class="py-4 px-6">Username</th>
                            <th class="py-4 px-6">Email Address</th>
                            @if($role === 'student')
                                <th class="py-4 px-6">Roll Number</th>
                                <th class="py-4 px-6">Branch &amp; Year</th>
                            @elseif($role === 'branch_admin' || $role === 'faculty')
                                <th class="py-4 px-6">Assigned Branch</th>
                            @elseif($role === 'club_admin')
                                <th class="py-4 px-6">Assigned Club</th>
                            @endif
                            <th class="py-4 px-6 text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 font-medium">
                        @forelse($users as $userItem)
                            <tr class="hover:bg-slate-50/30 transition">
                                <td class="py-4 px-6">
                                    <div class="flex items-center gap-3">
                                        <div class="w-9 h-9 rounded-full bg-[#EBF5F4] text-[#005F5B] flex items-center justify-center font-bold text-xs">
                                            {{ $userItem->initials() }}
                                        </div>
                                        <span class="font-bold text-slate-800">{{ $userItem->name }}</span>
                                    </div>
                                </td>
                                <td class="py-4 px-6 font-semibold text-slate-700">{{ $userItem->username ?: '-' }}</td>
                                <td class="py-4 px-6 text-slate-500">{{ $userItem->email ?: '-' }}</td>
                                @if($role === 'student')
                                    <td class="py-4 px-6 font-bold text-slate-700">{{ $userItem->studentProfile->roll_number ?? '-' }}</td>
                                    <td class="py-4 px-6">
                                        <span class="text-xs bg-[#EBF5F4] text-[#005F5B] font-extrabold px-2.5 py-1 rounded-md">
                                            {{ $userItem->studentProfile->branch ?? 'N/A' }} (Year {{ $userItem->studentProfile->year_of_study ?? 'N/A' }})
                                        </span>
                                    </td>
                                @elseif($role === 'branch_admin' || $role === 'faculty')
                                    <td class="py-4 px-6 font-bold text-slate-750">{{ $userItem->assigned_branch ?? 'General' }}</td>
                                @elseif($role === 'club_admin')
                                    <td class="py-4 px-6 font-bold text-slate-750">{{ $userItem->assigned_club ?? 'General' }}</td>
                                @endif
                                <td class="py-4 px-6 text-center">
                                    <div class="inline-flex gap-2">
                                        <a href="{{ route('admin.users.edit', $userItem->id) }}" class="px-3 py-1.5 border border-slate-200 hover:border-slate-300 rounded-lg text-slate-600 hover:text-slate-900 bg-white text-xs font-bold transition">
                                            Edit
                                        </a>
                                        <form action="{{ route('admin.users.delete', $userItem->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this account?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="px-3 py-1.5 bg-rose-50 text-rose-600 hover:bg-rose-100 rounded-lg text-xs font-bold transition">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="py-12 text-center text-slate-500 font-bold">
                                    No records found.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </main>
    </div>
</div>
@endsection
