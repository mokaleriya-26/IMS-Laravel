@extends('layouts.app')

@section('content')
<div class="min-h-screen flex flex-col md:flex-row">
    
    <div class="w-full md:w-[45%] bg-[#005F5B] p-8 md:p-16 flex flex-col justify-between text-white relative overflow-hidden">
        <div class="absolute -top-20 -left-20 w-80 h-80 bg-white/10 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute -bottom-20 -right-20 w-96 h-96 bg-black/20 rounded-full blur-3xl pointer-events-none"></div>

        <div class="relative z-10">
            <div class="inline-flex bg-white/10 backdrop-blur-md p-3 rounded-2xl mb-4 border border-white/10">
                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 14l9-5-9-5-9 5 9 5z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"/>
                </svg>
            </div>
            <h1 class="text-3xl font-bold tracking-tight">EduStream IMS</h1>
            <p class="text-[#EBF5F4]/70 text-sm mt-1">Institutional Management System</p>
        </div>

        <div class="relative z-10 my-12 md:my-0">
            @php
                $roleLabels = [
                    'student'        => 'Student',
                    'faculty'        => 'Faculty',
                    'admin'          => 'Main Admin',
                    'placement_cell' => 'Placement Cell',
                    'club_admin'     => 'Club Admin',
                    'branch_admin'   => 'Branch Admin',
                ];
                $roleTaglines = [
                    'student'        => 'Track your achievements and academic milestones seamlessly.',
                    'faculty'        => 'Review, evaluate, and authenticate student credentials.',
                    'admin'          => 'Full system control — manage users, roles, and analytics.',
                    'placement_cell' => 'Manage placement drives, companies, and student eligibility.',
                    'club_admin'     => 'Create events, manage members, and publish announcements.',
                    'branch_admin'   => 'Oversee branch students, faculty, and academic reports.',
                ];
            @endphp
            <span class="text-xs font-bold uppercase tracking-wider text-[#EBF5F4]/60 bg-white/10 px-3 py-1 rounded-full backdrop-blur-sm">
                {{ $roleLabels[$role] ?? ucfirst($role) }} Portal Secure Access
            </span>
            <h2 class="text-2xl md:text-3xl font-bold mt-4 leading-tight">
                {{ $roleTaglines[$role] ?? 'Access your institutional portal securely.' }}
            </h2>
        </div>

        <div class="relative z-10 text-xs text-[#EBF5F4]/50 space-y-1">
            <p>&copy; 2026 EduStream IMS. All Rights Reserved.</p>
            <p class="flex items-center gap-1.5">
                <span class="w-2 h-2 rounded-full bg-emerald-400 inline-block animate-pulse"></span>
                All core database pipelines operational.
            </p>
        </div>
    </div>

    <div class="w-full md:w-[55%] bg-[#F8FAFC] flex items-center justify-center p-6 md:p-16 bg-dots">
        <div class="w-full max-w-[440px] bg-white rounded-3xl shadow-xl shadow-slate-200/60 border border-slate-100 p-8 md:p-10">
            
            <div class="mb-8">
                <a href="{{ route('portal.select') }}" class="inline-flex items-center gap-2 text-xs font-bold text-[#005F5B] hover:underline mb-4">
                    &larr; Back to portal selection
                </a>
                <h3 class="text-2xl font-bold text-slate-800">Sign In</h3>
                <p class="text-sm text-gray-500 mt-1">Please enter your {{ $role }} credentials below.</p>
            </div>

            @if($errors->any())
                <div class="mb-6 p-4 bg-rose-50 border border-rose-100 rounded-xl text-rose-600 text-sm font-medium">
                    {{ $errors->first('login') ?: $errors->first() }}
                </div>
            @endif

            <form action="{{ route('login.submit') }}" method="POST" class="space-y-5">
                @csrf
                <input type="hidden" name="role" value="{{ $role }}">

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Username or Email Address</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-gray-400">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.206" />
                            </svg>
                        </span>
                        <input type="text" name="login" required value="{{ old('login') }}"
                            class="w-full bg-slate-50 border border-slate-200 rounded-xl pl-11 pr-4 py-3.5 text-sm font-medium text-slate-800 placeholder-gray-400 focus:outline-none focus:border-[#005F5B] focus:bg-white transition" 
                            placeholder="Username or email">
                    </div>
                </div>

                <div>
                    <div class="flex justify-between items-center mb-2">
                        <label class="block text-sm font-semibold text-slate-700">Account Password</label>
                        <a href="#" class="text-xs font-bold text-[#005F5B] hover:underline">Forgot?</a>
                    </div>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-gray-400">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                            </svg>
                        </span>
                        <input type="password" name="password" required
                            class="w-full bg-slate-50 border border-slate-200 rounded-xl pl-11 pr-4 py-3.5 text-sm font-medium text-slate-800 focus:outline-none focus:border-[#005F5B] focus:bg-white transition">
                    </div>
                </div>

                <div class="flex items-center gap-3 py-1">
                    <input type="checkbox" id="remember" name="remember" class="w-4 h-4 rounded text-[#005F5B] border-slate-300 focus:ring-[#005F5B]">
                    <label for="remember" class="text-sm font-medium text-gray-600 select-none cursor-pointer">Remember my session</label>
                </div>

                <button type="submit" class="w-full bg-[#005F5B] text-white rounded-xl py-4 font-bold flex items-center justify-center gap-2 hover:bg-[#004845] shadow-lg shadow-[#005F5B]/10 transition-all active:scale-[0.99]">
                    Access Dashboard Portal
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13 5l7 7-7 7M5 5l7 7-7 7" />
                    </svg>
                </button>
            </form>
            
            @if($role === 'student')
                <div class="text-center mt-6 text-sm text-gray-500">
                    New candidate? <a href="{{ route('register') }}" class="text-[#005F5B] font-bold hover:underline">Create an account</a>
                </div>
            @endif

        </div>
    </div>

</div>
@endsection