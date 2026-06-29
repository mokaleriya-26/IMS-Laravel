<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Achievement;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class FacultyController extends Controller
{
    /**
     * Central Faculty Portal Dashboard (with Advanced Multi-Filtering)
     */
    public function dashboard(Request $request)
    {
        $query = Achievement::with(['student.studentProfile', 'reviewer']);

        // Advanced filter logic (allows multiple simultaneous filters)
        if ($request->filled('branch')) {
            $query->whereHas('student.studentProfile', fn($q) => $q->where('branch', $request->branch));
        }
        if ($request->filled('academic_year')) {
            $query->where('academic_year', $request->academic_year);
        }
        if ($request->filled('semester')) {
            $query->where('semester', $request->semester);
        }
        if ($request->filled('division')) {
            $query->where('division', $request->division);
        }
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }
        if ($request->filled('start_date') && $request->filled('end_date')) {
            $query->whereBetween('from_date', [$request->start_date, $request->end_date]);
        }
        if ($request->filled('faculty_name')) {
            $query->whereHas('reviewer', fn($q) => $q->where('name', 'like', '%' . $request->faculty_name . '%'));
        }

        $achievements = $query->latest()->get();
        
        $currentView = $request->query('view', 'queue');
        $selectedAchievement = null;

        if ($currentView === 'review' && $request->has('id')) {
            $selectedAchievement = Achievement::with('student.studentProfile')->find($request->query('id'));
            if (!$selectedAchievement) {
                return redirect()->route('faculty.dashboard', ['view' => 'queue'])
                                 ->with('error', 'Submission record not found.');
            }
        }

        return view('faculty.dashboard', compact('achievements', 'currentView', 'selectedAchievement'));
    }

    /**
     * Process verification evaluation form submissions
     */
    public function processReview(Request $request, Achievement $achievement)
    {
        $request->validate([
            'status' => 'required|in:Approved,Rejected,Pending',
            'faculty_remarks' => 'nullable|string|max:1000',
        ]);

        $achievement->update([
            'status' => $request->status,
            'faculty_remarks' => $request->faculty_remarks,
            'reviewed_by' => Auth::id(),
            'reviewed_at' => now(),
        ]);

        return redirect()->route('faculty.dashboard', ['view' => 'queue'])
                         ->with('success', 'Submission reference #' . $achievement->id . ' updated successfully.');
    }
}