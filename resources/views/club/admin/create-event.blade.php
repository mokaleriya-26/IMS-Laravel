@extends('layouts.app')
@section('content')
<div class="flex min-h-screen bg-[#F8FAFC]">
    <aside class="w-64 bg-white border-r border-slate-200 flex flex-col fixed h-full z-20 shadow-sm">
        <div class="p-6 flex-1">
            <div class="flex items-center gap-3 mb-8">
                <div class="bg-[#005F5B] text-white p-2 rounded-xl"><svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg></div>
                <div>
                    <h3 class="font-extrabold text-slate-900 text-[15px] tracking-tight">{{ $clubName ?: 'Club Admin' }}</h3>
                    <p class="text-[11px] text-slate-500 font-medium">EduStream IMS</p>
                </div>
            </div>
            <nav class="space-y-1">
                <a href="{{ route('club.admin.dashboard') }}" class="flex items-center gap-3 px-4 py-3 text-sm font-bold rounded-xl {{ request()->routeIs('club.admin.dashboard') ? 'bg-[#EBF5F4] text-[#005F5B]' : 'text-slate-600 hover:bg-slate-50' }}">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2H6a2 2 0 01-2-2V6z"/></svg>
                    Dashboard
                </a>
                <a href="{{ route('club.admin.events') }}" class="flex items-center gap-3 px-4 py-3 text-sm font-bold rounded-xl {{ request()->routeIs('club.admin.events*') ? 'bg-[#EBF5F4] text-[#005F5B]' : 'text-slate-600 hover:bg-slate-50' }}">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                    Manage Events
                </a>
                <a href="{{ route('club.admin.registrations') }}" class="flex items-center gap-3 px-4 py-3 text-sm font-bold rounded-xl {{ request()->routeIs('club.admin.registrations') ? 'bg-[#EBF5F4] text-[#005F5B]' : 'text-slate-600 hover:bg-slate-50' }}">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
                    Registrations
                </a>
                <a href="{{ route('club.admin.announcements') }}" class="flex items-center gap-3 px-4 py-3 text-sm font-bold rounded-xl {{ request()->routeIs('club.admin.announcements') ? 'bg-[#EBF5F4] text-[#005F5B]' : 'text-slate-600 hover:bg-slate-50' }}">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"/></svg>
                    Announcements
                </a>
            </nav>
        </div>
        <div class="p-4 border-t border-slate-100 items-center justify-center">
            <div class="p-3 rounded-2xl bg-slate-50 flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl bg-[#005F5B] text-white flex items-center justify-center font-bold text-sm shadow-md">CA</div>
                <div>
                    <p class="text-sm font-bold text-slate-800">{{ $clubName ?: 'Club Admin' }}</p>
                    <p class="text-xs text-slate-500">Administrator</p>
                </div>
            </div>
        </div>
    </aside>
    <div class="pl-64 flex-1">
        <header class="h-16 bg-white border-b border-slate-200 sticky top-0 z-10 flex items-center justify-between px-8 shadow-sm">
            <h1 class="text-lg font-black text-[#005F5B]">{{ isset($event) ? 'Edit Event' : 'Create New Event' }}</h1>
            <div class="flex items-center gap-4">
                <a href="{{ route('club.admin.events') }}" class="flex items-center gap-2 text-sm font-semibold text-slate-600 hover:text-[#005F5B] transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/>
                    </svg>
                    Back
                </a>
                <div class="h-6 w-px bg-slate-300"></div>
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
        <main class="p-8 max-w-5xl">
            <div class="bg-white border border-slate-200 rounded-3xl shadow-sm p-8">
                <form method="POST" action="{{ isset($event) ? route('club.admin.events.update',$event) : route('club.admin.events.store') }}" enctype="multipart/form-data" class="space-y-5">
                    @csrf
                    @if(isset($event)) @method('PUT') @endif
                    @if($errors->any())<div class="p-4 bg-rose-50 border border-rose-200 rounded-xl text-rose-700 text-sm font-semibold"><ul class="list-disc list-inside">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul></div>@endif
                    <div><label class="block text-xs font-bold text-slate-700 mb-1.5">Event Title *</label><input type="text" name="title" value="{{ old('title', $event->title ?? '') }}" required class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2 text-sm font-medium text-slate-800 focus:outline-none focus:border-[#005F5B] focus:bg-white transition"></div>
                    <div><label class="block text-xs font-bold text-slate-700 mb-1.5">Description *</label><textarea name="description" rows="4" required class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2 text-sm font-medium text-slate-800 focus:outline-none focus:border-[#005F5B] focus:bg-white transition">{{ old('description', $event->description ?? '') }}</textarea></div>
                    <div class="grid grid-cols-2 gap-5">
                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-1.5"> From Date * </label>
                            <input type="date" name="from_date" value="{{ old('from_date',$event->from_date ?? '') }}" required class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2 text-sm font-medium text-slate-800 focus:outline-none focus:border-[#005F5B] focus:bg-white transition">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-1.5"> To Date * </label>
                            <input type="date" name="to_date" value="{{ old('to_date',$event->to_date ?? '') }}" required class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2 text-sm font-medium text-slate-800 focus:outline-none focus:border-[#005F5B] focus:bg-white transition">
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-5">
                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-1.5">Start Time</label>
                            <input type="time" name="start_time" value="{{ old('start_time', $event->start_time ?? '') }}" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2 text-sm font-medium text-slate-800 focus:outline-none focus:border-[#005F5B] focus:bg-white transition">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-1.5">End Time</label>
                            <input type="time" name="end_time" value="{{ old('end_time', $event->end_time ?? '') }}" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2 text-sm font-medium text-slate-800 focus:outline-none focus:border-[#005F5B] focus:bg-white transition">
                        </div>
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1.5">Location</label>
                        <input type="text" name="location" value="{{ old('location', $event->location ?? '') }}" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2 text-sm font-medium text-slate-800 focus:outline-none focus:border-[#005F5B] focus:bg-white transition">
                    </div>
                    <div class="grid grid-cols-2 gap-5">
                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-1.5">Venue</label>
                            <input type="text" name="venue" value="{{ old('venue', $event->venue ?? '') }}" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2 text-sm font-medium text-slate-800 focus:outline-none focus:border-[#005F5B] focus:bg-white transition">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-1.5">Category</label>
                            <input type="text" name="event_category" value="{{ old('event_category', $event->event_category ?? '') }}" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2 text-sm font-medium text-slate-800 focus:outline-none focus:border-[#005F5B] focus:bg-white transition">
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-5">
                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-1.5">Registration Deadline</label>
                            <input type="date" name="registration_deadline" value="{{ old('registration_deadline', $event->registration_deadline ?? '') }}" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2 text-sm font-medium text-slate-800 focus:outline-none focus:border-[#005F5B] focus:bg-white transition">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-1.5">Max Participants</label>
                            <input type="number" min="1" name="max_participants" value="{{ old('max_participants', $event->max_participants ?? '') }}" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2 text-sm font-medium text-slate-800 focus:outline-none focus:border-[#005F5B] focus:bg-white transition">
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-5">
                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-1.5">Organizer</label>
                            <input type="text" name="organizer" value="{{ old('organizer', $event->organizer ?? '') }}" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2 text-sm font-medium text-slate-800 focus:outline-none focus:border-[#005F5B] focus:bg-white transition">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-1.5">Registration Status</label>
                            <select name="registration_status" class="w-full h-9 bg-slate-50 border border-slate-200 rounded-xl px-4 text-sm font-medium text-slate-800 focus:outline-none focus:border-[#005F5B] focus:bg-white transition">
                                <option value="Open" {{ old('registration_status', $event->registration_status ?? '') === 'Open' ? 'selected' : '' }}>Open</option>
                                <option value="Closed" {{ old('registration_status', $event->registration_status ?? '') === 'Closed' ? 'selected' : '' }}>Closed</option>
                            </select>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-5">
                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-2">Event Banner</label>
                            <input type="file" name="event_banner" accept=".jpg,.jpeg,.png" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2 text-sm font-medium text-slate-800 focus:outline-none focus:border-[#005F5B] focus:bg-white transition">
                            @if(isset($event) && $event->event_banner)
                            <div class="mt-2">
                                <a href="{{ asset('storage/'.$event->event_banner) }}" target="_blank" class="text-[#005F5B] text-sm font-semibold hover:underline">View Current Banner</a>
                            </div>
                            @endif
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-2">Event Brochure / Poster</label>
                            <input type="file" name="brochure" accept=".pdf,.jpg,.jpeg,.png" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2 text-sm font-medium text-slate-800 focus:outline-none focus:border-[#005F5B] focus:bg-white transition">
                            @if(isset($event) && $event->brochure)
                            <div class="mt-2">
                                <a href="{{ asset('storage/'.$event->brochure) }}" target="_blank" class="text-[#005F5B] text-sm font-semibold hover:underline">View Current File</a>
                            </div>
                            @endif
                        </div>
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1.5">Status</label>
                        <select name="status" class="w-full h-9 bg-slate-50 border border-slate-200 rounded-xl px-4 text-sm font-medium text-slate-800 focus:outline-none focus:border-[#005F5B] focus:bg-white transition">
                            <option value="Scheduled" {{ old('status', $event->status ?? '') === 'Scheduled' ? 'selected' : '' }}>Scheduled</option>
                            <option value="Completed" {{ old('status', $event->status ?? '') === 'Completed' ? 'selected' : '' }}>Completed</option>
                            <option value="Cancelled" {{ old('status', $event->status ?? '') === 'Cancelled' ? 'selected' : '' }}>Cancelled</option>
                        </select>
                    </div>
                    <div class="flex gap-3 border-t pt-5">
                        <a href="{{ route('club.admin.events') }}" class="px-4 py-2.5 border border-slate-200 rounded-xl text-xs font-bold text-slate-700 hover:bg-slate-50 transition">Cancel</a>
                        <button type="submit" class="px-5 py-2.5 bg-[#005F5B] text-white rounded-xl text-xs font-bold hover:bg-[#004845] transition shadow-md">{{ isset($event) ? 'Update Event' : 'Create Event' }}</button>
                    </div>
                </form>
            </div>
        </main>
    </div>
</div>
@endsection
