@extends('layouts.app')
@section('content')
<div class="flex min-h-screen bg-[#F8FAFC]">
    <aside class="w-64 bg-white border-r border-slate-200 flex flex-col fixed h-full z-20 shadow-sm p-6">
        <div class="flex items-center gap-3 mb-8"><div class="bg-[#005F5B] text-white p-2 rounded-xl"><svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg></div><div><h3 class="font-extrabold text-slate-900 text-[15px]">Placement Cell</h3></div></div>
        <nav class="space-y-1">
            <a href="{{ route('placement.dashboard') }}" class="block px-4 py-3 text-sm font-bold rounded-xl text-slate-600 hover:bg-slate-50">Dashboard</a>
            <a href="{{ route('placement.jobs') }}" class="block px-4 py-3 text-sm font-bold rounded-xl text-slate-600 hover:bg-slate-50">Jobs & Drives</a>
            <a href="{{ route('placement.applications') }}" class="block px-4 py-3 text-sm font-bold rounded-xl text-slate-600 hover:bg-slate-50">Applications</a>
            <a href="{{ route('placement.students') }}" class="block px-4 py-3 text-sm font-bold rounded-xl text-slate-600 hover:bg-slate-50">Student Database</a>
        </nav>
        <div class="mt-auto"><form action="{{ route('logout') }}" method="POST">@csrf<button class="w-full text-sm font-bold text-slate-600 bg-slate-100 px-4 py-2 rounded-xl">Logout</button></form></div>
    </aside>
    <div class="pl-64 flex-1">
        <header class="h-16 bg-white border-b border-slate-200 flex items-center px-8 sticky top-0 z-10 shadow-sm">
            <a href="{{ route('placement.jobs') }}" class="text-[#005F5B] font-bold text-sm mr-4">&larr; Back</a>
            <h1 class="text-lg font-black text-slate-800">{{ isset($job) ? 'Edit Drive' : 'Post New Drive' }}</h1>
        </header>
        <main class="p-8 max-w-3xl">
            <div class="bg-white border border-slate-200 rounded-2xl shadow-sm p-8">
                <form method="POST" action="{{ isset($job) ? route('placement.jobs.update', $job) : route('placement.jobs.store') }}" class="space-y-5">
                    @csrf
                    @if(isset($job)) @method('PUT') @endif
                    @if($errors->any())<div class="p-4 bg-rose-50 border border-rose-200 rounded-xl text-rose-700 text-sm font-semibold"><ul class="list-disc list-inside">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul></div>@endif
                    <div class="grid grid-cols-2 gap-5">
                        <div><label class="block text-xs font-bold text-slate-700 mb-1.5">Company Name *</label><input type="text" name="company_name" value="{{ old('company_name', $job->company_name ?? '') }}" required class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm font-medium text-slate-800 focus:outline-none focus:border-[#005F5B] focus:bg-white transition"></div>
                        <div><label class="block text-xs font-bold text-slate-700 mb-1.5">Job Title *</label><input type="text" name="job_title" value="{{ old('job_title', $job->job_title ?? '') }}" required class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm font-medium text-slate-800 focus:outline-none focus:border-[#005F5B] focus:bg-white transition"></div>
                    </div>
                    <div><label class="block text-xs font-bold text-slate-700 mb-1.5">Job Description *</label><textarea name="job_description" rows="4" required class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm font-medium text-slate-800 focus:outline-none focus:border-[#005F5B] focus:bg-white transition">{{ old('job_description', $job->job_description ?? '') }}</textarea></div>
                    <div class="grid grid-cols-3 gap-5">
                        <div><label class="block text-xs font-bold text-slate-700 mb-1.5">Type *</label><select name="type" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm font-medium text-slate-800 focus:outline-none focus:border-[#005F5B] focus:bg-white transition"><option value="Job" {{ old('type', $job->type ?? '') === 'Job' ? 'selected' : '' }}>Job</option><option value="Internship" {{ old('type', $job->type ?? '') === 'Internship' ? 'selected' : '' }}>Internship</option></select></div>
                        <div><label class="block text-xs font-bold text-slate-700 mb-1.5">Min CGPA</label><input type="number" step="0.01" name="eligibility_cgpa" value="{{ old('eligibility_cgpa', $job->eligibility_cgpa ?? '0') }}" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm font-medium text-slate-800 focus:outline-none focus:border-[#005F5B] focus:bg-white transition"></div>
                        <div><label class="block text-xs font-bold text-slate-700 mb-1.5">Drive Date</label><input type="date" name="drive_date" value="{{ old('drive_date', isset($job->drive_date) ? \Carbon\Carbon::parse($job->drive_date)->format('Y-m-d') : '') }}" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm font-medium text-slate-800 focus:outline-none focus:border-[#005F5B] focus:bg-white transition"></div>
                    </div>
                    <div><label class="block text-xs font-bold text-slate-700 mb-1.5">Eligible Branches (comma separated)</label><input type="text" name="eligibility_branches" value="{{ old('eligibility_branches', $job->eligibility_branches ?? '') }}" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm font-medium text-slate-800 focus:outline-none focus:border-[#005F5B] focus:bg-white transition" placeholder="e.g. Computer Science, IT, Electronics"></div>
                    <div><label class="block text-xs font-bold text-slate-700 mb-1.5">Status</label><select name="status" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm font-medium text-slate-800 focus:outline-none focus:border-[#005F5B] focus:bg-white transition"><option value="Open" {{ old('status', $job->status ?? '') === 'Open' ? 'selected' : '' }}>Open</option><option value="Closed" {{ old('status', $job->status ?? '') === 'Closed' ? 'selected' : '' }}>Closed</option></select></div>
                    <div class="flex gap-3 border-t pt-5">
                        <a href="{{ route('placement.jobs') }}" class="px-5 py-2.5 border border-slate-200 rounded-xl text-sm font-bold text-slate-700 hover:bg-slate-50 transition">Cancel</a>
                        <button type="submit" class="px-6 py-2.5 bg-[#005F5B] text-white rounded-xl text-sm font-bold hover:bg-[#004845] transition shadow-md">{{ isset($job) ? 'Update Drive' : 'Post Drive' }}</button>
                    </div>
                </form>
            </div>
        </main>
    </div>
</div>
@endsection
