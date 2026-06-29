<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Achievement;
use Illuminate\Support\Facades\Auth;

class FacultyController extends Controller
{
    public function queue()
    {
        $pendingSubmissions = Achievement::with('student')->where('status', 'Pending')->latest()->get();
        return view('faculty.queue', compact('pendingSubmissions'));
    }

    public function processReview(Request $request, Achievement $achievement)
    {
        $request->validate([
            'status' => 'required|in:Approved,Rejected',
            'faculty_remarks' => 'nullable|string',
        ]);

        $achievement->update([
            'status' => $request->status,
            'faculty_remarks' => $request->faculty_remarks,
            'reviewed_by' => Auth::id(),
            'reviewed_at' => now(),
        ]);

        return redirect()->route('faculty.queue')->with('success', 'Submission reference #' . $achievement->id . ' updated.');
    }
}