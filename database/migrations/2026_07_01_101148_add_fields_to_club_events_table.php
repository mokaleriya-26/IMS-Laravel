<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('club_events', function (Blueprint $table) {

            $table->date('from_date')->nullable();
            $table->date('to_date')->nullable();

            $table->string('brochure')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('club_events', function (Blueprint $table) {
            $table->dropColumn([
                'from_date',
                'to_date',
                'brochure',
            ]);
        });
    }
};
