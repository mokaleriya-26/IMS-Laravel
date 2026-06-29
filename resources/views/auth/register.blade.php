@extends('layouts.app')

@section('content')
<div class="min-h-screen flex flex-col md:flex-row">
    
    <div class="w-full md:w-[40%] bg-[#005F5B] p-8 md:p-12 flex flex-col justify-between text-white relative overflow-hidden">
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

        <div class="relative z-10 my-8 md:my-0">
            <span class="text-xs font-bold uppercase tracking-wider text-[#EBF5F4]/60 bg-white/10 px-3 py-1 rounded-full backdrop-blur-sm">
                Student Onboarding
            </span>
            <h2 class="text-2xl md:text-3xl font-bold mt-4 leading-tight">
                Create an account to track your academic achievements, papers, and internship records.
            </h2>
        </div>

        <div class="relative z-10 text-xs text-[#EBF5F4]/50">
            <p>&copy; 2026 EduStream IMS. All Rights Reserved.</p>
        </div>
    </div>

    <div class="w-full md:w-[60%] bg-[#F8FAFC] flex items-center justify-center p-6 md:p-12 bg-dots overflow-y-auto">
        <div class="w-full max-w-[560px] bg-white rounded-3xl shadow-xl shadow-slate-200/60 border border-slate-100 p-8 md:p-10 my-4">
            
            <div class="mb-6">
                <a href="{{ route('login', 'student') }}" class="inline-flex items-center gap-2 text-xs font-bold text-[#005F5B] hover:underline mb-3">
                    &larr; Back to sign-in page
                </a>
                <h3 class="text-2xl font-bold text-slate-800">Register Account</h3>
                <p class="text-sm text-gray-500 mt-1">Provide your verified academic details below.</p>
            </div>

            @if($errors->any())
                <div class="mb-4 p-4 bg-rose-50 border border-rose-100 rounded-xl text-rose-600 text-sm font-medium">
                    <ul class="list-disc pl-4 space-y-1">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('register.submit') }}" method="POST" class="space-y-4">
                @csrf

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wide mb-1.5">Full Name</label>
                        <input type="text" name="name" required value="{{ old('name') }}"
                            class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm font-medium text-slate-800 placeholder-gray-400 focus:outline-none focus:border-[#005F5B] focus:bg-white transition"
                            placeholder="John Doe">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wide mb-1.5">Institutional Email</label>
                        <input type="email" name="email" required value="{{ old('email') }}"
                            class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm font-medium text-slate-800 placeholder-gray-400 focus:outline-none focus:border-[#005F5B] focus:bg-white transition"
                            placeholder="j.doe@institution.edu">
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wide mb-1.5">Roll Number</label>
                        <input type="text" name="roll_number" required value="{{ old('roll_number') }}"
                            class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm font-medium text-slate-800 placeholder-gray-400 focus:outline-none focus:border-[#005F5B] focus:bg-white transition"
                            placeholder="e.g. 21BCE0123">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wide mb-1.5">Branch / Department</label>
                        <input type="text" name="branch" required value="{{ old('branch') }}"
                            class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm font-medium text-slate-800 placeholder-gray-400 focus:outline-none focus:border-[#005F5B] focus:bg-white transition"
                            placeholder="Computer Engineering">
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wide mb-1.5">Current Academic Year</label>
                    <div class="grid grid-cols-4 gap-3">
                        @foreach([1 => '1st Year', 2 => '2nd Year', 3 => '3rd Year', 4 => '4th Year'] as $num => $label)
                            <label class="cursor-pointer">
                                <input type="radio" name="year_of_study" value="{{ $num }}" class="sr-only peer" {{ old('year_of_study', 1) == $num ? 'checked' : '' }}>
                                <div class="w-full text-center border py-2.5 rounded-xl text-sm font-semibold text-slate-600 bg-slate-50 peer-checked:border-[#005F5B] peer-checked:bg-[#EBF5F4] peer-checked:text-[#005F5B] transition-all">
                                    {{ $label }}
                                </div>
                            </label>
                        @endforeach
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wide mb-1.5">Choose Password</label>
                        <input type="password" name="password" required
                            class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm font-medium text-slate-800 focus:outline-none focus:border-[#005F5B] focus:bg-white transition">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wide mb-1.5">Confirm Password</label>
                        <input type="password" name="password_confirmation" required
                            class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm font-medium text-slate-800 focus:outline-none focus:border-[#005F5B] focus:bg-white transition">
                    </div>
                </div>

                <div class="pt-2">
                    <button type="submit" class="w-full bg-[#005F5B] text-white rounded-xl py-3.5 font-bold flex items-center justify-center gap-2 hover:bg-[#004845] shadow-lg shadow-[#005F5B]/10 transition-all active:scale-[0.99]">
                        Complete Registration
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                        </svg>
                    </button>
                </div>
            </form>

            <div class="text-center mt-6 text-sm text-gray-500">
                Already have a profile? <a href="{{ route('login', 'student') }}" class="text-[#005F5B] font-bold hover:underline">Sign In here</a>
            </div>

        </div>
    </div>

</div>
@endsection