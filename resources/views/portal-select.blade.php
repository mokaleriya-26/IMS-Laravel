<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#F8FAFC] flex flex-col min-h-screen justify-center items-center">
    <div class="w-full max-w-md bg-white rounded-2xl shadow-xl p-8 border border-slate-100">
        <div class="text-center mb-8">
            <div class="inline-flex bg-[#005F5B] text-white p-3 rounded-xl mb-3">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"/><path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"/></svg>
            </div>
            <h1 class="text-2xl font-bold text-gray-800">EduStream IMS</h1>
            <p class="text-sm text-gray-500">Select Your Portal</p>
        </div>

        <div class="space-y-4">
            <a href="{{ route('login', 'student') }}" class="flex items-center justify-between p-4 border rounded-xl hover:border-[#005F5B] transition group">
                <div class="flex items-center gap-4">
                    <div class="p-2 bg-slate-100 rounded-lg group-hover:bg-[#EBF5F4] text-slate-600 group-hover:text-[#005F5B]">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 14l9-5-9-5-9 5 9 5z"/></svg>
                    </div>
                    <div>
                        <h4 class="font-semibold text-gray-800">Student Login</h4>
                        <p class="text-xs text-gray-500">Access academic records and track uploads</p>
                    </div>
                </div>
                <span class="text-gray-400 group-hover:text-[#005F5B]">&rarr;</span>
            </a>

            <a href="{{ route('login', 'faculty') }}" class="flex items-center justify-between p-4 border rounded-xl hover:border-[#005F5B] transition group">
                <div class="flex items-center gap-4">
                    <div class="p-2 bg-slate-100 rounded-lg group-hover:bg-[#EBF5F4] text-slate-600 group-hover:text-[#005F5B]">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                    </div>
                    <div>
                        <h4 class="font-semibold text-gray-800">Faculty Login</h4>
                        <p class="text-xs text-gray-500">Manage courses, grading, and validation</p>
                    </div>
                </div>
                <span class="text-gray-400 group-hover:text-[#005F5B]">&rarr;</span>
            </a>
        </div>
    </div>
</body>
</html>