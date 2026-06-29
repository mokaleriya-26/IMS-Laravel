<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ClubEvent;
use App\Models\ClubEventRegistration;
use App\Models\Announcement;
use App\Models\User;

class ClubAdminController extends Controller
{
    protected function getClubName(): string
    {
        return Auth::user()->assigned_club ?? '';
    }

    public function dashboard()
    {
        $user     = Auth::user();
        $clubName = $this->getClubName();

        $totalEvents    = ClubEvent::where('club_name', $clubName)->count();
        $upcomingEvents = ClubEvent::where('club_name', $clubName)->where('status', 'Scheduled')->count();
        $totalRegistrations = ClubEventRegistration::whereHas('event', fn($q) => $q->where('club_name', $clubName))->count();
        $pendingApprovals   = ClubEventRegistration::where('status', 'Pending')
                                ->whereHas('event', fn($q) => $q->where('club_name', $clubName))->count();
        $recentEvents = ClubEvent::where('club_name', $clubName)->latest()->take(5)->get();

        return view('club.admin.dashboard', compact(
            'user', 'clubName', 'totalEvents', 'upcomingEvents', 
            'totalRegistrations', 'pendingApprovals', 'recentEvents'
        ));
    }

    public function events()
    {
        $clubName = $this->getClubName();
        $events = ClubEvent::where('club_name', $clubName)->latest()->get();
        return view('club.admin.events', compact('events', 'clubName'));
    }

    public function createEvent()
    {
        $clubName = $this->getClubName();
        return view('club.admin.create-event', compact('clubName'));
    }

    public function storeEvent(Request $request)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'event_date'  => 'required|date',
            'location'    => 'nullable|string|max:255',
            'status'      => 'required|in:Scheduled,Completed,Cancelled',
        ]);

        ClubEvent::create([
            'club_name'   => $this->getClubName(),
            'title'       => $request->title,
            'description' => $request->description,
            'event_date'  => $request->event_date,
            'location'    => $request->location,
            'status'      => $request->status,
        ]);

        return redirect()->route('club.admin.events')->with('success', 'Event created successfully!');
    }

    public function editEvent(ClubEvent $event)
    {
        $clubName = $this->getClubName();
        return view('club.admin.create-event', compact('event', 'clubName'));
    }

    public function updateEvent(Request $request, ClubEvent $event)
    {
        $event->update($request->only(['title', 'description', 'event_date', 'location', 'status']));
        return redirect()->route('club.admin.events')->with('success', 'Event updated successfully!');
    }

    public function deleteEvent(ClubEvent $event)
    {
        $event->delete();
        return redirect()->route('club.admin.events')->with('success', 'Event deleted.');
    }

    public function registrations(Request $request)
    {
        $clubName = $this->getClubName();
        $query = ClubEventRegistration::with(['student', 'event'])
                    ->whereHas('event', fn($q) => $q->where('club_name', $clubName));

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $registrations = $query->latest()->get();
        return view('club.admin.registrations', compact('registrations', 'clubName'));
    }

    public function approveRegistration(Request $request, ClubEventRegistration $registration)
    {
        $registration->update(['status' => $request->action === 'approve' ? 'Approved' : 'Rejected']);
        return back()->with('success', 'Registration status updated.');
    }

    public function markAttendance(Request $request, ClubEventRegistration $registration)
    {
        $request->validate(['attendance' => 'required|in:Present,Absent,Pending']);
        $registration->update(['attendance' => $request->attendance]);
        return back()->with('success', 'Attendance updated.');
    }

    public function uploadCertificate(Request $request, ClubEventRegistration $registration)
    {
        $request->validate(['certificate' => 'required|file|mimes:pdf,jpg,jpeg,png|max:10240']);
        $path = $request->file('certificate')->store('club_certificates', 'public');
        $registration->update(['certificate_path' => $path]);
        return back()->with('success', 'Certificate uploaded.');
    }

    public function announcements()
    {
        $clubName = $this->getClubName();
        $announcements = Announcement::where('type', 'club')->where('target', $clubName)->latest()->get();
        return view('club.admin.announcements', compact('announcements', 'clubName'));
    }

    public function storeAnnouncement(Request $request)
    {
        $request->validate(['title' => 'required|string|max:255', 'content' => 'required|string']);

        Announcement::create([
            'title'      => $request->title,
            'content'    => $request->content,
            'type'       => 'club',
            'target'     => $this->getClubName(),
            'created_by' => Auth::id(),
        ]);

        return back()->with('success', 'Announcement published.');
    }

    public function deleteAnnouncement(Announcement $announcement)
    {
        $announcement->delete();
        return back()->with('success', 'Announcement deleted.');
    }
}
