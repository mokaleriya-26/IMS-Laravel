@extends('layouts.app')
@section('content')
<div class="flex min-h-screen bg-[#F8FAFC]">
    <aside class="w-64 bg-white border-r border-slate-200 flex flex-col fixed h-full z-20 shadow-sm p-6">
        <div class="flex items-center gap-3 mb-8"><div class="bg-indigo-600 text-white p-2 rounded-xl"><svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg></div><div><h3 class="font-extrabold text-slate-900 text-[15px]">{{ $clubName }}</h3></div></div>
        <nav class="space-y-1">
            <a href="{{ route('club.admin.dashboard') }}" class="block px-4 py-3 text-sm font-bold rounded-xl text-slate-600 hover:bg-slate-50">Dashboard</a>
            <a href="{{ route('club.admin.events') }}" class="block px-4 py-3 text-sm font-bold rounded-xl bg-indigo-50 text-indigo-700">Manage Events</a>
            <a href="{{ route('club.admin.registrations') }}" class="block px-4 py-3 text-sm font-bold rounded-xl text-slate-600 hover:bg-slate-50">Registrations</a>
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
            <a href="{{ route('club.admin.events') }}" class="text-indigo-600 font-bold text-sm mr-4">&larr; Back</a>
            <h1 class="text-lg font-black text-slate-800">{{ isset($event) ? 'Edit Event' : 'Create New Event' }}</h1>
        </header>
        <main class="p-8 max-w-3xl">
            <div class="bg-white border border-slate-200 rounded-2xl shadow-sm p-8">
                <form method="POST" action="{{ isset($event) ? route('club.admin.events.update', $event) : route('club.admin.events.store') }}" class="space-y-5">
                    @csrf
                    @if(isset($event)) @method('PUT') @endif
                    @if($errors->any())<div class="p-4 bg-rose-50 border border-rose-200 rounded-xl text-rose-700 text-sm font-semibold"><ul class="list-disc list-inside">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul></div>@endif
                    <div><label class="block text-xs font-bold text-slate-700 mb-1.5">Event Title *</label><input type="text" name="title" value="{{ old('title', $event->title ?? '') }}" required class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm font-medium text-slate-800 focus:outline-none focus:border-[#005F5B] focus:bg-white transition"></div>
                    <div><label class="block text-xs font-bold text-slate-700 mb-1.5">Description *</label><textarea name="description" rows="4" required class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm font-medium text-slate-800 focus:outline-none focus:border-[#005F5B] focus:bg-white transition">{{ old('description', $event->description ?? '') }}</textarea></div>
                    <div class="grid grid-cols-2 gap-5">
                        <div><label class="block text-xs font-bold text-slate-700 mb-1.5">Event Date *</label><input type="date" name="event_date" value="{{ old('event_date', isset($event->event_date) ? \Carbon\Carbon::parse($event->event_date)->format('Y-m-d') : '') }}" required class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm font-medium text-slate-800 focus:outline-none focus:border-[#005F5B] focus:bg-white transition"></div>
                        <div><label class="block text-xs font-bold text-slate-700 mb-1.5">Location</label><input type="text" name="location" value="{{ old('location', $event->location ?? '') }}" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm font-medium text-slate-800 focus:outline-none focus:border-[#005F5B] focus:bg-white transition"></div>
                    </div>
                    <div><label class="block text-xs font-bold text-slate-700 mb-1.5">Status</label><select name="status" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm font-medium text-slate-800 focus:outline-none focus:border-[#005F5B] focus:bg-white transition"><option value="Scheduled" {{ old('status', $event->status ?? '') === 'Scheduled' ? 'selected' : '' }}>Scheduled</option><option value="Completed" {{ old('status', $event->status ?? '') === 'Completed' ? 'selected' : '' }}>Completed</option><option value="Cancelled" {{ old('status', $event->status ?? '') === 'Cancelled' ? 'selected' : '' }}>Cancelled</option></select></div>
                    <div class="flex gap-3 border-t pt-5">
                        <a href="{{ route('club.admin.events') }}" class="px-5 py-2.5 border border-slate-200 rounded-xl text-sm font-bold text-slate-700 hover:bg-slate-50 transition">Cancel</a>
                        <button type="submit" class="px-6 py-2.5 bg-indigo-600 text-white rounded-xl text-sm font-bold hover:bg-indigo-700 transition shadow-md">{{ isset($event) ? 'Update Event' : 'Create Event' }}</button>
                    </div>
                </form>
            </div>
        </main>
    </div>
</div>
@endsection
