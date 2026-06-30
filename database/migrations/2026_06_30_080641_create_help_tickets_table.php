<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('help_tickets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')
                ->constrained('users')
                ->cascadeOnDelete();
            $table->string('category');
            $table->string('subject');
            $table->text('description');
            $table->string('attachment')->nullable();
            $table->enum('priority',[
                'Low',
                'Medium',
                'High'
            ])->default('Medium');
            $table->enum('status',[
                'Open',
                'In Progress',
                'Resolved',
                'Closed'
            ])->default('Open');
            $table->text('admin_reply')->nullable();
            $table->timestamps();

        });
    }
};
