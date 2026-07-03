@extends('layouts.app')

@section('content')
<div class="flex min-h-screen bg-[#F8FAFC] overflow-x-hidden">
    
    {{-- Sidebar --}}
    <aside class="w-64 bg-white border-r border-slate-200 flex flex-col justify-between fixed h-full z-20 shadow-sm">
        <div class="p-6">
            <div class="flex items-center gap-4 mb-8">
                <img src="{{ asset('images/logo.png') }}" alt="EduHive Logo" class="w-14 h-14 md:w-16 md:h-16 object-contain drop-shadow-md flex-shrink-0" draggable="false" >
                <div>
                    <h3 class="text-lg font-bold text-slate-900 leading-tight">Student Portal</h3>
                    <p class="text-sm text-[#005F5B] font-semibold tracking-wide"> EduHive </p>
                </div>
            </div>

            <nav class="space-y-1">
                <a href="{{ route('student.dashboard', ['tab' => 'dashboard']) }}" 
                   class="flex items-center gap-3 px-4 py-3 text-sm font-bold rounded-xl transition-all {{ $currentTab === 'dashboard' ? 'bg-[#EBF5F4] text-[#005F5B]' : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900' }}">
                    <svg fill="#005F5B" width="20px" height="20px" viewBox="0 0 1000 1000" xmlns="http://www.w3.org/2000/svg" stroke="#005F5B"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M808 154H616l-1-7q-4-44-37-74t-78-30-78 30-37 74l-1 7H192q-31 0-53 22t-22 53v616q0 31 22 53.5t53 22.5h616q31 0 53-22.5t22-53.5V230q0-32-22-54t-53-22zm-308-41q18 0 31 13t13 31.5-13 31.5-31 13-31-13-13-31.5 13-31.5 31-13zm31 611H297q-8 0-14-5.5t-6-13.5v-48q0-8 6-13.5t14-5.5h234q8 0 14 5.5t6 13.5v48q0 8-6 13.5t-14 5.5zm172-150H297q-8 0-14-5.5t-6-13.5v-48q0-8 6-14t14-6h406q8 0 14 6t6 14v48q0 8-6 13.5t-14 5.5zm0-150H297q-8 0-14-5.5t-6-14.5v-47q0-8 6-14t14-6h406q8 0 14 6t6 14v47q0 9-6 14.5t-14 5.5z"></path></g></svg>
                    Dashboard
                </a>
                
                <a href="{{ route('student.dashboard', ['tab' => 'academic-records']) }}" 
                   class="flex items-center gap-3 px-4 py-3 text-sm font-bold rounded-xl transition-all {{ $currentTab === 'academic-records' ? 'bg-[#EBF5F4] text-[#005F5B]' : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900' }}">
                    <svg fill="#005f5b" height="18px" width="18px" viewBox="0 0 1920 1920" xmlns="http://www.w3.org/2000/svg" stroke="#005f5b"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M533.333 560v160H240l.008 453.33 209.066 213.34H1470.93l209.06-213.34L1680 720h-293.33V560h352c55.96 0 101.33 45.368 101.33 101.333v511.997h16c35.35 0 64 28.66 64 64V1856c0 35.35-28.65 64-64 64H64c-35.346 0-64-28.65-64-64v-618.67c0-35.34 28.654-64 64-64h16V661.333C80 605.368 125.369 560 181.333 560h352ZM1040 0v958.86l183.43-183.429 113.14 113.138L960 1265.14 583.431 888.569l113.138-113.138L880 958.86V0h160Z"></path> </g></svg>
                    My Records
                </a>

                <a href="{{ route('student.dashboard', ['tab' => 'submissions']) }}" 
                   class="flex items-center gap-3 px-4 py-3 text-sm font-bold rounded-xl transition-all {{ $currentTab === 'submissions' ? 'bg-[#EBF5F4] text-[#005F5B]' : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900' }}">
                    <svg viewBox="0 0 24.00 24.00" height="20px" width="20px" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#005b5f" stroke-width="0.00024000000000000003"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M16.19 2H7.81C4.17 2 2 4.17 2 7.81V16.18C2 19.83 4.17 22 7.81 22H16.18C19.82 22 21.99 19.83 21.99 16.19V7.81C22 4.17 19.83 2 16.19 2ZM18 12.75H12.75V18C12.75 18.41 12.41 18.75 12 18.75C11.59 18.75 11.25 18.41 11.25 18V12.75H6C5.59 12.75 5.25 12.41 5.25 12C5.25 11.59 5.59 11.25 6 11.25H11.25V6C11.25 5.59 11.59 5.25 12 5.25C12.41 5.25 12.75 5.59 12.75 6V11.25H18C18.41 11.25 18.75 11.59 18.75 12C18.75 12.41 18.41 12.75 18 12.75Z" fill="#005f5b"></path> </g></svg>
                    New Submission
                </a>

                <a href="{{ route('student.dashboard',['tab'=>'placement']) }}"
                   class="flex items-center gap-3 px-4 py-3 text-sm font-bold rounded-xl transition-all {{ $currentTab === 'placement' ? 'bg-[#EBF5F4] text-[#005F5B]' : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900' }}">
                    <svg fill="#005F5B" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="20px" height="20px" viewBox="0 0 935.996 935.996" xml:space="preserve" stroke="#005F5B"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <g> <g> <path d="M76.416,653.994c-0.738-0.698-1.469-1.405-2.191-2.129c-20.776-20.774-32.218-48.399-32.218-77.781V91.273 c0-10.925,2.949-21.168,8.072-30H30c-16.569,0-30,13.431-30,30v482.81C0,617.066,33.898,652.119,76.416,653.994z"></path> <path d="M466.439,167.209c-37.812,0-62.039,32.671-62.039,86.268c0,53.963,24.229,88.47,62.039,88.47 c37.809,0,62.04-34.507,62.04-88.47C528.479,199.88,504.25,167.209,466.439,167.209z"></path> <path d="M663.203,326.476c16.695,3.021,33.004,7.845,48.791,14.442c27.19-2.972,42.25-16.047,42.25-39.72 c0-24.962-19.09-36.71-55.064-36.71h-35.977V326.476L663.203,326.476z"></path> <path d="M741.396,198.779c0-22.026-15.785-31.203-46.988-31.203h-31.203v66.444h30.469 C727.078,234.02,741.396,221.172,741.396,198.779z"></path> <path d="M152.007,654.083h251.63c-0.354-0.809-0.718-1.612-1.063-2.43c-11.71-27.686-17.939-56.992-18.56-87.18H185.73 c-8.284,0-15-6.717-15-15c0-8.285,6.716-15,15-15h199.533c2.204-21.082,7.203-41.642,14.963-61.41H185.73 c-8.284,0-15-6.715-15-15s6.716-15,15-15H414.5c10.515-18.622,23.498-35.718,38.81-51.03c4.551-4.551,9.269-8.885,14.128-13.022 c-0.334,0.003-0.665,0.012-1,0.012c-62.406,0-105.725-47.724-105.725-125.547c0-77.458,43.317-123.344,105.725-123.344 c62.772,0,106.09,45.887,106.09,123.344c0,31.861-7.265,58.673-20.148,79.234c22.021-6.643,44.877-10.018,68.24-10.029V134.537 h76.723c49.56,0,85.9,15.051,85.9,59.102c0,22.76-13.215,44.786-41.115,52.128v1.468c34.506,5.874,53.596,24.596,53.596,56.899 c0,30.077-15.364,50.103-39.809,60.885c11.469,7.987,22.254,16.999,32.271,27.015c19.976,19.975,35.996,42.984,47.722,68.465 c1.033,2.248,2.047,4.508,3.014,6.793c12.355,29.213,18.621,60.227,18.621,92.182c0,31.953-6.266,62.967-18.621,92.18 c-0.25,0.588-0.514,1.168-0.768,1.754c39.344-5.031,69.76-38.612,69.76-79.324V91.273c0-16.569-13.43-30-30-30h-72.004H102.007 c-16.568,0-30,13.431-30,30v482.811C72.007,618.267,107.825,654.083,152.007,654.083z M199.561,316.617 c9.545,17.621,22.76,25.33,37.444,25.33c22.393,0,33.773-12.114,33.773-46.254V134.537h42.583v164.826 c0,43.685-21.292,79.66-71.583,79.66c-33.406,0-56.533-13.95-71.584-40.747L199.561,316.617z"></path> <path d="M788.188,726.914c-11.772,11.773-24.606,22.164-38.37,31.125l102.289,102.289c9.596,9.597,22.172,14.396,34.747,14.396 c12.578,0,25.152-4.799,34.75-14.396c19.189-19.188,19.189-50.305,0-69.496L819.312,688.541 C810.354,702.306,799.961,715.14,788.188,726.914z"></path> <path d="M432.832,473.064c-8.789,19.082-14.756,39.729-17.369,61.41c-0.987,8.195-1.509,16.535-1.509,25 c0,1.672,0.024,3.338,0.063,5c0.765,32.236,8.908,62.646,22.806,89.608c2.644,5.132,5.504,10.132,8.554,15 c3.23,5.156,6.677,10.162,10.335,15c37.751,49.923,97.623,82.187,165.037,82.187c39.293,0,76.025-10.961,107.311-29.988 c22.388-13.617,41.978-31.373,57.726-52.197c3.66-4.838,7.104-9.844,10.336-15c0.479-0.766,0.965-1.526,1.436-2.301 c2.519-4.139,4.892-8.377,7.117-12.699c4.596-8.911,8.559-18.2,11.836-27.807c7.15-20.957,11.035-43.426,11.035-66.803 c0-81.051-46.635-151.197-114.527-185.105c-27.776-13.873-59.106-21.69-92.268-21.69c-0.043,0-0.086,0.002-0.129,0.002 c-70.984,0.043-133.594,35.854-170.801,90.383C443.36,452.53,437.669,462.561,432.832,473.064z"></path> </g> </g> </g> </g></svg>
                    Placement
                </a>

                <a href="{{ route('student.dashboard', ['tab' => 'events']) }}"
                   class="flex items-center gap-3 px-4 py-3 text-sm font-bold rounded-xl transition-all {{ $currentTab === 'events' ? 'bg-[#EBF5F4] text-[#005F5B]' : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900' }}">
                    <svg version="1.1" height="18px" width="18px" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 452.986 452.986" xml:space="preserve" fill="#005f5b" stroke="#005f5b"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <g> <g> <path style="fill:#005f5b;" d="M404.344,0H48.642C21.894,0,0,21.873,0,48.664v355.681c0,26.726,21.894,48.642,48.642,48.642 h355.702c26.726,0,48.642-21.916,48.642-48.642V48.664C452.986,21.873,431.07,0,404.344,0z M148.429,33.629h156.043v40.337 H148.429V33.629z M410.902,406.372H42.041v-293.88h368.86V406.372z"></path> <rect x="79.273" y="246.23" style="fill:#005f5b;" width="48.642" height="48.664"></rect> <rect x="79.273" y="323.26" style="fill:#005f5b;" width="48.642" height="48.642"></rect> <rect x="160.853" y="169.223" style="fill:#005f5b;" width="48.621" height="48.642"></rect> <rect x="160.853" y="246.23" style="fill:#005f5b;" width="48.621" height="48.664"></rect> <rect x="160.853" y="323.26" style="fill:#005f5b;" width="48.621" height="48.642"></rect> <rect x="242.369" y="169.223" style="fill:#005f5b;" width="48.664" height="48.642"></rect> <rect x="242.369" y="246.23" style="fill:#005f5b;" width="48.664" height="48.664"></rect> <rect x="242.369" y="323.26" style="fill:#005f5b;" width="48.664" height="48.642"></rect> <rect x="323.907" y="169.223" style="fill:#005f5b;" width="48.664" height="48.642"></rect> <rect x="323.907" y="246.23" style="fill:#005f5b;" width="48.664" height="48.664"></rect> </g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> </g> </g></svg>
                    Events
                </a>

                <a href="{{ route('student.dashboard', ['tab' => 'help-desk']) }}"
                    class="flex items-center gap-3 px-4 py-3 text-sm font-bold rounded-xl transition-all {{ $currentTab === 'help-desk' ? 'bg-[#EBF5F4] text-[#005F5B]' : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900' }}">
                    <svg fill="#005f5b" height="22px" width="22px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" stroke="#005f5b" stroke-width="0.168"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M10.1907 18.5V17.1736H8.13445C7.29051 17.1052 6.48827 16.7892 5.83501 16.2677C5.18175 15.7462 4.70862 15.0441 4.47891 14.2554L4.28471 13.9016H3.88489C3.71759 13.8803 3.56365 13.8019 3.45079 13.6806C3.34793 13.5546 3.29163 13.399 3.29086 13.2384C3.29126 13.1221 3.32274 13.0079 3.38225 12.9068C3.44157 12.8051 3.52847 12.721 3.63357 12.6636L3.97627 12.4757V11.2156C3.99031 11.1228 4.0252 11.0342 4.0785 10.9559C4.13179 10.8776 4.20218 10.8115 4.28471 10.7624C4.34794 10.702 4.42288 10.6543 4.50522 10.6221C4.58756 10.5898 4.67567 10.5737 4.7645 10.5745H11.6186C11.7095 10.5714 11.8001 10.5864 11.8847 10.6187C11.9693 10.6509 12.0461 10.6996 12.1104 10.7619C12.1747 10.8241 12.2251 10.8984 12.2584 10.9803C12.2917 11.0622 12.3072 11.1498 12.304 11.2377V14.5538H9.44815C9.38334 14.385 9.27287 14.2361 9.12829 14.1227C8.98921 14.0059 8.819 13.9293 8.63708 13.9016C8.45145 13.88 8.26316 13.9028 8.08875 13.968C7.91684 14.035 7.76685 14.1458 7.65466 14.2885C7.54539 14.4305 7.47824 14.5987 7.46046 14.7749C7.43553 14.9519 7.46327 15.1321 7.54042 15.2944C7.61569 15.4607 7.73858 15.6026 7.89455 15.7034C8.0455 15.8076 8.22356 15.8689 8.40861 15.8803H13.6292C13.9918 15.8774 14.3388 15.7367 14.5952 15.4886C14.8516 15.2404 14.997 14.9047 15 14.5538V13.2274C15.0002 13.0521 14.9639 12.8785 14.8933 12.7171C14.8226 12.5556 14.719 12.4096 14.5888 12.2878C14.464 12.1641 14.3147 12.066 14.1498 11.9995C13.9849 11.933 13.8078 11.8995 13.6292 11.9009V10.5745C13.5647 9.20775 12.9583 7.91766 11.9359 6.97253C10.9136 6.02741 9.55409 5.5 8.14016 5.5C6.72623 5.5 5.36672 6.02741 4.34439 6.97253C3.32206 7.91766 2.7156 9.20775 2.65114 10.5745V11.8678C2.26166 12.214 2.02791 12.6942 2 13.2053C2.00247 13.6047 2.13876 13.9925 2.3884 14.3106C2.62582 14.6192 2.95148 14.8536 3.32513 14.9849C3.68436 15.9613 4.33125 16.8145 5.18592 17.4392C6.04059 18.0638 7.06562 18.4326 8.13445 18.5H10.1907Z"></path> <path d="M16 2H8C7.46957 2 6.96086 2.21071 6.58579 2.58579C6.21071 2.96086 6 3.46957 6 4H15V9H20V20H6C6 20.5304 6.21071 21.0391 6.58579 21.4142C6.96086 21.7893 7.46957 22 8 22H20C20.5304 22 21.0391 21.7893 21.4142 21.4142C21.7893 21.0391 22 20.5304 22 20V8L16 2Z"></path> </g></svg>
                    Help Desk
                </a>
            </nav>
        </div>

        <a href="{{ route('student.profile') }}" class="p-4 border-t border-slate-100 m-4 rounded-2xl flex items-center gap-3 bg-slate-50/50 hover:bg-slate-100/70 transition group">
            <div class="w-10 h-10 rounded-xl bg-[#005F5B] text-white flex items-center justify-center font-bold text-sm shadow-md">
                {{ $user->initials() }}
            </div>
            <div class="overflow-hidden">
                <h5 class="text-sm font-bold text-slate-800 truncate group-hover:text-[#005F5B] transition-colors">{{ $user->name }}</h5>
                <p class="text-xs text-slate-500 font-medium truncate">Roll: {{ $user->studentProfile->roll_number ?? 'Not Set' }}</p>
            </div>
        </a>
    </aside>

    {{-- Main Content --}}
    <div class="pl-64 flex-1 flex flex-col min-h-screen overflow-x-hidden box-border">
        
        {{-- Header --}}
        <header class="bg-white border-b border-slate-200/80 sticky top-0 z-10 shadow-sm">
            {{-- Announcement Marquee --}}
            @if($announcements->count() > 0)
            <div class="bg-[#005F5B] text-white py-2 px-4 text-xs font-semibold flex items-center gap-3 overflow-hidden">
                <span class="shrink-0 bg-white/20 text-white px-2 py-0.5 rounded-md font-bold uppercase tracking-wider text-[10px]">📢 Notice</span>
                <div class="overflow-hidden flex-1">
                    <marquee behavior="scroll" direction="left" scrollamount="3" class="w-full">
                        @foreach($announcements as $ann)
                            <span class="cursor-pointer mr-10 hover:underline" onclick="openAnnouncementModal('{{ addslashes($ann->title) }}', '{{ addslashes($ann->content) }}')">
                                @if($ann->type === 'club')
                                    {{ $ann->title }} - {{ $ann->target }}
                                @else
                                    {{ $ann->title }}
                                @endif
                            </span>
                            @if(!$loop->last)<span class="mr-10 opacity-50">•</span>@endif
                        @endforeach
                    </marquee>
                </div>
            </div>
            @endif

            <div class="h-16 flex items-center justify-between px-8">
                <div class="w-80 relative">
                    <input type="text" placeholder="Search records, categories..." class="w-full bg-slate-50 border border-slate-200 rounded-xl pl-10 pr-4 py-2.5 text-sm font-medium text-slate-700 focus:outline-none focus:border-[#005F5B] focus:bg-white transition-all">
                    <svg class="absolute left-3 top-3 w-4 h-4 text-slate-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                </div>
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
            </div>
        </header>

        <main class="flex-1 p-8 w-full overflow-x-hidden box-border">
        <div class="max-w-7xl mx-auto w-full">
            @if(session('success'))
                <div class="mb-6 p-4 bg-emerald-50 border border-emerald-200 rounded-xl text-emerald-800 text-sm font-semibold flex items-center gap-2 shadow-sm">
                    <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                    {{ session('success') }}
                </div>
            @endif
            @if(session('error'))
                <div class="mb-6 p-4 bg-rose-50 border border-rose-200 rounded-xl text-rose-700 text-sm font-semibold">
                    {{ session('error') }}
                </div>
            @endif

            {{-- ── Dashboard Tab ──────────────────────────────────────────── --}}
            @if($currentTab === 'dashboard')
                <div class="space-y-6">
                    {{-- Hero Banner --}}
                    <div class="bg-[#005F5B] rounded-3xl p-8 text-white relative overflow-hidden shadow-xl shadow-[#005F5B]/10">
                        <div class="absolute -top-10 -right-10 w-40 h-40 bg-white/5 rounded-full"></div>
                        <div class="absolute bottom-0 right-20 w-24 h-24 bg-white/5 rounded-full"></div>
                        <h2 class="text-3xl font-extrabold tracking-tight">Welcome back, {{ $user->name }} 👋</h2>
                        <p class="text-[#EBF5F4]/80 text-[14px] mt-1">Manage and submit your academic achievements effortlessly.</p>
                        <div class="flex gap-3 mt-5">
                            <a href="{{ route('student.dashboard', ['tab' => 'submissions']) }}" class="inline-flex items-center gap-2 bg-white text-[#005F5B] font-bold text-sm px-5 py-2.5 rounded-xl hover:bg-[#EBF5F4] transition shadow-sm">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
                                </svg>
                                <span>New Submission</span>
                            </a>
                            <a href="{{ route('student.dashboard', ['tab' => 'academic-records']) }}" class="bg-white/10 text-white font-bold text-sm px-5 py-2.5 rounded-xl hover:bg-white/20 transition border border-white/20">
                                View Records
                            </a>
                        </div>
                    </div>

                    {{-- Stat Cards --}}
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                        <div class="bg-white border border-slate-200 rounded-2xl p-6 shadow-sm hover:shadow-md transition">
                            <div class="flex items-center justify-between mb-3">
                                <p class="text-sm font-bold text-slate-600">Approved Records</p>
                                <div class="p-2 bg-emerald-50 rounded-xl text-emerald-600">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                </div>
                            </div>
                            <h3 class="text-4xl font-black text-slate-900">{{ $approvedCount }}</h3>
                        </div>
                        <div class="bg-white border border-slate-200 rounded-2xl p-6 shadow-sm hover:shadow-md transition">
                            <div class="flex items-center justify-between mb-3">
                                <p class="text-sm font-bold text-slate-600">Pending Review</p>
                                <div class="p-2 bg-amber-50 rounded-xl text-amber-600">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                </div>
                            </div>
                            <h3 class="text-4xl font-black text-slate-900">{{ $pendingCount }}</h3>
                        </div>
                        <div class="bg-white border border-slate-200 rounded-2xl p-6 shadow-sm hover:shadow-md transition">
                            <div class="flex items-center justify-between mb-3">
                                <p class="text-sm font-bold text-slate-600">Sent Back / Rejected</p>
                                <div class="p-2 bg-rose-50 rounded-xl text-rose-600">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                </div>
                            </div>
                            <h3 class="text-4xl font-black text-slate-900">{{ $rejectedCount }}</h3>
                        </div>
                    </div>

                    {{-- Quick Action Cards --}}
                    <div>
                        <h3 class="text-lg font-black text-slate-800 mb-4">Submit an Activity</h3>
                        <div class="grid grid-cols-2 md:grid-cols-5 gap-4">
                            
                            <a href="{{ route('student.dashboard', ['tab' => 'submissions', 'category' => 'Certificate']) }}" 
                               class="group bg-white border border-slate-200 rounded-2xl p-5 flex flex-col items-center gap-3 hover:border-[#005F5B] hover:shadow-lg hover:-translate-y-1 transition-all duration-200 cursor-pointer text-center shadow-sm">
                                <div class="w-12 h-12 bg-blue-50 text-blue-600 rounded-2xl flex items-center justify-center group-hover:bg-[#005F5B] group-hover:text-white transition-all">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/></svg>
                                </div>
                                <p class="text-xs font-bold text-slate-700 group-hover:text-[#005F5B] transition-colors leading-tight">Courses &amp;<br>Workshops</p>
                            </a>

                            <a href="{{ route('student.dashboard', ['tab' => 'submissions', 'category' => 'Competition', 'award_status' => 'Participation']) }}" 
                               class="group bg-white border border-slate-200 rounded-2xl p-5 flex flex-col items-center gap-3 hover:border-[#005F5B] hover:shadow-lg hover:-translate-y-1 transition-all duration-200 cursor-pointer text-center shadow-sm">
                                <div class="w-12 h-12 bg-purple-50 text-purple-600 rounded-2xl flex items-center justify-center group-hover:bg-[#005F5B] group-hover:text-white transition-all">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                </div>
                                <p class="text-xs font-bold text-slate-700 group-hover:text-[#005F5B] transition-colors leading-tight">Event<br>Participation</p>
                            </a>

                            <a href="{{ route('student.dashboard', ['tab' => 'submissions', 'category' => 'Competition', 'award_status' => 'Award']) }}" 
                               class="group bg-white border border-slate-200 rounded-2xl p-5 flex flex-col items-center gap-3 hover:border-[#005F5B] hover:shadow-lg hover:-translate-y-1 transition-all duration-200 cursor-pointer text-center shadow-sm">
                                <div class="w-12 h-12 bg-amber-50 text-amber-600 rounded-2xl flex items-center justify-center group-hover:bg-[#005F5B] group-hover:text-white transition-all">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/></svg>
                                </div>
                                <p class="text-xs font-bold text-slate-700 group-hover:text-[#005F5B] transition-colors leading-tight">Achievement<br>Submission</p>
                            </a>

                            <a href="{{ route('student.dashboard', ['tab' => 'submissions', 'category' => 'Internship']) }}" 
                               class="group bg-white border border-slate-200 rounded-2xl p-5 flex flex-col items-center gap-3 hover:border-[#005F5B] hover:shadow-lg hover:-translate-y-1 transition-all duration-200 cursor-pointer text-center shadow-sm">
                                <div class="w-12 h-12 bg-green-50 text-green-600 rounded-2xl flex items-center justify-center group-hover:bg-[#005F5B] group-hover:text-white transition-all">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                                </div>
                                <p class="text-xs font-bold text-slate-700 group-hover:text-[#005F5B] transition-colors leading-tight">Internship<br>Submission</p>
                            </a>

                            <a href="{{ route('student.dashboard', ['tab' => 'submissions', 'category' => 'Paper Publication']) }}" 
                               class="group bg-white border border-slate-200 rounded-2xl p-5 flex flex-col items-center gap-3 hover:border-[#005F5B] hover:shadow-lg hover:-translate-y-1 transition-all duration-200 cursor-pointer text-center shadow-sm">
                                <div class="w-12 h-12 bg-rose-50 text-rose-600 rounded-2xl flex items-center justify-center group-hover:bg-[#005F5B] group-hover:text-white transition-all">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                                </div>
                                <p class="text-xs font-bold text-slate-700 group-hover:text-[#005F5B] transition-colors leading-tight">Paper<br>Publication</p>
                            </a>

                        </div>
                    </div>
                </div>

            {{-- ── Events Tab ───────────────────────────────────────────── --}}                
            @elseif($currentTab === 'events')
            <div class="space-y-6">
                <div class="space-y-4">
                    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                        <div>
                            <h1 class="text-2xl font-black text-[#005F5B] tracking-tight">All Club Events</h1>
                            <p class="text-slate-500 mt-2">Browse and participate in events from every club.</p>
                        </div>
                        <div class="flex items-center gap-3">
                            <span class="text-sm text-slate-500">Showing {{ $events->count() }} events</span>
                        </div>
                    </div>

                    <form method="GET" action="{{ route('student.dashboard') }}" class="flex flex-wrap items-end gap-4">
                        <input type="hidden" name="tab" value="events">
                        <div class="min-w-[300px] flex-1">
                            <label class="block text-sm font-semibold text-slate-700 mb-2">Club Filter</label>
                            <select name="club" class="w-full h-12 bg-white border border-slate-300 rounded-xl px-4 text-sm font-medium text-slate-700 focus:outline-none focus:ring-2 focus:ring-[#005F5B] focus:border-[#005F5B] transition">
                                <option value="">All Clubs</option>
                                @foreach($clubNames as $clubName)
                                    <option value="{{ $clubName }}" {{ $selectedClub === $clubName ? 'selected' : '' }}>{{ $clubName }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="flex gap-3">
                            <button type="submit" class="h-12 px-6 rounded-xl bg-[#005F5B] text-white text-sm font-semibold hover:bg-[#004845] transition">Filter</button>
                            <a href="{{ route('student.dashboard', ['tab' => 'events']) }}" class="h-12 px-6 rounded-xl border border-slate-300 bg-white text-slate-700 text-sm font-semibold hover:bg-slate-50 transition flex items-center justify-center">Reset</a>
                        </div>
                        @if($selectedClub)
                            <div class="flex items-center h-12 text-sm text-slate-600 font-medium">Showing events for <span class="font-semibold text-slate-900">{{ $selectedClub }}</span>.</div>
                        @endif
                    </form>
                </div>

                @if($events->isEmpty())
                <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-10 text-center">
                    <div class="text-6xl mb-4">🎉</div>
                    <h2 class="text-xl font-bold text-slate-800">No events available right now</h2>
                    <p class="text-slate-500 mt-2">Check back later for upcoming club events and participation opportunities.</p>
                </div>
                @else
                <div class="grid grid-cols-1 xl:grid-cols-2 gap-6">
                    @foreach($events as $event)
                    <div class="bg-white border border-slate-200 rounded-3xl p-6 shadow-sm hover:shadow-md transition">
                        @if($event->event_banner)
                        <img src="{{ asset('storage/' . ltrim($event->event_banner, '/')) }}" alt="{{ $event->title }}" class="h-48 w-full rounded-3xl object-cover mb-5">
                        @endif
                        <div class="mb-4">
                            <p class="text-lg uppercase tracking-[0.1em] text-[#005F5B] underline">{{ $event->club?->name ?? $event->club_name }}</p>
                            <h3 class="font-black text-slate-900 text-lg mt-1">{{ $event->title }}</h3>
                            <p class="text-sm text-slate-600 mt-3 line-clamp-3">{{ $event->description }}</p>
                        </div>
                        <div class="grid gap-3 grid-cols-2 text-sm text-slate-600">
                            <div>
                                <p class="font-bold text-slate-800">Date</p>
                                <p class="mt-1">{{ $event->from_date ? \Carbon\Carbon::parse($event->from_date)->format('M d, Y') : 'TBD' }}@if($event->to_date) – {{ \Carbon\Carbon::parse($event->to_date)->format('M d, Y') }}@endif</p>
                            </div>
                            <div>
                                <p class="font-bold text-slate-800">Time</p>
                                <p class="mt-1">{{ $event->start_time ? \Carbon\Carbon::parse($event->start_time)->format('g:i A') : 'TBD' }} – {{ $event->end_time ? \Carbon\Carbon::parse($event->end_time)->format('g:i A') : 'TBD' }}</p>
                            </div>
                            <div>
                                <p class="font-bold text-slate-800">Venue</p>
                                <p class="mt-1">{{ $event->venue ?? $event->location ?? 'TBD' }}</p>
                            </div>
                            <div>
                                <p class="font-bold text-slate-800">Category</p>
                                <p class="mt-1">{{ $event->event_category ?? 'General' }}</p>
                            </div>
                            <div>
                                <p class="font-bold text-slate-800">Registration Deadline</p>
                                <p class="mt-1">{{ $event->registration_deadline ? \Carbon\Carbon::parse($event->registration_deadline)->format('M d, Y') : 'Open until start' }}</p>
                            </div>
                            <div>
                                <p class="font-bold text-slate-800">Organizer</p>
                                <p class="mt-1">{{ $event->organizer ?? 'TBD' }}</p>
                            </div>
                            <div>
                                <p class="font-bold text-slate-800">Available Seats</p>
                                <p class="mt-1">{{ $event->max_participants ? max(0, $event->max_participants - ($event->registrations_count ?? 0)) : 'Unlimited' }}</p>
                            </div>
                            <div>
                                <p class="font-bold text-slate-800">Registration Status</p>
                                <p class="mt-1">{{ $event->registration_status ?? 'Open' }}</p>
                            </div>
                        </div>
                        <div class="mt-5 flex flex-wrap items-center justify-between gap-3">
                            @php
                                $registration = $event->registrations->first();
                                $isRegistered = !is_null($registration);
                                $full = $event->max_participants && ($event->registrations_count ?? 0) >= $event->max_participants;
                                $deadlinePassed = $event->registration_deadline && \Carbon\Carbon::parse($event->registration_deadline)->isPast();
                                $registrationClosed = ($event->registration_status ?? 'Open') === 'Closed';
                            @endphp
                            <div>
                                <span class="px-3 py-1 rounded-full text-xs font-bold {{ $event->status === 'Completed' ? 'bg-slate-100 text-slate-700' : ($event->status === 'Scheduled' && $deadlinePassed ? 'bg-amber-100 text-amber-700' : 'bg-emerald-100 text-emerald-700') }}">{{ $event->status }}</span>
                            </div>
                            <div class="flex items-center gap-2">
                                @if($isRegistered)
                                <span class="rounded-2xl bg-emerald-50 px-4 py-2 text-xs font-bold text-emerald-700">Registered</span>
                                @elseif($event->status === 'Scheduled' && !$full && !$deadlinePassed && !$registrationClosed)
                                <form method="POST" action="{{ route('student.events.register', $event) }}">
                                    @csrf
                                    <button type="submit" class="rounded-2xl bg-[#005F5B] px-4 py-2 text-xs font-bold text-white hover:bg-[#004845] transition">Participate</button>
                                </form>
                                @elseif($full)
                                <span class="rounded-2xl bg-rose-50 px-4 py-2 text-xs font-bold text-rose-700">Full</span>
                                @elseif($registrationClosed)
                                <span class="rounded-2xl bg-amber-50 px-4 py-2 text-xs font-bold text-amber-700">Registration Closed</span>
                                @else
                                <span class="rounded-2xl bg-slate-100 px-4 py-2 text-xs font-bold text-slate-600">Closed</span>
                                @endif
                            </div>
                        </div>
                        @if($isRegistered)
                        <div class="mt-4 grid grid-cols-1 md:grid-cols-3 gap-3 text-sm text-slate-700">
                            <div class="bg-slate-50 border border-slate-200 rounded-2xl p-4">
                                <p class="text-xs font-semibold uppercase tracking-[0.18em] text-slate-500">Registration Status</p>
                                <p class="mt-2 font-bold text-slate-900">{{ $registration->status }}</p>
                            </div>
                            <div class="bg-slate-50 border border-slate-200 rounded-2xl p-4">
                                <p class="text-xs font-semibold uppercase tracking-[0.18em] text-slate-500">Attendance</p>
                                <p class="mt-2 font-bold text-slate-900">{{ $registration->attendance ?? 'Pending' }}</p>
                            </div>
                            <div class="bg-slate-50 border border-slate-200 rounded-2xl p-4">
                                <p class="text-xs font-semibold uppercase tracking-[0.18em] text-slate-500">Certificate</p>
                                @if($registration->certificate_path)
                                    <a href="{{ asset('storage/' . ltrim($registration->certificate_path, '/')) }}" target="_blank" class="mt-2 inline-flex items-center gap-2 text-[#005F5B] font-bold text-sm hover:underline">View Certificate</a>
                                @else
                                    <p class="mt-2 font-bold text-slate-900">Pending</p>
                                @endif
                            </div>
                        </div>
                        @endif
                    </div>
                    @endforeach
                </div>
                @endif
            </div>

            {{-- ── Help Records Tab ─────────────────────────────────────── --}}                
            @elseif($currentTab === 'help-desk')
            <div class="space-y-6">
                <div class="flex justify-between items-center">
                    <div>
                        <h1 class="text-2xl font-black text-[#005F5B] tracking-tight">Help Desk</h1>   
                        <p class="text-slate-500 mt-2">
                            Raise support tickets and track your requests.
                        </p>
                    </div>
                    <button onclick="document.getElementById('ticketModal').classList.remove('hidden')" class="bg-[#005F5B] text-white font-bold text-sm px-5 py-2.5 rounded-xl hover:bg-[#004845] shadow-md transition flex items-center gap-1.5">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
                        Raise Ticket
                    </button>
                </div>
                <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-10 text-center">
                    <div class="text-6xl mb-4">🎟️</div>
                    <h2 class="text-xl font-bold text-slate-800">
                        No Help Desk Tickets Yet
                    </h2>
                    <p class="text-slate-500 mt-2">
                        When you raise a support ticket, it will appear here.
                    </p>
                </div>
            </div>

            {{-- ── Placement Tab ─────────────────────────────────────── --}}
            @elseif($currentTab === 'placement')

            <div class="flex justify-between items-center mb-6">
                <div>
                    <h1 class="text-2xl font-black text-[#005F5B]">Placement Opportunities</h1>
                    <p class="text-sm text-slate-500 mt-1">Apply for available campus placement drives.</p>
                </div>
                <div class="bg-[#EBF5F4] text-[#005F5B] px-4 py-2 rounded-xl font-bold">
                    Open Drives: {{ $jobs->count() }}
                </div>
            </div>

            @if($jobs->isEmpty())

            <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-10 text-center">
                <div class="text-6xl mb-4">💼</div>
                <h2 class="text-xl font-bold text-slate-800">No Placement Drives Available</h2>
                <p class="text-slate-500 mt-2">New opportunities will appear here.</p>
            </div>

            @else

            <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
                <table class="w-full">
                    <thead class="bg-slate-50 border-b">
                        <tr class="text-xs uppercase font-bold tracking-wider text-black">
                            <th class="px-6 py-4 text-left">Company</th>
                            <th class="px-6 py-4 text-left">Position</th>
                            <th class="px-6 py-4 text-left">Type</th>
                            <th class="px-6 py-4 text-center">CGPA</th>
                            <th class="px-6 py-4 text-center">Drive Date</th>
                            <th class="px-6 py-4 text-center">Status</th>
                            <th class="px-6 py-4 text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @foreach($jobs as $job)
                        <tr class="hover:bg-slate-50">
                            <td class="px-6 py-5">
                                <div class="font-bold text-slate-800">{{ $job->company_name }}</div>
                            </td>
                            <td class="px-6 py-5">{{ $job->job_title }}</td>
                            <td class="px-6 py-5">
                                <span class="px-3 py-1 rounded-full bg-blue-100 text-blue-700 text-xs font-bold">{{ $job->type }}</span>
                            </td>
                            <td class="px-6 py-5 text-center">{{ $job->eligibility_cgpa }}</td>
                            <td class="px-6 py-5 text-center">{{ \Carbon\Carbon::parse($job->drive_date)->format('d M Y') }}</td>
                            <td class="px-6 py-5 text-center">
                                @if(isset($applications[$job->id]))
                                @php
                                    $status = $applications[$job->id];
                                @endphp
                                <span class="px-4 py-1 rounded-full text-xs font-bold
                                    @if($status=='Applied') bg-blue-100 text-blue-700
                                    @elseif($status=='Shortlisted') bg-yellow-100 text-yellow-700
                                    @elseif($status=='Interviewing') bg-purple-100 text-purple-700
                                    @elseif($status=='Selected') bg-green-100 text-green-700
                                    @elseif($status=='Rejected') bg-red-100 text-red-700
                                    @endif">{{ $status }}</span>
                                @else
                                <span class="text-slate-400 text-sm">Not Applied</span>
                                @endif
                            </td>
                            <td class="px-6 py-5 text-center">
                                @if(isset($applications[$job->id]))
                                <button disabled class="bg-slate-300 text-white px-4 py-1 rounded-lg cursor-not-allowed">Applied</button>
                                @else
                                <form action="{{ route('student.jobs.apply',$job) }}" method="POST">
                                    @csrf
                                    <button class="bg-[#005F5B] hover:bg-[#004845] text-white px-4 py-1 rounded-lg font-semibold transition">Apply</button>
                                </form>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif

        {{-- ── Academic Records Tab ─────────────────────────────────────── --}}
        @elseif($currentTab === 'academic-records')
                <div class="space-y-6">
                    <div class="w-full flex justify-between items-center">
                        <div>
                            <h1 class="text-2xl font-black text-[#005F5B] tracking-tight">My Achievements</h1>
                            <p class="text-sm text-slate-600 font-medium mt-1">Track and validate your institutional milestones.</p>
                        </div>
                        <div class="flex justify-between items-center gap-3">
                            <div class="relative group">
                                <button class="border border-slate-200 text-slate-700 font-bold text-sm px-4 py-2.5 rounded-xl bg-white hover:bg-slate-50 transition shadow-sm flex items-center gap-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                                    Export
                                </button>
                                <div class="hidden group-hover:flex absolute right-0 top-full mt-1 flex-col bg-white border border-slate-200 rounded-xl shadow-xl overflow-hidden z-20 w-36">
                                    <a href="{{ route('student.export', ['format' => 'csv']) }}" class="px-4 py-2.5 text-sm font-semibold text-slate-700 hover:bg-[#EBF5F4] hover:text-[#005F5B] transition">📊 CSV</a>
                                    <a href="{{ route('student.export', ['format' => 'pdf']) }}" class="px-4 py-2.5 text-sm font-semibold text-slate-700 hover:bg-[#EBF5F4] hover:text-[#005F5B] transition">📄 PDF</a>
                                    <a href="{{ route('student.export', ['format' => 'excel']) }}" class="px-4 py-2.5 text-sm font-semibold text-slate-700 hover:bg-[#EBF5F4] hover:text-[#005F5B] transition">📑 Excel</a>
                                </div>
                            </div>
                            <a href="{{ route('student.dashboard', ['tab' => 'submissions']) }}" class="bg-[#005F5B] text-white font-bold text-sm px-5 py-2.5 rounded-xl hover:bg-[#004845] shadow-md transition flex items-center gap-1.5">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
                                Add New
                            </a>
                        </div>
                    </div>

                    <div class="rounded-2xl border border-slate-200 shadow-sm bg-white">
                        <div class="overflow-x-auto">
                        <table class="w-full min-w-full">
                            <thead>
                                <tr class="border-b text-xs font-bold uppercase text-black bg-slate-50/60 tracking-wider">
                                    <th class="py-4 px-6">Academic Year</th>
                                    <th class="py-4 px-6">Student Name</th>
                                    <th class="py-4 px-6">Roll No.</th>
                                    <th class="py-4 px-6">Branch</th>
                                    <th class="py-4 px-6 ">Divison</th>
                                    <th class="py-4 px-6">Semester</th>
                                    <th class="py-4 px-6">Category</th>
                                    <th class="py-4 px-6">Event Name</th>
                                    <th class="py-4 px-6">Organization Name</th>
                                    <th class="py-4 px-6">From Date</th>
                                    <th class="py-4 px-6">To Date</th>
                                    <th class="py-4 px-6">Award/Participation</th>
                                    <th class="py-4 px-6">Status</th>
                                    <th class="py-4 px-6 ">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100 font-medium">
                            @forelse($achievements as $achievement)
                                <tr class="hover:bg-slate-50/30 transition">
                                    <td class="py-4 px-6 text-sm">{{ $achievement->academic_year }}</td>
                                    <td class="py-4 px-6 text-sm">{{ $user->name }}</td>
                                    <td class="py-4 px-6 text-sm">{{ $user->studentProfile->roll_number ?? '-' }}</td>
                                    <td class="py-4 px-6 text-sm">{{ $user->studentProfile->branch ?? '-' }}</td>
                                    <td class="py-4 px-6 text-sm">{{ $achievement->division }}</td>
                                    <td class="py-4 px-6 text-sm">{{ $achievement->semester }}</td>
                                    <td class="py-4 px-6 text-sm">{{ $achievement->category }}</td>
                                    <td class="py-4 px-6 text-sm">{{ $achievement->event_name }}</td>
                                    <td class="py-4 px-6 text-sm">{{ $achievement->organization_name }}</td>
                                    <td class="py-4 px-6 text-sm">{{ $achievement->from_date }}</td>
                                    <td class="py-4 px-6 text-sm">{{ $achievement->to_date   }}</td>
                                    <td class="py-4 px-6 text-sm">{{ $achievement->award_status }}</td>
                                    <td class="py-4 px-6">
                                        @if($achievement->status == 'Approved')
                                            <span class="px-3 py-1 rounded-full bg-green-100 text-green-700 text-xs font-bold">
                                                Approved
                                            </span>

                                        @elseif($achievement->status == 'Pending')
                                            <span class="px-3 py-1 rounded-full bg-yellow-100 text-yellow-700 text-xs font-bold">
                                                Pending
                                            </span>

                                        @else
                                            <span class="px-3 py-1 rounded-full bg-red-100 text-red-700 text-xs font-bold">
                                                Rejected
                                            </span>
                                        @endif
                                    </td>
                                    <td class="py-4 px-6">
                                        <button onclick='openDetailsModal(@json($achievement))' class="px-3 py-1 bg-[#005F5B] text-white rounded-lg text-xs hover:bg-[#004845]">
                                            View
                                        </button>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="15" class="py-10 text-center text-gray-500">
                                        No submissions yet. Use the quick actions above to get started!
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>

            {{-- ── Submissions Tab ──────────────────────────────────────────── --}}
            @elseif($currentTab === 'submissions')
                <div class="max-w-7xl mx-auto bg-white border border-slate-200 rounded-3xl shadow-xl overflow-hidden">
                    <div class="p-6 border-b border-slate-100 flex justify-between items-center bg-slate-50/50">
                        <div>
                            <h2 class="text-xl font-black text-[#005F5B]">New Submission</h2>
                            <p class="text-xs text-slate-500 font-semibold mt-0.5">Fill in all details and upload your proof document.</p>
                        </div>
                        <a href="{{ route('student.dashboard', ['tab' => 'academic-records']) }}" class="text-slate-500 hover:text-slate-700 text-sm font-bold p-2 bg-white rounded-full border shadow-sm transition">✕</a>
                    </div>

                    <form action="{{ route('student.achievement.store') }}" method="POST" enctype="multipart/form-data" class="p-8 space-y-7">
                        @csrf

                        @if($errors->any())
                            <div class="p-4 bg-rose-50 border border-rose-200 rounded-xl text-rose-700 text-sm font-semibold">
                                <ul class="list-disc list-inside space-y-1">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        {{-- Category --}}
                        <div>
                            <label class="block text-xs font-bold text-slate-700 uppercase tracking-wide mb-3">Select Category *</label>
                            <div class="grid grid-cols-2 sm:grid-cols-5 gap-3">
                                @foreach([
                                    'Certificate'       => ['label' => 'Courses & Workshops', 'sub' => 'External Certifications'],
                                    'Event Participation'=> ['label' => 'Event Participation', 'sub' => 'Events & Fests'],
                                    'Competition'       => ['label' => 'Achievement', 'sub' => 'Sports & Competitions'],
                                    'Internship'        => ['label' => 'Internship', 'sub' => 'Industry Experience'],
                                    'Paper Publication' => ['label' => 'Paper Publication', 'sub' => 'Research & Journals'],
                                ] as $catValue => $catInfo)
                                    <label class="cursor-pointer">
                                        <input type="radio" name="category" value="{{ $catValue }}" class="sr-only peer" {{ ($preCategory === $catValue || old('category') === $catValue) ? 'checked' : '' }}>
                                        <div class="border border-slate-200 rounded-xl p-3 text-left bg-white peer-checked:border-[#005F5B] peer-checked:bg-[#EBF5F4] peer-checked:text-[#005F5B] transition-all hover:bg-slate-50">
                                            <h5 class="text-xs font-bold tracking-tight">{{ $catInfo['label'] }}</h5>
                                            <p class="text-[10px] opacity-60 font-medium mt-0.5">{{ $catInfo['sub'] }}</p>
                                        </div>
                                    </label>
                                @endforeach
                            </div>
                        </div>

                        {{-- Student Information --}}
                        <div>
                            <h3 class="text-xs font-black text-[#005F5B] uppercase tracking-widest mb-3 pb-2 border-b border-slate-100">Student Information</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-xs font-bold text-slate-700 mb-1.5">Academic Year</label>
                                    <input type="text" name="academic_year" value="{{ old('academic_year') }}" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm font-medium text-slate-800 focus:outline-none focus:border-[#005F5B] focus:bg-white transition-all" placeholder="e.g. 2024–2025">
                                </div>
                                <div>
                                    <label class="block text-xs font-bold text-slate-700 mb-1.5">Student Name *</label>
                                    <input type="text" name="title" required value="{{ old('title') }}" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm font-medium text-slate-800 focus:outline-none focus:border-[#005F5B] focus:bg-white transition-all" placeholder="Name">
                                </div>
                                <div>
                                    <label class="block text-xs font-bold text-slate-700 mb-1.5">Roll Number</label>
                                    <input type="text" value="{{ optional($user->studentProfile)->roll_number ?? '' }}" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm font-medium text-slate-500 focus:outline-none transition-all" readonly>
                                </div>
                                <div>
                                    <label class="block text-xs font-bold text-slate-700 mb-1.5">Branch</label>
                                    <input type="text" value="{{ optional($user->studentProfile)->branch ?? '' }}" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm font-medium text-slate-500 focus:outline-none transition-all" readonly>
                                </div>
                                <div>
                                    <label class="block text-xs font-bold text-slate-700 mb-1.5">Division</label>
                                    <input type="text" name="division" value="{{ old('division') }}" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm font-medium text-slate-800 focus:outline-none focus:border-[#005F5B] focus:bg-white transition-all" placeholder="e.g. A / B / C">
                                </div>
                                <div>
                                    <label class="block text-xs font-bold text-slate-700 mb-1.5">Year / Semester</label>
                                    <div class="flex gap-2">
                                        <select name="semester" class="flex-1 bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm font-medium text-slate-800 focus:outline-none focus:border-[#005F5B] focus:bg-white transition-all">
                                            <option value="">Select Semester</option>
                                            @foreach(['I','II','III','IV','V','VI','VII','VIII'] as $sem)
                                                <option value="{{ $sem }}" {{ old('semester') === $sem ? 'selected' : '' }}>Sem {{ $sem }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Date Details --}}
                        <div>
                            <h3 class="text-xs font-black text-[#005F5B] uppercase tracking-widest mb-3 pb-2 border-b border-slate-100">Date Details</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-xs font-bold text-slate-700 mb-1.5">From Date</label>
                                    <input type="date" name="from_date" value="{{ old('from_date') }}" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm font-medium text-slate-800 focus:outline-none focus:border-[#005F5B] focus:bg-white transition-all">
                                </div>
                                <div>
                                    <label class="block text-xs font-bold text-slate-700 mb-1.5">To Date</label>
                                    <input type="date" name="to_date" value="{{ old('to_date') }}" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm font-medium text-slate-800 focus:outline-none focus:border-[#005F5B] focus:bg-white transition-all">
                                </div>
                            </div>
                        </div>

                        {{-- Additional Information --}}
                        <div>
                            <h3 class="text-xs font-black text-[#005F5B] uppercase tracking-widest mb-3 pb-2 border-b border-slate-100">Additional Information</h3>
                            <div class="space-y-4">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-xs font-bold text-slate-700 mb-1.5">Organization Name</label>
                                        <input type="text" name="organization_name" value="{{ old('organization_name') }}" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm font-medium text-slate-800 focus:outline-none focus:border-[#005F5B] focus:bg-white transition-all" placeholder="Issuing organization or company">
                                    </div>
                                    <div>
                                        <label class="block text-xs font-bold text-slate-700 mb-1.5">Event Name</label>
                                        <input type="text" name="event_name" value="{{ old('event_name') }}" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm font-medium text-slate-800 focus:outline-none focus:border-[#005F5B] focus:bg-white transition-all" placeholder="Name of event or competition">
                                    </div>
                                </div>
                                <div>
                                    <label class="block text-xs font-bold text-slate-700 mb-2">Award / Participation Status</label>
                                    <div class="flex gap-4">
                                        <label class="flex items-center gap-2 cursor-pointer">
                                            <input type="radio" name="award_status" value="Award" class="w-4 h-4 text-[#005F5B] border-slate-300 focus:ring-[#005F5B]" {{ $preAwardStatus === 'Award' ? 'checked' : '' }}>
                                            <span class="text-sm font-semibold text-slate-700">🏆 Award / Winner</span>
                                        </label>
                                        <label class="flex items-center gap-2 cursor-pointer">
                                            <input type="radio" name="award_status" value="Participation" class="w-4 h-4 text-[#005F5B] border-slate-300 focus:ring-[#005F5B]" {{ $preAwardStatus === 'Participation' ? 'checked' : '' }}>
                                            <span class="text-sm font-semibold text-slate-700">🎟️ Participation</span>
                                        </label>
                                    </div>
                                </div>
                                <div>
                                    <label class="block text-xs font-bold text-slate-700 mb-1.5">Description *</label>
                                    <textarea name="description" required rows="3" class="w-full bg-slate-50 border border-slate-200 rounded-xl p-4 text-sm font-medium text-slate-800 focus:outline-none focus:border-[#005F5B] focus:bg-white transition-all" placeholder="Provide context, scope, and learning outcomes...">{{ old('description') }}</textarea>
                                </div>
                                <div>
                                    <label class="block text-xs font-bold text-slate-700 mb-1.5">Remarks</label>
                                    <textarea name="remarks" rows="2" class="w-full bg-slate-50 border border-slate-200 rounded-xl p-4 text-sm font-medium text-slate-800 focus:outline-none focus:border-[#005F5B] focus:bg-white transition-all" placeholder="Any additional remarks or notes...">{{ old('remarks') }}</textarea>
                                </div>
                            </div>
                        </div>

                        {{-- File Upload --}}
                        <div>
                            <label class="block text-xs font-bold text-slate-700 uppercase tracking-wide mb-2">Upload Proof (PDF or Image) *</label>
                            <div class="border-2 border-dashed border-slate-200 rounded-2xl p-8 text-center bg-slate-50/30 relative hover:bg-slate-50/70 transition-all cursor-pointer group">
                                <input type="file" name="file" required accept=".pdf,.jpg,.jpeg,.png" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10" id="file-upload">
                                <div class="space-y-2">
                                    <div class="text-3xl text-slate-400 group-hover:scale-110 group-hover:text-[#005F5B] transition-all duration-200">📤</div>
                                    <p class="text-sm font-bold text-slate-700">Click to upload or drag and drop</p>
                                    <p class="text-xs text-slate-500 font-semibold">Supported: PDF, PNG, JPG up to 10MB</p>
                                    <p id="file-name-display" class="text-xs text-[#005F5B] font-bold hidden"></p>
                                </div>
                            </div>
                        </div>

                        {{-- Declaration --}}
                        <div class="flex items-start gap-3 bg-slate-50 p-4 rounded-xl border border-slate-100">
                            <input type="checkbox" required id="certify" class="w-4 h-4 rounded text-[#005F5B] border-slate-300 focus:ring-[#005F5B] mt-0.5">
                            <label for="certify" class="text-xs font-semibold text-slate-600 select-none cursor-pointer leading-relaxed">
                                I hereby declare that all the details and documents uploaded above are genuine. Any discrepancy may result in rejection of credentials.
                            </label>
                        </div>

                        <div class="border-t pt-5 flex justify-end gap-3">
                            <a href="{{ route('student.dashboard', ['tab' => 'academic-records']) }}" class="px-5 py-2.5 border border-slate-200 rounded-xl text-sm font-bold text-slate-700 hover:bg-slate-50 transition shadow-sm">Discard</a>
                            <button type="submit" class="px-6 py-2.5 bg-[#005F5B] text-white rounded-xl text-sm font-bold hover:bg-[#004845] transition shadow-md shadow-[#005F5B]/10 flex items-center gap-2">
                                Submit for Review <span>&rarr;</span>
                            </button>
                        </div>
                    </form>
                </div>
            @endif
        </div>
        </main>
    </div>
</div>

{{-- Details Modal --}}
<div id="details-modal" class="fixed inset-0 z-50 hidden bg-slate-900/40 backdrop-blur-sm flex items-center justify-center p-4">
    <div class="bg-white rounded-3xl border border-slate-200 max-w-2xl w-full shadow-2xl overflow-hidden">
        <div class="p-6 border-b border-slate-100 flex justify-between items-center bg-slate-50/50">
            <div>
                <h3 class="text-lg font-black text-slate-900">Achievement Details</h3>
                <p id="modal-date" class="text-xs text-slate-500 font-semibold mt-0.5"></p>
            </div>
            <button onclick="closeDetailsModal()" class="text-slate-400 hover:text-slate-700 text-sm font-bold p-2 bg-white rounded-full border shadow-sm transition">✕</button>
        </div>
        <div class="p-6 space-y-5 max-h-[70vh] overflow-y-auto">
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <span class="block text-[10px] text-slate-500 uppercase font-bold tracking-wider">Category</span>
                    <span id="modal-category" class="inline-block bg-[#EBF5F4] text-[#005F5B] font-extrabold text-xs px-2.5 py-1 rounded-md mt-1"></span>
                </div>
                <div>
                    <span class="block text-[10px] text-slate-500 uppercase font-bold tracking-wider">Status</span>
                    <span id="modal-status" class="inline-block mt-1 px-2.5 py-1 rounded-full text-xs font-bold"></span>
                </div>
            </div>
            <div>
                <span class="block text-[10px] text-slate-500 uppercase font-bold tracking-wider mb-1">Title</span>
                <h4 id="modal-title" class="text-base font-bold text-slate-800 leading-snug"></h4>
            </div>
            <div id="modal-org-section" class="grid grid-cols-2 gap-4">
                <div>
                    <span class="block text-[10px] text-slate-500 uppercase font-bold tracking-wider">Organization</span>
                    <p id="modal-org" class="text-sm font-semibold text-slate-700 mt-1"></p>
                </div>
                <div>
                    <span class="block text-[10px] text-slate-500 uppercase font-bold tracking-wider">Event</span>
                    <p id="modal-event" class="text-sm font-semibold text-slate-700 mt-1"></p>
                </div>
            </div>
            <div>
                <span class="block text-[10px] text-slate-500 uppercase font-bold tracking-wider mb-1">Description</span>
                <p id="modal-description" class="text-sm text-slate-700 font-medium leading-relaxed bg-slate-50 p-4 rounded-xl border border-slate-100 whitespace-pre-line"></p>
            </div>
            <div id="modal-remarks-section">
                <span class="block text-[10px] text-slate-500 uppercase font-bold tracking-wider mb-1">Faculty Remarks</span>
                <p id="modal-remarks" class="text-sm text-amber-700 font-medium leading-relaxed bg-amber-50/50 p-4 rounded-xl border border-amber-100 whitespace-pre-line"></p>
            </div>
            <div class="border-t pt-4 flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <span class="text-2xl">📄</span>
                    <div>
                        <span class="block text-[10px] text-slate-500 uppercase font-bold tracking-wider">Attached File</span>
                        <a id="modal-file-link" href="#" target="_blank" class="text-sm font-bold text-[#005F5B] hover:underline truncate block max-w-xs"></a>
                    </div>
                </div>
                <div class="flex gap-2">
                    <a id="modal-file-view" href="#" target="_blank" class="px-4 py-2 border border-slate-200 rounded-xl text-xs font-bold text-slate-700 hover:bg-slate-50 transition">View</a>
                    <a id="modal-file-download" href="#" download class="px-4 py-2 bg-[#005F5B] text-white rounded-xl text-xs font-bold">Download</a>
                    <form id="delete-achievement-form" method="POST">
                        @csrf
                        @method('DELETE')
                        <button id="delete-achievement-btn" type="submit" onclick="return confirm('Delete this achievement?')" class="hidden px-4 py-2 bg-red-600 text-white rounded-xl text-xs font-bold hover:bg-red-700">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Announcement Modal --}}
<div id="announcement-modal" class="fixed inset-0 z-50 hidden bg-slate-900/40 backdrop-blur-sm flex items-center justify-center p-4">
    <div class="bg-white rounded-3xl border border-slate-200 max-w-xl w-full shadow-2xl overflow-hidden">
        <div class="p-6 border-b border-slate-100 flex justify-between items-center bg-[#005F5B] text-white">
            <h3 class="text-lg font-black">📢 Announcement</h3>
            <button onclick="closeAnnouncementModal()" class="text-white/70 hover:text-white p-2 rounded-full transition">✕</button>
        </div>
        <div class="p-6 space-y-3">
            <h4 id="ann-modal-title" class="text-xl font-black text-slate-900"></h4>
            <p id="ann-modal-content" class="text-sm text-slate-700 font-medium leading-relaxed whitespace-pre-line"></p>
        </div>
    </div>
</div>

{{-- Help Desk Ticket Modal --}}
<div id="ticketModal"
class="hidden fixed inset-0 bg-black/50 flex justify-center items-center z-50">
    <div class="bg-white rounded-2xl w-full max-w-2xl p-6">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold">Raise Help Desk Ticket</h2>
            <button
            onclick="document.getElementById('ticketModal').classList.add('hidden')"
            class="text-xl">
                ✕
            </button>
        </div>
        <form action="{{ route('student.helpdesk.store') }}"
              method="POST"
              enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label class="font-semibold">Category</label>
                <select
                    name="category"
                    class="w-full border rounded-lg p-3 mt-2">
                    <option>Technical</option>
                    <option>Academics</option>
                    <option>Submission</option>
                    <option>Account</option>
                    <option>Other</option>
                </select>
            </div>
            <div class="mb-4">
                <label class="font-semibold">Subject</label>
                <input
                    type="text"
                    name="subject"
                    class="w-full border rounded-lg p-3 mt-2">
            </div>
            <div class="mb-4">
                <label class="font-semibold">Description</label>
                <textarea
                    name="description"
                    rows="5"
                    class="w-full border rounded-lg p-3 mt-2"></textarea>
            </div>
            <div class="mb-4">
                <label class="font-semibold">Attachment</label>
                <input
                    type="file"
                    name="attachment"
                    class="mt-2">
            </div>
            <div class="flex justify-end gap-3">
                <button
                    type="button"
                    onclick="document.getElementById('ticketModal').classList.add('hidden')"
                    class="px-5 py-2 border rounded-lg">
                    Cancel
                </button>
                <button
                    type="submit"
                    class="bg-[#005F5B] text-white px-6 py-2 rounded-lg">
                    Submit Ticket
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    // File upload name display
    document.getElementById('file-upload')?.addEventListener('change', function() {
        const display = document.getElementById('file-name-display');
        if (this.files.length > 0) {
            display.textContent = '✓ ' + this.files[0].name;
            display.classList.remove('hidden');
        }
    });

    function openDetailsModal(achievement) {
        const deleteBtn = document.getElementById('delete-achievement-btn');
        const deleteForm = document.getElementById('delete-achievement-form');
        deleteForm.action = "{{ url('student/achievement') }}/" + achievement.id;
        if (achievement.status === "Pending" || achievement.status === "Rejected") {
            deleteBtn.classList.remove("hidden");
        } else {
            deleteBtn.classList.add("hidden");
        }

        const modal = document.getElementById('details-modal');
        let formattedDate = 'N/A';
        if (achievement.created_at) {
            const date = new Date(achievement.created_at);
            formattedDate = date.toLocaleDateString('en-US', { month: 'short', day: 'numeric', year: 'numeric' });
        }
        document.getElementById('modal-date').innerText = 'Submitted on ' + formattedDate;
        document.getElementById('modal-category').innerText = achievement.category;

        const statusEl = document.getElementById('modal-status');
        statusEl.innerText = achievement.status;
        statusEl.className = 'inline-block mt-1 px-2.5 py-1 rounded-full text-xs font-bold';
        if (achievement.status === 'Approved') statusEl.classList.add('text-emerald-700', 'bg-emerald-50');
        else if (achievement.status === 'Pending') statusEl.classList.add('text-amber-700', 'bg-amber-50');
        else statusEl.classList.add('text-rose-700', 'bg-rose-50');

        document.getElementById('modal-title').innerText = achievement.title;
        document.getElementById('modal-description').innerText = achievement.description || 'No description provided.';
        document.getElementById('modal-org').innerText = achievement.organization_name || '—';
        document.getElementById('modal-event').innerText = achievement.event_name || '—';

        const remarksSection = document.getElementById('modal-remarks-section');
        if (achievement.faculty_remarks) {
            remarksSection.style.display = 'block';
            document.getElementById('modal-remarks').innerText = achievement.faculty_remarks;
        } else {
            remarksSection.style.display = 'none';
        }

        if (achievement.file_path) {
            const filePath = '/storage/' + achievement.file_path;
            const fileName = achievement.file_path.split('/').pop();
            document.getElementById('modal-file-link').innerText = fileName;
            document.getElementById('modal-file-link').href = filePath;
            document.getElementById('modal-file-view').href = filePath;
            document.getElementById('modal-file-download').href = filePath;
        }

        modal.classList.remove('hidden');
        modal.classList.add('flex');
    }

    function closeDetailsModal() {
        const modal = document.getElementById('details-modal');
        modal.classList.remove('flex');
        modal.classList.add('hidden');
    }

    function openAnnouncementModal(title, content) {
        document.getElementById('ann-modal-title').innerText = title;
        document.getElementById('ann-modal-content').innerText = content;
        const modal = document.getElementById('announcement-modal');
        modal.classList.remove('hidden');
        modal.classList.add('flex');
    }

    function closeAnnouncementModal() {
        const modal = document.getElementById('announcement-modal');
        modal.classList.remove('flex');
        modal.classList.add('hidden');
    }
</script>
@endsection