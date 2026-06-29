<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Submit Achievement</title>
</head>
<body class="bg-[#F8FAFC] min-h-screen p-6">
    <div class="max-w-3xl mx-auto bg-white rounded-3xl border border-slate-200 p-8 shadow-sm">
        <div class="flex items-center justify-between mb-8 gap-4">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Submit Achievement</h1>
                <p class="text-sm text-gray-500">Upload your document and details for review.</p>
            </div>
            <a href="{{ route('student.dashboard') }}" class="rounded-2xl border border-slate-300 px-5 py-3 text-sm font-semibold text-slate-700 hover:bg-slate-50">Back</a>
        </div>

        @if($errors->any())
            <div class="mb-4 rounded-2xl bg-red-50 border border-red-200 p-4 text-sm text-red-700">
                <ul class="list-disc ml-5">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('student.achievement.store') }}" enctype="multipart/form-data" class="space-y-6">
            @csrf
            <div>
                <label class="block text-sm font-medium text-gray-700">Title</label>
                <input name="title" type="text" value="{{ old('title') }}" required class="mt-1 w-full rounded-2xl border border-slate-200 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#005F5B]" />
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Category</label>
                <select name="category" required class="mt-1 w-full rounded-2xl border border-slate-200 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#005F5B]">
                    <option value="">Select category</option>
                    <option value="Internship" {{ old('category') === 'Internship' ? 'selected' : '' }}>Internship</option>
                    <option value="Certificate" {{ old('category') === 'Certificate' ? 'selected' : '' }}>Certificate</option>
                    <option value="Competition" {{ old('category') === 'Competition' ? 'selected' : '' }}>Competition</option>
                    <option value="Paper Publication" {{ old('category') === 'Paper Publication' ? 'selected' : '' }}>Paper Publication</option>
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Description</label>
                <textarea name="description" rows="5" required class="mt-1 w-full rounded-2xl border border-slate-200 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#005F5B]">{{ old('description') }}</textarea>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">File</label>
                <input name="file" type="file" accept="application/pdf,image/jpeg,image/png" required class="mt-1 w-full rounded-2xl border border-slate-200 p-3 focus:outline-none focus:ring-2 focus:ring-[#005F5B]" />
            </div>

            <button type="submit" class="rounded-2xl bg-[#005F5B] px-6 py-3 text-white font-semibold hover:bg-[#004845] transition">Submit achievement</button>
        </form>
    </div>
</body>
</html>
