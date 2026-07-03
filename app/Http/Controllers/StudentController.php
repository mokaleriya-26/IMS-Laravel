<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use App\Models\Achievement;
use App\Models\Announcement;
use App\Models\ClubEvent;
use App\Models\ClubEventRegistration;
use App\Models\HelpTicket;
use Illuminate\Support\Facades\Storage;
use App\Models\PlacementJob;
use App\Models\PlacementApplication;

class StudentController extends Controller
{
    public function destroyAchievement($id)
    {
        $achievement = Achievement::where('id', $id)
            ->where('student_id', auth()->id())
            ->firstOrFail();

        // Don't allow deleting approved achievements
        if ($achievement->status === 'Approved') {
            return back()->with('error', 'Approved achievements cannot be deleted.');
        }

        // Delete uploaded file
        if ($achievement->file_path && Storage::disk('public')->exists($achievement->file_path)) {
            Storage::disk('public')->delete($achievement->file_path);
        }
        $achievement->student_deleted = true;
        $achievement->save();
        return back()->with('success', 'Achievement deleted successfully.');
    }

    public function jobs()
    {
        $jobs = PlacementJob::where('status', 'Open')
            ->latest()
            ->get();
        return view('student.jobs', compact('jobs'));
    }

    public function apply(PlacementJob $job)
    {
        PlacementApplication::firstOrCreate(
            [
                'student_id' => auth()->id(),
                'job_id'     => $job->id,
            ],
            [
                'status' => 'Applied',
            ]
        );
        return back()->with('success', 'Application submitted.');
    }

    public function registerForEvent(ClubEvent $event)
    {
        $user = Auth::user();

        if ($event->status !== 'Scheduled' || ($event->registration_status ?? 'Open') === 'Closed') {
            return back()->with('error', 'Registration is not open for this event.');
        }

        $already = ClubEventRegistration::where('event_id', $event->id)
            ->where('student_id', $user->id)
            ->exists();

        if ($already) {
            return back()->with('error', 'You are already registered for this event.');
        }

        if ($event->max_participants && $event->registrations_count >= $event->max_participants) {
            return back()->with('error', 'This event is already full.');
        }

        if ($event->registration_deadline && now()->isAfter($event->registration_deadline)) {
            return back()->with('error', 'Registration deadline has passed.');
        }

        ClubEventRegistration::create([
            'event_id'   => $event->id,
            'student_id' => $user->id,
            'status'     => 'Pending',
            'attendance' => 'Pending',
        ]);

        return back()->with('success', 'Successfully registered for ' . $event->title);
    }

    /**
     * Display the dynamic unified student hub.
     */
    public function dashboard(Request $request)
    {
        $user         = Auth::user()->load('studentProfile');
        $achievements = Achievement::where('student_id', $user->id)
            ->where('student_deleted', false)
            ->get();

        $approvedCount = $achievements->where('status', 'Approved')->count();
        $pendingCount  = $achievements->where('status', 'Pending')->count();
        $rejectedCount = $achievements->where('status', 'Rejected')->count();

        // Announcements for the marquee bar (general + branch-specific + club-specific)
        $branch = optional($user->studentProfile)->branch;
        $announcements = Announcement::where(fn($q) => 
            $q->where('type', 'general')
              ->orWhere(fn($q2) => $q2->where('type', 'branch')->where('target', $branch))
              ->orWhere(fn($q3) => $q3->where('type', 'club')) // Include all club announcements
        )->latest()->take(10)->get();

        // Pre-selected category from quick-action cards
        $preCategory    = $request->query('category', 'Certificate');
        $preAwardStatus = $request->query('award_status', '');

        $currentTab = $request->query('tab', 'dashboard');
        $jobs = PlacementJob::where('status', 'Open')
            ->latest()
            ->get();
        $applications = PlacementApplication::where('student_id', auth()->id())
            ->pluck('status','job_id');

        $tickets = HelpTicket::where('student_id', $user->id)
            ->latest()
            ->get();

        $events = null;
        $clubNames = collect();
        $selectedClub = $request->query('club', '');

        if ($currentTab === 'events') {
            $query = ClubEvent::with('club')
                ->withCount('registrations')
                ->with(['registrations' => function ($query) {
                    $query->where('student_id', auth()->id());
                }])
                ->orderByDesc('from_date');

            $clubNames = ClubEvent::select('club_name')
                ->distinct()
                ->orderBy('club_name')
                ->pluck('club_name');

            if ($selectedClub) {
                $query->where('club_name', $selectedClub);
            }

            $events = $query->get();
        }

        return view('student.dashboard', compact(
            'achievements', 'user', 'currentTab',
            'approvedCount', 'pendingCount', 'rejectedCount',
            'announcements', 'preCategory', 'preAwardStatus','jobs','applications', 'tickets', 'events',
            'clubNames', 'selectedClub'
        ));
    }

    /**
     * Display profile overview view workspace.
     */
    public function profile()
    {
        $user = Auth::user()->load('studentProfile');
        return view('student.profile', compact('user'));
    }

