<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\PlacementJob;
use App\Models\PlacementApplication;
use App\Models\User;
use App\Models\StudentProfile;

class PlacementController extends Controller
{
    public function dashboard()
    {
        $totalJobs    = PlacementJob::count();
        $openJobs     = PlacementJob::where('status', 'Open')->count();
        $totalApps    = PlacementApplication::count();
        $selected     = PlacementApplication::where('status', 'Selected')->count();
        $shortlisted  = PlacementApplication::where('status', 'Shortlisted')->count();
        $recentJobs   = PlacementJob::latest()->take(5)->get();

        return view('placement.dashboard', compact(
            'totalJobs', 'openJobs', 'totalApps', 'selected', 'shortlisted', 'recentJobs'
        ));
    }

    public function jobs()
    {
        $jobs = PlacementJob::latest()->get();
        return view('placement.jobs', compact('jobs'));
    }

    public function createJob()
    {
        return view('placement.create-job');
    }

    public function storeJob(Request $request)
    {
        $request->validate([
            'company_name'   => 'required|string|max:255',
            'job_title'      => 'required|string|max:255',
            'job_description'=> 'required|string',
            'type'           => 'required|in:Job,Internship',
            'drive_date'     => 'nullable|date',
            'eligibility_cgpa' => 'nullable|numeric|min:0|max:10',
        ]);

        PlacementJob::create($request->only([
            'company_name', 'job_title', 'job_description', 'type',
            'eligibility_branches', 'eligibility_cgpa', 'drive_date', 'status'
        ]));

        return redirect()->route('placement.jobs')->with('success', 'Drive posted successfully!');
    }

    public function editJob(PlacementJob $job)
    {
        return view('placement.create-job', compact('job'));
    }

    public function updateJob(Request $request, PlacementJob $job)
    {
        $job->update($request->only([
            'company_name', 'job_title', 'job_description', 'type',
            'eligibility_branches', 'eligibility_cgpa', 'drive_date', 'status'
        ]));

        return redirect()->route('placement.jobs')->with('success', 'Drive updated successfully!');
    }

    public function deleteJob(PlacementJob $job)
    {
        $job->delete();
        return redirect()->route('placement.jobs')->with('success', 'Drive deleted.');
    }

    public function applications(Request $request)
    {
        $query = PlacementApplication::with(['student', 'job']);
        
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }
        if ($request->filled('job_id')) {
            $query->where('job_id', $request->job_id);
        }

        $applications = $query->latest()->get();
        $jobs = PlacementJob::all();

        return view('placement.applications', compact('applications', 'jobs'));
    }

    public function updateApplicationStatus(Request $request, PlacementApplication $application)
    {
        $request->validate(['status' => 'required|in:Applied,Shortlisted,Interviewing,Selected,Rejected']);
        
        $application->update([
            'status' => $request->status,
            'remarks' => $request->remarks,
            'interview_date' => $request->interview_date,
        ]);

        return back()->with('success', 'Application status updated.');
    }

    public function students(Request $request)
    {
        $query = User::where('role', 'student')->with('studentProfile');
        
        if ($request->filled('branch')) {
            $query->whereHas('studentProfile', fn($q) => $q->where('branch', $request->branch));
        }
        if ($request->filled('cgpa_min')) {
            $query->whereHas('placementApplications');
        }

        $students = $query->get();
        $branches = StudentProfile::distinct()->pluck('branch');

        return view('placement.students', compact('students', 'branches'));
    }

    public function statistics()
    {
        $totalStudents = User::where('role', 'student')->count();
        $placed        = PlacementApplication::where('status', 'Selected')->distinct('student_id')->count();
        $totalDrives   = PlacementJob::count();
        $openDrives    = PlacementJob::where('status', 'Open')->count();
        $byStatus      = PlacementApplication::selectRaw('status, count(*) as count')->groupBy('status')->pluck('count', 'status');

        return view('placement.statistics', compact(
            'totalStudents', 'placed', 'totalDrives', 'openDrives', 'byStatus'
        ));
    }
}
