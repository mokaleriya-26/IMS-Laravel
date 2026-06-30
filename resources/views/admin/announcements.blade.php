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
                   class="flex items-center gap-3 px-4 py-3 text-sm font-bold rounded-xl text-slate-600 hover:bg-slate-50">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 14l9-5-9-5-9 5 9 5z"/></svg>
                    Manage Students
                </a>

                <a href="{{ route('admin.users', ['role' => 'faculty']) }}" 
                   class="flex items-center gap-3 px-4 py-3 text-sm font-bold rounded-xl text-slate-600 hover:bg-slate-50">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857"/></svg>
                    Manage Faculty
                </a>

                <a href="{{ route('admin.announcements') }}" 
                   class="flex items-center gap-3 px-4 py-3 text-sm font-bold rounded-xl bg-[#EBF5F4] text-[#005F5B] transition-all">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"/></svg>
                    Announcements
                </a>
            </nav>
        </div>

        <div class="p-4 border-t border-slate-100 m-4 rounded-2xl flex items-center gap-3 bg-slate-50/50">
            <div class="w-10 h-10 rounded-full bg-[#005F5B] text-white flex items-center justify-center font-bold text-sm shadow-sm">
                {{ Auth::user()->initials() }}
            </div>
            <div class="overflow-hidden">
                <h5 class="text-sm font-bold text-slate-800 truncate">{{ Auth::user()->name }}</h5>
                <p class="text-xs text-slate-500 font-medium truncate font-medium">Administrator</p>
            </div>
        </div>
    </aside>

    {{-- Main Content --}}
    <div class="pl-64 flex-1 flex flex-col min-h-screen">
        
        {{-- Header --}}
        <header class="h-16 bg-white border-b border-slate-200/80 flex items-center justify-between px-8 sticky top-0 z-10 shadow-sm">
            <div class="font-extrabold text-slate-800 text-lg">Announcements Control Center</div>
            <div class="flex items-center gap-4">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="text-sm font-bold text-rose-600 bg-rose-50 px-4 py-2 rounded-xl hover:bg-rose-100 transition shadow-sm">Logout</button>
                </form>
            </div>
        </header>

        {{-- Main Body --}}
        <main class="p-8 flex-1 grid grid-cols-1 lg:grid-cols-3 gap-6">
            
            {{-- Form Section --}}
            <div class="bg-white border border-slate-200 rounded-2xl shadow-sm p-6 h-fit">
                <h3 class="font-black text-slate-900 text-lg mb-4">Create Announcement</h3>
                <form method="POST" action="{{ route('admin.announcements.store') }}" class="space-y-4">
                    @csrf
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Announcement Title *</label>
                        <input type="text" name="title" required value="{{ old('title') }}" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:border-[#005F5B] focus:bg-white transition-all">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Scope / Type *</label>
                        <select name="type" required class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:border-[#005F5B] focus:bg-white transition-all">
                            <option value="general">General (All Portals)</option>
                            <option value="branch">Branch Specific</option>
                            <option value="club">Club Specific</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Target Name (Optional)</label>
                        <input type="text" name="target" value="{{ old('target') }}" placeholder="e.g. Computer Science / Coding Club" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:border-[#005F5B] focus:bg-white transition-all">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Content Details *</label>
                        <textarea name="content" rows="5" required class="w-full bg-slate-50 border border-slate-200 rounded-xl p-4 text-sm focus:outline-none focus:border-[#005F5B] focus:bg-white transition-all" placeholder="Enter notice details..."></textarea>
                    </div>
                    <button type="submit" class="w-full bg-[#005F5B] text-white font-bold text-sm py-3 rounded-xl hover:bg-[#004845] transition">Publish Notice</button>
                </form>
            </div>

            {{-- History Section --}}
            <div class="lg:col-span-2 space-y-4">
                @if(session('success'))
                    <div class="p-4 bg-emerald-50 border border-emerald-200 text-emerald-800 text-sm font-semibold rounded-2xl">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="bg-white border border-slate-200 rounded-2xl shadow-sm p-6">
                    <h3 class="font-black text-slate-900 text-lg mb-4">Published Announcements</h3>
                    <div class="divide-y divide-slate-100">
                        @forelse($announcements as $ann)
                        <div class="py-4 flex justify-between items-start gap-4">
                            <div>
                                <h4 class="font-bold text-slate-800 text-[15px] flex items-center gap-2">
                                    {{ $ann->title }}
                                    <span class="text-[10px] font-bold bg-[#EBF5F4] text-[#005F5B] px-2 py-0.5 rounded-full uppercase">{{ $ann->type }}</span>
                                    @if($ann->target)
                                        <span class="text-[10px] font-bold bg-slate-100 text-slate-600 px-2 py-0.5 rounded-full uppercase">Target: {{ $ann->target }}</span>
                                    @endif
                                </h4>
                                <p class="text-sm text-slate-600 mt-1 leading-relaxed">{{ $ann->content }}</p>
                                <span class="text-[10px] text-slate-400 mt-2 inline-block">Published on {{ $ann->created_at->format('M d, Y \a\t H:i') }}</span>
                            </div>
                            <form method="POST" action="{{ route('admin.announcements.delete', $ann) }}" onsubmit="return confirm('Are you sure you want to delete this notice?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-xs font-bold text-rose-600 bg-rose-50 hover:bg-rose-100 px-3 py-2 rounded-xl transition">✕ Delete</button>
                            </form>
                        </div>
                        @empty
                        <p class="py-8 text-center text-slate-500 font-semibold">No announcements published yet.</p>
                        @endforelse
                    </div>
                </div>
            </div>

        </main>
    </div>
</div>
@endsection
