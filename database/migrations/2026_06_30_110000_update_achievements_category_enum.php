<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        $driver = Schema::getConnection()->getDriverName();

        if ($driver === 'sqlite') {
            DB::statement('PRAGMA foreign_keys=off');
            DB::statement('ALTER TABLE achievements RENAME TO achievements_old');

            Schema::create('achievements', function (Blueprint $table) {
                $table->id();
                $table->foreignId('student_id')->constrained('users')->onDelete('cascade');
                $table->string('title');
                $table->string('category');
                $table->text('description');
                $table->string('file_path');
                $table->enum('status', ['Pending', 'Approved', 'Rejected'])->default('Pending');
                $table->text('faculty_remarks')->nullable();
                $table->foreignId('reviewed_by')->nullable()->constrained('users')->onDelete('set null');
                $table->timestamp('reviewed_at')->nullable();
                $table->timestamps();
                $table->string('academic_year')->nullable();
                $table->string('division')->nullable();
                $table->string('semester')->nullable();
                $table->date('from_date')->nullable();
                $table->date('to_date')->nullable();
                $table->string('organization_name')->nullable();
                $table->string('event_name')->nullable();
                $table->string('award_status')->nullable();
            });

            DB::statement('INSERT INTO achievements (id, student_id, title, category, description, file_path, status, faculty_remarks, reviewed_by, reviewed_at, created_at, updated_at, academic_year, division, semester, from_date, to_date, organization_name, event_name, award_status) SELECT id, student_id, title, category, description, file_path, status, faculty_remarks, reviewed_by, reviewed_at, created_at, updated_at, academic_year, division, semester, from_date, to_date, organization_name, event_name, award_status FROM achievements_old');
            DB::statement('DROP TABLE achievements_old');
            DB::statement('PRAGMA foreign_keys=on');
        } else {
            Schema::table('achievements', function (Blueprint $table) {
                $table->enum('category', ['Internship', 'Certificate', 'Competition', 'Paper Publication', 'Event Participation'])->change();
            });
        }
    }

    public function down(): void
    {
        $driver = Schema::getConnection()->getDriverName();

        if ($driver === 'sqlite') {
            DB::statement('PRAGMA foreign_keys=off');
            DB::statement('ALTER TABLE achievements RENAME TO achievements_old');

            Schema::create('achievements', function (Blueprint $table) {
                $table->id();
                $table->foreignId('student_id')->constrained('users')->onDelete('cascade');
                $table->string('title');
                $table->enum('category', ['Internship', 'Certificate', 'Competition', 'Paper Publication']);
                $table->text('description');
                $table->string('file_path');
                $table->enum('status', ['Pending', 'Approved', 'Rejected'])->default('Pending');
                $table->text('faculty_remarks')->nullable();
                $table->foreignId('reviewed_by')->nullable()->constrained('users')->onDelete('set null');
                $table->timestamp('reviewed_at')->nullable();
                $table->timestamps();
                $table->string('academic_year')->nullable();
                $table->string('division')->nullable();
                $table->string('semester')->nullable();
                $table->date('from_date')->nullable();
                $table->date('to_date')->nullable();
                $table->string('organization_name')->nullable();
                $table->string('event_name')->nullable();
                $table->string('award_status')->nullable();
            });

            DB::statement('INSERT INTO achievements (id, student_id, title, category, description, file_path, status, faculty_remarks, reviewed_by, reviewed_at, created_at, updated_at, academic_year, division, semester, from_date, to_date, organization_name, event_name, award_status) SELECT id, student_id, title, category, description, file_path, status, faculty_remarks, reviewed_by, reviewed_at, created_at, updated_at, academic_year, division, semester, from_date, to_date, organization_name, event_name, award_status FROM achievements_old');
            DB::statement('DROP TABLE achievements_old');
            DB::statement('PRAGMA foreign_keys=on');
        } else {
            Schema::table('achievements', function (Blueprint $table) {
                $table->enum('category', ['Internship', 'Certificate', 'Competition', 'Paper Publication'])->change();
            });
        }
    }
};
