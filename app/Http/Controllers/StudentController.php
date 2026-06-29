<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Achievement;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function dashboard()
    {
        $achievements = Auth::user()->achievements()->latest()->get();
        return view('student.dashboard', compact('achievements'));
    }

    public function storeAchievement(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max=255',
            'category' => 'required|in:Internship,Certificate,Competition,Paper Publication',
            'description' => 'required|string',
            'file' => 'required|file|mimes:pdf,jpeg,png|max:10240', // Max 10MB
        ]);

        $path = $request->file('file')->store('submissions', 'public');

        Achievement::create([
            'student_id' => Auth::id(),
            'title' => $request->title,
            'category' => $request->category,
            'description' => $request->description,
            'file_path' => $path,
        ]);

        return redirect()->route('student.dashboard')->with('success', 'Achievement submitted successfully!');
    }
}