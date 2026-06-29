<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Achievement;
use App\Models\Announcement;
use App\Models\StudentProfile;

class BranchAdminController extends Controller
{
    protected function getBranch(): string
    {
        return Auth::user()->assigned_branch ?? '';
    }

    public function dashboard()
    {
        $user   = Auth::user();
        $branch = $this->getBranch();

        $totalStudents  = User::where('role', 'student')
                            ->whereHas('studentProfile', fn($q) => $q->where('branch', $branch))->count();
        $totalFaculty   = User::where('role', 'faculty')->where('assigned_branch', $branch)->count();
        $pendingRequests = Achievement::whereHas('student.studentProfile', fn($q) => $q->where('branch', $branch))
                            ->where('status', 'Pending')->count();
        $approvedCount  = Achievement::whereHas('student.studentProfile', fn($q) => $q->where('branch', $branch))
                            ->where('status', 'Approved')->count();
        $notices = Announcement::where('type', 'branch')->where('target', $branch)->latest()->take(5)->get();

        return view('branch.dashboard', compact(
            'user', 'branch', 'totalStudents', 'totalFaculty', 
            'pendingRequests', 'approvedCount', 'notices'
        ));
    }

    public function students(Request $request)
    {
        $branch = $this->getBranch();
        $query  = User::where('role', 'student')
                    ->whereHas('studentProfile', fn($q) => $q->where('branch', $branch))
                    ->with('studentProfile');

        if ($request->filled('year')) {
            $query->whereHas('studentProfile', fn($q) => $q->where('year_of_study', $request->year));
        }
        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        $students = $query->get();
        return view('branch.students', compact('students', 'branch'));
    }

    public function faculty(Request $request)
    {
        $branch  = $this->getBranch();
        $faculty = User::where('role', 'faculty')->where('assigned_branch', $branch)->get();
        return view('branch.faculty', compact('faculty', 'branch'));
    }

    public function notices()
    {
        $branch  = $this->getBranch();
        $notices = Announcement::where('type', 'branch')->where('target', $branch)->latest()->get();
        return view('branch.notices', compact('notices', 'branch'));
    }

    public function storeNotice(Request $request)
    {
        $request->validate(['title' => 'required|string|max:255', 'content' => 'required|string']);

        Announcement::create([
            'title'      => $request->title,
            'content'    => $request->content,
            'type'       => 'branch',
            'target'     => $this->getBranch(),
            'created_by' => Auth::id(),
        ]);

        return back()->with('success', 'Notice published successfully.');
    }

    public function deleteNotice(Announcement $announcement)
    {
        $announcement->delete();
        return back()->with('success', 'Notice deleted.');
    }

    public function reports()
    {
        $branch = $this->getBranch();
        $achievements = Achievement::whereHas('student.studentProfile', fn($q) => $q->where('branch', $branch))
                            ->with('student.studentProfile')
                            ->latest()
                            ->get();

        $stats = [
            'approved' => $achievements->where('status', 'Approved')->count(),
            'pending'  => $achievements->where('status', 'Pending')->count(),
            'rejected' => $achievements->where('status', 'Rejected')->count(),
        ];

        return view('branch.reports', compact('achievements', 'stats', 'branch'));
    }

    public function requests(Request $request)
    {
        $branch = $this->getBranch();
        $achievements = Achievement::whereHas('student.studentProfile', fn($q) => $q->where('branch', $branch))
                            ->where('status', 'Pending')
                            ->with(['student', 'student.studentProfile'])
                            ->latest()
                            ->get();

        return view('branch.requests', compact('achievements', 'branch'));
    }

    public function approveRequest(Request $request, Achievement $achievement)
    {
        $request->validate(['action' => 'required|in:approve,reject', 'remarks' => 'nullable|string']);

        $achievement->update([
            'status'          => $request->action === 'approve' ? 'Approved' : 'Rejected',
            'faculty_remarks' => $request->remarks,
        ]);

        return back()->with('success', 'Request ' . $request->action . 'd successfully.');
    }
}
