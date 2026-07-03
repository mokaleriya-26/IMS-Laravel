<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HelpTicket;
use Illuminate\Support\Facades\Auth;

class HelpDeskController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required',
            'subject' => 'required|max:255',
            'description' => 'required',
            'attachment' => 'nullable|file|max:10240'
        ]);

        $attachment = null;

        if ($request->hasFile('attachment')) {
            $attachment = $request->file('attachment')
                                  ->store('helpdesk','public');
        }

        HelpTicket::create([
            'student_id' => Auth::id(),
            'category' => $request->category,
            'subject' => $request->subject,
            'description' => $request->description,
            'attachment' => $attachment,
            'priority' => 'Medium',
            'status' => 'Open'
        ]);

        return redirect()->route('student.dashboard', ['tab' => 'help-desk'])
                         ->with('success','Ticket submitted successfully.');
    }
}