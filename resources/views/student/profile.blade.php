<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Student Profile</title>
</head>

<body class="bg-[#F8FAFC] min-h-screen">

<div class="max-w-5xl mx-auto py-10 px-6">

    {{-- Header --}}
    <div class="flex justify-between items-center mb-8">
        <div>
            <h1 class="text-3xl font-black text-slate-900">
                My Profile
            </h1>

            <p class="text-slate-500 mt-2">
                Manage your account and academic information.
            </p>
        </div>

        <a href="{{ route('student.dashboard') }}"
           class="px-5 py-2 rounded-xl border border-slate-300 bg-white font-semibold hover:bg-slate-100 transition">
            ← Back
        </a>
    </div>

    @if(session('success'))
        <div class="mb-6 rounded-2xl border border-green-200 bg-green-50 p-4 text-green-700 font-semibold">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="mb-6 rounded-2xl border border-red-200 bg-red-50 p-4">
            <ul class="list-disc ml-5 text-red-700">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST"
          action="{{ route('student.profile.update') }}">

        @csrf

        <div class="bg-white rounded-3xl shadow-lg border border-slate-200 overflow-hidden">

            {{-- Top Banner --}}
            <div class="bg-[#005F5B] h-28 relative">

                <div class="absolute left-8 top-14">

                    <div class="w-24 h-24 rounded-full bg-white border-4 border-white shadow-lg flex items-center justify-center">

                        <div class="w-20 h-20 rounded-full bg-[#005F5B] text-white text-3xl font-bold flex items-center justify-center">
                            {{ strtoupper(substr($user->name,0,1)) }}
                        </div>

                    </div>

                </div>

            </div>

            <div class="pt-16 px-8 pb-8">

                <h2 class="text-2xl font-black text-slate-900">
                    {{ $user->name }}
                </h2>

                <p class="text-slate-500">
                    {{ $user->email }}
                </p>

                <hr class="my-8">

                {{-- Personal Information --}}
                <h3 class="text-lg font-black text-[#005F5B] mb-5">
                    Personal Information
                </h3>

                <div class="grid md:grid-cols-2 gap-6">

                    <div>
                        <label class="text-sm font-bold text-slate-600">
                            Full Name
                        </label>

                        <input
                            type="text"
                            name="name"
                            value="{{ old('name',$user->name) }}"
                            class="mt-2 w-full rounded-xl border border-slate-300 px-4 py-3 focus:ring-2 focus:ring-[#005F5B] focus:outline-none">
                    </div>

                    <div>
                        <label class="text-sm font-bold text-slate-600">
                            Email Address
                        </label>

                        <input
                            type="email"
                            name="email"
                            value="{{ old('email',$user->email) }}"
                            class="mt-2 w-full rounded-xl border border-slate-300 px-4 py-3 focus:ring-2 focus:ring-[#005F5B] focus:outline-none">
                    </div>

                </div>

                <hr class="my-8">

                {{-- Academic Information --}}
                <h3 class="text-lg font-black text-[#005F5B] mb-5">
                    Academic Information
                </h3>

                <div class="grid md:grid-cols-3 gap-6">

                    <div>
                        <label class="text-sm font-bold text-slate-600">
                            Roll Number
                        </label>

                        <input
                            type="text"
                            name="roll_number"
                            value="{{ old('roll_number',$user->studentProfile->roll_number ?? '') }}"
                            class="mt-2 w-full rounded-xl border border-slate-300 px-4 py-3 focus:ring-2 focus:ring-[#005F5B] focus:outline-none">
                    </div>

                    <div>
                        <label class="text-sm font-bold text-slate-600">
                            Branch
                        </label>

                        <input
                            type="text"
                            name="branch"
                            value="{{ old('branch',$user->studentProfile->branch ?? '') }}"
                            class="mt-2 w-full rounded-xl border border-slate-300 px-4 py-3 focus:ring-2 focus:ring-[#005F5B] focus:outline-none">
                    </div>

                    <div>
                        <label class="text-sm font-bold text-slate-600">
                            Year
                        </label>

                        <input
                            type="number"
                            name="year_of_study"
                            min="1"
                            max="4"
                            value="{{ old('year_of_study',$user->studentProfile->year_of_study ?? '') }}"
                            class="mt-2 w-full rounded-xl border border-slate-300 px-4 py-3 focus:ring-2 focus:ring-[#005F5B] focus:outline-none">
                    </div>

                </div>

                <div class="flex justify-end gap-4 mt-10">

                    <a href="{{ route('student.dashboard') }}"
                       class="px-5 py-2.5 rounded-xl border border-slate-300 font-semibold hover:bg-slate-100 transition">
                        Cancel
                    </a>

                    <button
                        type="submit"
                        class="px-7 py-2.5 rounded-xl bg-[#005F5B] text-white font-bold hover:bg-[#004845] shadow-lg transition">
                        Save Changes
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>
</body>
</html>