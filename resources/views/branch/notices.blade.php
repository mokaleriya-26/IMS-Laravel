@extends('layouts.app')
@section('content')
<div class="flex min-h-screen bg-[#F8FAFC]">
    <aside class="w-64 bg-white border-r border-slate-200 flex flex-col fixed h-full z-20 shadow-sm p-6">
        <div class="flex items-center gap-3 mb-8"><div class="bg-amber-600 text-white p-2 rounded-xl"><svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-2 10v-5a1 1 0 00-1-1h-2a1 1 0 00-1 1v5m4 0H9"/></svg></div><div><h3 class="font-extrabold text-slate-900 text-[14px] truncate">{{ $branch }}</h3></div></div>
        <nav class="space-y-1">
            <a href="{{ route('branch.admin.dashboard') }}" class="block px-4 py-3 text-sm font-bold rounded-xl text-slate-600 hover:bg-slate-50">Dashboard</a>
            <a href="{{ route('branch.admin.students') }}" class="block px-4 py-3 text-sm font-bold rounded-xl text-slate-600 hover:bg-slate-50">Students</a>
            <a href="{{ route('branch.admin.faculty') }}" class="block px-4 py-3 text-sm font-bold rounded-xl text-slate-600 hover:bg-slate-50">Faculty</a>
            <a href="{{ route('branch.admin.requests') }}" class="block px-4 py-3 text-sm font-bold rounded-xl text-slate-600 hover:bg-slate-50">Requests Queue</a>
            <a href="{{ route('branch.admin.notices') }}" class="block px-4 py-3 text-sm font-bold rounded-xl bg-amber-50 text-amber-700">Branch Notices</a>
            <a href="{{ route('branch.admin.reports') }}" class="block px-4 py-3 text-sm font-bold rounded-xl text-slate-600 hover:bg-slate-50">Branch Reports</a>
        </nav>
        <div class="mt-auto"><form action="{{ route('logout') }}" method="POST">@csrf<button class="w-full text-sm font-bold text-slate-600 bg-slate-100 px-4 py-2 rounded-xl">Logout</button></form></div>
    </aside>
    <div class="pl-64 flex-1">
        <header class="h-16 bg-white border-b border-slate-200 flex items-center px-8 sticky top-0 z-10 shadow-sm">
            <h1 class="text-lg font-black text-slate-800">Branch Notices &amp; Announcements</h1>
        </header>
        <main class="p-8 grid grid-cols-1 lg:grid-cols-3 gap-6">
            <div class="bg-white border border-slate-200 rounded-2xl shadow-sm p-6 h-fit">
                <h3 class="font-black text-slate-800 mb-4">Publish Notice</h3>
                <form method="POST" action="{{ route('branch.admin.notices.store') }}" class="space-y-4">
                    @csrf
                    <div><label class="block text-xs font-bold text-slate-700 mb-1">Notice Title</label><input type="text" name="title" required class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-sm font-medium focus:outline-none focus:border-[#005F5B] transition"></div>
                    <div><label class="block text-xs font-bold text-slate-700 mb-1">Content</label><textarea name="content" rows="4" required class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-sm font-medium focus:outline-none focus:border-[#005F5B] transition"></textarea></div>
                    <button type="submit" class="w-full bg-amber-600 text-white font-bold text-sm py-3 rounded-xl hover:bg-amber-700 transition">Publish Notice</button>
                </form>
            </div>
            <div class="lg:col-span-2 space-y-4">
                @if(session('success'))<div class="p-4 bg-emerald-50 border border-emerald-200 rounded-xl text-emerald-800 text-sm font-semibold">{{ session('success') }}</div>@endif
                <div class="bg-white border border-slate-200 rounded-2xl shadow-sm p-6">
                    <h3 class="font-black text-slate-800 mb-4">Notices History</h3>
                    <div class="divide-y divide-slate-100">
                        @forelse($notices as $notice)
                        <div class="py-4 flex justify-between items-start gap-4">
                            <div>
                                <h4 class="font-bold text-slate-800 text-[15px]">{{ $notice->title }}</h4>
                                <p class="text-sm text-slate-600 mt-1 leading-relaxed">{{ $notice->content }}</p>
                                <span class="text-[10px] text-slate-400 mt-1.5 inline-block">{{ $notice->created_at->format('M d, Y H:i') }}</span>
                            </div>
                            <form method="POST" action="{{ route('branch.admin.notices.delete', $notice) }}" onsubmit="return confirm('Delete this notice?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="text-xs font-bold text-rose-600 bg-rose-50 hover:bg-rose-100 p-2 rounded-lg transition">✕ Delete</button>
                            </form>
                        </div>
                        @empty
                        <p class="py-4 text-center text-slate-500 font-semibold">No notices published yet.</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
@endsection
