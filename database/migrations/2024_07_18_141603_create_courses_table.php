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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('language'); // e.g., English, French
            $table->boolean('is_paid')->default(true); // true if paid, false if free
            $table->decimal('amount', 8, 2)->nullable(); // only required if paid
            $table->string('program_duration'); // e.g., "4 weeks", "3 months"
            $table->string('age_range'); // e.g., "10-14", "5-8"
            $table->string('course_image')->nullable(); // path to course image
            $table->string('youtube_link')->nullable(); // YouTube video link
            $table->foreignId('teacher_id')->constrained('users'); // links to the teacher user
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
