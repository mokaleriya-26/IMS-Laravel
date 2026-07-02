<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('clubs', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->string('department')->nullable();
            $table->string('banner_path')->nullable();
            $table->string('contact_person')->nullable();
            $table->string('contact_email')->nullable();
            $table->string('contact_phone')->nullable();
            $table->foreignId('created_by')->nullable()->constrained('users')->onDelete('set null');
            $table->timestamps();
        });

        Schema::create('club_members', function (Blueprint $table) {
            $table->id();
            $table->foreignId('club_id')->constrained('clubs')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('role')->default('member');
            $table->string('position')->nullable();
            $table->timestamp('joined_at')->nullable();
            $table->timestamps();
            $table->unique(['club_id', 'user_id']);
        });

        Schema::table('club_events', function (Blueprint $table) {
            $table->foreignId('club_id')->nullable()->after('id')->constrained('clubs')->onDelete('set null');
            $table->string('event_banner')->nullable()->after('club_id');
            $table->string('event_category')->nullable()->after('description');
            $table->string('venue')->nullable()->after('location');
            $table->time('start_time')->nullable()->after('to_date');
            $table->time('end_time')->nullable()->after('start_time');
            $table->date('registration_deadline')->nullable()->after('to_date');
            $table->integer('max_participants')->nullable()->after('registration_deadline');
            $table->string('organizer')->nullable()->after('max_participants');
            $table->enum('registration_status', ['Open', 'Closed'])->default('Open')->after('status');
        });

        Schema::create('club_event_attendances', function (Blueprint $table) {
            $table->id();
            $table->foreignId('event_id')->constrained('club_events')->onDelete('cascade');
            $table->foreignId('registration_id')->nullable()->constrained('club_event_registrations')->onDelete('cascade');
            $table->foreignId('marked_by')->nullable()->constrained('users')->onDelete('set null');
            $table->enum('status', ['Present', 'Absent', 'Pending'])->default('Pending');
            $table->string('reference_code')->nullable();
            $table->text('remarks')->nullable();
            $table->timestamp('marked_at')->nullable();
            $table->timestamps();
        });

        Schema::create('club_event_reports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('event_id')->constrained('club_events')->onDelete('cascade');
            $table->foreignId('uploaded_by')->nullable()->constrained('users')->onDelete('set null');
            $table->string('title')->nullable();
            $table->enum('report_type', ['Summary', 'Expense', 'Attendance Sheet', 'Feedback', 'Other'])->default('Other');
            $table->string('file_path');
            $table->text('notes')->nullable();
            $table->timestamps();
        });

        Schema::create('club_event_photos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('event_id')->constrained('club_events')->onDelete('cascade');
            $table->foreignId('uploaded_by')->nullable()->constrained('users')->onDelete('set null');
            $table->string('file_path');
            $table->string('caption')->nullable();
            $table->timestamps();
        });

        Schema::create('club_event_documents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('event_id')->constrained('club_events')->onDelete('cascade');
            $table->foreignId('uploaded_by')->nullable()->constrained('users')->onDelete('set null');
            $table->string('title')->nullable();
            $table->string('file_path');
            $table->text('description')->nullable();
            $table->timestamps();
        });

        Schema::create('club_event_winners', function (Blueprint $table) {
            $table->id();
            $table->foreignId('event_id')->constrained('club_events')->onDelete('cascade');
            $table->foreignId('student_id')->nullable()->constrained('users')->onDelete('set null');
            $table->string('student_name');
            $table->string('roll_number')->nullable();
            $table->string('department')->nullable();
            $table->string('position');
            $table->string('prize');
            $table->enum('certificate_status', ['Pending', 'Issued', 'Not Issued'])->default('Pending');
            $table->text('notes')->nullable();
            $table->timestamps();
        });

        Schema::create('club_event_certificates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('event_id')->constrained('club_events')->onDelete('cascade');
            $table->foreignId('registration_id')->nullable()->constrained('club_event_registrations')->onDelete('set null');
            $table->foreignId('issued_by')->nullable()->constrained('users')->onDelete('set null');
            $table->string('file_path');
            $table->timestamp('issued_at')->nullable();
            $table->enum('status', ['Pending', 'Issued', 'Revoked'])->default('Pending');
            $table->timestamps();
        });

        Schema::create('participant_feedback', function (Blueprint $table) {
            $table->id();
            $table->foreignId('event_id')->constrained('club_events')->onDelete('cascade');
            $table->foreignId('registration_id')->nullable()->constrained('club_event_registrations')->onDelete('set null');
            $table->foreignId('student_id')->nullable()->constrained('users')->onDelete('set null');
            $table->unsignedTinyInteger('rating')->nullable();
            $table->text('comment')->nullable();
            $table->string('category')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('participant_feedback');
        Schema::dropIfExists('club_event_certificates');
        Schema::dropIfExists('club_event_winners');
        Schema::dropIfExists('club_event_documents');
        Schema::dropIfExists('club_event_photos');
        Schema::dropIfExists('club_event_reports');
        Schema::dropIfExists('club_event_attendances');

        Schema::table('club_events', function (Blueprint $table) {
            $table->dropForeign(['club_id']);
            $table->dropColumn([
                'club_id', 'event_banner', 'event_category', 'venue', 'start_time',
                'end_time', 'registration_deadline', 'max_participants', 'organizer', 'registration_status'
            ]);
        });

        Schema::dropIfExists('club_members');
        Schema::dropIfExists('clubs');
    }
};
