@extends('layouts.app')

@section('content')
<div class="flex min-h-screen bg-[#F8FAFC]">
    
    {{-- Sidebar --}}
    <aside class="w-64 bg-white border-r border-slate-200 flex flex-col justify-between fixed h-full z-20 shadow-sm">
        <div class="p-6">
            <div class="flex items-center gap-4 mb-8">
                <img src="{{ asset('images/logo.png') }}" alt="EduHive Logo" class="w-14 h-14 md:w-16 md:h-16 object-contain drop-shadow-md flex-shrink-0" draggable="false" >
                <div>
                    <h3 class="text-lg font-bold text-slate-900 leading-tight"> System Administrator</h3>
                    <p class="text-sm text-[#005F5B] font-semibold tracking-wide"> EduHive </p>
                </div>
            </div>

            <nav class="space-y-1">
                <a href="{{ route('admin.dashboard') }}" 
                   class="flex items-center gap-3 px-4 py-3 text-sm font-bold text-slate-600 hover:bg-slate-50 rounded-xl transition-all">
                    <svg fill="#005F5B" width="20px" height="20px" viewBox="0 0 1000 1000" xmlns="http://www.w3.org/2000/svg" stroke="#005F5B"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M808 154H616l-1-7q-4-44-37-74t-78-30-78 30-37 74l-1 7H192q-31 0-53 22t-22 53v616q0 31 22 53.5t53 22.5h616q31 0 53-22.5t22-53.5V230q0-32-22-54t-53-22zm-308-41q18 0 31 13t13 31.5-13 31.5-31 13-31-13-13-31.5 13-31.5 31-13zm31 611H297q-8 0-14-5.5t-6-13.5v-48q0-8 6-13.5t14-5.5h234q8 0 14 5.5t6 13.5v48q0 8-6 13.5t-14 5.5zm172-150H297q-8 0-14-5.5t-6-13.5v-48q0-8 6-14t14-6h406q8 0 14 6t6 14v48q0 8-6 13.5t-14 5.5zm0-150H297q-8 0-14-5.5t-6-14.5v-47q0-8 6-14t14-6h406q8 0 14 6t6 14v47q0 9-6 14.5t-14 5.5z"></path></g></svg>
                    Dashboard
                </a>
                
                <a href="{{ route('admin.users', ['role' => 'student']) }}" 
                   class="flex items-center gap-3 px-4 py-3 text-sm font-bold rounded-xl transition-all {{ request()->query('role') === 'student' ? 'bg-[#EBF5F4] text-[#005F5B]' : 'text-slate-600 hover:bg-slate-50' }}">
                    <svg fill="#005F5B" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="20px" height="20px" viewBox="0 0 190.06 190.06" xml:space="preserve" stroke="#005F5B" stroke-width="0.0019006000000000001"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <g> <path d="M74.855,43.025c-10.73-14.002-31.93-16.26-47.206-8.84C11.909,41.831,7.812,54.189,5.331,70.255 c-0.938,6.078-2.285,12.806-1.322,18.95c0.025,0.162,0.148,0.505,0.327,0.88c0.007,0.106,0.011,0.211,0.019,0.317 c-0.033,0.006-0.065,0.013-0.097,0.02c-1.345,0.311-1.339,2.391,0,2.705c5.374,1.262,11.005,1.763,16.698,1.952 c5.135,8,17.062,12.442,26.559,12.487c7.552,0.036,15.428-2.715,20.226-8.733c0.595-0.747,1.134-1.584,1.619-2.48 c4.592,0.026,9.123-0.193,13.455-0.919c0.473-0.079,0.822-0.326,1.102-0.637c1.289,0.093,2.675-0.687,2.715-2.354 C87.047,75.596,85.46,56.863,74.855,43.025z"></path> <path d="M140.683,68.427c-12.234-0.564-27.683,1.199-38.47,7.469c-0.698,0.406-0.768,1.209-0.467,1.808 c-5.535,12.933,7.087,23.47,22.425,26.943c-0.466,1.787-0.215,3.979-0.291,5.595c-0.209,4.429,0.03,9.219,1.852,13.322 c3.709,8.352,11.908,6.092,19.282,4.73c1.091-0.201,1.843-1.381,1.849-2.427c0.021-4.707,0.046-9.414,0.039-14.122 c-0.004-2.491,0.173-5.111,0.148-7.698c8.583-2.807,15.386-9.011,17.029-19.646c0.069-0.451,0.019-0.86-0.104-1.229 c0.194-0.224,0.352-0.498,0.41-0.877C166.14,71.033,148.104,68.769,140.683,68.427z"></path> <path d="M161.333,44.139c-7.608-6.377-18.305-12.044-28.522-10.951c-13.587,1.454-44.702,16.072-34.179,34.116 c0.109,0.187,0.245,0.335,0.393,0.458c0.067,0.688,0.7,1.342,1.523,1.119c13.963-3.786,29.942-11.271,44.73-7.76 c4.397,1.044,8.683,3.013,12.773,4.878c1.761,0.803,3.478,1.695,5.172,2.628c0.673,0.379,1.331,0.784,1.974,1.214 c0.29,0.187,0.501,0.337,0.667,0.463c-0.024,0.986,0.73,1.927,1.877,1.99c2.062,0.112,2.972-1.106,2.997-2.554 c0.817,0.1,1.712-0.226,2.147-0.977C177.918,60.074,167.328,49.165,161.333,44.139z"></path> <path d="M183.553,130.486c-3.356-5.223-15.951-21.392-24.495-19.159c-0.874-0.67-2.129-0.81-3.009,0.176 c-2.332,2.615-2.227,6.881-2.574,10.188c-0.56,5.334-0.686,10.795-1.759,16.064c-11.903-1.195-23.748,2.08-35.601,0.652 c0.069-8.096,0.336-16.262-1.424-24.183c0.96-1.025,0.695-3.035-0.553-3.806c-7.473-4.607-18.241,8.033-22.205,12.755 c-1.031,1.229-3.695,4.444-5.631,7.689c-5.083-8.275-14.536-14.853-23.763-14.402c-1.467-1.078-4.24-0.385-4.409,2.054 c-0.263,3.776,0.083,7.613-0.471,11.366c-0.789,5.345-5.969,5.386-10.087,5.3c-5.248-0.109-10.593-1.166-15.792-0.375 c-0.109-4.39-0.211-8.777-0.375-13.164c-0.059-1.582,0.349-4.753-1.262-5.852l-0.002-0.002c-0.041-0.027-0.068-0.069-0.112-0.095 c-0.048-0.028-0.093-0.027-0.141-0.048c-0.096-0.049-0.194-0.083-0.302-0.104c-0.077-0.015-0.15-0.021-0.224-0.021 c-0.028,0-0.056,0.007-0.084,0.008c-1.172-2.561-5.591-1.17-7.808-0.216c-6.328,2.722-12.717,9.518-16.765,14.914 c-4.222,5.629-5.735,14.696-4,21.452c1.713,6.668,11.312,5.716,16.411,5.56c10.735-0.33,21.159-1.408,31.94-1.192 c16.462,0.329,32.908,1.225,49.365,1.727c15.853,0.482,31.634,0.683,47.471,1.645c7.742,0.472,15.485,0.764,23.24,0.536 c5.145-0.15,11.948,0.197,16.566-2.534c0.951-0.562,1.288-1.381,1.22-2.168C193.839,148.863,187.771,137.051,183.553,130.486z"></path> </g> </g> </g></svg>
                    Manage Students
                </a>

                <a href="{{ route('admin.users', ['role' => 'faculty']) }}" 
                   class="flex items-center gap-3 px-4 py-3 text-sm font-bold rounded-xl transition-all {{ request()->query('role') === 'faculty' ? 'bg-[#EBF5F4] text-[#005F5B]' : 'text-slate-600 hover:bg-slate-50' }}">
                    <svg fill="#005F5B" width="20px" height="20px" viewBox="0 0 1920 1920" xmlns="http://www.w3.org/2000/svg" stroke="#005F5B"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M640.376 734.118c121.977 0 121.977 112.94 245.083 112.94 58.937 0 89.362-26.5 118.905-53.795l2.013-1.862c3.354-3.104 6.705-6.211 10.094-9.283v64.94c0 155.747-126.607 282.354-282.353 282.354s-282.353-126.607-282.353-282.353v-11.294c25.49-10.364 44.24-26.974 62.816-43.79l3.012-2.727c30.625-27.73 61.743-55.13 122.783-55.13ZM1920-.012V1129.4h-338.824v-112.94h225.883V112.93H112.94v903.53h112.941v112.94H0V-.01h1920ZM1471.85 714.24l-356.33 948.932c-174.268 10.39-448.941 17.957-631.002-48.113l38.4-106.165c130.334 47.435 337.807 53.873 529.807 41.675l132.593-354.635-60.424-15.812c-46.758-12.197-93.854-21.346-141.176-29.138 88.207-72.509 145.694-181.045 145.694-303.925V734.118c0-217.977-177.318-395.294-395.294-395.294-217.977 0-395.294 177.317-395.294 395.294v112.94c0 122.655 57.374 231.078 145.242 303.587-56.019 9.374-111.473 20.894-166.024 36.48-120.734 34.334-205.1 146.371-205.1 272.075v329.11l34.898 14.457C332.273 1879.454 535.115 1920 734.118 1920c180.254 0 348.65-15.925 474.127-44.725 50.371-11.407 90.917-46.983 108.65-95.096l31.849-87.304c14.343-39.19 7.567-81.995-18.41-114.522-12.988-16.49-29.816-28.913-48.565-36.48l295.793-787.878-105.713-39.755Z" fill-rule="evenodd"></path> </g></svg>
                    Manage Faculty
                </a>

                <a href="{{ route('admin.users', ['role' => 'placement_cell']) }}" 
                   class="flex items-center gap-3 px-4 py-3 text-sm font-bold text-slate-600 hover:bg-slate-50 hover:text-slate-900 rounded-xl transition-all">
                    <svg fill="#005F5B" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="20px" height="20px" viewBox="0 0 935.996 935.996" xml:space="preserve" stroke="#005F5B"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <g> <g> <path d="M76.416,653.994c-0.738-0.698-1.469-1.405-2.191-2.129c-20.776-20.774-32.218-48.399-32.218-77.781V91.273 c0-10.925,2.949-21.168,8.072-30H30c-16.569,0-30,13.431-30,30v482.81C0,617.066,33.898,652.119,76.416,653.994z"></path> <path d="M466.439,167.209c-37.812,0-62.039,32.671-62.039,86.268c0,53.963,24.229,88.47,62.039,88.47 c37.809,0,62.04-34.507,62.04-88.47C528.479,199.88,504.25,167.209,466.439,167.209z"></path> <path d="M663.203,326.476c16.695,3.021,33.004,7.845,48.791,14.442c27.19-2.972,42.25-16.047,42.25-39.72 c0-24.962-19.09-36.71-55.064-36.71h-35.977V326.476L663.203,326.476z"></path> <path d="M741.396,198.779c0-22.026-15.785-31.203-46.988-31.203h-31.203v66.444h30.469 C727.078,234.02,741.396,221.172,741.396,198.779z"></path> <path d="M152.007,654.083h251.63c-0.354-0.809-0.718-1.612-1.063-2.43c-11.71-27.686-17.939-56.992-18.56-87.18H185.73 c-8.284,0-15-6.717-15-15c0-8.285,6.716-15,15-15h199.533c2.204-21.082,7.203-41.642,14.963-61.41H185.73 c-8.284,0-15-6.715-15-15s6.716-15,15-15H414.5c10.515-18.622,23.498-35.718,38.81-51.03c4.551-4.551,9.269-8.885,14.128-13.022 c-0.334,0.003-0.665,0.012-1,0.012c-62.406,0-105.725-47.724-105.725-125.547c0-77.458,43.317-123.344,105.725-123.344 c62.772,0,106.09,45.887,106.09,123.344c0,31.861-7.265,58.673-20.148,79.234c22.021-6.643,44.877-10.018,68.24-10.029V134.537 h76.723c49.56,0,85.9,15.051,85.9,59.102c0,22.76-13.215,44.786-41.115,52.128v1.468c34.506,5.874,53.596,24.596,53.596,56.899 c0,30.077-15.364,50.103-39.809,60.885c11.469,7.987,22.254,16.999,32.271,27.015c19.976,19.975,35.996,42.984,47.722,68.465 c1.033,2.248,2.047,4.508,3.014,6.793c12.355,29.213,18.621,60.227,18.621,92.182c0,31.953-6.266,62.967-18.621,92.18 c-0.25,0.588-0.514,1.168-0.768,1.754c39.344-5.031,69.76-38.612,69.76-79.324V91.273c0-16.569-13.43-30-30-30h-72.004H102.007 c-16.568,0-30,13.431-30,30v482.811C72.007,618.267,107.825,654.083,152.007,654.083z M199.561,316.617 c9.545,17.621,22.76,25.33,37.444,25.33c22.393,0,33.773-12.114,33.773-46.254V134.537h42.583v164.826 c0,43.685-21.292,79.66-71.583,79.66c-33.406,0-56.533-13.95-71.584-40.747L199.561,316.617z"></path> <path d="M788.188,726.914c-11.772,11.773-24.606,22.164-38.37,31.125l102.289,102.289c9.596,9.597,22.172,14.396,34.747,14.396 c12.578,0,25.152-4.799,34.75-14.396c19.189-19.188,19.189-50.305,0-69.496L819.312,688.541 C810.354,702.306,799.961,715.14,788.188,726.914z"></path> <path d="M432.832,473.064c-8.789,19.082-14.756,39.729-17.369,61.41c-0.987,8.195-1.509,16.535-1.509,25 c0,1.672,0.024,3.338,0.063,5c0.765,32.236,8.908,62.646,22.806,89.608c2.644,5.132,5.504,10.132,8.554,15 c3.23,5.156,6.677,10.162,10.335,15c37.751,49.923,97.623,82.187,165.037,82.187c39.293,0,76.025-10.961,107.311-29.988 c22.388-13.617,41.978-31.373,57.726-52.197c3.66-4.838,7.104-9.844,10.336-15c0.479-0.766,0.965-1.526,1.436-2.301 c2.519-4.139,4.892-8.377,7.117-12.699c4.596-8.911,8.559-18.2,11.836-27.807c7.15-20.957,11.035-43.426,11.035-66.803 c0-81.051-46.635-151.197-114.527-185.105c-27.776-13.873-59.106-21.69-92.268-21.69c-0.043,0-0.086,0.002-0.129,0.002 c-70.984,0.043-133.594,35.854-170.801,90.383C443.36,452.53,437.669,462.561,432.832,473.064z"></path> </g> </g> </g> </g></svg>
                    Placement Accounts
                </a>

                <a href="{{ route('admin.users', ['role' => 'club_admin']) }}" 
                   class="flex items-center gap-3 px-4 py-3 text-sm font-bold text-slate-600 hover:bg-slate-50 hover:text-slate-900 rounded-xl transition-all">
                    <svg fill="#005F5B" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="25px" height="25px" viewBox="0 0 39.562 39.562" xml:space="preserve" stroke="#005F5B"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <path d="M19.749,22.049c0.01,0,0.018-0.002,0.029-0.002c0.012,0,0.024,0.002,0.038,0.002H19.749z M15.702,17.902 c0.011-0.002,0.018-0.013,0.029-0.016c0.651,2.356,2.338,4.123,4.051,4.16c1.562-0.071,3.478-1.806,4.115-4.148 c0.293,0.018,0.588-0.328,0.67-0.81c0.084-0.503-0.095-0.952-0.396-1.005c-0.021-0.003-0.039,0.01-0.06,0.011 c-0.088-3.879-1.931-5.247-4.252-5.307c-2.392,0.012-4.535,1.675-4.399,5.307c-0.023,0-0.044-0.015-0.066-0.011 c-0.304,0.053-0.482,0.502-0.396,1.005C15.082,17.588,15.398,17.953,15.702,17.902z M19.928,10.781h-0.293 c0.074-0.001,0.146,0.003,0.22,0.006C19.882,10.787,19.905,10.781,19.928,10.781z M23.008,22.72l-2.175,4.254l-0.344-2.77 l0.537-0.438h-1.301h-1.188l0.537,0.438l-0.344,2.77l-2.171-4.254c-3.777,0.508-6.488,2.127-6.488,6.062h19.422 C29.493,24.846,26.782,23.227,23.008,22.72z M6.267,24.815H4.908l1.703-1.703C2.804,23.486,0,24.936,0,28.781h8.343l-3.021-3.021 L6.267,24.815z M12.36,16.973c-0.124,1.691-0.845,3.668-1.882,4.728h4.007v-4.47c0-4.674-2.472-6.449-5.521-6.449 c-3.049,0-5.52,1.774-5.52,6.449v4.47H7.45c-1.002-1.023-1.715-2.909-1.873-4.562l0.039-0.003c1.725,0,3.214-0.714,4.033-1.769 C10.248,16.139,11.208,16.715,12.36,16.973z M34.241,25.761l-3.021,3.021h8.342c0-3.846-2.803-5.295-6.61-5.669l1.703,1.703h-1.356 L34.241,25.761z M29.915,15.367c0.818,1.054,2.31,1.769,4.033,1.769l0.039,0.003c-0.156,1.653-0.869,3.538-1.873,4.562h4.006v-4.47 c0-4.674-2.471-6.449-5.521-6.449c-3.047,0-5.521,1.774-5.521,6.449v4.47h4.009c-1.037-1.06-1.761-3.036-1.884-4.728 C28.356,16.715,29.317,16.139,29.915,15.367z"></path> </g> </g></svg>
                    Club Admins
                </a>

                <a href="{{ route('admin.users', ['role' => 'branch_admin']) }}" 
                   class="flex items-center gap-3 px-4 py-3 text-sm font-bold text-slate-600 hover:bg-slate-50 hover:text-slate-900 rounded-xl transition-all">
                    <svg fill="#005f5b" height="20px" width="20px" viewBox="0 0 36 36" version="1.1" preserveAspectRatio="xMidYMid meet" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" stroke="#005f5b" stroke-width="0.00036"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>administrator-solid</title> <circle cx="14.67" cy="8.3" r="6" class="clr-i-solid clr-i-solid-path-1"></circle><path d="M16.44,31.82a2.15,2.15,0,0,1-.38-2.55l.53-1-1.09-.33A2.14,2.14,0,0,1,14,25.84V23.79a2.16,2.16,0,0,1,1.53-2.07l1.09-.33-.52-1a2.17,2.17,0,0,1,.35-2.52,18.92,18.92,0,0,0-2.32-.16A15.58,15.58,0,0,0,2,23.07v7.75a1,1,0,0,0,1,1H16.44Z" class="clr-i-solid clr-i-solid-path-2"></path><path d="M33.7,23.46l-2-.6a6.73,6.73,0,0,0-.58-1.42l1-1.86a.35.35,0,0,0-.07-.43l-1.45-1.46a.38.38,0,0,0-.43-.07l-1.85,1a7.74,7.74,0,0,0-1.43-.6l-.61-2a.38.38,0,0,0-.36-.25H23.84a.38.38,0,0,0-.35.26l-.6,2a6.85,6.85,0,0,0-1.45.61l-1.81-1a.38.38,0,0,0-.44.06l-1.47,1.44a.37.37,0,0,0-.07.44l1,1.82A7.24,7.24,0,0,0,18,22.83l-2,.61a.36.36,0,0,0-.26.35v2.05a.36.36,0,0,0,.26.35l2,.61a7.29,7.29,0,0,0,.6,1.41l-1,1.9a.37.37,0,0,0,.07.44L19.16,32a.38.38,0,0,0,.44.06l1.87-1a7.09,7.09,0,0,0,1.4.57l.6,2.05a.38.38,0,0,0,.36.26h2.05a.38.38,0,0,0,.35-.26l.6-2.05a6.68,6.68,0,0,0,1.38-.57l1.89,1a.38.38,0,0,0,.44-.06L32,30.55a.38.38,0,0,0,.06-.44l-1-1.88a6.92,6.92,0,0,0,.57-1.38l2-.61a.39.39,0,0,0,.27-.35V23.82A.4.4,0,0,0,33.7,23.46Zm-8.83,4.72a3.34,3.34,0,1,1,3.33-3.34A3.34,3.34,0,0,1,24.87,28.18Z" class="clr-i-solid clr-i-solid-path-3"></path> <rect x="0" y="0" width="36" height="36" fill-opacity="0"></rect> </g></svg>
                    Branch Admins
                </a>

                <a href="{{ route('admin.announcements') }}" 
                   class="flex items-center gap-3 px-4 py-3 text-sm font-bold text-slate-600 hover:bg-slate-50 hover:text-slate-900 rounded-xl transition-all">
                    <svg fill="#005f5b" height="20px" width="20px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 256 256" xml:space="preserve" stroke="#005f5b"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <path d="M214.5,188.2h0.2c-0.3-0.2-0.7-0.3-0.8-0.5C214,187.9,214.3,188.1,214.5,188.2z"></path> <path d="M232,84V22.5l0,0c-0.5-5.9-5.4-10.6-11.5-10.6c-4.2,0-7.9,2.4-9.9,5.7C184.2,39,151,66.5,101.3,66.5H42.7 c-0.7,0-1.5,0-2.2,0.2c-0.2,0-0.2,0-0.3,0C21,66.6,5.5,82.1,5.5,101.3S21,136,40.2,136c0.2,0,0.2,0,0.3,0c0.7,0,1.5,0.2,2.2,0.2H50 l16.7,109.4l49.7-6.4l-2.5-20.2l10.1-1.5l-2.9-19.2l-9.8,1.5L100.7,136c4.9,0,9.3,0.2,12.1,0.5c45.8,3.9,75.6,30.1,99.9,50 c0.3,0.3,0.8,0.7,1.2,1c0.3,0.2,0.7,0.3,0.8,0.5c1.7,1,3.7,1.5,5.7,1.5c5.7,0,10.6-4.2,11.3-9.8l0,0h0.2v-61.1 c9.6,0,17.3-7.7,17.3-17.3C249.4,91.7,241.6,84,232,84z M214.5,166c-35.4-27.1-61.3-42.4-95.8-46.3V83 c34.5-3.9,60.5-19.4,95.8-46.7V166z"></path> </g> </g></svg>
                    Announcements
                </a>
            </nav>
        </div>
        <div class="p-4 border-t border-slate-100 m-4 rounded-2xl flex items-center gap-3 bg-slate-50/50">
            <div class="w-10 h-10 rounded-xl bg-[#005F5B] text-white flex items-center justify-center font-bold text-sm shadow-md">
                {{ Auth::user()->initials() }}
            </div>
            <div class="overflow-hidden">
                <h5 class="text-sm font-bold text-slate-800 truncate">{{ Auth::user()->name }}</h5>
                <p class="text-xs text-slate-500 font-medium truncate">Administrator</p>
            </div>
        </div>
    </aside>

    {{-- Main Content --}}
    <div class="pl-64 flex-1 flex flex-col min-h-screen">
        
        {{-- Header --}}
        <header class="h-20 bg-white border-b border-slate-200/80 flex items-center justify-between px-8 sticky top-0 z-10 shadow-sm">
            <div class="font-extrabold text-[#005F5B] text-lg">Create User Account</div>
            <div class="flex items-center gap-4">
                <a href="{{ route('admin.users') }}" class="flex items-center gap-2 text-sm font-semibold text-slate-600 hover:text-[#005F5B] transition">
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

        {{-- Main Body --}}
        <main class="p-8 flex-1">
            <div class="w-full bg-white border border-slate-200 rounded-3xl shadow-xl overflow-hidden">
                <div class="p-6 border-b border-slate-100 flex justify-between items-center bg-slate-50/50">
                    <div>
                        <h2 class="text-xl font-black text-slate-900">New User Form</h2>
                        <p class="text-xs text-slate-500 font-medium mt-0.5">Create a new institutional user with role and configuration details.</p>
                    </div>
                </div>

                @if($errors->any())
                    <div class="m-6 p-4 bg-rose-50 border border-rose-200 rounded-xl text-rose-700 text-sm font-semibold">
                        <ul class="list-disc pl-4 space-y-1">
                            @foreach($errors->all() as $err)
                                <li>{{ $err }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('admin.users.store') }}" method="POST" class="p-8 space-y-6">
                    @csrf
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <div>
                            <label class="block text-xs font-bold text-slate-700 uppercase tracking-wide mb-2">Role Type *</label>
                            <select id="role-select" name="role" class="w-full h-12 bg-slate-50 border border-slate-200 rounded-xl px-4 text-sm font-bold text-slate-700 focus:outline-none focus:border-[#005F5B] focus:bg-white transition-all">
                                <option value="student" {{ request()->query('role') === 'student' ? 'selected' : '' }}>Student</option>
                                <option value="faculty" {{ request()->query('role') === 'faculty' ? 'selected' : '' }}>Faculty</option>
                                <option value="placement_cell" {{ request()->query('role') === 'placement_cell' ? 'selected' : '' }}>Placement Cell</option>
                                <option value="club_admin" {{ request()->query('role') === 'club_admin' ? 'selected' : '' }}>Club Admin</option>
                                <option value="branch_admin" {{ request()->query('role') === 'branch_admin' ? 'selected' : '' }}>Branch Admin</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-700 uppercase tracking-wide mb-2">Full Name *</label>
                            <input type="text" name="name" required value="{{ old('name') }}" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3.5 text-sm font-medium focus:outline-none focus:border-[#005F5B] focus:bg-white transition-all" placeholder="John Doe">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <div>
                            <label class="block text-xs font-bold text-slate-700 uppercase tracking-wide mb-2">Username *</label>
                            <input type="text" name="username" required value="{{ old('username') }}" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3.5 text-sm font-medium focus:outline-none focus:border-[#005F5B] focus:bg-white transition-all" placeholder="e.g. john_doe">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-700 uppercase tracking-wide mb-2">Password *</label>
                            <input type="password" name="password" required class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3.5 text-sm font-medium focus:outline-none focus:border-[#005F5B] focus:bg-white transition-all" placeholder="Min 6 characters">
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wide mb-2">Email Address (Optional)</label>
                        <input type="email" name="email" value="{{ old('email') }}" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3.5 text-sm font-medium focus:outline-none focus:border-[#005F5B] focus:bg-white transition-all" placeholder="Defaults to: username@ims.edu">
                    </div>

                    {{-- Branch Assignment (Faculty / Branch Admin) --}}
                    <div id="branch-section" class="border-t pt-6 space-y-4 hidden">
                        <h4 class="text-xs font-extrabold text-slate-400 uppercase tracking-wide">Branch Admin Configuration</h4>
                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-1.5">Assigned Branch</label>
                            <input type="text" name="assigned_branch" value="{{ old('assigned_branch') }}" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3.5 text-sm font-medium focus:outline-none focus:border-[#005F5B] focus:bg-white transition-all" placeholder="e.g. Computer Science">
                        </div>
                    </div>

                    {{-- Club Assignment (Club Admin / Club Member) --}}
                    <div id="club-section" class="border-t pt-6 space-y-4 hidden">
                        <h4 class="text-xs font-extrabold text-slate-400 uppercase tracking-wide">Club Configuration</h4>
                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-1.5">Assigned Club Name</label>
                            <input type="text" name="assigned_club" value="{{ old('assigned_club') }}" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3.5 text-sm font-medium focus:outline-none focus:border-[#005F5B] focus:bg-white transition-all" placeholder="e.g. Coding Club">
                        </div>
                    </div>

                    {{-- Student Profile Section --}}
                    <div id="student-section" class="border-t pt-6 space-y-6">
                        <h4 class="text-xs font-extrabold text-slate-400 uppercase tracking-wide">Student Program Details</h4>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                            <div>
                                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wide mb-2">Roll Number</label>
                                <input type="text" id="roll_number" name="roll_number" value="{{ old('roll_number') }}" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3.5 text-sm font-medium focus:outline-none focus:border-[#005F5B] focus:bg-white transition-all" placeholder="e.g. CS2024001">
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wide mb-2">Branch / Major</label>
                                <input type="text" id="branch" name="branch" value="{{ old('branch') }}" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3.5 text-sm font-medium focus:outline-none focus:border-[#005F5B] focus:bg-white transition-all" placeholder="e.g. Computer Science">
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wide mb-2">Year of Study</label>
                                <select id="year_of_study" name="year_of_study" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm font-bold text-slate-700 focus:outline-none focus:border-[#005F5B] focus:bg-white transition-all">
                                    <option value="1" {{ old('year_of_study') == 1 ? 'selected' : '' }}>First Year</option>
                                    <option value="2" {{ old('year_of_study') == 2 ? 'selected' : '' }}>Second Year</option>
                                    <option value="3" {{ old('year_of_study') == 3 ? 'selected' : '' }}>Third Year</option>
                                    <option value="4" {{ old('year_of_study') == 4 ? 'selected' : '' }}>Fourth Year</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="border-t pt-5 flex justify-end gap-3 bg-white">
                        <a href="{{ route('admin.users', ['role' => request()->query('role', 'student')]) }}" class="px-5 py-2.5 border border-slate-200 rounded-xl text-sm font-bold text-slate-700 hover:bg-slate-50 transition shadow-sm">Discard</a>
                        <button type="submit" class="px-6 py-2.5 bg-[#005F5B] text-white rounded-xl text-sm font-bold hover:bg-[#004845] transition shadow-md">
                            Create Account
                        </button>
                    </div>
                </form>
            </div>
        </main>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const roleSelect = document.getElementById('role-select');
        const studentSection = document.getElementById('student-section');
        const branchSection = document.getElementById('branch-section');
        const clubSection = document.getElementById('club-section');
        const rollInput = document.getElementById('roll_number');
        const branchInput = document.getElementById('branch');

        function toggleFields() {
            const val = roleSelect.value;
            
            // Student specific
            if (val === 'student') {
                studentSection.style.display = 'block';
                rollInput.required = true;
                branchInput.required = true;
            } else {
                studentSection.style.display = 'none';
                rollInput.required = false;
                branchInput.required = false;
            }

            // Branch Admin / Faculty specific
            if (val === 'branch_admin' || val === 'faculty') {
                branchSection.style.display = 'block';
            } else {
                branchSection.style.display = 'none';
            }

            // Club Admin specific
            if (val === 'club_admin') {
                clubSection.style.display = 'block';
            } else {
                clubSection.style.display = 'none';
            }
        }

        roleSelect.addEventListener('change', toggleFields);
        toggleFields();
    });
</script>
@endsection
