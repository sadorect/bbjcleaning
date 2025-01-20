<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('job_applications', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->enum('gender', ['male', 'female']);
            $table->boolean('has_vehicle');
            $table->enum('employment_type', ['full_time', 'part_time']);
            $table->boolean('can_work_in_canada');
            $table->json('available_days');
            $table->string('preferred_hours');
            $table->boolean('weekend_availability');
            $table->boolean('has_cleaning_experience');
            $table->integer('years_experience');
            $table->string('resume_path');
            $table->string('cover_letter_path')->nullable();
            $table->text('additional_notes')->nullable();
            $table->enum('status', ['pending', 'reviewed', 'contacted', 'rejected'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_applications');
    }
};
