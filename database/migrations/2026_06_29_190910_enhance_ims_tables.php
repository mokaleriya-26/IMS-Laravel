<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Add assigned branch and club to users
        Schema::table('users', function (Blueprint $table) {
            $table->string('assigned_branch')->nullable()->after('role');
            $table->string('assigned_club')->nullable()->after('assigned_branch');
        });

        // Add additional common fields to achievements
        Schema::table('achievements', function (Blueprint $table) {
            $table->string('academic_year')->nullable()->after('category');
            $table->string('division')->nullable()->after('academic_year');
            $table->string('semester')->nullable()->after('division');
            $table->date('from_date')->nullable()->after('semester');
            $table->date('to_date')->nullable()->after('from_date');
            $table->string('organization_name')->nullable()->after('to_date');
            $table->string('event_name')->nullable()->after('organization_name');
            $table->string('award_status')->nullable()->after('event_name'); // 'Award' or 'Participation'
        });

        // Create announcements table
        Schema::create('announcements', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('content');
            $table->string('type')->default('general'); // 'general', 'branch', 'club'
            $table->string('target')->nullable(); // Branch name or Club name
            $table->foreignId('created_by')->constrained('users')->onDelete('cascade');
            $table->timestamps();
        });

        // Create placement_jobs table
        Schema::create('placement_jobs', function (Blueprint $table) {
            $table->id();
            $table->string('company_name');
            $table->string('job_title');
            $table->text('job_description');
            $table->string('type')->default('Job'); // 'Job' or 'Internship'
            $table->string('eligibility_branches')->nullable(); // comma-separated or json
            $table->decimal('eligibility_cgpa', 4, 2)->default(0.00);
            $table->date('drive_date')->nullable();
            $table->string('status')->default('Open'); // 'Open', 'Closed'
            $table->timestamps();
        });

        // Create placement_applications table
        Schema::create('placement_applications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('job_id')->constrained('placement_jobs')->onDelete('cascade');
            $table->foreignId('student_id')->constrained('users')->onDelete('cascade');
            $table->string('status')->default('Applied'); // 'Applied', 'Shortlisted', 'Interviewing', 'Selected', 'Rejected'
            $table->string('resume_path')->nullable();
            $table->datetime('interview_date')->nullable();
            $table->text('remarks')->nullable();
            $table->timestamps();
        });

        // Create club_events table
        Schema::create('club_events', function (Blueprint $table) {
            $table->id();
            $table->string('club_name');
            $table->string('title');
            $table->text('description');
            $table->date('event_date')->nullable();
            $table->string('location')->nullable();
            $table->string('status')->default('Scheduled'); // 'Scheduled', 'Completed', 'Cancelled'
            $table->timestamps();
        });

        // Create club_event_registrations table
        Schema::create('club_event_registrations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('event_id')->constrained('club_events')->onDelete('cascade');
            $table->foreignId('student_id')->constrained('users')->onDelete('cascade');
            $table->string('status')->default('Pending'); // 'Pending', 'Approved', 'Rejected'
            $table->string('attendance')->default('Pending'); // 'Pending', 'Present', 'Absent'
            $table->string('certificate_path')->nullable();
            $table->string('report_path')->nullable(); // For event reports submitted by students
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('club_event_registrations');
        Schema::dropIfExists('club_events');
        Schema::dropIfExists('placement_applications');
        Schema::dropIfExists('placement_jobs');
        Schema::dropIfExists('announcements');

        Schema::table('achievements', function (Blueprint $table) {
            $table->dropColumn([
                'academic_year', 'division', 'semester', 
                'from_date', 'to_date', 'organization_name', 
                'event_name', 'award_status'
            ]);
        });

        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['assigned_branch', 'assigned_club']);
        });
    }
};
