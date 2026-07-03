@extends('layouts.app')
@section('content')
<div class="flex min-h-screen bg-[#F8FAFC]">
    <aside class="w-64 bg-white border-r border-slate-200 flex flex-col fixed h-full z-20 shadow-sm">
        <div class="p-6 flex-1">
            <div class="flex items-center gap-4 mb-8">
                <img src="{{ asset('images/logo.png') }}" alt="EduHive Logo" class="w-14 h-14 md:w-16 md:h-16 object-contain drop-shadow-md flex-shrink-0" draggable="false" >
                <div>
                    <h3 class="text-lg font-bold text-slate-900 leading-tight">{{ $branch ?: 'Branch Admin' }}</h3>
                    <p class="text-sm text-[#005F5B] font-semibold tracking-wide"> EduHive </p>
                </div>
            </div>
            <nav class="space-y-1">
                <a href="{{ route('branch.admin.dashboard') }}" class="flex items-center gap-3 px-4 py-3 text-sm font-bold rounded-xl transition-all {{ request()->routeIs('branch.admin.dashboard') ? 'bg-[#EBF5F4] text-[#005F5B]' : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900' }}">
                    <svg fill="#005F5B" width="20px" height="20px" viewBox="0 0 1000 1000" xmlns="http://www.w3.org/2000/svg" stroke="#005F5B"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M808 154H616l-1-7q-4-44-37-74t-78-30-78 30-37 74l-1 7H192q-31 0-53 22t-22 53v616q0 31 22 53.5t53 22.5h616q31 0 53-22.5t22-53.5V230q0-32-22-54t-53-22zm-308-41q18 0 31 13t13 31.5-13 31.5-31 13-31-13-13-31.5 13-31.5 31-13zm31 611H297q-8 0-14-5.5t-6-13.5v-48q0-8 6-13.5t14-5.5h234q8 0 14 5.5t6 13.5v48q0 8-6 13.5t-14 5.5zm172-150H297q-8 0-14-5.5t-6-13.5v-48q0-8 6-14t14-6h406q8 0 14 6t6 14v48q0 8-6 13.5t-14 5.5zm0-150H297q-8 0-14-5.5t-6-14.5v-47q0-8 6-14t14-6h406q8 0 14 6t6 14v47q0 9-6 14.5t-14 5.5z"></path></g></svg>
                    Dashboard
                </a>
                <a href="{{ route('branch.admin.students') }}" class="flex items-center gap-3 px-4 py-3 text-sm font-bold rounded-xl transition-all {{ request()->routeIs('branch.admin.students') ? 'bg-[#EBF5F4] text-[#005F5B]' : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900' }}">
                    <svg fill="#005F5B" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="20px" height="20px" viewBox="0 0 190.06 190.06" xml:space="preserve" stroke="#005F5B" stroke-width="0.0019006000000000001"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <g> <path d="M74.855,43.025c-10.73-14.002-31.93-16.26-47.206-8.84C11.909,41.831,7.812,54.189,5.331,70.255 c-0.938,6.078-2.285,12.806-1.322,18.95c0.025,0.162,0.148,0.505,0.327,0.88c0.007,0.106,0.011,0.211,0.019,0.317 c-0.033,0.006-0.065,0.013-0.097,0.02c-1.345,0.311-1.339,2.391,0,2.705c5.374,1.262,11.005,1.763,16.698,1.952 c5.135,8,17.062,12.442,26.559,12.487c7.552,0.036,15.428-2.715,20.226-8.733c0.595-0.747,1.134-1.584,1.619-2.48 c4.592,0.026,9.123-0.193,13.455-0.919c0.473-0.079,0.822-0.326,1.102-0.637c1.289,0.093,2.675-0.687,2.715-2.354 C87.047,75.596,85.46,56.863,74.855,43.025z"></path> <path d="M140.683,68.427c-12.234-0.564-27.683,1.199-38.47,7.469c-0.698,0.406-0.768,1.209-0.467,1.808 c-5.535,12.933,7.087,23.47,22.425,26.943c-0.466,1.787-0.215,3.979-0.291,5.595c-0.209,4.429,0.03,9.219,1.852,13.322 c3.709,8.352,11.908,6.092,19.282,4.73c1.091-0.201,1.843-1.381,1.849-2.427c0.021-4.707,0.046-9.414,0.039-14.122 c-0.004-2.491,0.173-5.111,0.148-7.698c8.583-2.807,15.386-9.011,17.029-19.646c0.069-0.451,0.019-0.86-0.104-1.229 c0.194-0.224,0.352-0.498,0.41-0.877C166.14,71.033,148.104,68.769,140.683,68.427z"></path> <path d="M161.333,44.139c-7.608-6.377-18.305-12.044-28.522-10.951c-13.587,1.454-44.702,16.072-34.179,34.116 c0.109,0.187,0.245,0.335,0.393,0.458c0.067,0.688,0.7,1.342,1.523,1.119c13.963-3.786,29.942-11.271,44.73-7.76 c4.397,1.044,8.683,3.013,12.773,4.878c1.761,0.803,3.478,1.695,5.172,2.628c0.673,0.379,1.331,0.784,1.974,1.214 c0.29,0.187,0.501,0.337,0.667,0.463c-0.024,0.986,0.73,1.927,1.877,1.99c2.062,0.112,2.972-1.106,2.997-2.554 c0.817,0.1,1.712-0.226,2.147-0.977C177.918,60.074,167.328,49.165,161.333,44.139z"></path> <path d="M183.553,130.486c-3.356-5.223-15.951-21.392-24.495-19.159c-0.874-0.67-2.129-0.81-3.009,0.176 c-2.332,2.615-2.227,6.881-2.574,10.188c-0.56,5.334-0.686,10.795-1.759,16.064c-11.903-1.195-23.748,2.08-35.601,0.652 c0.069-8.096,0.336-16.262-1.424-24.183c0.96-1.025,0.695-3.035-0.553-3.806c-7.473-4.607-18.241,8.033-22.205,12.755 c-1.031,1.229-3.695,4.444-5.631,7.689c-5.083-8.275-14.536-14.853-23.763-14.402c-1.467-1.078-4.24-0.385-4.409,2.054 c-0.263,3.776,0.083,7.613-0.471,11.366c-0.789,5.345-5.969,5.386-10.087,5.3c-5.248-0.109-10.593-1.166-15.792-0.375 c-0.109-4.39-0.211-8.777-0.375-13.164c-0.059-1.582,0.349-4.753-1.262-5.852l-0.002-0.002c-0.041-0.027-0.068-0.069-0.112-0.095 c-0.048-0.028-0.093-0.027-0.141-0.048c-0.096-0.049-0.194-0.083-0.302-0.104c-0.077-0.015-0.15-0.021-0.224-0.021 c-0.028,0-0.056,0.007-0.084,0.008c-1.172-2.561-5.591-1.17-7.808-0.216c-6.328,2.722-12.717,9.518-16.765,14.914 c-4.222,5.629-5.735,14.696-4,21.452c1.713,6.668,11.312,5.716,16.411,5.56c10.735-0.33,21.159-1.408,31.94-1.192 c16.462,0.329,32.908,1.225,49.365,1.727c15.853,0.482,31.634,0.683,47.471,1.645c7.742,0.472,15.485,0.764,23.24,0.536 c5.145-0.15,11.948,0.197,16.566-2.534c0.951-0.562,1.288-1.381,1.22-2.168C193.839,148.863,187.771,137.051,183.553,130.486z"></path> </g> </g> </g></svg>
                    Students
                </a>
                <a href="{{ route('branch.admin.faculty') }}" class="flex items-center gap-3 px-4 py-3 text-sm font-bold rounded-xl transition-all {{ request()->routeIs('branch.admin.faculty') ? 'bg-[#EBF5F4] text-[#005F5B]' : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900' }}">
                    <svg fill="#005F5B" width="20px" height="20px" viewBox="0 0 1920 1920" xmlns="http://www.w3.org/2000/svg" stroke="#005F5B"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M640.376 734.118c121.977 0 121.977 112.94 245.083 112.94 58.937 0 89.362-26.5 118.905-53.795l2.013-1.862c3.354-3.104 6.705-6.211 10.094-9.283v64.94c0 155.747-126.607 282.354-282.353 282.354s-282.353-126.607-282.353-282.353v-11.294c25.49-10.364 44.24-26.974 62.816-43.79l3.012-2.727c30.625-27.73 61.743-55.13 122.783-55.13ZM1920-.012V1129.4h-338.824v-112.94h225.883V112.93H112.94v903.53h112.941v112.94H0V-.01h1920ZM1471.85 714.24l-356.33 948.932c-174.268 10.39-448.941 17.957-631.002-48.113l38.4-106.165c130.334 47.435 337.807 53.873 529.807 41.675l132.593-354.635-60.424-15.812c-46.758-12.197-93.854-21.346-141.176-29.138 88.207-72.509 145.694-181.045 145.694-303.925V734.118c0-217.977-177.318-395.294-395.294-395.294-217.977 0-395.294 177.317-395.294 395.294v112.94c0 122.655 57.374 231.078 145.242 303.587-56.019 9.374-111.473 20.894-166.024 36.48-120.734 34.334-205.1 146.371-205.1 272.075v329.11l34.898 14.457C332.273 1879.454 535.115 1920 734.118 1920c180.254 0 348.65-15.925 474.127-44.725 50.371-11.407 90.917-46.983 108.65-95.096l31.849-87.304c14.343-39.19 7.567-81.995-18.41-114.522-12.988-16.49-29.816-28.913-48.565-36.48l295.793-787.878-105.713-39.755Z" fill-rule="evenodd"></path> </g></svg>
                    Faculty
                </a>
                <a href="{{ route('branch.admin.requests') }}" class="flex items-center gap-3 px-4 py-3 text-sm font-bold rounded-xl transition-all {{ request()->routeIs('branch.admin.requests') ? 'bg-[#EBF5F4] text-[#005F5B]' : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900' }}">
                    <svg fill="#005f5b" width="18px" height="18px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 31.969 31.97" xml:space="preserve" stroke="#005f5b"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <g> <path d="M0.875,21.789v7.955c0,1.229,0.997,2.226,2.226,2.226h25.766c1.229,0,2.227-0.997,2.227-2.226v-7.971 c-0.158,0.01-0.193,0.016-0.256,0.016H0.875z M5.296,30.143c-0.727,0-1.315-0.589-1.315-1.314s0.589-1.314,1.315-1.314 c0.725,0,1.314,0.589,1.314,1.314S6.021,30.143,5.296,30.143z M26.762,29.902H9.907c-0.591,0-1.072-0.441-1.072-1.033 s0.48-1.034,1.072-1.034h16.855c0.592,0,1.072,0.44,1.072,1.034C27.834,29.46,27.356,29.902,26.762,29.902z"></path> <path d="M28.868,16.383v-0.046V6.825c0-0.655-0.26-1.283-0.725-1.746l-4.38-4.361C23.302,0.258,22.677,0,22.026,0H4.564 C3.756,0,3.102,0.655,3.102,1.463v14.873v0.046c-1.229,0-2.226,0.997-2.226,2.226v1.114h29.963c0.062,0,0.098,0.006,0.256,0.017 v-1.131C31.094,17.38,30.097,16.383,28.868,16.383z M23.301,3.283l2.443,2.444h-2.443V3.283z M5.169,2.068h16.063v0.068v4.492 c0,0.731,0.594,1.325,1.325,1.325h4.083v8.112H5.169V2.068z"></path> <path d="M23.333,11.135H8.319c-0.592,0-1.072,0.442-1.072,1.034c0,0.591,0.48,1.034,1.072,1.034h15.013 c0.592,0,1.072-0.442,1.072-1.034C24.403,11.576,23.923,11.135,23.333,11.135z"></path> <path d="M8.319,7.953h8.58c0.592,0,1.071-0.521,1.071-1.114c0-0.592-0.479-1.112-1.071-1.112h-8.58 c-0.592,0-1.072,0.521-1.072,1.112C7.248,7.432,7.728,7.953,8.319,7.953z"></path> </g> </g> </g></svg>
                    Requests Queue
                </a>
                <a href="{{ route('branch.admin.notices') }}" class="flex items-center gap-3 px-4 py-3 text-sm font-bold rounded-xl transition-all {{ request()->routeIs('branch.admin.notices') ? 'bg-[#EBF5F4] text-[#005F5B]' : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900' }}">
                    <svg fill="#005f5b" height="20px" width="20px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 256 256" xml:space="preserve" stroke="#005f5b"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <path d="M214.5,188.2h0.2c-0.3-0.2-0.7-0.3-0.8-0.5C214,187.9,214.3,188.1,214.5,188.2z"></path> <path d="M232,84V22.5l0,0c-0.5-5.9-5.4-10.6-11.5-10.6c-4.2,0-7.9,2.4-9.9,5.7C184.2,39,151,66.5,101.3,66.5H42.7 c-0.7,0-1.5,0-2.2,0.2c-0.2,0-0.2,0-0.3,0C21,66.6,5.5,82.1,5.5,101.3S21,136,40.2,136c0.2,0,0.2,0,0.3,0c0.7,0,1.5,0.2,2.2,0.2H50 l16.7,109.4l49.7-6.4l-2.5-20.2l10.1-1.5l-2.9-19.2l-9.8,1.5L100.7,136c4.9,0,9.3,0.2,12.1,0.5c45.8,3.9,75.6,30.1,99.9,50 c0.3,0.3,0.8,0.7,1.2,1c0.3,0.2,0.7,0.3,0.8,0.5c1.7,1,3.7,1.5,5.7,1.5c5.7,0,10.6-4.2,11.3-9.8l0,0h0.2v-61.1 c9.6,0,17.3-7.7,17.3-17.3C249.4,91.7,241.6,84,232,84z M214.5,166c-35.4-27.1-61.3-42.4-95.8-46.3V83 c34.5-3.9,60.5-19.4,95.8-46.7V166z"></path> </g> </g></svg>
                    Branch Notices
                </a>
                    <a href="{{ route('branch.admin.reports') }}" class="flex items-center gap-3 px-4 py-3 text-sm font-bold rounded-xl transition-all {{ request()->routeIs('branch.admin.reports') ? 'bg-[#EBF5F4] text-[#005F5B]' : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900' }}">
                    <svg fill="#005f5b" height="18px" width="18px" viewBox="0 0 1920 1920" xmlns="http://www.w3.org/2000/svg" stroke="#005f5b"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M533.333 560v160H240l.008 453.33 209.066 213.34H1470.93l209.06-213.34L1680 720h-293.33V560h352c55.96 0 101.33 45.368 101.33 101.333v511.997h16c35.35 0 64 28.66 64 64V1856c0 35.35-28.65 64-64 64H64c-35.346 0-64-28.65-64-64v-618.67c0-35.34 28.654-64 64-64h16V661.333C80 605.368 125.369 560 181.333 560h352ZM1040 0v958.86l183.43-183.429 113.14 113.138L960 1265.14 583.431 888.569l113.138-113.138L880 958.86V0h160Z"></path> </g></svg>
                    Branch Reports
                </a>
            </nav>
        </div>
        <div class="p-4 border-t border-slate-100">
            <div class="p-3 rounded-2xl bg-slate-50 flex items-center gap-3 mb-2">
                <div class="w-10 h-10 rounded-xl bg-[#005F5B] text-white flex items-center justify-center font-bold text-sm shadow-md">{{ $user->initials() }}</div>
                <div><p class="text-sm font-bold text-slate-800">{{ $user->name }}</p><p class="text-xs text-slate-500">Branch Admin</p></div>
            </div>
        </div>
    </aside>
    <div class="pl-64 flex-1">
         <header class="h-16 bg-white border-b border-slate-200 flex items-center justify-between px-8 sticky top-0 z-10">
            <h1 class="text-lg font-black text-[#005F5B]">Branch Students – {{ $branch }}</h1>
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
        <main class="p-8">
            <form method="GET" class="flex flex-wrap gap-3 mb-6">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Search students..." class="bg-white border border-slate-200 rounded-xl px-4 py-2.5 text-sm font-medium focus:outline-none focus:border-[#005F5B] transition">
                <select name="year" class="bg-white border border-slate-200 rounded-xl px-4 py-2.5 text-sm font-medium focus:outline-none focus:border-[#005F5B] transition">
                    <option value="">All Years</option>
                    @foreach([1,2,3,4] as $y)<option value="{{ $y }}" {{ request('year') == $y ? 'selected' : '' }}>Year {{ $y }}</option>@endforeach
                </select>
                <button type="submit" class="bg-[#005F5B] text-white font-bold text-sm px-5 py-2.5 rounded-xl hover:bg-[#003a38] transition">Filter</button>
                <a href="{{ route('branch.admin.students') }}" class="border border-slate-200 text-slate-700 font-bold text-sm px-4 py-2.5 rounded-xl hover:bg-slate-50 transition">Reset</a>
            </form>
            <div class="bg-white border border-slate-200 rounded-2xl shadow-sm overflow-hidden">
                <table class="w-full text-sm">
                    <thead><tr class="bg-slate-50 border-b text-xs font-bold uppercase text-black tracking-wider">
                        <th class="py-3 px-5 text-left">Name</th>
                        <th class="py-3 px-5 text-left">Roll Number</th>
                        <th class="py-3 px-5 text-left">Year</th>
                        <th class="py-3 px-5 text-left">Achievements Logged</th>
                    </tr></thead>
                    <tbody class="divide-y divide-slate-100">
                        @forelse($students as $student)
                        <tr class="hover:bg-slate-50">
                            <td class="py-3.5 px-5 font-bold text-slate-800">{{ $student->name }}</td>
                            <td class="py-3.5 px-5 text-slate-600 text-xs font-semibold">{{ optional($student->studentProfile)->roll_number ?? '—' }}</td>
                            <td class="py-3.5 px-5 text-slate-700">Year {{ optional($student->studentProfile)->year_of_study ?? '—' }}</td>
                            <td class="py-3.5 px-5"><span class="bg-[#EBF5F4] text-[#005F5B] font-bold text-xs px-2 py-0.5 rounded-md">{{ $student->achievements->count() }}</span></td>
                        </tr>
                        @empty
                        <tr><td colspan="4" class="py-8 text-center text-slate-500 font-semibold">No students found.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</div>
@endsection
