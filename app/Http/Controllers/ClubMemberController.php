<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ClubEvent;
use App\Models\ClubEventRegistration;
use App\Models\Announcement;

class ClubMemberController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();
        $clubName = $user->assigned_club;

        $events = ClubEvent::where('club_name', $clubName)->latest()->get();
        $myRegistrations = ClubEventRegistration::where('student_id', $user->id)->with('event')->latest()->get();
        $announcements = Announcement::where('type', 'club')->where('target', $clubName)->latest()->take(10)->get();

        return view('club.member.dashboard', compact('user', 'events', 'myRegistrations', 'announcements', 'clubName'));
    }

    public function registerForEvent(Request $request, ClubEvent $event)
    {
        $user = Auth::user();

        $exists = ClubEventRegistration::where('event_id', $event->id)
                    ->where('student_id', $user->id)->exists();

        if ($exists) {
            return back()->with('error', 'You have already registered for this event.');
        }

        ClubEventRegistration::create([
            'event_id'   => $event->id,
            'student_id' => $user->id,
            'status'     => 'Pending',
            'attendance' => 'Pending',
        ]);

        return back()->with('success', 'Successfully registered for ' . $event->title);
    }

    public function submitReport(Request $request, ClubEventRegistration $registration)
    {
        $request->validate(['report' => 'required|file|mimes:pdf,jpg,jpeg,png|max:10240']);

        $path = $request->file('report')->store('club_reports', 'public');
        $registration->update(['report_path' => $path]);

        return back()->with('success', 'Report submitted successfully.');
    }
}
