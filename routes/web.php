<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PlacementController;
use App\Http\Controllers\ClubAdminController;
use App\Http\Controllers\BranchAdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HelpDeskController;

Route::middleware(['auth'])->group(function () {

    Route::post('/student/helpdesk/store',
        [HelpDeskController::class,'store'])
        ->name('student.helpdesk.store');

});

// ─── Guest Routes ────────────────────────────────────────────────────────────
Route::middleware('guest')->group(function () {
    Route::get('/', [AuthController::class, 'showPortalSelection'])->name('portal.select');
    Route::get('/login/{role}', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
});

// ─── Authenticated Routes ─────────────────────────────────────────────────────
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // ── Student Portal ────────────────────────────────────────────────────────
    Route::middleware('role:student')->prefix('student')->name('student.')->group(function () {
        Route::get('/dashboard', [StudentController::class, 'dashboard'])->name('dashboard');
        Route::get('/profile', [StudentController::class, 'profile'])->name('profile');
        Route::post('/profile', [StudentController::class, 'updateProfile'])->name('profile.update');
        Route::get('/submit-achievement', function () {
            return redirect()->route('student.dashboard', ['tab' => 'submissions']);
        })->name('achievement.create');
        Route::post('/submit-achievement', [StudentController::class, 'storeAchievement'])->name('achievement.store');
        Route::post('/events/{event}/register', [StudentController::class, 'registerForEvent'])->scopeBindings()->name('events.register');
        Route::get('/export', [StudentController::class, 'export'])->name('export');
        Route::delete('/achievement/{achievement}', [StudentController::class, 'destroyAchievement'])
        ->name('achievement.destroy');
        Route::get('/jobs',[StudentController::class,'jobs'])
        ->name('jobs');
        Route::post('/jobs/{job}/apply',[StudentController::class,'apply'])
        ->scopeBindings()
        ->name('jobs.apply');
    });

    // ── Faculty Portal ────────────────────────────────────────────────────────
    Route::middleware('role:faculty')->prefix('faculty')->name('faculty.')->group(function () {
        Route::get('/dashboard', [FacultyController::class, 'dashboard'])->name('dashboard');
        Route::post('/review/{achievement}', [FacultyController::class, 'processReview'])->name('review.process');
    });

    // ── Admin Portal ──────────────────────────────────────────────────────────
    Route::middleware('role:admin')->prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
        Route::get('/users', [AdminController::class, 'listUsers'])->name('users');
        Route::get('/users/create', [AdminController::class, 'createUser'])->name('users.create');
        Route::post('/users/create', [AdminController::class, 'storeUser'])->name('users.store');
        Route::get('/users/{user}/edit', [AdminController::class, 'editUser'])->name('users.edit');
        Route::put('/users/{user}/edit', [AdminController::class, 'updateUser'])->name('users.update');
        Route::delete('/users/{user}', [AdminController::class, 'deleteUser'])->name('users.delete');
        // Announcements
        Route::get('/announcements', [AdminController::class, 'announcements'])->name('announcements');
        Route::post('/announcements', [AdminController::class, 'storeAnnouncement'])->name('announcements.store');
        Route::put('/announcements/{announcement}', [AdminController::class, 'updateAnnouncement'])->name('announcements.update');
        Route::delete('/announcements/{announcement}', [AdminController::class, 'deleteAnnouncement'])->name('announcements.delete');
    });

    // ── Placement Cell Portal ─────────────────────────────────────────────────
    Route::middleware('role:placement_cell')->prefix('placement')->name('placement.')->group(function () {
        Route::get('/dashboard', [PlacementController::class, 'dashboard'])->name('dashboard');
        Route::get('/jobs', [PlacementController::class, 'jobs'])->name('jobs');
        Route::get('/jobs/create', [PlacementController::class, 'createJob'])->name('jobs.create');
        Route::post('/jobs', [PlacementController::class, 'storeJob'])->name('jobs.store');
        Route::get('/jobs/{job}/edit', [PlacementController::class, 'editJob'])->name('jobs.edit');
        Route::put('/jobs/{job}', [PlacementController::class, 'updateJob'])->name('jobs.update');
        Route::delete('/jobs/{job}', [PlacementController::class, 'deleteJob'])->name('jobs.delete');
        Route::get('/applications', [PlacementController::class, 'applications'])->name('applications');
        Route::post('/applications/{application}/status', [PlacementController::class, 'updateApplicationStatus'])->name('applications.status');
        Route::get('/students', [PlacementController::class, 'students'])->name('students');
        Route::get('/statistics', [PlacementController::class, 'statistics'])->name('statistics');
    });

    // ── Club Admin Portal ─────────────────────────────────────────────────────
    Route::middleware('role:club_admin')->prefix('club-admin')->name('club.admin.')->group(function () {
        Route::get('/dashboard', [ClubAdminController::class, 'dashboard'])->name('dashboard');
        Route::get('/events', [ClubAdminController::class, 'events'])->name('events');
        Route::get('/events/create', [ClubAdminController::class, 'createEvent'])->name('events.create');
        Route::post('/events', [ClubAdminController::class, 'storeEvent'])->name('events.store');
        Route::get('/events/{event}/edit', [ClubAdminController::class, 'editEvent'])->name('events.edit');
        Route::put('/events/{event}', [ClubAdminController::class, 'updateEvent'])->name('events.update');
        Route::delete('/events/{event}', [ClubAdminController::class, 'deleteEvent'])->name('events.delete');
        Route::get('/registrations', [ClubAdminController::class, 'registrations'])->name('registrations');
        Route::post('/registrations/{registration}/approve', [ClubAdminController::class, 'approveRegistration'])->name('registrations.approve');
        Route::post('/registrations/{registration}/attendance', [ClubAdminController::class, 'markAttendance'])->name('registrations.attendance');
        Route::post('/registrations/{registration}/certificate', [ClubAdminController::class, 'uploadCertificate'])->name('registrations.certificate');
        Route::get('/announcements', [ClubAdminController::class, 'announcements'])->name('announcements');
        Route::post('/announcements', [ClubAdminController::class, 'storeAnnouncement'])->name('announcements.store');
        Route::delete('/announcements/{announcement}', [ClubAdminController::class, 'deleteAnnouncement'])->name('announcements.delete');
    });

    // ── Branch Admin Portal ───────────────────────────────────────────────────
    Route::middleware('role:branch_admin')->prefix('branch-admin')->name('branch.admin.')->group(function () {
        Route::get('/dashboard', [BranchAdminController::class, 'dashboard'])->name('dashboard');
        Route::get('/students', [BranchAdminController::class, 'students'])->name('students');
        Route::get('/faculty', [BranchAdminController::class, 'faculty'])->name('faculty');
        Route::get('/notices', [BranchAdminController::class, 'notices'])->name('notices');
        Route::post('/notices', [BranchAdminController::class, 'storeNotice'])->name('notices.store');
        Route::delete('/notices/{announcement}', [BranchAdminController::class, 'deleteNotice'])->name('notices.delete');
        Route::get('/reports', [BranchAdminController::class, 'reports'])->name('reports');
        Route::get('/requests', [BranchAdminController::class, 'requests'])->name('requests');
        Route::post('/requests/{achievement}/approve', [BranchAdminController::class, 'approveRequest'])->name('requests.approve');
    });
});