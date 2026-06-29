<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\StudentProfile;
use App\Models\Announcement;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Admin account
        User::create([
            'name'     => 'Administrator',
            'username' => 'admin',
            'email'    => 'admin@ims.edu',
            'password' => Hash::make('admin123'),
            'role'     => 'admin',
        ]);

        // 2. Faculty account
        User::create([
            'name'            => 'Dr. Priya Sharma',
            'username'        => 'faculty001',
            'email'           => 'priya.sharma@ims.edu',
            'password'        => Hash::make('faculty123'),
            'role'            => 'faculty',
            'assigned_branch' => 'Computer Science',
        ]);

        // 3. Demo student account
        $student = User::create([
            'name'     => 'Riya Mokale',
            'username' => 'student001',
            'email'    => 'riya.mokale@ims.edu',
            'password' => Hash::make('student123'),
            'role'     => 'student',
        ]);

        StudentProfile::create([
            'user_id'       => $student->id,
            'roll_number'   => 'CS2024001',
            'branch'        => 'Computer Science',
            'year_of_study' => 3,
        ]);

        // 4. Placement Cell
        User::create([
            'name'     => 'Placement Cell Admin',
            'username' => 'placement001',
            'email'    => 'placement@ims.edu',
            'password' => Hash::make('placement123'),
            'role'     => 'placement_cell',
        ]);

        // 5. Club Login (Member)
        User::create([
            'name'          => 'Club Member',
            'username'      => 'clubmember001',
            'email'         => 'clubmember@ims.edu',
            'password'      => Hash::make('clubmember123'),
            'role'          => 'club_login',
            'assigned_club' => 'Coding Club',
        ]);

        // 6. Club Admin
        User::create([
            'name'          => 'Club Admin',
            'username'      => 'clubadmin001',
            'email'         => 'clubadmin@ims.edu',
            'password'      => Hash::make('clubadmin123'),
            'role'          => 'club_admin',
            'assigned_club' => 'Coding Club',
        ]);

        // 7. Branch Admin
        User::create([
            'name'            => 'CS Branch Admin',
            'username'        => 'branchadmin001',
            'email'           => 'branchadmin@ims.edu',
            'password'        => Hash::make('branchadmin123'),
            'role'            => 'branch_admin',
            'assigned_branch' => 'Computer Science',
        ]);

        // Seed some global announcements to display in marquee
        Announcement::create([
            'title'      => 'Welcome to the new EduStream Portal! All student modules are live.',
            'content'    => 'Welcome to the newly launched portal. You can now submit certificates, paper publications, and internships.',
            'type'       => 'general',
            'created_by' => 1,
        ]);
        Announcement::create([
            'title'      => 'Placement drive registrations for Microsoft are open till July 15th.',
            'content'    => 'Microsoft placement drive registration is open. Eligible branches: CS/IT. CGPA cutoff: 8.5.',
            'type'       => 'general',
            'created_by' => 1,
        ]);
    }
}