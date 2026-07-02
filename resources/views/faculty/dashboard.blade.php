@extends('layouts.app')

@section('content')
<div class="flex min-h-screen bg-[#F8FAFC]">
    
    {{-- Sidebar --}}
    <aside class="w-64 bg-white border-r border-slate-200 flex flex-col justify-between fixed h-full z-20 shadow-sm">
        <div class="p-6">
            <div class="flex items-center gap-3 mb-8">
                <div class="bg-[#005F5B] text-white p-2 rounded-xl shadow-md">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                    </svg>
                </div>
                <div>
                    <h3 class="font-extrabold text-slate-900 text-[15px] tracking-tight">Faculty Portal</h3>
                    <p class="text-[11px] text-slate-500 font-medium">EduStream IMS</p>
                </div>
            </div>

            <nav class="space-y-1">
                <a href="{{ route('faculty.dashboard', ['view' => 'queue']) }}" 
                   class="flex items-center gap-3 px-4 py-3 text-sm font-bold rounded-xl transition-all {{ $currentView === 'queue' ? 'bg-[#EBF5F4] text-[#005F5B]' : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"/></svg>
                    Verification Queue
                </a>
            </nav>
        </div>

        <div class="p-4 border-t border-slate-100 m-4 rounded-2xl flex items-center gap-3 bg-slate-50/50">
            <div class="w-10 h-10 rounded-xl bg-[#005F5B] text-white flex items-center justify-center font-bold text-sm shadow-md">
                {{ Auth::user()->initials() }}
            </div>
            <div class="overflow-hidden">
                <h5 class="text-sm font-bold text-slate-800 truncate">{{ Auth::user()->name }}</h5>
                <p class="text-xs text-slate-500 font-medium truncate">Faculty Member</p>
            </div>
        </div>
    </aside>

    {{-- Main Frame --}}
    <div class="pl-64 flex-1 flex flex-col min-h-screen">
        
        <header class="h-16 bg-white border-b border-slate-200 flex items-center justify-between px-8 sticky top-0 z-10">
            <h2 class="text-base font-black text-[#005F5B]">Faculty Reviewer Space</h2>
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

        <main class="p-8 flex-1">

            @if(session('success'))
                <div class="mb-6 p-4 bg-emerald-50 border border-emerald-200 rounded-xl text-emerald-800 text-sm font-semibold shadow-sm">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="mb-6 p-4 bg-rose-50 border border-rose-200 rounded-xl text-rose-700 text-sm font-semibold shadow-sm">
                    {{ session('error') }}
                </div>
            @endif

            @if($currentView === 'queue')
                <div class="space-y-6">
                    <div>
                        <h1 class="text-2xl font-black text-[#005F5B] tracking-tight">Verification Pipeline</h1>
                        <p class="text-sm text-slate-600 font-medium mt-1">Review student achievements, publications, and certificates.</p>
                    </div>

                    {{-- Advanced Filtering Section --}}
                    <div class="bg-white border border-slate-200 rounded-2xl p-6 shadow-sm">
                        <h3 class="text-sm font-bold text-slate-800 mb-4 flex items-center gap-2">
                            <span>🔍</span> Advanced Filters (Multiple Simultaneous)
                        </h3>
                        <form method="GET" action="{{ route('faculty.dashboard') }}" class="grid grid-cols-1 md:grid-cols-4 gap-4">
                            <input type="hidden" name="view" value="queue">
                            
                            <div>
                                <label class="block text-xs font-bold text-slate-700 mb-1">Branch</label>
                                <input type="text" name="branch" value="{{ request('branch') }}" placeholder="e.g. Computer Science" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3 py-2 text-sm focus:outline-none focus:border-[#005F5B]">
                            </div>

                            <div>
                                <label class="block text-xs font-bold text-slate-700 mb-1">Academic Year</label>
                                <input type="text" name="academic_year" value="{{ request('academic_year') }}" placeholder="e.g. 2024–2025" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3 py-2 text-sm focus:outline-none focus:border-[#005F5B]">
                            </div>

                            <div>
                                <label class="block text-xs font-bold text-slate-700 mb-1">Semester</label>
                                <select name="semester" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3 py-2 text-sm focus:outline-none focus:border-[#005F5B]">
                                    <option value="">All Semesters</option>
                                    @foreach(['I','II','III','IV','V','VI','VII','VIII'] as $sem)
                                        <option value="{{ $sem }}" {{ request('semester') === $sem ? 'selected' : '' }}>Sem {{ $sem }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <label class="block text-xs font-bold text-slate-700 mb-1">Division</label>
                                <input type="text" name="division" value="{{ request('division') }}" placeholder="e.g. A / B" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3 py-2 text-sm focus:outline-none focus:border-[#005F5B]">
                            </div>

                            <div>
                                <label class="block text-xs font-bold text-slate-700 mb-1">Status</label>
                                <select name="status" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3 py-2 text-sm focus:outline-none focus:border-[#005F5B]">
                                    <option value="">All Statuses</option>
                                    <option value="Pending" {{ request('status') === 'Pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="Approved" {{ request('status') === 'Approved' ? 'selected' : '' }}>Approved</option>
                                    <option value="Rejected" {{ request('status') === 'Rejected' ? 'selected' : '' }}>Rejected</option>
                                </select>
                            </div>

                            <div>
                                <label class="block text-xs font-bold text-slate-700 mb-1">Faculty Evaluator Name</label>
                                <input type="text" name="faculty_name" value="{{ request('faculty_name') }}" placeholder="Search by faculty..." class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3 py-2 text-sm focus:outline-none focus:border-[#005F5B]">
                            </div>

                            <div>
                                <label class="block text-xs font-bold text-slate-700 mb-1">Start Date</label>
                                <input type="date" name="start_date" value="{{ request('start_date') }}" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3 py-2 text-sm focus:outline-none focus:border-[#005F5B]">
                            </div>

                            <div>
                                <label class="block text-xs font-bold text-slate-700 mb-1">End Date</label>
                                <input type="date" name="end_date" value="{{ request('end_date') }}" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3 py-2 text-sm focus:outline-none focus:border-[#005F5B]">
                            </div>

                            <div class="md:col-span-4 flex justify-end gap-3 mt-2">
                                <a href="{{ route('faculty.dashboard') }}" class="border border-slate-200 text-slate-700 font-bold text-sm px-5 py-2.5 rounded-xl hover:bg-slate-50 transition">Reset</a>
                                <button type="submit" class="bg-[#005F5B] text-white font-bold text-sm px-6 py-2.5 rounded-xl hover:bg-[#004845] transition">Apply Filters</button>
                            </div>
                        </form>
                    </div>

                    {{-- Table --}}
                    <div class="bg-white border border-slate-200 rounded-2xl shadow-sm overflow-hidden">
                        <table class="w-full text-left text-sm">
                            <thead>
                                <tr class="border-b text-xs font-bold uppercase text-black bg-slate-50 tracking-wider">
                                    <th class="py-4 px-6">Student details</th>
                                    <th class="py-4 px-6">Category</th>
                                    <th class="py-4 px-6">Event Name</th>
                                    <th class="py-4 px-6">Status</th>
                                    <th class="py-4 px-6 text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100 font-medium">
                                @forelse($achievements as $item)
                                    <tr class="hover:bg-slate-50 transition">
                                        <td class="py-4 px-6">
                                            <div class="font-bold text-slate-800">{{ $item->student->name ?? 'Unknown Student' }}</div>
                                            <div class="text-xs text-slate-500 font-semibold">{{ optional($item->student->studentProfile)->roll_number ?? 'No ID' }} ({{ optional($item->student->studentProfile)->branch ?? 'No Branch' }})</div>
                                        </td>
                                        <td class="py-4 px-6">
                                            <span class="bg-[#EBF5F4] text-[#005F5B] font-extrabold text-xs px-2.5 py-1 rounded-md">
                                                {{ $item->category }}
                                            </span>
                                        </td>
                                        <td class="py-4 px-6 font-bold text-slate-700 max-w-sm truncate">{{ $item->event_name ?? $item->title }}</td>
                                        <td class="py-4 px-6">
                                            @if($item->status === 'Approved')
                                                <span class="text-emerald-700 bg-emerald-50 px-2.5 py-1 rounded-full text-xs font-bold">● Verified</span>
                                            @elseif($item->status === 'Pending')
                                                <span class="text-amber-700 bg-amber-50 px-2.5 py-1 rounded-full text-xs font-bold">● Pending</span>
                                            @else
                                                <span class="text-rose-700 bg-rose-50 px-2.5 py-1 rounded-full text-xs font-bold">● Returned</span>
                                            @endif
                                        </td>
                                        <td class="py-4 px-6 text-center">
                                            <a href="{{ route('faculty.dashboard', ['view' => 'review', 'id' => $item->id]) }}" 
                                               class="inline-flex bg-[#005F5B] text-white text-xs font-bold px-4 py-2 rounded-xl hover:bg-[#004845] transition shadow-sm">
                                                Evaluate &rarr;
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="py-12 text-center text-slate-500 font-bold">
                                            No student submissions match your filters.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

            @elseif($currentView === 'review' && $selectedAchievement)
                <div class="max-w-5xl mx-auto space-y-6">
                    
                    <div class="flex items-center justify-between">
                        <a href="{{ route('faculty.dashboard', ['view' => 'queue']) }}" class="inline-flex items-center gap-2 text-sm font-bold text-[#005F5B] bg-white border border-slate-200 px-4 py-2 rounded-xl shadow-sm hover:bg-slate-50 transition">
                            &larr; Return to Dashboard Queue
                        </a>
                        <span class="text-xs font-bold text-slate-500 uppercase tracking-wider">Submission reference ID: #{{ $selectedAchievement->id }}</span>
                    </div>

                    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-start">
                        
                        <div class="lg:col-span-7 bg-white border border-slate-200 rounded-3xl p-6 shadow-sm space-y-6">
                            <div>
                                <span class="bg-[#EBF5F4] text-[#005F5B] text-xs font-extrabold px-3 py-1 rounded-md uppercase tracking-wider">{{ $selectedAchievement->category }}</span>
                                <h2 class="text-xl font-black text-slate-900 mt-2 leading-snug">{{ $selectedAchievement->event_name ?? $selectedAchievement->title }}</h2>
                                <p class="text-xs text-slate-500 font-semibold mt-1">Submitted on {{ $selectedAchievement->created_at ? $selectedAchievement->created_at->format('M d, Y \a\t h:i A') : now()->format('M d, Y') }}</p>
                            </div>

                            <hr class="border-slate-100">

                            <div class="grid grid-cols-2 gap-4 text-sm font-medium text-slate-700">
                                <div>
                                    <span class="block text-[10px] text-slate-500 uppercase font-bold tracking-wider">Academic Year</span>
                                    <p class="font-bold text-slate-800 mt-0.5">{{ $selectedAchievement->academic_year ?? '—' }}</p>
                                </div>
                                <div>
                                    <span class="block text-[10px] text-slate-500 uppercase font-bold tracking-wider">Semester / Division</span>
                                    <p class="font-bold text-slate-800 mt-0.5">Sem {{ $selectedAchievement->semester ?? '—' }} | Div {{ $selectedAchievement->division ?? '—' }}</p>
                                </div>
                                <div>
                                    <span class="block text-[10px] text-slate-500 uppercase font-bold tracking-wider">Organization</span>
                                    <p class="font-bold text-slate-800 mt-0.5">{{ $selectedAchievement->organization_name ?? '—' }}</p>
                                </div>
                                <div>
                                    <span class="block text-[10px] text-slate-500 uppercase font-bold tracking-wider">Event Name</span>
                                    <p class="font-bold text-slate-800 mt-0.5">{{ $selectedAchievement->event_name ?? '—' }}</p>
                                </div>
                                <div>
                                    <span class="block text-[10px] text-slate-500 uppercase font-bold tracking-wider">Award Status / From-To Date</span>
                                    <p class="font-bold text-slate-800 mt-0.5">{{ $selectedAchievement->award_status ?? '—' }} ({{ $selectedAchievement->from_date ?? '—' }} to {{ $selectedAchievement->to_date ?? '—' }})</p>
                                </div>
                            </div>

                            <hr class="border-slate-100">

                            <div>
                                <label class="block text-xs font-bold text-slate-500 uppercase tracking-wide mb-2">Uploaded Proof Document</label>
                                <div class="bg-slate-50 border border-slate-200 border-dashed rounded-2xl p-4 flex flex-col items-center justify-center min-h-[220px] text-center group">
                                    <span class="text-4xl mb-2">📄</span>
                                    <p class="text-sm font-bold text-slate-800">{{ basename($selectedAchievement->file_path) }}</p>
                                    
                                    <div class="flex gap-2 mt-4">
                                        <a href="{{ asset('storage/' . $selectedAchievement->file_path) }}" target="_blank" class="bg-white border border-slate-200 text-slate-700 text-xs font-bold px-4 py-2 rounded-xl shadow-sm hover:bg-slate-50 transition">👁 View Original</a>
                                        <a href="{{ asset('storage/' . $selectedAchievement->file_path) }}" download class="bg-[#005F5B] text-white text-xs font-bold px-4 py-2 rounded-xl shadow-sm hover:bg-[#004845] transition">📥 Download</a>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <label class="block text-xs font-bold text-slate-500 uppercase tracking-wide mb-1.5">Student Details / Description</label>
                                <div class="bg-slate-50 border rounded-2xl p-4 text-sm font-medium text-slate-700 leading-relaxed">
                                    {{ $selectedAchievement->description ?? 'No written details provided.' }}
                                </div>
                            </div>
                        </div>

                        <div class="lg:col-span-5 space-y-6">
                            
                            <div class="bg-white border border-slate-200 rounded-3xl p-6 shadow-sm space-y-4">
                                <h4 class="text-xs font-bold text-[#005F5B] uppercase tracking-wide">Student Snapshot</h4>
                                <div class="flex items-center gap-3 bg-slate-50 p-3.5 rounded-2xl border border-slate-100">
                                    <div class="w-10 h-10 rounded-xl bg-[#005F5B] text-white flex items-center justify-center font-bold text-sm">
                                        {{ strtoupper(substr($selectedAchievement->student->name ?? 'ST', 0, 2)) }}
                                    </div>
                                    <div class="overflow-hidden">
                                        <h5 class="text-sm font-bold text-slate-800 truncate">{{ $selectedAchievement->student->name ?? 'Unknown Student' }}</h5>
                                        <p class="text-xs text-slate-500 font-semibold truncate">Roll Number: {{ $selectedAchievement->student->studentProfile->roll_number ?? 'Unset' }}</p>
                                    </div>
                                </div>

                                <div class="grid grid-cols-2 gap-y-3 gap-x-4 text-xs font-semibold text-slate-600">
                                    <div>
                                        <span class="block text-[10px] text-slate-500 uppercase font-bold">Branch</span>
                                        <span class="text-slate-800 truncate block mt-0.5">{{ $selectedAchievement->student->studentProfile->branch ?? '-' }}</span>
                                    </div>
                                    <div>
                                        <span class="block text-[10px] text-slate-500 uppercase font-bold">Year</span>
                                        <span class="text-slate-800 block mt-0.5">{{ $selectedAchievement->student->studentProfile->year_of_study ?? '-' }} Year</span>
                                    </div>
                                </div>
                            </div>

                            <div class="bg-white border border-slate-200 rounded-3xl p-6 shadow-xl shadow-slate-100/50 space-y-4">
                                <h4 class="text-xs font-bold text-[#005F5B] uppercase tracking-wide">Review & Verification</h4>
                                
                                <form action="{{ route('faculty.review.process', $selectedAchievement->id) }}" method="POST" class="space-y-4">
                                    @csrf
                                    
                                    <div>
                                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wide mb-2">Verification Decision</label>
                                        <select name="status" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm font-bold text-slate-700 focus:outline-none focus:border-[#005F5B] focus:bg-white transition-all">
                                            <option value="Approved" {{ $selectedAchievement->status === 'Approved' ? 'selected' : '' }}>✅ Approve</option>
                                            <option value="Pending" {{ $selectedAchievement->status === 'Pending' ? 'selected' : '' }}>⏳ Keep Pending</option>
                                            <option value="Rejected" {{ $selectedAchievement->status === 'Rejected' ? 'selected' : '' }}>❌ Reject</option>
                                        </select>
                                    </div>

                                    <div>
                                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wide mb-2">Remarks / Comments</label>
                                        <textarea name="faculty_remarks" rows="4" class="w-full bg-slate-50 border border-slate-200 rounded-xl p-4 text-sm font-medium focus:outline-none focus:border-[#005F5B] focus:bg-white transition-all" placeholder="Explain the decision or reasons for return...">{{ old('faculty_remarks', $selectedAchievement->faculty_remarks) }}</textarea>
                                    </div>

                                    <hr class="border-slate-100">

                                    <button type="submit" class="w-full bg-[#005F5B] text-white py-3.5 rounded-xl font-bold text-sm tracking-wide shadow-md shadow-[#005F5B]/10 hover:bg-[#004845] transition-all flex items-center justify-center gap-1.5">
                                        Save Verification Assessment
                                    </button>
                                </form>
                            </div>

                        </div>
                    </div>

                </div>
            @endif

        </main>
    </div>
</div>
@endsection