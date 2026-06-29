@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-dots flex flex-col justify-between items-center p-6">
    <div class="my-auto w-full max-w-[640px]">
        <div class="text-center mb-8">
            <div class="inline-flex bg-[#005F5B] text-white p-3.5 rounded-2xl shadow-md shadow-[#005F5B]/20 mb-4">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 14l9-5-9-5-9 5 9 5z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"/>
                </svg>
            </div>
            <h1 class="text-3xl font-bold text-slate-900 tracking-tight">EduStream IMS</h1>
            <p class="text-slate-600 mt-1.5 text-[15px]">Select your portal to continue</p>
        </div>

        <div class="bg-white rounded-3xl shadow-xl shadow-slate-200/50 border border-slate-100 p-6 space-y-3">
            
            {{-- Student --}}
            <a href="{{ route('login', 'student') }}" class="portal-card flex items-center justify-between p-4 border border-dashed border-slate-200 rounded-2xl hover:border-[#005F5B] hover:bg-[#EBF5F4]/30 transition group">
                <div class="flex items-center gap-3.5">
                    <div class="p-2.5 bg-[#EBF5F4] text-[#005F5B] rounded-xl group-hover:bg-[#005F5B] group-hover:text-white transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 14l9-5-9-5-9 5 9 5z"/></svg>
                    </div>
                    <div>
                        <h4 class="font-bold text-slate-800 text-[15px]">Student Login</h4>
                        <p class="text-xs text-slate-500 mt-0.5">Submit achievements, view academic records</p>
                    </div>
                </div>
                <span class="text-slate-400 group-hover:text-[#005F5B] group-hover:translate-x-1 transition-transform inline-block">&rarr;</span>
            </a>

            {{-- Faculty --}}
            <a href="{{ route('login', 'faculty') }}" class="portal-card flex items-center justify-between p-4 border border-dashed border-slate-200 rounded-2xl hover:border-[#005F5B] hover:bg-[#EBF5F4]/30 transition group">
                <div class="flex items-center gap-3.5">
                    <div class="p-2.5 bg-slate-100 text-slate-600 rounded-xl group-hover:bg-[#005F5B] group-hover:text-white transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                    </div>
                    <div>
                        <h4 class="font-bold text-slate-800 text-[15px]">Faculty Login</h4>
                        <p class="text-xs text-slate-500 mt-0.5">Review and approve student submissions</p>
                    </div>
                </div>
                <span class="text-slate-400 group-hover:text-[#005F5B] group-hover:translate-x-1 transition-transform inline-block">&rarr;</span>
            </a>

            {{-- Placement Cell --}}
            <a href="{{ route('login', 'placement_cell') }}" class="portal-card flex items-center justify-between p-4 border border-dashed border-slate-200 rounded-2xl hover:border-[#005F5B] hover:bg-[#EBF5F4]/30 transition group">
                <div class="flex items-center gap-3.5">
                    <div class="p-2.5 bg-blue-50 text-blue-600 rounded-xl group-hover:bg-[#005F5B] group-hover:text-white transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                    </div>
                    <div>
                        <h4 class="font-bold text-slate-800 text-[15px]">Placement Cell</h4>
                        <p class="text-xs text-slate-500 mt-0.5">Manage drives, companies & student placements</p>
                    </div>
                </div>
                <span class="text-slate-400 group-hover:text-[#005F5B] group-hover:translate-x-1 transition-transform inline-block">&rarr;</span>
            </a>

            {{-- Club Member --}}
            <a href="{{ route('login', 'club_login') }}" class="portal-card flex items-center justify-between p-4 border border-dashed border-slate-200 rounded-2xl hover:border-[#005F5B] hover:bg-[#EBF5F4]/30 transition group">
                <div class="flex items-center gap-3.5">
                    <div class="p-2.5 bg-purple-50 text-purple-600 rounded-xl group-hover:bg-[#005F5B] group-hover:text-white transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                    </div>
                    <div>
                        <h4 class="font-bold text-slate-800 text-[15px]">Club Login</h4>
                        <p class="text-xs text-slate-500 mt-0.5">View events, register & submit club reports</p>
                    </div>
                </div>
                <span class="text-slate-400 group-hover:text-[#005F5B] group-hover:translate-x-1 transition-transform inline-block">&rarr;</span>
            </a>

            {{-- Club Admin --}}
            <a href="{{ route('login', 'club_admin') }}" class="portal-card flex items-center justify-between p-4 border border-dashed border-slate-200 rounded-2xl hover:border-[#005F5B] hover:bg-[#EBF5F4]/30 transition group">
                <div class="flex items-center gap-3.5">
                    <div class="p-2.5 bg-indigo-50 text-indigo-600 rounded-xl group-hover:bg-[#005F5B] group-hover:text-white transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                    </div>
                    <div>
                        <h4 class="font-bold text-slate-800 text-[15px]">Club Admin</h4>
                        <p class="text-xs text-slate-500 mt-0.5">Manage members, events & club announcements</p>
                    </div>
                </div>
                <span class="text-slate-400 group-hover:text-[#005F5B] group-hover:translate-x-1 transition-transform inline-block">&rarr;</span>
            </a>

            {{-- Branch Admin --}}
            <a href="{{ route('login', 'branch_admin') }}" class="portal-card flex items-center justify-between p-4 border border-dashed border-slate-200 rounded-2xl hover:border-[#005F5B] hover:bg-[#EBF5F4]/30 transition group">
                <div class="flex items-center gap-3.5">
                    <div class="p-2.5 bg-amber-50 text-amber-600 rounded-xl group-hover:bg-[#005F5B] group-hover:text-white transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-2 10v-5a1 1 0 00-1-1h-2a1 1 0 00-1 1v5m4 0H9"/></svg>
                    </div>
                    <div>
                        <h4 class="font-bold text-slate-800 text-[15px]">Branch Admin</h4>
                        <p class="text-xs text-slate-500 mt-0.5">Manage branch students, faculty & reports</p>
                    </div>
                </div>
                <span class="text-slate-400 group-hover:text-[#005F5B] group-hover:translate-x-1 transition-transform inline-block">&rarr;</span>
            </a>

            {{-- Main Admin --}}
            <a href="{{ route('login', 'admin') }}" class="portal-card flex items-center justify-between p-4 border border-[#005F5B]/30 bg-[#EBF5F4]/20 rounded-2xl hover:border-[#005F5B] hover:bg-[#EBF5F4]/60 transition group">
                <div class="flex items-center gap-3.5">
                    <div class="p-2.5 bg-[#005F5B] text-white rounded-xl group-hover:scale-105 transition-transform">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </div>
                    <div>
                        <h4 class="font-bold text-[#005F5B] text-[15px]">Main Admin <span class="text-xs font-semibold bg-[#005F5B] text-white px-1.5 py-0.5 rounded-md ml-1">Super</span></h4>
                        <p class="text-xs text-slate-600 mt-0.5">Full system control, user management & analytics</p>
                    </div>
                </div>
                <span class="text-[#005F5B] group-hover:translate-x-1 transition-transform inline-block">&rarr;</span>
            </a>
        </div>

        <div class="text-center mt-6 text-sm text-slate-500">
            New student? <a href="{{ route('register') }}" class="text-[#005F5B] font-semibold hover:underline">Register here</a>
        </div>
    </div>

    <footer class="text-center text-xs text-slate-400 space-y-1 mt-6">
        <p>&copy; {{ date('Y') }} EduStream IMS. All Rights Reserved.</p>
        <div class="space-x-3">
            <a href="#" class="hover:underline">Privacy Policy</a>
            <span>•</span>
            <a href="#" class="hover:underline">Terms of Service</a>
        </div>
    </footer>
</div>
@endsection