<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\StudentProfile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    protected $validRoles = [
        'student', 'faculty', 'admin', 
        'placement_cell', 'club_login', 'club_admin', 'branch_admin'
    ];

    // Display portal selector splash page
    public function showPortalSelection()
    {
        return view('portal-select');
    }

    // Show custom login form based on role
    public function showLogin($role)
    {
        if (!in_array($role, $this->validRoles)) {
            abort(404);
        }
        return view('auth.login', compact('role'));
    }

    // Process user authentication requests (supports username OR email)
    public function login(Request $request)
    {
        $request->validate([
            'login'    => 'required|string',
            'password' => 'required|string',
            'role'     => 'required|in:student,faculty,admin,placement_cell,club_login,club_admin,branch_admin',
        ]);

        $loginField = $request->login;

        // Try to find user by username first, then by email
        $user = User::where('username', $loginField)
                    ->orWhere('email', $loginField)
                    ->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return back()->withErrors([
                'login' => 'The provided credentials do not match our records.',
            ])->onlyInput('login');
        }

        if ($user->role !== $request->role) {
            return back()->withErrors([
                'login' => 'Please sign in using the correct portal for your account.',
            ])->onlyInput('login');
        }

        Auth::login($user, $request->has('remember'));
        $request->session()->regenerate();

        return $this->redirectByRole($user->role);
    }

    // Redirect user to their correct dashboard by role
    protected function redirectByRole(string $role)
    {
        return match($role) {
            'admin'          => redirect()->route('admin.dashboard'),
            'faculty'        => redirect()->route('faculty.dashboard'),
            'placement_cell' => redirect()->route('placement.dashboard'),
            'club_login'     => redirect()->route('club.member.dashboard'),
            'club_admin'     => redirect()->route('club.admin.dashboard'),
            'branch_admin'   => redirect()->route('branch.admin.dashboard'),
            default          => redirect()->route('student.dashboard'),
        };
    }

    // Show registration portal for new students
    public function showRegister()
    {
        return view('auth.register');
    }

    // Process fresh account creation pipelines
    public function register(Request $request)
    {
        $request->validate([
            'name'          => 'required|string|max:255',
            'email'         => 'required|string|email|max:255|unique:users',
            'password'      => 'required|string|min:8|confirmed',
            'roll_number'   => 'required|string|max:50|unique:student_profiles',
            'branch'        => 'required|string|max:100',
            'year_of_study' => 'required|integer|min:1|max:4',
        ]);

        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => 'student',
        ]);

        StudentProfile::create([
            'user_id'       => $user->id,
            'roll_number'   => $request->roll_number,
            'branch'        => $request->branch,
            'year_of_study' => $request->year_of_study,
        ]);

        Auth::login($user);

        return redirect()->route('student.dashboard');
    }

    // Clear session and disconnect user
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('portal.select');
    }
}