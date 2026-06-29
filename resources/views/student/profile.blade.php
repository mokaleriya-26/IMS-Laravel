<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Student Profile</title>
</head>
<body class="bg-[#F8FAFC] min-h-screen p-6">
    <div class="max-w-3xl mx-auto bg-white rounded-3xl border border-slate-200 p-8 shadow-sm">
        <div class="flex items-center justify-between mb-8 gap-4">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Edit Profile</h1>
                <p class="text-sm text-gray-500">Update your account details and student information.</p>
            </div>
            <a href="{{ route('student.dashboard') }}" class="rounded-2xl border border-slate-300 px-5 py-3 text-sm font-semibold text-slate-700 hover:bg-slate-50">Back</a>
        </div>

        @if(session('success'))
            <div class="mb-4 rounded-2xl bg-emerald-50 border border-emerald-200 p-4 text-sm text-emerald-700">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="mb-4 rounded-2xl bg-red-50 border border-red-200 p-4 text-sm text-red-700">
                <ul class="list-disc ml-5">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('student.profile.update') }}" class="space-y-6">
            @csrf

            <div>
                <label class="block text-sm font-medium text-gray-700">Name</label>
                <input name="name" type="text" value="{{ old('name', $user->name) }}" required class="mt-1 w-full rounded-2xl border border-slate-200 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#005F5B]" />
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Email</label>
                <input name="email" type="email" value="{{ old('email', $user->email) }}" required class="mt-1 w-full rounded-2xl border border-slate-200 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#005F5B]" />
            </div>

            <div class="grid grid-cols-3 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Roll Number</label>
                    <input name="roll_number" type="text" value="{{ old('roll_number', $user->studentProfile->roll_number ?? '') }}" required class="mt-1 w-full rounded-2xl border border-slate-200 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#005F5B]" />
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Branch</label>
                    <input name="branch" type="text" value="{{ old('branch', $user->studentProfile->branch ?? '') }}" required class="mt-1 w-full rounded-2xl border border-slate-200 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#005F5B]" />
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Year</label>
                    <input name="year_of_study" type="number" min="1" max="4" value="{{ old('year_of_study', $user->studentProfile->year_of_study ?? '') }}" required class="mt-1 w-full rounded-2xl border border-slate-200 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#005F5B]" />
                </div>
            </div>

            <button type="submit" class="rounded-2xl bg-[#005F5B] px-6 py-3 text-white font-semibold hover:bg-[#004845] transition">Save changes</button>
        </form>
    </div>
</body>
</html>
