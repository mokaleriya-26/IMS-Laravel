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
                   class="flex items-center gap-3 px-4 py-3 text-sm font-bold text-slate-600 hover:bg-slate-50 rounded-xl transition-all">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2H6a2 2 0 01-2-2V6z"/></svg>
                    Dashboard
                </a>
                
                <a href="{{ route('admin.users', ['role' => 'student']) }}" 
                   class="flex items-center gap-3 px-4 py-3 text-sm font-bold rounded-xl transition-all {{ request()->query('role') === 'student' ? 'bg-[#EBF5F4] text-[#005F5B]' : 'text-slate-600 hover:bg-slate-50' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 14l9-5-9-5-9 5 9 5z"/></svg>
                    Manage Students
                </a>

                <a href="{{ route('admin.users', ['role' => 'faculty']) }}" 
                   class="flex items-center gap-3 px-4 py-3 text-sm font-bold rounded-xl transition-all {{ request()->query('role') === 'faculty' ? 'bg-[#EBF5F4] text-[#005F5B]' : 'text-slate-600 hover:bg-slate-50' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857"/></svg>
                    Manage Faculty
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
        <header class="h-20 bg-white border-b border-slate-200/80 flex items-center justify-between px-8 sticky top-0 z-10 shadow-sm">
            <div class="font-extrabold text-slate-800 text-lg">Create User Account</div>
            <div class="flex items-center gap-4">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="text-sm font-bold text-rose-600 bg-rose-50 px-4 py-2 rounded-xl hover:bg-rose-100 transition shadow-sm">Logout</button>
                </form>
            </div>
        </header>

        {{-- Main Body --}}
        <main class="p-8 flex-1">
            <div class="max-w-3xl mx-auto bg-white border border-slate-200 rounded-3xl shadow-xl overflow-hidden">
                <div class="p-6 border-b border-slate-100 flex justify-between items-center bg-slate-50/50">
                    <div>
                        <h2 class="text-xl font-black text-slate-900">New User Form</h2>
                        <p class="text-xs text-slate-500 font-medium mt-0.5">Create a new institutional user with role and configuration details.</p>
                    </div>
                    <a href="{{ route('admin.users', ['role' => request()->query('role', 'student')]) }}" class="text-slate-450 hover:text-slate-700 text-sm font-bold p-2 bg-white rounded-full border shadow-sm transition">✕</a>
                </div>

                @if($errors->any())
                    <div class="m-6 p-4 bg-rose-50 border border-rose-200 rounded-xl text-rose-700 text-sm font-semibold">
                        <ul class="list-disc pl-4 space-y-1">
                            @foreach($errors->all() as $err)
                                <li>{{ $err }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('admin.users.store') }}" method="POST" class="p-8 space-y-6">
                    @csrf
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <div>
                            <label class="block text-xs font-bold text-slate-700 uppercase tracking-wide mb-2">Role Type *</label>
                            <select id="role-select" name="role" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm font-bold text-slate-700 focus:outline-none focus:border-[#005F5B] focus:bg-white transition-all">
                                <option value="student" {{ request()->query('role') === 'student' ? 'selected' : '' }}>Student</option>
                                <option value="faculty" {{ request()->query('role') === 'faculty' ? 'selected' : '' }}>Faculty</option>
                                <option value="placement_cell" {{ request()->query('role') === 'placement_cell' ? 'selected' : '' }}>Placement Cell</option>
                                <option value="club_admin" {{ request()->query('role') === 'club_admin' ? 'selected' : '' }}>Club Admin</option>
                                <option value="branch_admin" {{ request()->query('role') === 'branch_admin' ? 'selected' : '' }}>Branch Admin</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-700 uppercase tracking-wide mb-2">Full Name *</label>
                            <input type="text" name="name" required value="{{ old('name') }}" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3.5 text-sm font-medium focus:outline-none focus:border-[#005F5B] focus:bg-white transition-all" placeholder="John Doe">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <div>
                            <label class="block text-xs font-bold text-slate-700 uppercase tracking-wide mb-2">Username *</label>
                            <input type="text" name="username" required value="{{ old('username') }}" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3.5 text-sm font-medium focus:outline-none focus:border-[#005F5B] focus:bg-white transition-all" placeholder="e.g. john_doe">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-700 uppercase tracking-wide mb-2">Password *</label>
                            <input type="password" name="password" required class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3.5 text-sm font-medium focus:outline-none focus:border-[#005F5B] focus:bg-white transition-all" placeholder="Min 6 characters">
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wide mb-2">Email Address (Optional)</label>
                        <input type="email" name="email" value="{{ old('email') }}" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3.5 text-sm font-medium focus:outline-none focus:border-[#005F5B] focus:bg-white transition-all" placeholder="Defaults to: username@ims.edu">
                    </div>

                    {{-- Branch Assignment (Faculty / Branch Admin) --}}
                    <div id="branch-section" class="border-t pt-6 space-y-4 hidden">
                        <h4 class="text-xs font-extrabold text-slate-400 uppercase tracking-wide">Branch Admin Configuration</h4>
                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-1.5">Assigned Branch</label>
                            <input type="text" name="assigned_branch" value="{{ old('assigned_branch') }}" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3.5 text-sm font-medium focus:outline-none focus:border-[#005F5B] focus:bg-white transition-all" placeholder="e.g. Computer Science">
                        </div>
                    </div>

                    {{-- Club Assignment (Club Admin / Club Member) --}}
                    <div id="club-section" class="border-t pt-6 space-y-4 hidden">
                        <h4 class="text-xs font-extrabold text-slate-400 uppercase tracking-wide">Club Configuration</h4>
                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-1.5">Assigned Club Name</label>
                            <input type="text" name="assigned_club" value="{{ old('assigned_club') }}" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3.5 text-sm font-medium focus:outline-none focus:border-[#005F5B] focus:bg-white transition-all" placeholder="e.g. Coding Club">
                        </div>
                    </div>

                    {{-- Student Profile Section --}}
                    <div id="student-section" class="border-t pt-6 space-y-6">
                        <h4 class="text-xs font-extrabold text-slate-400 uppercase tracking-wide">Student Program Details</h4>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                            <div>
                                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wide mb-2">Roll Number</label>
                                <input type="text" id="roll_number" name="roll_number" value="{{ old('roll_number') }}" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3.5 text-sm font-medium focus:outline-none focus:border-[#005F5B] focus:bg-white transition-all" placeholder="e.g. CS2024001">
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wide mb-2">Branch / Major</label>
                                <input type="text" id="branch" name="branch" value="{{ old('branch') }}" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3.5 text-sm font-medium focus:outline-none focus:border-[#005F5B] focus:bg-white transition-all" placeholder="e.g. Computer Science">
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wide mb-2">Year of Study</label>
                                <select id="year_of_study" name="year_of_study" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm font-bold text-slate-700 focus:outline-none focus:border-[#005F5B] focus:bg-white transition-all">
                                    <option value="1" {{ old('year_of_study') == 1 ? 'selected' : '' }}>First Year</option>
                                    <option value="2" {{ old('year_of_study') == 2 ? 'selected' : '' }}>Second Year</option>
                                    <option value="3" {{ old('year_of_study') == 3 ? 'selected' : '' }}>Third Year</option>
                                    <option value="4" {{ old('year_of_study') == 4 ? 'selected' : '' }}>Fourth Year</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="border-t pt-5 flex justify-end gap-3 bg-white">
                        <a href="{{ route('admin.users', ['role' => request()->query('role', 'student')]) }}" class="px-5 py-2.5 border border-slate-200 rounded-xl text-sm font-bold text-slate-700 hover:bg-slate-50 transition shadow-sm">Discard</a>
                        <button type="submit" class="px-6 py-2.5 bg-[#005F5B] text-white rounded-xl text-sm font-bold hover:bg-[#004845] transition shadow-md">
                            Create Account
                        </button>
                    </div>
                </form>
            </div>
        </main>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const roleSelect = document.getElementById('role-select');
        const studentSection = document.getElementById('student-section');
        const branchSection = document.getElementById('branch-section');
        const clubSection = document.getElementById('club-section');
        const rollInput = document.getElementById('roll_number');
        const branchInput = document.getElementById('branch');

        function toggleFields() {
            const val = roleSelect.value;
            
            // Student specific
            if (val === 'student') {
                studentSection.style.display = 'block';
                rollInput.required = true;
                branchInput.required = true;
            } else {
                studentSection.style.display = 'none';
                rollInput.required = false;
                branchInput.required = false;
            }

            // Branch Admin / Faculty specific
            if (val === 'branch_admin' || val === 'faculty') {
                branchSection.style.display = 'block';
            } else {
                branchSection.style.display = 'none';
            }

            // Club Admin specific
            if (val === 'club_admin') {
                clubSection.style.display = 'block';
            } else {
                clubSection.style.display = 'none';
            }
        }

        roleSelect.addEventListener('change', toggleFields);
        toggleFields();
    });
</script>
@endsection
