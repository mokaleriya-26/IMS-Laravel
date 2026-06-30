@extends('layouts.app')
@section('content')
<div class="flex min-h-screen bg-[#F8FAFC]">
    <aside class="w-64 bg-white border-r border-slate-200 flex flex-col fixed h-full z-20 shadow-sm p-6">
        <div class="flex items-center gap-3 mb-8"><div class="bg-indigo-600 text-white p-2 rounded-xl"><svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg></div><div><h3 class="font-extrabold text-slate-900 text-[15px]">{{ $clubName }}</h3></div></div>
        <nav class="space-y-1">
            <a href="{{ route('club.admin.dashboard') }}" class="block px-4 py-3 text-sm font-bold rounded-xl text-slate-600 hover:bg-slate-50">Dashboard</a>
            <a href="{{ route('club.admin.events') }}" class="block px-4 py-3 text-sm font-bold rounded-xl text-slate-600 hover:bg-slate-50">Manage Events</a>
            <a href="{{ route('club.admin.registrations') }}" class="block px-4 py-3 text-sm font-bold rounded-xl bg-indigo-50 text-indigo-700">Registrations</a>
            <a href="{{ route('club.admin.announcements') }}" class="block px-4 py-3 text-sm font-bold rounded-xl text-slate-600 hover:bg-slate-50">Announcements</a>
        </nav>
        <div class="flex items-center gap-4">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="text-sm font-bold text-rose-600 bg-rose-50 px-4 py-2 rounded-xl hover:bg-rose-100 transition shadow-sm">Logout</button>
            </form>
        </div>
    </aside>
    <div class="pl-64 flex-1">
        <header class="h-16 bg-white border-b border-slate-200 flex items-center px-8 sticky top-0 z-10 shadow-sm">
            <h1 class="text-lg font-black text-slate-800">Event Registrations &amp; Participation</h1>
        </header>
        <main class="p-8">
            @if(session('success'))<div class="mb-4 p-4 bg-emerald-50 border border-emerald-200 rounded-xl text-emerald-800 text-sm font-semibold">{{ session('success') }}</div>@endif
            <div class="bg-white border border-slate-200 rounded-2xl shadow-sm overflow-hidden">
                <table class="w-full text-sm">
                    <thead><tr class="bg-slate-50 border-b text-xs font-bold uppercase text-slate-500 tracking-wider">
                        <th class="py-3 px-5 text-left">Student</th>
                        <th class="py-3 px-5 text-left">Event</th>
                        <th class="py-3 px-5 text-left">Registration Status</th>
                        <th class="py-3 px-5 text-left">Attendance</th>
                        <th class="py-3 px-5 text-left">Certificate</th>
                        <th class="py-3 px-5 text-center">Actions</th>
                    </tr></thead>
                    <tbody class="divide-y divide-slate-100">
                        @forelse($registrations as $reg)
                        <tr class="hover:bg-slate-50">
                            <td class="py-3.5 px-5 font-bold text-slate-800">{{ $reg->student->name ?? '—' }}</td>
                            <td class="py-3.5 px-5 text-slate-700">{{ $reg->event->title ?? '—' }}</td>
                            <td class="py-3.5 px-5">
                                <span class="{{ $reg->status === 'Approved' ? 'text-emerald-700 bg-emerald-50' : ($reg->status === 'Rejected' ? 'text-rose-700 bg-rose-50' : 'text-amber-700 bg-amber-50') }} px-2 py-0.5 rounded-full text-xs font-bold">{{ $reg->status }}</span>
                            </td>
                            <td class="py-3.5 px-5">
                                <span class="{{ $reg->attendance === 'Present' ? 'text-emerald-700 bg-emerald-50' : ($reg->attendance === 'Absent' ? 'text-rose-700 bg-rose-50' : 'text-slate-500 bg-slate-100') }} px-2 py-0.5 rounded-full text-xs font-bold">{{ $reg->attendance }}</span>
                            </td>
                            <td class="py-3.5 px-5 text-xs">
                                @if($reg->certificate_path)
                                    <a href="/storage/{{ $reg->certificate_path }}" target="_blank" class="text-indigo-600 hover:underline font-bold">📄 View Certificate</a>
                                @else
                                    <span class="text-slate-400">Not Uploaded</span>
                                @endif
                            </td>
                            <td class="py-3.5 px-5 text-center space-y-2">
                                @if($reg->status === 'Pending')
                                    <div class="flex gap-2 justify-center">
                                        <form method="POST" action="{{ route('club.admin.registrations.approve', $reg) }}">@csrf<input type="hidden" name="action" value="approve"><button class="text-xs font-bold bg-emerald-50 text-emerald-700 px-2.5 py-1 rounded-md hover:bg-emerald-600 hover:text-white transition">Approve</button></form>
                                        <form method="POST" action="{{ route('club.admin.registrations.approve', $reg) }}">@csrf<input type="hidden" name="action" value="reject"><button class="text-xs font-bold bg-rose-50 text-rose-700 px-2.5 py-1 rounded-md hover:bg-rose-600 hover:text-white transition">Reject</button></form>
                                    </div>
                                @endif
                                
                                @if($reg->status === 'Approved')
                                    <div class="flex flex-wrap gap-2 justify-center items-center">
                                        <form method="POST" action="{{ route('club.admin.registrations.attendance', $reg) }}" class="flex gap-1">
                                            @csrf
                                            <select name="attendance" onchange="this.form.submit()" class="text-xs bg-slate-50 border border-slate-200 rounded-md px-1.5 py-1 font-semibold text-slate-700 focus:outline-none">
                                                <option value="Pending" {{ $reg->attendance === 'Pending' ? 'selected' : '' }}>Attendance</option>
                                                <option value="Present" {{ $reg->attendance === 'Present' ? 'selected' : '' }}>Present</option>
                                                <option value="Absent" {{ $reg->attendance === 'Absent' ? 'selected' : '' }}>Absent</option>
                                            </select>
                                        </form>
                                        <form method="POST" action="{{ route('club.admin.registrations.certificate', $reg) }}" enctype="multipart/form-data" class="flex items-center gap-1">
                                            @csrf
                                            <label class="cursor-pointer bg-indigo-50 text-indigo-700 hover:bg-indigo-600 hover:text-white text-xs font-bold px-2 py-1 rounded-md transition">
                                                Upload Cert
                                                <input type="file" name="certificate" required onchange="this.form.submit()" class="hidden" accept=".pdf,.jpg,.jpeg,.png">
                                            </label>
                                        </form>
                                    </div>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr><td colspan="6" class="py-8 text-center text-slate-500 font-semibold">No registrations yet.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</div>
@endsection
