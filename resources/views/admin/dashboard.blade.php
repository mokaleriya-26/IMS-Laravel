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
                    <h3 class="font-extrabold text-slate-900 text-[15px] tracking-tight">System Administrator</h3>
                    <p class="text-[11px] text-[#005F5B] font-bold">EduManage IMS</p>
                </div>
            </div>

            <nav class="space-y-1">
                <a href="{{ route('admin.dashboard') }}" 
                   class="flex items-center gap-3 px-4 py-3 text-sm font-bold rounded-xl transition-all bg-[#EBF5F4] text-[#005F5B]">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2H6a2 2 0 01-2-2V6z"/></svg>
                    Dashboard
                </a>
                
                <a href="{{ route('admin.users', ['role' => 'student']) }}" 
                   class="flex items-center gap-3 px-4 py-3 text-sm font-bold text-slate-600 hover:bg-slate-50 hover:text-slate-900 rounded-xl transition-all">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 14l9-5-9-5-9 5 9 5z"/></svg>
                    Manage Students
                </a>

                <a href="{{ route('admin.users', ['role' => 'faculty']) }}" 
                   class="flex items-center gap-3 px-4 py-3 text-sm font-bold text-slate-600 hover:bg-slate-50 hover:text-slate-900 rounded-xl transition-all">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857"/></svg>
                    Manage Faculty
                </a>

                <a href="{{ route('admin.users', ['role' => 'placement_cell']) }}" 
                   class="flex items-center gap-3 px-4 py-3 text-sm font-bold text-slate-600 hover:bg-slate-50 hover:text-slate-900 rounded-xl transition-all">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                    Placement Accounts
                </a>

                <a href="{{ route('admin.users', ['role' => 'club_admin']) }}" 
                   class="flex items-center gap-3 px-4 py-3 text-sm font-bold text-slate-600 hover:bg-slate-50 hover:text-slate-900 rounded-xl transition-all">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                    Club Admins
                </a>

                <a href="{{ route('admin.users', ['role' => 'branch_admin']) }}" 
                   class="flex items-center gap-3 px-4 py-3 text-sm font-bold text-slate-600 hover:bg-slate-50 hover:text-slate-900 rounded-xl transition-all">
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
            <div class="w-10 h-10 rounded-xl bg-[#005F5B] text-white flex items-center justify-center font-bold text-sm shadow-md">
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
            <div class="font-extrabold text-[#005F5B] text-lg">System Administration Overview</div>
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

        {{-- Main Body --}}
        <main class="p-8 flex-1 space-y-6">
            
            {{-- Welcome Banner (Green branding) --}}
            <div class="bg-[#005F5B] rounded-3xl p-8 text-white relative overflow-hidden shadow-xl shadow-[#005F5B]/10">
                <h2 class="text-3xl font-extrabold tracking-tight">System Control Center</h2>
                <p class="text-[#EBF5F4]/80 text-[14px] mt-1">Manage institutional portals, user credentials, assignments, notices, and analytics.</p>
                <div class="flex gap-3 mt-4">
                    <a href="{{ route('admin.users.create', ['role' => 'student']) }}" class="inline-flex items-center gap-2 bg-white text-[#005F5B] font-bold text-sm px-5 py-2.5 rounded-xl hover:bg-[#EBF5F4] transition shadow-sm">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
                        </svg>
                        <span>Create Student Account</span>
                    </a>
                </div>
            </div>

            {{-- Stats --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
                <div class="bg-white border border-slate-200 rounded-2xl p-5 shadow-sm hover:shadow-md transition">
                    <p class="text-md font-bold text-slate-800 mb-2">Total Students</p>
                    <h3 class="text-3xl font-black text-[#005F5B]">{{ $totalStudents }}</h3>
                </div>
                <div class="bg-white border border-slate-200 rounded-2xl p-5 shadow-sm hover:shadow-md transition">
                    <p class="text-md font-bold text-slate-800 mb-2">Faculty Members</p>
                    <h3 class="text-3xl font-black text-[#005F5B]">{{ $totalFaculty }}</h3>
                </div>
                <div class="bg-white border border-slate-200 rounded-2xl p-5 shadow-sm hover:shadow-md transition">
                    <p class="text-md font-bold text-slate-800 mb-2">Branch Admins</p>
                    <h3 class="text-3xl font-black text-[#005F5B]">{{ $branchAdmins }}</h3>
                </div>
                <div class="bg-white border border-slate-200 rounded-2xl p-5 shadow-sm hover:shadow-md transition">
                    <p class="text-md font-bold text-slate-800 mb-2">Club Admins</p>
                    <h3 class="text-3xl font-black text-[#005F5B]">{{ $clubAdmins }}</h3>
                </div>
            </div>

            {{-- Double Column Layout --}}
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                
                {{-- Recent Achievements --}}
                <div class="bg-white border border-slate-200 rounded-2xl shadow-sm overflow-hidden flex flex-col">
                    <div class="p-5 border-b bg-slate-50/50 flex justify-between items-center">
                        <h4 class="font-extrabold text-[#005F5B]">Recent Achievement Activity</h4>
                        <span class="text-xs font-bold text-slate-500">Last 5 submissions</span>
                    </div>
                    <div class="divide-y divide-slate-100 overflow-x-auto">
                        <table class="w-full text-left text-sm">
                            <thead>
                                <tr class="bg-slate-50/20 text-xs font-bold uppercase text-black border-b">
                                    <th class="py-3 px-4">Student</th>
                                    <th class="py-3 px-4">Title</th>
                                    <th class="py-3 px-4">Status</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100 font-medium">
                                @forelse($recentAchievements as $achievement)
                                    <tr class="hover:bg-slate-50/40 transition">
                                        <td class="py-3.5 px-4 font-bold text-slate-850">
                                            {{ $achievement->student->name ?? 'Unknown Student' }}
                                        </td>
                                        <td class="py-3.5 px-4 text-xs text-slate-600 truncate max-w-[180px]">
                                            {{ $achievement->title }}
                                        </td>
                                        <td class="py-3.5 px-4">
                                            @if($achievement->status === 'Approved')
                                                <span class="text-emerald-700 bg-emerald-50 px-2 py-0.5 rounded-full text-[11px] font-bold">Approved</span>
                                            @elseif($achievement->status === 'Pending')
                                                <span class="text-amber-700 bg-amber-50 px-2 py-0.5 rounded-full text-[11px] font-bold">Pending</span>
                                            @else
                                                <span class="text-rose-700 bg-rose-50 px-2 py-0.5 rounded-full text-[11px] font-bold">Rejected</span>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="py-8 text-center text-slate-500 font-bold text-xs">No achievements logged.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                {{-- Recent Registered Users --}}
                <div class="bg-white border border-slate-200 rounded-2xl shadow-sm overflow-hidden flex flex-col">
                    <div class="p-5 border-b bg-slate-50/50 flex justify-between items-center">
                        <h4 class="font-extrabold text-[#005F5B]">Recently Added Students</h4>
                        <a href="{{ route('admin.users', ['role' => 'student']) }}" class="text-xs font-bold text-[#005F5B] hover:underline">View All &rarr;</a>
                    </div>
                    <div class="divide-y divide-slate-100">
                        @forelse($recentStudents as $std)
                            <div class="p-4 flex items-center justify-between hover:bg-slate-50/40 transition">
                                <div class="flex items-center gap-3">
                                    <div class="w-9 h-9 rounded-full bg-[#EBF5F4] text-[#005F5B] flex items-center justify-center font-bold text-xs">
                                        {{ $std->initials() }}
                                    </div>
                                    <div>
                                        <h5 class="text-sm font-bold text-slate-800">{{ $std->name }}</h5>
                                        <p class="text-xs text-slate-500 font-medium">Username: {{ $std->username ?: 'None' }}</p>
                                    </div>
                                </div>
                                <span class="text-xs font-semibold text-slate-400">
                                    {{ $std->created_at ? $std->created_at->diffForHumans() : '-' }}
                                </span>
                            </div>
                        @empty
                            <div class="p-8 text-center text-slate-500 font-bold text-xs">No students registered yet.</div>
                        @endforelse
                    </div>
                </div>

            </div>

        </main>
    </div>
</div>
@endsection
