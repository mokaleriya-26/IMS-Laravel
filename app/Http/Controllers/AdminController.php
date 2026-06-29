<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use App\Models\User;
use App\Models\StudentProfile;
use App\Models\Achievement;
use App\Models\Announcement;

class AdminController extends Controller
{
    protected $allRoles = ['student', 'faculty', 'placement_cell', 'club_login', 'club_admin', 'branch_admin'];

    /**
     * Admin dashboard with system overview stats
     */
    public function dashboard()
    {
        $totalStudents        = User::where('role', 'student')->count();
        $totalFaculty         = User::where('role', 'faculty')->count();
        $totalAchievements    = Achievement::count();
        $pendingAchievements  = Achievement::where('status', 'Pending')->count();
        $approvedAchievements = Achievement::where('status', 'Approved')->count();
        $rejectedAchievements = Achievement::where('status', 'Rejected')->count();
        $placementCells       = User::where('role', 'placement_cell')->count();
        $clubAdmins           = User::where('role', 'club_admin')->count();
        $branchAdmins         = User::where('role', 'branch_admin')->count();
        $announcements        = Announcement::latest()->take(5)->get();

        $recentStudents     = User::where('role', 'student')->latest()->take(5)->get();
        $recentAchievements = Achievement::with('student')->latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'totalStudents', 'totalFaculty', 'totalAchievements',
            'pendingAchievements', 'approvedAchievements', 'rejectedAchievements',
            'placementCells', 'clubAdmins', 'branchAdmins',
            'recentStudents', 'recentAchievements', 'announcements'
        ));
    }

    /**
     * List all users of a given role (with branch/division filters for students)
     */
    public function listUsers(Request $request)
    {
        $role = $request->query('role', 'student');
        if (!in_array($role, $this->allRoles)) {
            $role = 'student';
        }

        $query = User::where('role', $role)->with('studentProfile');

        // Folder-style filters for students
        if ($role === 'student') {
            if ($request->filled('branch')) {
                $query->whereHas('studentProfile', fn($q) => $q->where('branch', $request->branch));
            }
            if ($request->filled('year')) {
                $query->whereHas('studentProfile', fn($q) => $q->where('year_of_study', $request->year));
            }
        }

        // Branch filter for faculty
        if ($role === 'faculty' && $request->filled('branch')) {
            $query->where('assigned_branch', $request->branch);
        }

        if ($request->filled('search')) {
            $query->where(fn($q) => $q->where('name', 'like', '%' . $request->search . '%')
                ->orWhere('username', 'like', '%' . $request->search . '%')
                ->orWhere('email', 'like', '%' . $request->search . '%'));
        }

        $users    = $query->latest()->get();
        $branches = StudentProfile::distinct()->pluck('branch');

        return view('admin.users', compact('users', 'role', 'branches'));
    }

    /**
     * Show the create user form
     */
    public function createUser()
    {
        $roles = $this->allRoles;
        return view('admin.create-user', compact('roles'));
    }

    /**
     * Store a newly created user
     */
    public function storeUser(Request $request)
    {
        $rules = [
            'name'     => 'required|string|max:255',
            'username' => 'required|string|max:50|unique:users,username|regex:/^[a-z0-9_]+$/',
            'password' => 'required|string|min:6',
            'role'     => 'required|in:student,faculty,placement_cell,club_login,club_admin,branch_admin',
            'email'    => 'nullable|email|max:255|unique:users,email',
        ];

        if ($request->role === 'student') {
            $rules['roll_number']   = 'required|string|max:50|unique:student_profiles,roll_number';
            $rules['branch']        = 'required|string|max:100';
            $rules['year_of_study'] = 'required|integer|min:1|max:4';
        }
        if (in_array($request->role, ['branch_admin', 'faculty'])) {
            $rules['assigned_branch'] = 'nullable|string|max:100';
        }
        if (in_array($request->role, ['club_admin', 'club_login'])) {
            $rules['assigned_club'] = 'nullable|string|max:100';
        }

        $request->validate($rules, [
            'username.regex' => 'Username may only contain lowercase letters, numbers, and underscores.',
        ]);

        $user = User::create([
            'name'            => $request->name,
            'username'        => $request->username,
            'email'           => $request->email ?? ($request->username . '@ims.edu'),
            'password'        => Hash::make($request->password),
            'role'            => $request->role,
            'assigned_branch' => $request->assigned_branch,
            'assigned_club'   => $request->assigned_club,
        ]);

        if ($request->role === 'student') {
            StudentProfile::create([
                'user_id'       => $user->id,
                'roll_number'   => $request->roll_number,
                'branch'        => $request->branch,
                'year_of_study' => $request->year_of_study,
            ]);
        }

        return redirect()->route('admin.users', ['role' => $request->role])
                         ->with('success', ucfirst(str_replace('_', ' ', $request->role)) . ' account "' . $user->username . '" created successfully.');
    }

    /**
     * Show the edit user form
     */
    public function editUser(User $user)
    {
        $user->load('studentProfile');
        $roles = $this->allRoles;
        return view('admin.edit-user', compact('user', 'roles'));
    }

    /**
     * Update user account details
     */
    public function updateUser(Request $request, User $user)
    {
        $rules = [
            'name'     => 'required|string|max:255',
            'username' => ['required', 'string', 'max:50', 'regex:/^[a-z0-9_]+$/', Rule::unique('users', 'username')->ignore($user->id)],
            'email'    => ['nullable', 'email', 'max:255', Rule::unique('users', 'email')->ignore($user->id)],
            'password' => 'nullable|string|min:6',
            'assigned_branch' => 'nullable|string|max:100',
            'assigned_club'   => 'nullable|string|max:100',
        ];

        if ($user->role === 'student') {
            $rules['roll_number']   = ['required', 'string', 'max:50', Rule::unique('student_profiles', 'roll_number')->ignore(optional($user->studentProfile)->id)];
            $rules['branch']        = 'required|string|max:100';
            $rules['year_of_study'] = 'required|integer|min:1|max:4';
        }

        $request->validate($rules);

        $updateData = [
            'name'            => $request->name,
            'username'        => $request->username,
            'email'           => $request->email ?? $user->email,
            'assigned_branch' => $request->assigned_branch,
            'assigned_club'   => $request->assigned_club,
        ];

        if ($request->filled('password')) {
            $updateData['password'] = Hash::make($request->password);
        }

        $user->update($updateData);

        if ($user->role === 'student' && $user->studentProfile) {
            $user->studentProfile->update([
                'roll_number'   => $request->roll_number,
                'branch'        => $request->branch,
                'year_of_study' => $request->year_of_study,
            ]);
        }

        return redirect()->route('admin.users', ['role' => $user->role])
                         ->with('success', 'Account updated successfully.');
    }

    /**
     * Delete a user account
     */
    public function deleteUser(User $user)
    {
        if ($user->role === 'admin') {
            return back()->with('error', 'Cannot delete admin accounts.');
        }
        $role = $user->role;
        $user->delete();

        return redirect()->route('admin.users', ['role' => $role])
                         ->with('success', 'Account deleted successfully.');
    }

    // ─── Announcement Management ─────────────────────────────────────────────

    public function announcements()
    {
        $announcements = Announcement::with('creator')->latest()->get();
        return view('admin.announcements', compact('announcements'));
    }

    public function storeAnnouncement(Request $request)
    {
        $request->validate([
            'title'   => 'required|string|max:255',
            'content' => 'required|string',
            'type'    => 'required|in:general,branch,club',
            'target'  => 'nullable|string|max:100',
        ]);

        Announcement::create([
            'title'      => $request->title,
            'content'    => $request->content,
            'type'       => $request->type,
            'target'     => $request->target,
            'created_by' => Auth::id(),
        ]);

        return back()->with('success', 'Announcement created successfully.');
    }

    public function updateAnnouncement(Request $request, Announcement $announcement)
    {
        $request->validate([
            'title'   => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $announcement->update($request->only(['title', 'content', 'type', 'target']));
        return back()->with('success', 'Announcement updated.');
    }

    public function deleteAnnouncement(Announcement $announcement)
    {
        $announcement->delete();
        return back()->with('success', 'Announcement deleted.');
    }
}
