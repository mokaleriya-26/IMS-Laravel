<div class="flex h-screen bg-slate-50">
    <div class="w-2/3 p-6 border-r flex flex-col">
        <div class="mb-4 flex items-center justify-between">
            <h3 class="text-md font-semibold text-gray-700">Document Preview: {{ basename($achievement->file_path) }}</h3>
        </div>
        <div class="bg-white rounded-xl shadow-inner border flex-1 overflow-hidden">
            @if(pathinfo($achievement->file_path, PATHINFO_EXTENSION) === 'pdf')
                <iframe src="{{ asset('storage/' . $achievement->file_path) }}" class="w-full h-full" frameborder="0"></iframe>
            @else
                <div class="w-full h-full overflow-auto p-4 flex items-center justify-center">
                    <img src="{{ asset('storage/' . $achievement->file_path) }}" class="max-w-full max-h-full object-contain">
                </div>
            @endif
        </div>
    </div>

    <div class="w-1/3 p-6 bg-white overflow-y-auto">
        <h2 class="text-xl font-bold text-gray-800 mb-6">Submission Assessment</h2>
        
        <div class="mb-6 p-4 bg-slate-50 rounded-xl">
            <p class="text-xs text-gray-400 uppercase tracking-wider">Candidate Profile</p>
            <p class="font-semibold text-gray-800 mt-1">{{ $achievement->student->name }}</p>
            <p class="text-sm text-gray-500">Category: {{ $achievement->category }}</p>
            <p class="text-sm text-gray-600 mt-2 italic">"{{ $achievement->description }}"</p>
        </div>

        <form action="{{ route('faculty.review.process', $achievement->id) }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Evaluation Feedbacks</label>
                <textarea name="faculty_remarks" rows="4" class="w-full border rounded-xl p-3 focus:outline-none focus:ring-2 focus:ring-[#005F5B]" placeholder="Provide reasons for alignment or structural remarks..."></textarea>
            </div>

            <div class="grid grid-cols-2 gap-4 pt-4">
                <button type="submit" name="status" value="Rejected" class="px-4 py-3 border border-red-200 text-red-600 rounded-xl font-medium hover:bg-red-50 transition">
                    ❌ Reject
                </button>
                <button type="submit" name="status" value="Approved" class="px-4 py-3 bg-[#005F5B] text-white rounded-xl font-medium hover:bg-[#004845] transition">
                    ✅ Approve
                </button>
            </div>
        </form>
    </div>
</div>