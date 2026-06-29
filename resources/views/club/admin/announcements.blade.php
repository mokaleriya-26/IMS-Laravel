@extends('layouts.app')
@section('content')
<div class="flex min-h-screen bg-[#F8FAFC]">
    <aside class="w-64 bg-white border-r border-slate-200 flex flex-col fixed h-full z-20 shadow-sm p-6">
        <div class="flex items-center gap-3 mb-8"><div class="bg-indigo-600 text-white p-2 rounded-xl"><svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg></div><div><h3 class="font-extrabold text-slate-900 text-[15px]">{{ $clubName }}</h3></div></div>
        <nav class="space-y-1">
            <a href="{{ route('club.admin.dashboard') }}" class="block px-4 py-3 text-sm font-bold rounded-xl text-slate-600 hover:bg-slate-50">Dashboard</a>
            <a href="{{ route('club.admin.events') }}" class="block px-4 py-3 text-sm font-bold rounded-xl text-slate-600 hover:bg-slate-50">Manage Events</a>
            <a href="{{ route('club.admin.registrations') }}" class="block px-4 py-3 text-sm font-bold rounded-xl text-slate-600 hover:bg-slate-50">Registrations</a>
            <a href="{{ route('club.admin.announcements') }}" class="block px-4 py-3 text-sm font-bold rounded-xl bg-indigo-50 text-indigo-700">Announcements</a>
        </nav>
        <div class="mt-auto"><form action="{{ route('logout') }}" method="POST">@csrf<button class="w-full text-sm font-bold text-slate-600 bg-slate-100 px-4 py-2 rounded-xl">Logout</button></form></div>
    </aside>
    <div class="pl-64 flex-1">
        <header class="h-16 bg-white border-b border-slate-200 flex items-center px-8 sticky top-0 z-10 shadow-sm">
            <h1 class="text-lg font-black text-slate-800">Publish Announcements</h1>
        </header>
        <main class="p-8 grid grid-cols-1 lg:grid-cols-3 gap-6">
            <div class="bg-white border border-slate-200 rounded-2xl shadow-sm p-6 h-fit">
                <h3 class="font-black text-slate-800 mb-4">Create Announcement</h3>
                <form method="POST" action="{{ route('club.admin.announcements.store') }}" class="space-y-4">
                    @csrf
                    <div><label class="block text-xs font-bold text-slate-700 mb-1">Title</label><input type="text" name="title" required class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-sm font-medium focus:outline-none focus:border-[#005F5B] transition"></div>
                    <div><label class="block text-xs font-bold text-slate-700 mb-1">Content</label><textarea name="content" rows="4" required class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-sm font-medium focus:outline-none focus:border-[#005F5B] transition"></textarea></div>
                    <button type="submit" class="w-full bg-indigo-600 text-white font-bold text-sm py-3 rounded-xl hover:bg-indigo-700 transition">Publish Announcement</button>
                </form>
            </div>
            <div class="lg:col-span-2 space-y-4">
                @if(session('success'))<div class="p-4 bg-emerald-50 border border-emerald-200 rounded-xl text-emerald-800 text-sm font-semibold">{{ session('success') }}</div>@endif
                <div class="bg-white border border-slate-200 rounded-2xl shadow-sm p-6">
                    <h3 class="font-black text-slate-800 mb-4">Announcements History</h3>
                    <div class="divide-y divide-slate-100">
                        @forelse($announcements as $ann)
                        <div class="py-4 flex justify-between items-start gap-4">
                            <div>
                                <h4 class="font-bold text-slate-800 text-[15px]">{{ $ann->title }}</h4>
                                <p class="text-sm text-slate-600 mt-1 leading-relaxed">{{ $ann->content }}</p>
                                <span class="text-[10px] text-slate-400 mt-1.5 inline-block">{{ $ann->created_at->format('M d, Y H:i') }}</span>
                            </div>
                            <form method="POST" action="{{ route('club.admin.announcements.delete', $ann) }}" onsubmit="return confirm('Delete this announcement?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="text-xs font-bold text-rose-600 bg-rose-50 hover:bg-rose-100 p-2 rounded-lg transition">✕ Delete</button>
                            </form>
                        </div>
                        @empty
                        <p class="py-4 text-center text-slate-500 font-semibold">No announcements published.</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
@endsection