    /**
     * Handle updating student profile variables.
     */
    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name'          => 'required|string|max:255',
            'email'         => ['required', 'string', 'email', 'max:255', Rule::unique('users', 'email')->ignore($user->id)],
            'roll_number'   => ['required', 'string', 'max:50', Rule::unique('student_profiles', 'roll_number')->ignore(optional($user->studentProfile)->id)],
            'branch'        => 'required|string|max:100',
            'year_of_study' => 'required|integer|min:1|max:4',
        ]);

        $user->update([
            'name'  => $request->name,
            'email' => $request->email,
        ]);

        $user->studentProfile()->updateOrCreate(
            ['user_id' => $user->id],
            [
                'roll_number'   => $request->roll_number,
                'branch'        => $request->branch,
                'year_of_study' => $request->year_of_study,
            ]
        );

        return redirect()->route('student.dashboard', ['tab' => 'dashboard'])->with('success', 'Profile updated successfully.');
    }

    /**
     * Fallback method if separate route is called for submission view.
     */
    public function createAchievement()
    {
        return redirect()->route('student.dashboard', ['tab' => 'submissions']);
    }

    /**
     * Handle incoming achievement forms & storage pipeline.
     */
    public function storeAchievement(Request $request)
    {
        $request->validate([
            'category'          => 'required|in:Internship,Certificate,Competition,Paper Publication,Event Participation',
            'description'       => 'required|string',
            'file'              => 'required|file|mimes:pdf,jpeg,png,jpg|max:10240',
            'academic_year'     => 'nullable|string|max:20',
            'division'          => 'nullable|string|max:10',
            'semester'          => 'nullable|string|max:10',
            'from_date'         => 'nullable|date',
            'to_date'           => 'nullable|date|after_or_equal:from_date',
            'organization_name' => 'nullable|string|max:255',
            'event_name'        => 'nullable|string|max:255',
            'award_status'      => 'nullable|in:Award,Participation',
            'remarks'           => 'nullable|string|max:1000',
        ]);

        $path = $request->file('file')->store('submissions', 'public');
        $recordTitle = $request->event_name ?: $request->category;

        $request->user()->achievements()->create([
            'title'             => $recordTitle,
            'category'          => $request->category,
            'description'       => $request->description,
            'file_path'         => $path,
            'status'            => 'Pending',
            'academic_year'     => $request->academic_year,
            'division'          => $request->division,
            'semester'          => $request->semester,
            'from_date'         => $request->from_date,
            'to_date'           => $request->to_date,
            'organization_name' => $request->organization_name,
            'event_name'        => $request->event_name,
            'award_status'      => $request->award_status,
            'faculty_remarks'   => $request->remarks,
        ]);

        return redirect()->route('student.dashboard', ['tab' => 'academic-records'])
                         ->with('success', 'Achievement submitted successfully! Awaiting faculty review.');
    }

    /**
     * Export achievement records as CSV, PDF, or Excel
     */
    public function export(Request $request)
    {
        $user  = Auth::user()->load('studentProfile');
        $query = $user->achievements();

        // Apply filters if present
        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }
        if ($request->filled('academic_year')) {
            $query->where('academic_year', $request->academic_year);
        }

        $achievements = $query->latest()->get();
        $format       = $request->query('format', 'csv');

        if ($format === 'pdf') {
            // Return a clean, print-ready HTML page representing the PDF report
            return view('student.export-pdf', compact('user', 'achievements'));
        }

        if ($format === 'excel') {
            $filename = 'achievements_' . $user->username . '_' . now()->format('Ymd') . '.xls';
            $headers  = [
                'Content-Type'        => 'application/vnd.ms-excel',
                'Content-Disposition' => 'attachment; filename="' . $filename . '"',
                'Cache-Control'       => 'max-age=0',
            ];

            $callback = function () use ($achievements, $user) {
                echo '<table border="1">';
                echo '<tr>
                    <th>Student Name</th>
                    <th>Roll Number</th>
                    <th>Branch</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Academic Year</th>
                    <th>Organization</th>
                    <th>Event Name</th>
                    <th>Award Status</th>
                    <th>From Date</th>
                    <th>To Date</th>
                    <th>Status</th>
                    <th>Submitted On</th>
                </tr>';
                foreach ($achievements as $a) {
                    echo "<tr>
                        <td>{$user->name}</td>
                        <td>" . (optional($user->studentProfile)->roll_number ?? 'N/A') . "</td>
                        <td>" . (optional($user->studentProfile)->branch ?? 'N/A') . "</td>
                        <td>{$a->title}</td>
                        <td>{$a->category}</td>
                        <td>" . ($a->academic_year ?? 'N/A') . "</td>
                        <td>" . ($a->organization_name ?? 'N/A') . "</td>
                        <td>" . ($a->event_name ?? 'N/A') . "</td>
                        <td>" . ($a->award_status ?? 'N/A') . "</td>
                        <td>" . ($a->from_date ?? 'N/A') . "</td>
                        <td>" . ($a->to_date ?? 'N/A') . "</td>
                        <td>{$a->status}</td>
                        <td>" . $a->created_at->format('Y-m-d') . "</td>
                    </tr>";
                }
                echo '</table>';
            };

            return response()->stream($callback, 200, $headers);
        }

        // Default CSV
        $filename = 'achievements_' . $user->username . '_' . now()->format('Ymd') . '.csv';
        $headers  = [
            'Content-Type'        => 'text/csv',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
        ];

        $callback = function () use ($achievements, $user) {
            $handle = fopen('php://output', 'w');
            fputcsv($handle, ['Student Name', 'Roll Number', 'Branch', 'Title', 'Category', 'Academic Year', 'Organization', 'Event Name', 'Award Status', 'From Date', 'To Date', 'Status', 'Submitted On']);

            foreach ($achievements as $a) {
                fputcsv($handle, [
                    $user->name,
                    optional($user->studentProfile)->roll_number,
                    optional($user->studentProfile)->branch,
                    $a->title,
                    $a->category,
                    $a->academic_year ?? 'N/A',
                    $a->organization_name ?? 'N/A',
                    $a->event_name ?? 'N/A',
                    $a->award_status ?? 'N/A',
                    $a->from_date ?? 'N/A',
                    $a->to_date ?? 'N/A',
                    $a->status,
                    $a->created_at->format('Y-m-d'),
                ]);
            }

            fclose($handle);
        };

        return response()->stream($callback, 200, $headers);
    }
}